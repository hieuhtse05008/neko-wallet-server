<?php

namespace App\Console\Commands;

use App\Models\Token;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncTokenPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:syncTokenPrice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Token Price';

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
        $seconds = 0;
        while ($seconds < 60 ){
            $this->syncPrice();
            $this->info("Syncing!");
            $seconds += 10;
            sleep(10);
        }
        return 0;
    }

    private function syncPrice(){
        $httpClient = new \GuzzleHttp\Client();
        $url = 'https://api.binance.com/api/v3/ticker/24hr';
        $response = $httpClient->get($url);
        $res = json_decode($response->getBody()->getContents());
        $tokens = array_filter($res, function ($item) {
            preg_match("/^.+USDT$/m",$item->symbol);

            return preg_match("/^.+USDT$/m",$item->symbol) || preg_match("/^.+BVND$/m",$item->symbol);
//            return str_contains($item->symbol, 'USDT') || str_contains($item->symbol, 'BVND');
        });
        $tokens = array_map(function ($item){
            return [
                'symbol' => $item->symbol,
                'last_price' => $item->lastPrice,
                'price_change_percent' => $item->priceChangePercent,
            ];
        }, $tokens);
        $tokens = array_values($tokens);
        DB::table('tokens')->upsert($tokens,['symbol'],[
            'last_price',
            'price_change_percent'
        ]);

    }

}
