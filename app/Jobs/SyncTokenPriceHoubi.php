<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class SyncTokenPriceHoubi implements ShouldQueue
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
        $this->syncPriceHoubi();
    }

    private function syncPriceHoubi()
    {
        $httpClient = new \GuzzleHttp\Client();
        $url = 'https://api.huobi.pro/market/tickers';
        $response = $httpClient->get($url);
        $res = json_decode($response->getBody()->getContents())->data;

        $tokens = array_filter($res, function ($item) {

            return $item->symbol == 'woousdt';

        });

        $tokens = array_map(function ($item) {
            return [
                'symbol' => strtoupper($item->symbol),
                'last_price' => $item->close,
                'price_change_percent' => ($item->close/$item->open - 1) * 100,
            ];
        }, $tokens);

        $tokens = array_values($tokens);

        DB::table('token_prices')->upsert($tokens,
            ['symbol'],
            ['last_price', 'price_change_percent']
        );
    }
}
