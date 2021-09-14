<?php

namespace App\Console\Commands;

use App\Models\CryptocurrencyMapping;
use App\Services\CoinGeckoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyncCryptocurrenciesInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:cryptocurrencies_info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync info of crypto';

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
        Log::info('start SyncCryptocurrenciesInfo');

        $this->handleCoins();

        Log::info('end SyncCryptocurrenciesInfo');
        return 0;
    }
    private function addExchangeToCoins($coins){
        $all_exchange = [];
        $new_coins = array_map(function ($coin) use (&$all_exchange){
            echo $coin['id'], PHP_EOL;
            $tickers = ($coin['tickers']);
            $exchanges = [];
            foreach ($tickers as $ticker) {
                $exchange_id = $ticker['market']['identifier'];
                echo "Ticker: ",$exchange_id, PHP_EOL;
//                    if(!empty($all_exchange[$ticker['market']['identifier']])) continue;
                if(empty($all_exchange[$exchange_id])){
                    $all_exchange[$exchange_id] = CoinGeckoService::getExchange(
                        $exchange_id
                    );
                    sleep(1);

                }
                $coingecko_exchange = $all_exchange[$exchange_id];
//                    usleep(1900000);
                $exchanges[$exchange_id] = [
                    'coingecko_id' => $exchange_id,
                    'name' => $coingecko_exchange['name'],
                    'image_url' => $coingecko_exchange['image'],
                    'url' => $coingecko_exchange['url'],
                    'description' => $coingecko_exchange['description'],
                ];
            };
            $coin['exchanges'] = $exchanges;
            return $coin;
        }, $coins);


        $f = fopen("list_coins_2.json", "w") or die("Unable to open file!");
        $txt = json_encode($new_coins);
        fwrite($f, $txt);
        fclose($f);
        return 0;
    }

    private function handleCoins()
    {
        try {
            Log::info('start handleCoins');

//        $this->handleCoin('ethereum');
            $json_string = file_get_contents("list_coins_2.json");
            $coins = json_decode($json_string, true);


//        $coins = CoinGeckoService::getListCoins();

            foreach ($coins as $coin) {


                $this->handleCoin($coin);
//            usleep(900000);
            }

            Log::info('end handleCoins');
        }catch (\Exception $e){
            echo $e;
        }
        return 0;
    }

    private function handleCoin($coin)
    {

        Log::info("handleCoin {$coin['id']}");
        echo "=============================================", PHP_EOL;
        echo $coin['id'], PHP_EOL;
        try {
//            $data = CoinGeckoService::getCoinById($id, ['tickers' => 'true',]);
            $data = $coin;
            $cryptocurrency_id = null;
            //find token
            if (!empty($data['platforms']) && is_array($data['platforms'])) {
                $platforms = array_keys($data['platforms']);

                foreach ($platforms as $platform) {
                    echo "-----------------------------------------------", PHP_EOL;
                    $address = strtolower($data['platforms'][$platform]);
                    if (empty($address)) {
                        continue;
                    }

                    $network_id = DB::table('networks_mapping')
                        ->where('coingecko_id', '=', $platform)
                        ->pluck('network_id')->first();
                    if (empty($network_id)) {
                        echo "Network $network_id not found", PHP_EOL;
                        continue;
                    } else {
                        echo "Found Network $network_id $address", PHP_EOL;
                    }

                    $token = DB::table('tokens')->where('address', '=', $address)
                        ->where('network_id', '=', $network_id)->first();
                    if (empty($token)) {
                        echo "Token with network_id $network_id and address $address not found", PHP_EOL;
                        continue;
                    } else {
                        echo "Found token {$token->symbol}", PHP_EOL;
                    }
                    $cryptocurrency_id = $token->cryptocurrency_id;

                    //update mapping
                    $cryptocurrency_mapping = CryptocurrencyMapping::
                    where('cryptocurrency_id', '=', $cryptocurrency_id)->first();
                    if (!empty($cryptocurrency_mapping)) {
                        $cryptocurrency_mapping->coingecko_id = $coin['id'];
                        $cryptocurrency_mapping->save();
                        echo "Found cryptocurrency_mapping $cryptocurrency_id", PHP_EOL;
                    } else {
                        echo "Not found cryptocurrency_mapping $cryptocurrency_id", PHP_EOL;

                    }


                    //insert tickers
                    if (!empty($data['tickers'])) {
                        $tickers = ($data['tickers']);
                        foreach ($tickers as $ticker) {
                            //insert exchange guide
                            $exchange = DB::table('exchange_guides')
                                ->where('coingecko_id', '=', $ticker['market']['identifier'])
                                ->first();
                            if (empty($exchange)) {

                                $coingecko_exchange = $data['exchanges'][$ticker['market']['identifier']];

                                echo "INSERT exchange_guide ", PHP_EOL;
                                DB::table('exchange_guides')->insert($coingecko_exchange);
                                $exchange = DB::table('exchange_guides')
                                    ->where('coingecko_id', '=',$ticker['market']['identifier'])
                                    ->first();
                            }
                            //====================================

                            $exchange_pair = [
                                'base_token_id' => $token->id,
                                'trade_url' => $ticker['trade_url'],
                            ];
                            //find target token
                            if (isset($ticker['target_coin_id'])) {
                                $target_mapping = DB::table('cryptocurrencies_mapping')
                                    ->whereNotNull('coingecko_id')
                                    ->where('coingecko_id', '=', $ticker['target_coin_id'])
                                    ->first();
                            }
                            if (empty($target_mapping)) {
//                                echo "target_mapping not found", PHP_EOL;
                                continue;
                            } else {
                                echo "FOUND target_mapping", PHP_EOL;
                            }

                            $target_token = DB::table('tokens')
                                ->where('cryptocurrency_id', '=', $target_mapping->cryptocurrency_id)
                                ->where('network_id', '=', $network_id)->first();
                            if (empty($target_token)) {
//                                echo "target_token not found", PHP_EOL;
                                continue;
                            }
                            $old_exchange_pair = DB::table('exchange_pairs')
                                ->where('base_token_id', '=', $token->id)
                                ->where('target_token_id', '=', $target_token->id)
                                ->where('exchange_guide_id', '=', $exchange->id)
                                ->first();
                            if (!empty($old_exchange_pair)) continue;
                            echo "BEGIN INSERT exchange", PHP_EOL;

                            $exchange_pair['target_token_id'] = $target_token->id;


                            $exchange_pair['exchange_guide_id'] = $exchange->id;

                            echo "SUCCESS exchange_pairs ", PHP_EOL;
                            DB::table('exchange_pairs')->insert($exchange_pair);
//                            dd($exchange_pair);
                        }
                    }


                }
            }
            if (empty($cryptocurrency_id)) return;
            //cryptocurrency basic data
            $info = DB::table('cryptocurrency_info')
                ->where('cryptocurrency_id', '=', $cryptocurrency_id)
                ->first();
            if (empty($info)) {
                $update_data = [
                    'cryptocurrency_id' => $cryptocurrency_id,
                    'description' => '',
                    'links' => '',
                ];
                if (!empty($data['description'])) {
                    $key = array_key_first($data['description']);
                    if (!empty($data['description'][$key]))
                        $update_data['description'] = $data['description'][$key];
                }

                if (!empty($data['links'])) {
                    $update_data['links'] = json_encode($data['links']);
                }

                echo "insert cryptocurrency_info", PHP_EOL;
                DB::table('cryptocurrency_info')
                    ->insert($update_data);
            }

            //get categories
            if (!empty($data['categories'])) {
                //insert new categories
                $old_categories = DB::table('categories')
                    ->whereIn('name', $data['categories'])
                    ->pluck('name')->toArray();
                $new_categories = array_diff($data['categories'], $old_categories);

                $categories = array_map(function ($c) {
                    return [
                        'name' => $c,
                    ];
                }, $new_categories);

                DB::table('categories')->insertOrIgnore($categories);
                //insert new cryptocurrency_category
                $old_category_ids = DB::table('cryptocurrency_category')
                    ->where('cryptocurrency_id', '=', $cryptocurrency_id)
                    ->pluck('category_id')->toArray();
                $categories = DB::table('categories')->whereIn('name', $data['categories'])
                    ->whereNotIn('id', $old_category_ids)
                    ->pluck('id')->toArray();
                $cryptocurrency_categories = array_map(function ($c) use ($cryptocurrency_id) {
                    return [
                        'cryptocurrency_id' => $cryptocurrency_id,
                        'category_id' => $c,
                    ];
                }, $categories);
                DB::table('cryptocurrency_category')->insertOrIgnore($cryptocurrency_categories);
            }


            echo "FINISHED ", $coin['id'], PHP_EOL;

        } catch (\Exception $e) {
            echo $e;
            Log::error($e);
            return null;
        }
    }

}
