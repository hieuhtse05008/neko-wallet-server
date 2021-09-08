<?php


namespace App\Console\Commands;


use App\Models\Cryptocurrency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyncCoinsInfo extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:coins_info';

    public function handle(){
        Log::info("begin SyncCoinsInfo");
        $this->handleCoins();
        Log::info("end SyncCoinsInfo");
    }

    private function handleCoins(){
        $httpClient = new \GuzzleHttp\Client();
        $url = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/map?CMC_PRO_API_KEY=e2b7a073-55a3-4e18-8a2a-61d77d029b75";
        $response = $httpClient->get($url);
        $res = json_decode($response->getBody()->getContents())->data;
//        dd($res[0]);
//        $this->handleCoin($res[0]);
        foreach($res as $coin){
            $is_success = $this->handleCoin($coin);
            if($is_success){
                Log::info("{$coin->id} {$coin->name}");
            }else{
                Log::info("Failed {$coin->id} {$coin->name}");

            }
        }
    }

    private function handleCoin($coin){
        $map = DB::table('cryptocurrencies_mapping')
            ->where('cmc_id', '=', $coin->id)->first();
        if (empty($map)) return false;
        $cryptocurrency_id = $map->cryptocurrency_id;
        $cryptocurrency = Cryptocurrency::find($cryptocurrency_id);
        if (empty($cryptocurrency)) return false;
        $cryptocurrency->first_historical_data = $coin->first_historical_data;
        $cryptocurrency->save();

        return  true;
    }
}
