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

        for ($i = 1; $i < 12000; $i++) {
            $json_str = file_get_contents("{$this->path}/$i.json");
            $data = json_decode($json_str);
            if (!empty($data)) {
                $this->handleItem($i, $data,$parse_down);
            }
        }
        return 0;
    }

    public function handleItem($cmd_id, $data,$parse_down)
    {
        try {
            echo $cmd_id, PHP_EOL;

            //find mapping
            $mapping = CryptocurrencyMapping::where('cmc_id','=',$cmd_id)->first();
            if(empty($mapping)){
                echo "ERROR mapping $cmd_id", PHP_EOL;
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
            $cryptocurrency_info->update([
                'market_cap_dominance' => object_get($data,'statistics.marketCapDominance'),
                'current_supply'=>object_get($data,'statistics.circulatingSupply'),
                'max_supply'=>object_get($data,'statistics.maxSupply'),
                'holder_count'=>object_get($data,'holders.holderCount'),
                'fully_diluted_market_cap'=>object_get($data,'statistics.fullyDilutedMarketCap'),
            ]);
            //update except coingecko
            if(empty($mapping->coingecko_id)){
                $description = $parse_down->text(object_get($data,'description'));
                $description = str_replace(['h1>','h2>','h3>','h4>','h5>'],'div>', $description);

                $cryptocurrency_info->update([
                    'description'=>$description,
                    'links'=> object_get($data,'urls'),
                ]);
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
            echo "ERROR catch $cmd_id", PHP_EOL;
            Log::error($e);
        }
    }
}
