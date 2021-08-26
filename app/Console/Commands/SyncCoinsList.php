<?php

namespace App\Console\Commands;

use App\Services\CoinGeckoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyncCoinsList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:coins';

    /**
     * The console command descwription.
     *
     * @var string
     */
    protected $description = 'Sync coins list';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private $coin_gecko_list = [];

    private function handleCoinGecko()
    {
        Log::info("Begin handleCoinGecko");
        $connection = config('database.connections.warehouse.database');
        $data = CoinGeckoService::getListCoins();
        $coins = [];
        foreach ($data as $item) {
            $coins[] = [
                'coin_id' => $item['id'],
                'symbol' => $item['symbol'],
                'name' => $item['name'],
            ];
        }
        DB::connection($connection)->table('coins')->upsert($coins, 'coin_id');
        $this->coin_gecko_list = $coins;



        Log::info("End handleCoinGecko");
    }


    private function handleCoinGeckoPlatform()
    {
        Log::info("Begin handleCoinGeckoPlatform");
        $connection = config('database.connections.warehouse.database');

        foreach ($this->coin_gecko_list as $coin) {
            $data = CoinGeckoService::getCoinById($coin['coin_id'],['market_data'=>'true','tickers'=>'true',]);
            if (is_array($data)) {

                $update_data = [
                    'asset_platform_id' => '',
                    'platforms' => '',
                    'categories' => '',
                    'description' => '',
                    'image_url' => '',
                    'links' => '',
                    'tickers' => '',
                ];
                if(!empty($data['description'])){
                    $key = array_key_first($data['description']);
                    if(!empty($data['description'][$key]))
                    $update_data['description'] = $data['description'][$key];
                }
                if(!empty($data['image'])){
                    $keys = array_keys($data['image']);
                    $key = end($keys);
                    if(!empty($data['image'][$key]))
                    $update_data['image_url'] = $data['image'][$key];
                }
                if (!empty($data['asset_platform_id'])) {
                    $update_data['asset_platform_id'] = $data['asset_platform_id'];
                }
                if (!empty($data['platforms'])) {
                    $update_data['platforms'] = json_encode($data['platforms']);
                }
                if (!empty($data['categories'])) {
                    $update_data['categories'] = join(',', $data['categories']);
                }
                if (!empty($data['tickers'])) {
                    $update_data['tickers'] = json_encode($data['tickers']);
                }
                if (!empty($data['links'])) {
                    $update_data['links'] = json_encode($data['links']);
                }
                DB::connection($connection)->table('coins')
                    ->where('coin_id', '=', strtolower($coin['coin_id']))
                    ->update($update_data);
            }
            usleep(900000);
        }

        Log::info("End handleCoinGeckoPlatform");
    }


    private function handleCoinMarketCap($coin)
    {
        $connection = config('database.connections.warehouse.database');
        Log::info(json_encode($coin));
        $update_data = [
            'coin_market_cap_id' => $coin->id,
            'holder_count' => 0,
        ];
        //get holders count
        $httpClient = new \GuzzleHttp\Client();
        $url = "https://api.coinmarketcap.com/data-api/v3/cryptocurrency/detail/holders/count?id=$coin->id&range=1d";
        $response = $httpClient->get($url);
        $res = json_decode($response->getBody()->getContents());
        $data = array_values(get_object_vars($res->data->points));
        if (count($data) > 0) {
            $update_data['holder_count'] = $data[0];
        }

        //update data
        DB::connection($connection)->table('coins')
            ->where('symbol', '=', strtolower($coin->symbol))
            ->update($update_data);

    }

    private function handleCoinMarketCaps()
    {
        Log::info("Begin handleCoinMarketCaps");
        $httpClient = new \GuzzleHttp\Client();

        $url = "https://api.coinmarketcap.com/data-api/v3/map/all?cryptoAux=is_active,status&exchangeAux=is_active,status&listing_status=active,untracked";

        $response = $httpClient->get($url);
        $data = json_decode($response->getBody()->getContents());
        collect($data->data->cryptoCurrencyMap)->each(function ($coin) {

            $this->handleCoinMarketCap($coin);

        });

        Log::info("End handleCoinMarketCaps");

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->handleCoinGecko();
//        $this->handleCoinMarketCaps();
        $this->handleCoinGeckoPlatform();

        return 0;
    }
}
