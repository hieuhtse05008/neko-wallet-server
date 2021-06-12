<?php


namespace App\Dex;

use GuzzleHttp\Client;

class BinanceAPI
{
    private $apiKey;
    private $secretKey;
    private $baseUrl;
    private $recvWindow = 10000;

    public function __construct()
    {
        $this->baseUrl = config('app.binance_url');
        $this->apiKey = config('app.binance_api_key');
        $this->secretKey = config('app.binance_secret_key');
    }

    public function getRequest($url, $params = [])
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->baseUrl,
        ]);

        $headers = [
            'Accept'=>'application/json',
            'X-MBX-APIKEY' => $this->apiKey
        ];

        $params['timestamp'] = strtotime('now') * 1000;
        $params['recvWindow'] = $this->recvWindow;

        $queryString = http_build_query($params);

        $params['signature'] = hash_hmac('sha256', $queryString, $this->secretKey);

        $response = $client->get($url, [
            'query' => $params,
            'headers' => $headers
        ]);

        return $response;
    }

    public function depositAddress($coin, $network = '')
    {
        $params = [
            'coin'=>$coin,
            'network'=>$network
        ];

        $data = $this->getRequest('sapi/v1/capital/deposit/address', $params)->getBody()->getContents();

        return json_decode($data);
    }

    public function allCoinDeposit(){
        $data = $this->getRequest('/sapi/v1/capital/config/getall')->getBody()->getContents();

        return json_decode($data);
    }
}
