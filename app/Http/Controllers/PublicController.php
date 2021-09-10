<?php


namespace App\Http\Controllers;


use App\Models\Coin;
use App\Models\EarlyAccessEmail;
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

    public function registerEarlyAccessWithEmail(Request $request){
        $object = EarlyAccessEmail::firstOrNew([
            'email'=>$request->email,
        ],[
            'ref'=>$request->ref,
        ]);
        if(empty(object_get($object,'id'))){
            $object->save();
            $object->code = substr(md5($object->id), 0, 8);
            $object->save();
        }
        return [
            'info'=>$object,

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
        $connection = 'warehouse';
//        $coins = Coin::limit(5)->get();
        $categories = DB::connection($connection)->table('coin_categories')->get();
        $platforms = DB::connection($connection)->table('asset_platforms')->get();

        return view('web.tokens', [
//            'coins' => $coins,
            'categories' => $categories,
            'platforms' => $platforms,
        ]);
    }

    public function tokenView(Coin $coin)
    {
//        dd($coin->categories);

        $this->coinRepository->skipPresenter(true);
        $related_coins = $this->coinRepository->list(12,[
            'exclude_ids' => [$coin->id],
            'categories' => explode(',',$coin->categories),
        ]);
//        dd($related_coins);
        $coin->views += 1;
        $coin->save();
        //
        $connection = 'warehouse';
        //get platforms
        $coin->platforms = json_decode($coin->platforms ?: '{}');
        $platform_ids = get_object_vars($coin->platforms);
        $platform_ids = array_keys($platform_ids);
        $platforms = DB::connection($connection)->table('asset_platforms')->whereIn('asset_platform_id', $platform_ids)->get();

        $asset_platform = DB::connection($connection)->table('asset_platforms')->where('asset_platform_id', '=', $coin->asset_platform_id)->first();
        //get links data
        $coin->links = json_decode($coin->links ?: '{}');
        //get tickers data
        $coin->tickers = json_decode($coin->tickers ?: '{}');

        $markets = [];
        foreach ($coin->tickers as $ticker){
                if(!in_array($ticker->market, $markets)){
                    $markets[] = $ticker->market;
                }
        }
        //return view with data
        return view('web.token', [
            'coin' => $coin,
            'asset_platform' => $asset_platform,
            'platforms' => $platforms,
            'markets' => $markets,
            'related_coins' => $related_coins,
        ]);
    }

    public function surfNewsView()
    {

        return view('analytics.surf_news');
    }

    public function dashboardView()
    {
        $connection = 'warehouse';
        $all_coins = Coin::all();
        $categories = DB::connection($connection)->table('coin_categories')->get();
        $platforms = DB::connection($connection)->table('asset_platforms')->get();
        return view('analytics.dashboard', [
            'all_coins' => $all_coins,
            'categories' => $categories,
            'platforms' => $platforms,
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
