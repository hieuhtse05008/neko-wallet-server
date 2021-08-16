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

    private function handleCoinGecko(){
        Log::info("Begin handleCoinGecko");
        $connection = config('database.connections.warehouse.database');
        $data = CoinGeckoService::getListCoins();
        $coins = [];
        foreach($data as $item){
            $coins[] = [
              'coin_id'=>$item['id'],
              'symbol'=>$item['symbol'],
              'name'=>$item['name'],
            ];
        };
        DB::connection($connection)->table('coins')->upsert($coins,'coin_id');
        Log::info("End handleCoinGecko");
    }


    private function handleCoinMarketCap($coin){
        $connection = config('database.connections.warehouse.database');

        $httpClient = new \GuzzleHttp\Client();

        $url ="https://api.coinmarketcap.com/data-api/v3/cryptocurrency/detail/holders/count?id=$coin->id&range=1d";

        $response = $httpClient->get($url);
        $res = json_decode($response->getBody()->getContents());
        $data = array_values(get_object_vars($res->data->points));
        $holder_count = 0;
        if(count($data) > 0){
            $holder_count = $data[0];
        }
        DB::connection($connection)->table('coins')
            ->where('symbol','=', strtolower($coin->symbol))
            ->update( [
                'symbol'=>strtolower($coin->symbol),
                'coin_market_cap_id'=>$coin->id,
                'holder_count'=>$holder_count,
            ]);
        Log::info("".strtolower($coin->symbol).$holder_count);

    }

    private function handleCoinMarketCaps(){
        Log::info("Begin handleCoinMarketCaps");
        $httpClient = new \GuzzleHttp\Client();

        $url ="https://api.coinmarketcap.com/data-api/v3/map/all?cryptoAux=is_active,status&exchangeAux=is_active,status&listing_status=active,untracked";

        $response = $httpClient->get($url);
        $data = json_decode($response->getBody()->getContents());
        collect($data->data->cryptoCurrencyMap)->each(function ($coin){

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
        $this->handleCoinMarketCaps();

        return 0;
    }
}
