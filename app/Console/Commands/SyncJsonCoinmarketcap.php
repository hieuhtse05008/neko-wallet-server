<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\CryptocurrencyCategory;
use App\Models\CryptocurrencyInfo;
use App\Models\CryptocurrencyMapping;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SyncJsonCoinmarketcap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync_json:cmc';

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

    private $path = 'resources/json/cmc';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $parse_down = new \Parsedown();
        $parse_down->setSafeMode(true);

        for ($i = 1; $i < 14000; $i++) {
            $file_name = "{$this->path}/$i.json";
            if(!file_exists($file_name)) {
                echo "Skipping $i", PHP_EOL;

                continue;
            }
            $json_str = file_get_contents($file_name);
            $data = json_decode($json_str);

            if (!empty($data)) {
                $this->handleItem($i, $data,$parse_down);
            }else{
                echo "Empty data", PHP_EOL;
            }
        }
        return 0;
    }

    public function handleItem($cmc_id, $data,$parse_down)
    {
        try {
            echo $cmc_id, PHP_EOL;

            //find mapping
            $mapping = CryptocurrencyMapping::where('cmc_id','=',$cmc_id)->first();
            if(empty($mapping)){
                echo "No mapping $cmc_id", PHP_EOL;
                return;
            }
            $cryptocurrency = $mapping->cryptocurrency;
            //find info
            $cryptocurrency_info = $cryptocurrency->cryptocurrency_info;
            if(empty($cryptocurrency_info)){
                $cryptocurrency_info = new CryptocurrencyInfo([
                    'cryptocurrency_id'=>$cryptocurrency->id,
                ]);
                $cryptocurrency_info->save();
            }
            //update from json
            $cryptocurrency_info->market_cap_dominance=object_get($data,'statistics.marketCapDominance');
            $cryptocurrency_info->current_supply=object_get($data,'statistics.circulatingSupply');
            $cryptocurrency_info->max_supply=object_get($data,'statistics.maxSupply');
            $cryptocurrency_info->holder_count=object_get($data,'holders.holderCount');
            $cryptocurrency_info->fully_diluted_market_cap=object_get($data,'statistics.fullyDilutedMarketCap');


            $cryptocurrency_info->save();

//            if(empty($cryptocurrency_info->description)){//update except coingecko
                $description = $parse_down->text(object_get($data,'description'));

                $description = strip_tags($description);
//                if(!empty($description)) dd($description);
//                $description = str_replace(['h1>','h2>','h3>','h4>','h5>'],'div>', $description);
                $cryptocurrency_info->description =$description;
                $cryptocurrency_info->save();
//            }
            if(empty($cryptocurrency_info->links)){
                $cryptocurrency_info->links= object_get($data,'urls');
                $cryptocurrency_info->save();
            }
            //update category
            $tags = object_get($data,'tags');
            if(!empty($tags)){
                foreach ($tags as $tag){
                    $category = Category::firstOrCreate(['name'=>$tag->name]);
                    CryptocurrencyCategory::firstOrCreate([
                        'cryptocurrency_id'=>$cryptocurrency->id,
                        'category_id'=>$category->id,
                    ]);
                }
            }
        } catch (\Exception $e) {
            echo "ERROR catch $cmc_id", PHP_EOL;
            Log::error($e);
        }
    }
}
