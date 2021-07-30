<?php


namespace App\Http\Controllers;


use App\Services\CryptoPanicService;
use App\Services\TelegramService;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function surfNews(){

        return view('surf_news');
    }

    public function pushNewsTelegram(Request $request){
        $chat_id = $request->chat_id;
        $text  = urlencode($request->encoded_text);
        $res = TelegramService::sendMessageToChat($chat_id, $text);
        return $res;
    }

    public function loadNews(Request $request){
        $page = $request->page;
        $type=$request->type;
        $kind=$request->kind;
        $currencies=$request->currencies;
        $res = CryptoPanicService::loadNews($page,$type,$kind,$currencies);
        return response($res);
    }
}
