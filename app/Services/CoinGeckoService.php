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

    public static function getMarkets($vs_currency='usd',$filter=[]){

        $filter = array_replace([
            'per_page'=>250,
            'page'=>1,
            'price_change_percentage'=>'',
        ],$filter);

        $client = self::getClient();
        $response = $client->coins()->getMarkets($vs_currency,$filter);
        return ($response);
    }
}
