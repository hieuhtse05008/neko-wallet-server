<?php


namespace App\Services;


class CoinMarketCapService
{
    private $api_key = 'e2b7a073-55a3-4e18-8a2a-61d77d029b75';


    public function getCategories(){
        $url ="https://pro-api.coinmarketcap.com/v1/cryptocurrency/categories?CMC_PRO_API_KEY={$this->api_key}";
        $httpClient = new \GuzzleHttp\Client();
        $response = $httpClient->get($url);
        dd($response->getBody()->getContents());
        $res = json_decode($response->getBody()->getContents());
        return $res;
    }
}
