<?php


namespace App\Http\Controllers;


use App\Criteria\RequestCriteria;
use App\Models\Cryptocurrency;
use App\Models\CryptocurrencyInfo;
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
        $object = EarlyAccessEmail::firstOrCreate([
            'email' => $request->email,
        ], [
            'ref' => $request->ref,
        ]);
        $object->code = substr(md5($object->id), 0, 8);
        $object->save();

        //
        $start_time = new Carbon(1632009600);
        $end_time = $object->created_at->timestamp;
        $interval = $end_time - $start_time->timestamp;
        $hours_passed = $interval / 3600;
        $register_count = max((int)$hours_passed * 40 + 1293, 1293);
        $total_register =(int)( (now()->timestamp - $start_time->timestamp)/3600* 40 + 1293);

        return [
            'info' => $object,
            'register_count' => $register_count,
            'total_register' => $total_register,
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
        $this->categoryRepository->skipPresenter(false);
        $categories = $this->categoryRepository->with(['cryptocurrencies'])->list(null,[],true);
        $categories = collect($categories)->sortBy([
            function ($a, $b) {return count($a['cryptocurrencies']) < count($b['cryptocurrencies']);},
        ]);

        //======================================================

        $count_total_cryptocurrencies = CryptocurrencyInfo::count('cryptocurrency_id');

        //======================================================
        $this->cryptocurrencyRepository->skipPresenter(true);
//        $this->cryptocurrencyRepository->pushCriteria(app(RequestCriteria::class));

        $filter=[
            'search'=>$request->search,
            'cryptocurrency_info'=>true,
            'cryptocurrency'=>[
                'from_rank'=>1,
            ],
            'category'=>[
                'category_ids'=>[$request->category_id],
            ]
        ];
        $cryptocurrencies = $this->cryptocurrencyRepository->orderBy('rank')->list(50,$filter);

//        return [
//            'cryptocurrencies' => $cryptocurrencies,
//        ];

        return view('web.tokens', [
            'cryptocurrencies' => $cryptocurrencies,
            'categories' => $categories,
            'count_total_cryptocurrencies' => $count_total_cryptocurrencies,
            'category_id' => $request->category_id,
            'search' => $request->search,
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

    public function termsOfServiceView(){
        return view('web.terms_of_service');
    }
    public function privacyPolicyView(){
        return view('web.privacy_policy');
    }

}
