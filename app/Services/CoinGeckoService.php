<?php


namespace App\Services;


use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class CoinGeckoService
{


    private static function getClient(){
        $client = new CoinGeckoClient();
        return $client;
    }

    public static function getListCoins(){
        $client = self::getClient();
        $response = $client->coins()->getList();
        return ($response);
    }

    public static function getMarkets($page=1,$vs_currency = 'usd', $per_page = 250){


        $client = self::getClient();
        $response = $client->coins()->getMarkets($vs_currency,[
            'per_page'=>$per_page,
            'page'=>$page,
        ]);
        return ($response);
    }
}
