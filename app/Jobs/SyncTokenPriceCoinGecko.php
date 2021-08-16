<?php

namespace App\Jobs;

use App\Services\CoinGeckoService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyncTokenPriceCoinGecko implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $this->syncPriceCoinGecko();
    }

    private function loadPage($page){
        $res = CoinGeckoService::getMarkets('usd', [
            'order'=>'market_cap_desc',
            'page' =>$page
        ]);
//        $tokens = array_map(function ($item) {
//            return  strtoupper($item['symbol'])."USDT";
//        }, $res);
//        foreach ($tokens as $k1 => $t1){
//            foreach ($tokens as $k2=>$t2){
//                if($t1 == $t2 && $k1 !== $k2){
//                    dd($t1);
//                }
//            }
//        }
////        dd($tokens);
        $tokens = array_filter($res, function ($item) {
            return $item['current_price'] && $item['price_change_percentage_24h'];
        });
        $tokens = array_map(function ($item) {
            return [
                'symbol' => strtoupper($item['symbol'])."USDT",
                'last_price' => $item['current_price'],
                'price_change_percent' => $item['price_change_percentage_24h'],
            ];
        }, $tokens);
        $tokens = collect($tokens)->unique('symbol')->toArray();
//        $tokens = array_values($tokens);
        DB::table('token_prices')->upsert($tokens,
            ['symbol'],
            ['last_price', 'price_change_percent']
        );
        $count =  count($tokens);
        unset($tokens);
        return $count;

    }

    private function syncPriceCoinGecko()
    {
        Log::info('start SyncTokenPriceCoinGecko');

        $length = 0;
        $page = 0;
        while (true){
            $length += $this->loadPage(++$page);
            Log::info("Page $page ($length)");

            if($length >= 3000) break;
        }
        Log::info('end SyncTokenPriceCoinGecko');

    }
}
