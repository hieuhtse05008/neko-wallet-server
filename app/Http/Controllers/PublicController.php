<?php


namespace App\Http\Controllers;


use App\Services\TelegramService;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function surfNews(){

        return view('surf_news');
    }

    public function pushNewsTelegram(Request $request){
        $text  = urlencode($request->encoded_text);
        $res = TelegramService::sendMessageToChat('-535769292', $text);
        return $res;
    }
    public function loadCors(Request $request){
        $httpClient = new \GuzzleHttp\Client();
        $url = $request->url;
        $response = $httpClient->get($url);
        $res = ($response->getBody()->getContents());
        return response($res);
    }
}
