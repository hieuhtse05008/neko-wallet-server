<?php


namespace App\Http\Controllers;


use App\Models\Coin;
use App\Models\Cryptocurrency;
use App\Models\EarlyAccessEmail;
use App\Models\ExchangeGuide;
use App\Repositories\CoinRepository;
use App\Services\CryptoPanicService;
use App\Services\TelegramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    protected $coinRepository;

    public function __construct(CoinRepository $coinRepository)
    {
        $this->coinRepository = $coinRepository;
    }

    public function registerEarlyAccessWithEmail(Request $request)
    {
        $object = EarlyAccessEmail::firstOrNew([
            'email' => $request->email,
        ], [
            'ref' => $request->ref,
        ]);
        if (empty(object_get($object, 'id'))) {
            $object->save();
            $object->code = substr(md5($object->id), 0, 8);
            $object->save();
        }
        return [
            'info' => $object,

        ];
    }

    public function searchCoin(Request $request)
    {

        $limit = $request->limit ?: 20;

        $coins = $this->coinRepository->list($limit);

        return $coins;
    }

    public function homeView(Request $request)
    {

        return view('web.home', [
        ]);
    }

    public function tokensView()
    {
        //======================================================

        $categories = DB::table('categories')->get();
        $platforms = DB::table('exchange_guides')->get();

        return view('web.tokens', [
//            'coins' => $coins,
            'categories' => $categories,
            'platforms' => $platforms,
        ]);
    }

    public function tokenView(Cryptocurrency $coin)
    {

        $related_coins = Cryptocurrency::where('cryptocurrencies.id','>', 36)
            ->join('cryptocurrency_info','cryptocurrencies.id','=','cryptocurrency_info.cryptocurrency_id')
            ->select('cryptocurrencies.*')
            ->limit(12)
            ->get();
//        $related_coins = [];
//        dd($related_coins);
dd([
    'coin' => $coin,
    'exchange_guides' => $coin->exchange_guides()->get(),
    'related_coins' => $related_coins,
]);
        return view('web.token', [
            'coin' => $coin,
            'exchange_guides' => $coin->exchange_guides()->get(),
            'related_coins' => $related_coins,
        ]);
    }

    public function pushNewsTelegram(Request $request)
    {
        $chat_id = $request->chat_id;
        $text = urlencode($request->encoded_text);
        $res = TelegramService::sendMessageToChat($chat_id, $text);
        return $res;
    }

    public function loadNews(Request $request)
    {
        $page = $request->page;
        $type = $request->type;
        $kind = $request->kind;
        $currencies = $request->currencies;
        $res = CryptoPanicService::loadNews($page, $type, $kind, $currencies);
        return response($res);
    }
}
