<?php

namespace App\Console\Commands;

use App\Jobs\SyncCoinHistoryBinance;
use App\Jobs\SyncCoinHistoryCoinGecko;
use App\Jobs\SyncCoinHistoryHuobi;
use App\Jobs\SyncCoinHistoryNami;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
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
        Log::info('start SyncCoinHistory');
        $connection = config('database.connections.warehouse.database');
        for($i = 10000;$i<=11549; $i++){
            $this->handleCoin($i,$connection);
        }
        Log::info('end SyncCoinHistory');
        return 0;
    }

    private function handleCoin($id,$connection){
        try {
            $httpClient = new \GuzzleHttp\Client();
            $url = "https://api.coinmarketcap.com/data-api/v3/cryptocurrency/detail/chart?id=$id&range=ALL";
            $response = $httpClient->get($url);
            $res = json_decode($response->getBody()->getContents())->data;
        }catch (\Exception $e){
            Log::error($e);
            return;
        }
        if(!property_exists($res,'points')) {
            Log::info("FAIL $id SyncCoinHistory");
            return;
        }
        Log::info("$id SyncCoinHistory");

         $res =   $res->points;
        $timestamps=array_keys(get_object_vars($res));
        sort($timestamps);
        $data = [];
        foreach ($timestamps as $timestamp){
            $v = $res->{$timestamp}->v;
 $data[] = [
                'coin_market_cap_id'=>$id,
                'price'=>$v[0],
                'volume_24h'=>$v[1],
                'market_cap'=>$v[2],
                'coin_count'=>$v[4],
                'created_at'=>Carbon::createFromTimestamp($timestamp)->toDateTimeString(),
                'updated_at'=>Carbon::createFromTimestamp($timestamp)->toDateTimeString(),
            ];
        }
        DB::connection($connection)->table('temp_prices')->insert($data);

    }


}
