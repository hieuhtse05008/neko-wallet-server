<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coins = json_decode(file_get_contents('coins.json'));
        $cryptocurrencies = json_decode(file_get_contents('crytocurrencies.json'));
        $networks = json_decode(file_get_contents('networks.json'));
        $tokens = json_decode(file_get_contents('tokens.json'));
        echo count($coins);
        echo PHP_EOL;
        echo count($cryptocurrencies);
        echo PHP_EOL;
        echo count($networks);
        echo PHP_EOL;
        echo count($tokens);
        echo PHP_EOL;

//        dd($networks[1]->symbol);
//        dd(object_get($networks[1],'symbol'));

        foreach ($networks as $i) {
//            DB::table('networks')->updateOrInsert([
//                'id' => object_get($i, 'id'),],[
//                'name' => object_get($i, 'name'),
//                'chain_id' => object_get($i, 'chain_id'),
//                'icon_url' => object_get($i, 'icon_url'),
//                'short_name' => object_get($i, 'short_name'),
//                'symbol' => object_get($i, 'symbol'),
//                'wallet_derive_path' => object_get($i, 'wallet_derive_path'),
//                'is_active' => object_get($i, 'is_active', false),
//            ]);
            DB::table('networks_mapping')->updateOrInsert([
                'network_id' => object_get($i, 'id'),],[
                'cmc_id' => object_get($i, 'cmc_id'),
                'coingecko_id' => object_get($i, 'coingecko_id'),
            ]);
        }

        foreach ($cryptocurrencies as $i) {
//            DB::table('cryptocurrencies')->updateOrInsert([
//                'id' => object_get($i, 'id'),],[
//                'name' => object_get($i, 'name'),
//                'symbol' => object_get($i, 'symbol'),
//                'slug' => object_get($i, 'slug'),
//                'icon_url' => object_get($i, 'icon_url'),
//                'rank' => object_get($i, 'rank'),
//                'verified' => object_get($i, 'verified', false),
//            ]);


            DB::table('cryptocurrencies_mapping')->updateOrInsert([
                "cryptocurrency_id" => object_get($i, 'id'),],[
                'cmc_id' => object_get($i, 'cmc_id'),
            ]);

        }
//        dd(DB::getDefaultConnection());
//        foreach ($tokens as $i) {
//            DB::table('tokens')->insert([
//                'name' => object_get($i, 'name'),
//                'symbol' => object_get($i, 'symbol'),
//                'decimals' => object_get($i, 'decimals'),
//                'address' => object_get($i, 'address'),
//                'icon_url' => object_get($i, 'icon_url'),
//                'cryptocurrency_id' => object_get($i, 'cryptocurrency_id'),
//                'network_id' => object_get($i, 'network_id'),
//                'verified' => object_get($i, 'verified', false),
//                'active_wallet' => object_get($i, 'active_wallet', false),
//            ]);
//
//        }


    }
}
