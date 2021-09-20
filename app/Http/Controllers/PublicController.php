<?php


namespace App\Http\Controllers;


use App\Models\Cryptocurrency;
use App\Models\EarlyAccessEmail;
use App\Repositories\CategoryRepository;
use App\Repositories\CryptocurrencyCategoryRepository;
use App\Repositories\CryptocurrencyRepository;
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


    public function homeView(Request $request)
    {
        return view('web.home', [
        ]);
    }

    public function tokensView(Request $request)
    {
        //======================================================
//        $this->categoryRepository->skipPresenter(false);

        $categories = $this->categoryRepository->with(['cryptocurrencies'])->skipPresenter(false)->list(null);
        $count_total_cryptocurrencies = count($this->cryptocurrencyRepository->list(null, ['cryptocurrency_info' => true]));

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
        return view('mobile.cryptocurrency', [
            'cryptocurrency' => $cryptocurrency,
        ]);
    }

}
