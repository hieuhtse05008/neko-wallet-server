<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class SyncTokenPriceNami implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private const TOKEN_LIST = [
        'ATS',
        'BAMI',
        'BDS',
        'DPET',
        'KAI',
        'MAN',
        'NAMI',
        'SFO',
        'TPH',
        'VIDB',
        'VNCT',
        'WHC',
    ];

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
        $this->syncTokenPriceNami();
    }
//121 => {#2776
//+"symbol": "MANVNDC"
//+"last_price": 470.1
//+"change_24h": 27.9
//+"last_price_24h": 442.2
//+"high_24h": 628
//+"low_24h": 400
//+"high_1h": 442.2
//+"low_1h": 442.2
//+"total_exchange_volume": 3928.8
//+"total_base_volume": 2075597.83
//+"base_currency": "VNDC"
//+"exchange_currency": "MAN"
//}

    private function syncTokenPriceNami()
    {
        $httpClient = new \GuzzleHttp\Client();
        $url = 'https://nami.exchange/api/v1.0/market/summaries';
        $response = $httpClient->get($url);
        $res = json_decode($response->getBody()->getContents())->data;

        $USDT_VNDC = array_values(array_filter($res, function ($item) {
            return $item->symbol == "USDTVNDC";
        }))[0];


        $tokens = array_filter($res, function ($item) {
            return ($item->symbol == 'USDTVNDC')
                ||
                (in_array($item->exchange_currency, self::TOKEN_LIST) && $item->base_currency == "VNDC");
        });

        $TO_VNDC_tokens = array_map(function ($item) {
            return [
                'symbol' => $item->symbol,
                'last_price' => $item->last_price,
                'price_change_percent' => $item->change_24h,
            ];
        }, $tokens);

        $TO_USDT_tokens = array_map(function ($item) use ($USDT_VNDC) {
            $last_price = $item->last_price / $USDT_VNDC->last_price;

            $old_token_price = ($item->last_price * 100 / ($item->change_24h + 100));

            $old_USDT_price = ($USDT_VNDC->last_price * 100 / ($USDT_VNDC->change_24h + 100));

            $old_price = $old_token_price/$old_USDT_price;

            $price_change_percent = ($last_price/$old_price-1)*100;

            return [
                'symbol' => $item->exchange_currency . "USDT",
                'last_price' => $last_price,
                'price_change_percent' => $price_change_percent,
            ];
        }, $tokens);
        $TO_VNDC_tokens = array_values($TO_VNDC_tokens);
        $TO_USDT_tokens = array_values($TO_USDT_tokens);

        $upsert_data = array_merge($TO_VNDC_tokens,$TO_USDT_tokens);

        DB::table('token_prices')->upsert($upsert_data,
            ['symbol'],
            ['last_price', 'price_change_percent']
        );
    }

}
