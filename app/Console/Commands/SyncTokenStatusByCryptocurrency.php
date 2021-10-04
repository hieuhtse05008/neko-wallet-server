<?php

namespace App\Console\Commands;

use App\Models\CryptocurrencyInfo;
use Illuminate\Console\Command;

class SyncTokenStatusByCryptocurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:token_status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $infos = CryptocurrencyInfo::where('status','=','active')->get();

        return 0;
    }
}
