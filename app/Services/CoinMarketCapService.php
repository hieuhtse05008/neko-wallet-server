<?php


namespace App\Services;


class CoinMarketCapService
{
    private $client;
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    private  const api_key = 'e2b7a073-55a3-4e18-8a2a-61d77d029b75';


    public static function getCategories(){
        $url ="https://pro-api.coinmarketcap.com/v1/cryptocurrency/categories?CMC_PRO_API_KEY=".self::api_key."";
        $httpClient = new \GuzzleHttp\Client();
        $response = $httpClient->get($url);
        dd($response->getBody()->getContents());
        $res = json_decode($response->getBody()->getContents());
        return $res;
    }

    public static function getCryptocurrencies($filter=[
        'listing_status'=> 'active',
    ]){

        $url ="https://pro-api.coinmarketcap.com/v1/cryptocurrency/map?CMC_PRO_API_KEY=".self::api_key."";
        foreach ($filter as $key=>$val){
            $url .= "&$key=$val";
        }
        $httpClient = new \GuzzleHttp\Client();
        $response = $httpClient->get($url);
        $res = json_decode($response->getBody()->getContents())->data;
        return $res;
    }
}
