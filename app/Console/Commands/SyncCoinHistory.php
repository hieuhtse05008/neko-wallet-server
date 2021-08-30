<?php

namespace App\Console\Commands;

use App\Jobs\SyncCoinHistoryBinance;
use App\Jobs\SyncCoinHistoryCoinGecko;
use App\Jobs\SyncCoinHistoryHuobi;
use App\Jobs\SyncCoinHistoryNami;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyncCoinHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:coin_history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync History';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->handleCoinMarketCaps();
//        $this->handleCoinHistory();
    }

    private function handleCoinMarketCaps()
    {

        Log::info('start handleCoinMarketCaps');
        $data = [];
        for ($i = 1; $i <= 5000; $i++) {
            $item = $this->handleCoinMarketCap($i);
            if (!empty($item)) {
                $data[] = $item;
            }
            usleep(900000);
        }
        $f = fopen("coins.json", "w") or die("Unable to open file!");
        $txt = json_encode($data);
        fwrite($f, $txt);
        fclose($f);
        Log::info('end handleCoinMarketCaps ' . count($data));
        return 0;
    }

    private function handleCoinMarketCap($id)
    {
        echo "Id: $id" . "\xA";
        Log::info("start handleCoinMarketCap $id");
        try {
            //get slug
            $httpClient = new \GuzzleHttp\Client();
            $url = "https://api.coinmarketcap.com/data-api/v3/cryptocurrency/detail?id=$id";
            $response = $httpClient->get($url);
            $res = json_decode($response->getBody()->getContents())->data;

            if (!property_exists($res, 'slug')) {
                Log::info("FAIL $id handleCoinMarketCap");
                return null;
            }
            $slug = $res->slug;
            Log::info("end handleCoinMarketCap $id");


            //get info
            $content = (file_get_contents("https://coinmarketcap.com/currencies/$slug"));
            preg_match("/<script id=\"__NEXT_DATA__\" type=\"application\/json\">(.*)<\/script>/", $content, $json, PREG_OFFSET_CAPTURE);
            $text = (($json[0])[0]);
            $dom = new \DOMDocument();
            $dom->preserveWhiteSpace = false;
            $dom->loadHTML($text, LIBXML_HTML_NOIMPLIED);
            $dom->formatOutput = true;
            $json_text = ($dom->textContent);

            $obj = json_decode($json_text);
            $platforms = object_get($obj, 'props.initialProps.pageProps.info.platforms');
            $explorers = object_get($obj, 'props.initialProps.pageProps.info.urls.explorer');

            echo json_encode([
                'coin_market_cap_id' => $id,
                'coin_market_cap_slug' => $slug,
                'symbol' => $res->symbol,
                'logo' => "https://s2.coinmarketcap.com/static/img/coins/200x200/$id",
                'platforms' => $platforms,
                'explorers' => $explorers,
            ]). "\xA";
        } catch (\Exception $e) {
            Log::error($e);
            return null;
        }
        return [
            'coin_market_cap_id' => $id,
            'coin_market_cap_slug' => $slug,
            'symbol' => $res->symbol,
            'logo' => "https://s2.coinmarketcap.com/static/img/coins/200x200/$id",
            'platforms' => $platforms,
            'explorers' => $explorers,
        ];
    }


    private function handleCoinHistory()
    {
        Log::info('start SyncCoinHistory');
        $connection = config('database.connections.warehouse.database');
        for ($i = 1; $i <= 12000; $i++) {
            $this->handleCoin($i, $connection);
        }
        Log::info('end SyncCoinHistory');
        return 0;
    }

    private function handleCoin($id, $connection)
    {
        try {
            $httpClient = new \GuzzleHttp\Client();
            $url = "https://api.coinmarketcap.com/data-api/v3/cryptocurrency/detail/chart?id=$id&range=ALL";
            $response = $httpClient->get($url);
            $res = json_decode($response->getBody()->getContents())->data;
        } catch (\Exception $e) {
            Log::error($e);
            return;
        }
        if (!property_exists($res, 'points')) {
            Log::info("FAIL $id SyncCoinHistory");
            return;
        }
        Log::info("$id SyncCoinHistory");

        $res = $res->points;
        $timestamps = array_keys(get_object_vars($res));
        sort($timestamps);
        $data = [];
        foreach ($timestamps as $timestamp) {
            $v = $res->{$timestamp}->v;
            $data[] = [
                'coin_market_cap_id' => $id,
                'price' => $v[0],
                'volume_24h' => $v[1],
                'market_cap' => $v[2],
                'coin_count' => $v[4],
                'created_at' => Carbon::createFromTimestamp($timestamp)->toDateTimeString(),
                'updated_at' => Carbon::createFromTimestamp($timestamp)->toDateTimeString(),
            ];
        }
        DB::connection($connection)->table('temp_prices')->insert($data);

    }


}
