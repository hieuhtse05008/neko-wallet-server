<?php

namespace App\Console\Commands;

use App\Models\CryptocurrencyMapping;
use App\Services\CoinMarketCapService;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class SyncCoinmarketcapRankActive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:rank_active';

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

    private $no_mappings = [];

    private function update($filter)
    {

        $cryptocurrencies = CoinMarketCapService::getCryptocurrencies($filter);
        foreach ($cryptocurrencies as $key => $item) {
            $mapping = CryptocurrencyMapping::where('cmc_id', '=', $item->id)->first();
            if (empty($mapping)) {
                $this->no_mappings[] = $item->id;
                echo "No mapping ", $item->id, PHP_EOL;
                continue;
            }
            echo "Edit ", $item->id, ' ', $key, '/', count($cryptocurrencies), PHP_EOL;
            $cryptocurrency = $mapping->cryptocurrency;
            $cryptocurrency->rank = $item->rank;
            $cryptocurrency->save();

            $cryptocurrency_info = $cryptocurrency->cryptocurrency_info;

            if(empty($cryptocurrency_info)){
                $cryptocurrency_info = new CryptocurrencyInfo([
                    'cryptocurrency_id'=>$cryptocurrency->id,
                ]);
                $cryptocurrency_info->save();
            }

            $cryptocurrency_info->status = $filter['listing_status'];
            $cryptocurrency_info->save();
        }

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->update(['listing_status' => 'active']);
        $this->update(['listing_status' => 'inactive']);
        $this->update(['listing_status' => 'untracked']);
        dd($this->no_mappings);
        return 0;
    }
}
