<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FakerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        '[{"name":"1INCH","symbol":"1INCH","decimal":18,"icon_url":"https://d1j8r0kxyu9tj8.cloudfront.net/files/1622129149IZR7NaAU1G8UUfG.png","address":"0x111111111117dc0aa78b770fa6a738034120c302","network":"ERC20"},{"name":"Binance","symbol":"BNB","decimal":18,"icon_url":"https://d1j8r0kxyu9tj8.cloudfront.net/files/16221290772bs1foHrDTqNXei.png","address":"","network":"BEP20"},{"name":"Ethereum","symbol":"ETH","decimal":18,"icon_url":"https://d1j8r0kxyu9tj8.cloudfront.net/files/1622129114F0zZG66jYbSd3AT.png","address":"","network":"ERC20"},{"name":"Nami","symbol":"NAMI","decimal":18,"icon_url":"https://d1j8r0kxyu9tj8.cloudfront.net/files/1622124259bigVDhNIqQkwLOw.png","address":"0x2f7b618993cc3848d6c7ed9cdd5e835e4fe22b98","network":"ERC20"},{"name":"Attlas","symbol":"ATS","decimal":8,"icon_url":"https://d1j8r0kxyu9tj8.cloudfront.net/files/16221272798VlaMrrGypPIw45.png","address":"0xb9a6644bef37286fc08e703ecd15e9dedf78d3eb","network":"ERC20"},{"name":"Bami","symbol":"BAMI","decimal":18,"icon_url":"https://d1j8r0kxyu9tj8.cloudfront.net/files/1622129030nEQ30bKMIb0thmR.png","address":"0x8249bc1dea00660d2d38df126b53c6c9a733e942","network":"BEP20"},{"name":"Ola","symbol":"OLA","decimal":8,"icon_url":"https://d1j8r0kxyu9tj8.cloudfront.net/files/1622131725ELXs4viY5fRCM7f.jpeg","address":"0x47d0f6195911e93fe2b9b456289b6769aa47268f","network":"BEP20"},{"name":"KardiaChain","symbol":"KAI","decimal":18,"icon_url":"https://d1j8r0kxyu9tj8.cloudfront.net/files/1622212725ldYL7Vr38F2Gt0B.png","address":"0xD9Ec3ff1f8be459Bb9369b4E79e9Ebcf7141C093","network":"KRC20"},{"name":"My DeFi Pet","symbol":"DPET","decimal":18,"icon_url":"https://d1j8r0kxyu9tj8.cloudfront.net/files/1622285168YJTaqdbhtfi0bNo.png","address":"0xfb62AE373acA027177D1c18Ee0862817f9080d08","network":"KRC20"}]'
        $networks =  [
            "ERC20" => [
                 "id" => Str::uuid()->toString(),
                "name" => "Ethereum",
                "short_name" => "ERC20",
                "symbol" => "ETH",
                "chain_id" => 60,
                "rpc_url" => "https://api.etherscan.io",
                "explorer_url" => "https://etherscan.io/",
                "wallet_derive_path" => "m/44'/60'/0'/0/0"
            ],
            "BEP20" => [
                 "id" => Str::uuid()->toString(),
                "name" => "Binance Smart Chain",
                "short_name" => "BEP20 (BSC)",
                "symbol" => "BSC",
                "chain_id" => 56,
                "rpc_url" => "https://bsc-dataseed.binance.org/",
                "explorer_url" => "https://bscscan.com",
                "wallet_derive_path" => "m/44'/60'/0'/0/0"
            ],
            "KRC20" => [
                 "id" => Str::uuid()->toString(),
                "name" => "KardiaChain",
                "short_name" => "KRC20",
                "symbol" => "KAI",
                "chain_id" => 1,
                "rpc_url" => "https://rpc.kardiachain.io",
                "explorer_url" => "https://explorer.kardiachain.io/",
                "wallet_derive_path" => "m/44'/60'/0'/0/0"
            ],
            "BEP20test" => [
                 "id" => Str::uuid()->toString(),
                "name" => "Binance Smart Chain(Test)",
                "short_name" => "BEP20 (BSC)",
                "symbol" => "BSC",
                "chain_id" => 97,
                "rpc_url" => "https://data-seed-prebsc-1-s1.binance.org:8545/",
                "explorer_url" => "https://testnet.bscscan.com",
                "wallet_derive_path" => "m/44'/60'/0'/0/0"
            ]
        ];

        DB::table('networks')->upsert(array_values($networks),['id']);

        $contracts = [
            [
                'id' => Str::uuid(),
                'name' => '1INCH',
                'symbol' => '1INCH',
                'decimal' => 18,
                'icon_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1622129149IZR7NaAU1G8UUfG.png',
                'address' => '0x111111111117dc0aa78b770fa6a738034120c302',
                'network_id' => $networks['ERC20']['id'],
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Binance',
                'symbol' => 'BNB',
                'decimal' => 18,
                'icon_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/16221290772bs1foHrDTqNXei.png',
                'address' => '',
                'network_id' => $networks['BEP20']['id'],
            ],
           [
                'id' => Str::uuid(),
                'name' => 'Ethereum',
                'symbol' => 'ETH',
                'decimal' => 18,
                'icon_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1622129114F0zZG66jYbSd3AT.png',
                'address' => '',
                'network_id' => $networks['ERC20']['id'],
            ],
             [
                'id' => Str::uuid(),
                'name' => 'Nami',
                'symbol' => 'NAMI',
                'decimal' => 18,
                'icon_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1622124259bigVDhNIqQkwLOw.png',
                'address' => '0x2f7b618993cc3848d6c7ed9cdd5e835e4fe22b98',
                'network_id' => $networks['ERC20']['id'],
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Attlas',
                'symbol' => 'ATS',
                'decimal' => 8,
                'icon_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/16221272798VlaMrrGypPIw45.png',
                'address' => '0xb9a6644bef37286fc08e703ecd15e9dedf78d3eb',
                'network_id' => $networks['ERC20']['id'],
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Bami',
                'symbol' => 'BAMI',
                'decimal' => 18,
                'icon_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1622129030nEQ30bKMIb0thmR.png',
                'address' => '0x8249bc1dea00660d2d38df126b53c6c9a733e942',
                'network_id' => $networks['BEP20']['id'],
            ],
             [
                'id' => Str::uuid(),
                'name' => 'Ola',
                'symbol' => 'OLA',
                'decimal' => 8,
                'icon_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1622131725ELXs4viY5fRCM7f.jpeg',
                'address' => '0x47d0f6195911e93fe2b9b456289b6769aa47268f',
                'network_id' => $networks['BEP20']['id'],
            ],
            [
                'id' => Str::uuid(),
                'name' => 'KardiaChain',
                'symbol' => 'KAI',
                'decimal' => 18,
                'icon_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1622212725ldYL7Vr38F2Gt0B.png',
                'address' => '0xD9Ec3ff1f8be459Bb9369b4E79e9Ebcf7141C093',
                'network_id' => $networks['KRC20']['id'],
            ],
          [
                'id' => Str::uuid(),
                'name' => 'My DeFi Pet',
                'symbol' => 'DPET',
                'decimal' => 18,
                'icon_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1622285168YJTaqdbhtfi0bNo.png',
                'address' => '0xfb62AE373acA027177D1c18Ee0862817f9080d08',
                'network_id' => $networks['KRC20']['id'],
            ],
        ];

        DB::table('contracts')->insertOrIgnore($contracts);

        $swaps = [];
        for($i = 0; $i < 50; $i++){
            $ctrs = DB::table('contracts')->inRandomOrder()->limit(2)->get();
            $swaps[] = [
                'id' => Str::uuid(),
                'from_contract_id' => $ctrs[0]->id,
                'to_contract_id' => $ctrs[1]->id,
            ];
        }
        DB::table('swaps')->insertOrIgnore($swaps);

    }
}
