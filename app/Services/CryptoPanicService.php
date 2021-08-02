<?php


namespace App\Services;


class CryptoPanicService
{
    private const API_DOMAIN = 'https://cryptopanic.com/api/v1/';
    private const AUTH_TOKEN = '01bfba8038c9eab12a673ee05045072b3906a648';

    private static function getQueryUrl($suffix)
    {
//        $url = "https://cryptopanic.com/api/v1/posts/?auth_token=01bfba8038c9eab12a673ee05045072b3906a648";

        return self::API_DOMAIN.$suffix."&auth_token=".self::AUTH_TOKEN;
    }

    public static function loadNews($page = 1,$type='',$kind='',$currencies=''){
        $httpClient = new \GuzzleHttp\Client();
        $url = self::getQueryUrl("posts/?&page=$page&filter=$type&kind=$kind&currencies=$currencies");
        $response = $httpClient->get($url);
        return ($response->getBody()->getContents());

    }
}
