<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->handlePrices();
        return 0;
    }

    private function handlePrices()
    {
//        dd(config('database.connections.timescale_price'));
        $connection = 'timescale_price';
        for ($i = 1; $i <= 13000; $i++) {
            $this->handleCoin($i, $connection);
        }
        return 0;
    }

    private function handleCoin($id, $connection)
    {
        try {
            echo "Progress: $id       \r";
            $map = DB::table('cryptocurrencies_mapping')->where('cmc_id', '=', $id)->first();


            if (empty($map)) {
                echo "No mapping $id ",PHP_EOL;

                return;
            }


            $httpClient = new \GuzzleHttp\Client();
            $url = "https://api.coinmarketcap.com/data-api/v3/cryptocurrency/detail/chart?id=$id&range=ALL";
            $response = $httpClient->get($url);
            $res = json_decode($response->getBody()->getContents())->data;

            if (!property_exists($res, 'points')) {
                echo "EMPTY $id SyncCoinHistory",PHP_EOL;
                sleep(1);
                return;
            }


            $res = $res->points;
            $timestamps = array_keys(get_object_vars($res));
            sort($timestamps);
            $data = [];
            foreach ($timestamps as $timestamp) {
                $v = $res->{$timestamp}->v;
                $data[] = [
                    'cryptocurrency_id' => $map->cryptocurrency_id,
                    'price' => $v[0],
                    'volume_24h' => $v[1],
                    'market_cap' => $v[2],
                    'time' => Carbon::createFromTimestamp($timestamp),
                ];
            }
            DB::connection($connection)->table('historical_prices')->insert($data);
        } catch (\Exception $e) {
            echo "Error ",$id,PHP_EOL;
            return;
        }
    }
}
