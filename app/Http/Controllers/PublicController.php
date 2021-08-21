<?php


namespace App\Http\Controllers;


use App\Models\Coin;
use App\Services\CryptoPanicService;
use App\Services\TelegramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function surfNewsView(){

        return view('surf_news');
    }
    public function dashboardView(){
        $connection = config('database.connections.warehouse.database');
        $all_coins = Coin::all();
        $categories = DB::connection($connection)->table('coin_categories')->get();
        $platforms = DB::connection($connection)->table('asset_platforms')->get();
        return view('dashboard',[
            'all_coins' =>$all_coins,
            'categories' =>$categories,
            'platforms' =>$platforms,
        ]);
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
