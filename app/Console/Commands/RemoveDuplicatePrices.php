<?php

namespace App\Console\Commands;

use App\Models\CryptocurrencyMapping;
use App\Models\HistoricalPrice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RemoveDuplicatePrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:duplicate_prices';

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
        $pairs = DB::select("select cmc_id, min(cryptocurrency_id)
from cryptocurrencies_mapping where cmc_id in (
    select cmc_id
from (select cmc_id, count(*)
from cryptocurrencies  c join cryptocurrencies_mapping cm on c.id = cm.cryptocurrency_id group by cmc_id having count(*) > 1)as tmp
    ) group by cmc_id");
        foreach ($pairs as $key=>$pair){
            $duplicate_maps = CryptocurrencyMapping::where('cmc_id','=',$pair->cmc_id)
            ->where('cryptocurrency_id','<>',$pair->min)->get();
            foreach ($duplicate_maps as $key2=>$duplicate_map){
                $prices = HistoricalPrice::where('cryptocurrency_id','=',$duplicate_map->cryptocurrency_id)
                    ->where('time','>','2021-09-29 00:00:00')
                    ->get();
                foreach ($prices as $key3=>$price){
                    echo $key."/".count($pairs)." - ".
                        $key2."/".count($duplicate_maps)." - ".
                        $key3."/".count($prices)." ", PHP_EOL;
                    $price->cryptocurrency_id = $pair->min;
                    $price->save();
                }

                DB::connection('timescale_price')->table('historical_prices_date')
                    ->where('time','>','2021-09-29 00:00:00')
                    ->where('cryptocurrency_id','=',$duplicate_map->cryptocurrency_id)
                    ->update(['cryptocurrency_id'=>$pair->min]);
            }

        }


        return 0;
    }
}
