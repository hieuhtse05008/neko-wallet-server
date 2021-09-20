<?php


namespace App\Http\Controllers;


use App\Models\Cryptocurrency;
use App\Models\EarlyAccessEmail;
use App\Repositories\CategoryRepository;
use App\Repositories\CryptocurrencyCategoryRepository;
use App\Repositories\CryptocurrencyRepository;
use App\Services\CryptoPanicService;
use App\Services\TelegramService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    protected $cryptocurrencyRepository;
    protected $cryptocurrencyCategoryRepository;
    protected $categoryRepository;

    public function __construct(CryptocurrencyRepository $cryptocurrencyRepository,
                                CryptocurrencyCategoryRepository $cryptocurrencyCategoryRepository,
                                CategoryRepository $categoryRepository
    )
    {
        $this->cryptocurrencyRepository = $cryptocurrencyRepository;
        $this->cryptocurrencyCategoryRepository = $cryptocurrencyCategoryRepository;
        $this->categoryRepository = $categoryRepository;
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

        //
        $start_time = new Carbon(1632009600);
        $end_time = Carbon::now()->timestamp;
        $interval = $end_time - $start_time->timestamp;
        $hours_passed = $interval / 3600;
        $register_count = (int)$hours_passed * 40 + 1293;

        return [
            'info' => $object,
            'register_count' => $register_count
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

    public function tokensView(Request $request)
    {
        //======================================================
//        $this->categoryRepository->skipPresenter(false);
        $this->categoryRepository->with(['cryptocurrencies']);
        $categories = $this->categoryRepository->list(null);
        $count_total_cryptocurrencies = count($this->cryptocurrencyRepository->list(null, ['cryptocurrency_info' => true]));
//        return ($categories);
        return view('web.tokens', [
            'categories' => $categories,
            'count_total_cryptocurrencies' => $count_total_cryptocurrencies,
        ]);
    }

    public function tokenView(Cryptocurrency $cryptocurrency)
    {

        $related_coins = Cryptocurrency::where('cryptocurrencies.id', '>', $cryptocurrency->id)
            ->join('cryptocurrency_info', 'cryptocurrencies.id', '=', 'cryptocurrency_info.cryptocurrency_id')
            ->select('cryptocurrencies.*')
            ->limit(12)
            ->get();


        return view('web.token', [
            'cryptocurrency' => $cryptocurrency,
            'exchange_guides' => $cryptocurrency->exchange_guides()->get(),
            'related_coins' => $related_coins,
        ]);
    }
    public function cryptocurrencyMobileView(Cryptocurrency $cryptocurrency)
    {

        $related_coins = Cryptocurrency::where('cryptocurrencies.id', '>', $cryptocurrency->id)
            ->join('cryptocurrency_info', 'cryptocurrencies.id', '=', 'cryptocurrency_info.cryptocurrency_id')
            ->select('cryptocurrencies.*')
            ->limit(12)
            ->get();


        return view('mobile.cryptocurrency', [
            'cryptocurrency' => $cryptocurrency,
            'exchange_guides' => $cryptocurrency->exchange_guides()->get(),
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
