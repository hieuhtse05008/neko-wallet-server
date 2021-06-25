<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class SyncTokenPriceBinance implements ShouldQueue
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

        $this->syncPriceBinance();
    }

    private function syncPriceBinance()
    {
        $httpClient = new \GuzzleHttp\Client();
        $url = 'https://api.binance.com/api/v3/ticker/24hr';
        $response = $httpClient->get($url);
        $res = json_decode($response->getBody()->getContents());
        $tokens = array_filter($res, function ($item) {
//          preg_match("/^.+USDT$/m", $item->symbol);
            return preg_match("/^.+USDT$/m", $item->symbol) || preg_match("/^.+BVND$/m", $item->symbol);
//          return str_contains($item->symbol, 'USDT') || str_contains($item->symbol, 'BVND');
        });
        $tokens = array_map(function ($item) {
            return [
                'symbol' => $item->symbol,
                'last_price' => $item->lastPrice,
                'price_change_percent' => $item->priceChangePercent,
            ];
        }, $tokens);
        $tokens = array_values($tokens);
        DB::table('token_prices')->upsert($tokens,
            ['symbol'],
            ['last_price', 'price_change_percent']
        );

    }
}
