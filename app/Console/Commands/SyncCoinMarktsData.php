<?php

namespace App\Console\Commands;

use App\Services\CoinGeckoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyncCoinMarktsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:markets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync markets of coins';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function getPage($page = 1,$stamp){
        $connection = config('database.connections.warehouse.database');
        $data = CoinGeckoService::getMarkets($page);

        $markets = [];
        foreach($data as $item){
            $markets[] = [
                'coin_id'=>$item['id'],
                'current_price'=>(string)$item['current_price'],
                'market_cap'=>(string)$item['market_cap'],
                'total_volume'=>(string)$item['total_volume'],
                'price_change_24h'=>(string)$item['price_change_24h'],
                'price_change_percentage_24h'=>(string)$item['price_change_percentage_24h'],
                'last_updated'=>$item['last_updated'],
                'created_at'=>$stamp,
                'updated_at'=>$stamp,
            ];
        };
        DB::connection($connection)->table('coin_markets_data')->insert($markets,'coin_id');
        return count($data);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $stamp = now();
        Log::info('start SyncCoinMarktsData');

        $page = 0;
        while (($count = $this->getPage(++$page,$stamp)) > 0){
            Log::info("$page SyncCoinMarktsData $count");

        }
        Log::info('end SyncCoinMarktsData');
        return 0;
    }
}
