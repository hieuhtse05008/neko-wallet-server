<?php


namespace App\Services;


use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Illuminate\Support\Facades\Log;

class CoinGeckoService
{


    private static function getClient(){
        $client = new CoinGeckoClient();
        return $client;
    }

    public static function getCoinById($coin_id, $filter=[
        'localization'=>'false',
        'tickers'=>'false',
        'market_data'=>'false',
        'community_data'=>'false',
        'developer_data'=>'false',
        'sparkline'=>'false'
    ]): ?array
    {
        try {
            $client = self::getClient();
            $response = $client->coins()->getCoin($coin_id, $filter);
            return ($response);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
        return null;
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
