<?php

namespace App\Console\Commands;

use App\Models\Cryptocurrency;
use App\Models\CryptocurrencyCategory;
use App\Models\CryptocurrencyMapping;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertCryptocurrencyFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'json:insert_cryptocurrencies';

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

    private $path = 'resources/json';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $crypto_ids = CryptocurrencyMapping::where('cmc_id','>=','11301')->pluck('cryptocurrency_id');
//
//        DB::table('cryptocurrency_category')->whereIn('cryptocurrency_id',$crypto_ids)->delete();
//        DB::table('cryptocurrencies_mapping')->whereIn('cryptocurrency_id',$crypto_ids)->delete();
//        DB::table('cryptocurrency_info')->whereIn('cryptocurrency_id',$crypto_ids)->delete();
//
//        $token_ids = DB::table('tokens')->whereIn('cryptocurrency_id',$crypto_ids)
//            ->pluck('id');
//        DB::table('exchange_pairs')
//            ->whereIn('base_token_id',$token_ids)
//            ->orWhereIn('target_token_id',$token_ids)
//            ->delete();
//        DB::table('tokens')->whereIn('cryptocurrency_id',$crypto_ids)->delete();



        $json_str = file_get_contents("cryptocurrencies3-final.json");
//        $json_str = file_get_contents("cryptocurrencies4.json");
//        $json_str = file_get_contents("crytocurrencies.json");
        $cryptocurrencies = json_decode($json_str);
        foreach ($cryptocurrencies as $cryptocurrency) {
            $data = get_object_vars($cryptocurrency);

            $mapping = CryptocurrencyMapping::where('cmc_id','=',$data['cmc_id'])->first();
            if(!empty($mapping)){
                echo "Existed {$data['id']} {$data['cmc_id']}", PHP_EOL;
                continue;
            }

            $obj = Cryptocurrency::find($data['id']);
            if(empty($obj)) {
                Cryptocurrency::insertOrIgnore([
                    "id" => $data['id'],
                    "name" => $data['name'],
                    "symbol" => $data['symbol'],
                    "slug" => $data['slug'],
                    "icon_url" => $data['icon_url'],
                    "rank" => $data['rank'],
                    "verified" => $data['verified'],
                ]);
            }


//            $obj = CryptocurrencyMapping::where('cmc_id','=',$data['cmc_id'])->first();
//            if(empty($obj)) {
            echo "Inserted {$data['id']} {$data['cmc_id']}", PHP_EOL;

                CryptocurrencyMapping::updateOrCreate([
                    'cryptocurrency_id'=>$data['id'],
                    'cmc_id'=>$data['cmc_id'],
                ]);

//            }
        }
        return 0;
    }
}
