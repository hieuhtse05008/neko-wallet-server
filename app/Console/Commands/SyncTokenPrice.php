<?php

namespace App\Console\Commands;

use App\Jobs\SyncTokenPriceBinance;
use App\Jobs\SyncTokenPriceHuobi;
use App\Jobs\SyncTokenPriceNami;
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
    protected $description = 'Sync TokenPrice Price';

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
        while ($seconds < 60) {

            $this->syncPriceBinance();
            $this->syncPriceNami();
            $this->syncPriceHuobi();
            $this->info("Syncing!");
            $seconds += 10;
            sleep(10);
        }
        return 0;
    }



    private function syncPriceHuobi()
    {
        SyncTokenPriceHuobi::dispatch();
    }

    private function syncPriceBinance()
    {
        SyncTokenPriceBinance::dispatch();
    }

    private function syncPriceNami(){

        SyncTokenPriceNami::dispatch();
    }

}
