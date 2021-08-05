<?php

namespace App\Console\Commands;

use App\Services\CoinGeckoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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

        return 0;
    }
}
