<?php

namespace App\Console\Commands;

use App\Models\CoinMarketsData;
use App\Services\CoinGeckoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyncCoinPlatformCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:platform_category';

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

    private function handleAssetPlatforms()
    {
        $connection = config('database.connections.warehouse.database');
        $data = CoinGeckoService::getAssetPlatforms();
        $platforms = [];
        foreach ($data as $platform){
            $platforms[] = [
                'asset_platform_id'    =>$platform->id,
                'chain_identifier'    =>$platform->chain_identifier,
                'name'    =>$platform->name,
                'short_name'    =>$platform->shortname,
            ];
        }

        DB::connection($connection)->table('asset_platforms')->upsert($platforms,'asset_platform_id');
    }
    private function handleCategories()
    {
        $connection = config('database.connections.warehouse.database');
        $data = CoinGeckoService::getCategories();
        $categories = [];
        foreach ($data as $category){
            $categories[] = [
                'category_id'    =>$category->category_id,
                'name'    =>$category->name,
            ];
        }

        DB::connection($connection)->table('coin_categories')->upsert($categories,'category_id');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('start SyncCoinPlatformCategory');

        $this->handleCategories();
        $this->handleAssetPlatforms();

        Log::info('end SyncCoinPlatformCategory');
        return 0;
    }
}
