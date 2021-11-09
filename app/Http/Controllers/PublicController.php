<?php


namespace App\Http\Controllers;


use App\Enum\Locales;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Cryptocurrency;
use App\Models\CryptocurrencyInfo;
use App\Models\EarlyAccessEmail;
use App\Models\ExchangeGuide;
use App\Models\Network;
use App\Repositories\BlogRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CryptocurrencyCategoryRepository;
use App\Repositories\CryptocurrencyRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicController extends ViewController
{
    protected $lang;
    protected $cryptocurrencyRepository;
    protected $cryptocurrencyCategoryRepository;
    protected $categoryRepository;
    protected $blogRepository;

    public function __construct(CryptocurrencyRepository         $cryptocurrencyRepository,
                                CryptocurrencyCategoryRepository $cryptocurrencyCategoryRepository,
                                CategoryRepository               $categoryRepository,
                                BlogRepository                   $blogRepository
    )
    {
        parent::__construct();
        $this->lang = config('app.locale');
        $this->cryptocurrencyRepository = $cryptocurrencyRepository;
        $this->cryptocurrencyCategoryRepository = $cryptocurrencyCategoryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->blogRepository = $blogRepository;
    }

    public function test()
    {
        return [
            'ok' => file_exists('https://s2.coinmarketcap.com/static/img/coins/200x200/6950.png'),
            'ok2' => getimagesize('https://nekoinvest.io/images/home/protect.png'),
            'ok3' => getimagesize('https://s2.coinmarketcap.com/static/img/coins/200x200/1.png'),
        ];
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
        $total_register = (int)((now()->timestamp - $start_time->timestamp) / 3600 * 40 + 1293);

        return [
            'info' => $object,
            'register_count' => $register_count,
            'total_register' => $total_register,
        ];
    }


    public function homeView(Request $request)
    {
//        dd($request->all());
        $networks = Network::whereIn('id', [1, 2, 4])->get();
        $features = [
            [
                'title' => 'web.home.feature.1st_title',
                'description' => 'web.home.feature.1st_description',
                'image_url' => '/images/feature/boat.png',
            ],
            [
                'title' => 'web.home.feature.2nd_title',
                'description' => 'web.home.feature.2nd_description',
                'image_url' => '/images/feature/exchange.png',
            ],
            [
                'title' => 'web.home.feature.3rd_title',
                'description' => 'web.home.feature.3rd_description',
                'image_url' => '/images/feature/nft.png',
            ],
            [
                'title' => 'web.home.feature.4th_title',
                'description' => 'web.home.feature.4th_description',
                'image_url' => '/images/feature/dapps.png',
            ],
            [
                'title' => 'web.home.feature.5th_title',
                'description' => 'web.home.feature.5th_description',
                'image_url' => '/images/feature/market.png',
            ],
            [
                'title' => 'web.home.feature.6th_title',
                'description' => 'web.home.feature.6th_description',
                'image_url' => '/images/feature/inspect.png',
            ],
        ];
        $road_maps = [
            [
                'time' => '2021',
                'title' => 'MVP',
                'current' => true,
                'items' => [
                    ['title' => 'Support BSC, Ethereum & Solana', 'done' => true],
                    ['title' => 'Aggregator & Multichain wallet ', 'done' => true],
                    ['title' => 'Secure Seed round', 'done' => true],
                    ['title' => 'Beta release', 'done' => true],
                ],
            ],
            [
                'time' => 'Q1 2022',
                'title' => 'Beta Release',
                'items' => [
                    ['title' => 'Refine platform performance, UIUX', 'done' => false],
                    ['title' => 'Integrate more public networks', 'done' => false],
                    ['title' => 'Add Decentralized Fund Management feature', 'done' => false],
                    ['title' => 'Add cross-chain protocol aggregation', 'done' => false],
                    ['title' => 'Secure Strategic round', 'done' => false],
                ],
            ],
            [
                'time' => 'Q2 2022',
                'title' => 'Public Release',
                'items' => [
                    ['title' => 'Smart contract Audit', 'done' => false],
                    ['title' => 'Aggregate more Dexes', 'done' => false],
                    ['title' => 'Add Limit Order protocol', 'done' => false],
                    ['title' => 'Introduce Neko NFT collection based on the branding of Neko', 'done' => false],
                    ['title' => 'Issue token $NEKO', 'done' => false],
                ],
            ],
            [
                'time' => 'Q3-Q4 2022',
                'title' => 'User Growth',
                'items' => [
                    ['title' => 'Neko Index Fund', 'done' => false],
                    ['title' => 'Aggregate DeFi Yield product', 'done' => false],
                    ['title' => 'Launch Neko-verse applications for Neko NFT', 'done' => false],
                    ['title' => 'Aggregate multichain NFT Marketplaces', 'done' => false],
                ],
            ],
        ];
        $founders = [
            ['name' => 'LEO NGUYEN', 'role' => 'CEO', 'department' => 'Msc. Strategy - Aalto Uni', 'avatar' => '/images/founder/locnv.png'],
            ['name' => 'NGUYEN VIET HUNG', 'role' => 'Product', 'department' => 'Computer Science FPT Uni', 'avatar' => '/images/founder/hungnv.png'],
            ['name' => 'TRINH ANH DUC', 'role' => 'Strategy & Finance', 'department' => 'Venture Capital', 'avatar' => '/images/founder/ducta.png'],
            ['name' => 'DUONG NHAT ANH', 'role' => 'NFT Designer', 'department' => 'Graphic Design FPT Uni', 'avatar' => '/images/founder/anhnd.png'],
            ['name' => 'PHAN MINH DUONG', 'role' => 'Blockchain Dev', 'department' => 'Master ICT - USTH', 'avatar' => '/images/founder/duongpm.png'],
            ['name' => 'HA TRUNG HIEU', 'role' => 'Blockchain Dev', 'department' => 'Master ICT - USTH', 'avatar' => '/images/founder/hieuht.png'],
            ['name' => 'HANH PHAM', 'role' => 'Graphic Designer', 'department' => '', 'avatar' => '/images/founder/hanhpt.png'],
            ['name' => 'HOANG DUC LONG', 'role' => 'NFT Dev', 'department' => 'Software Eng. FPT Uni', 'avatar' => '/images/founder/longhd.png'],
        ];
//dd($this->user->tokens);
        return $this->view('web.home', [
            'founders' => $founders,
            'road_maps' => $road_maps,
            'networks' => $networks,
            'features' => $features,
        ]);
    }

    public function tokensView(Request $request)
    {
        //======================================================
        $this->categoryRepository->skipPresenter(false);
        $categories = $this->categoryRepository->with(['cryptocurrencies'])->list(null, []);

        $categories = collect($categories)->sortBy([
            function ($a, $b) {
                return (int)(count($a['cryptocurrencies']) < count($b['cryptocurrencies']));
            },
        ]);

        //======================================================

        $count_total_cryptocurrencies = CryptocurrencyInfo::count('cryptocurrency_id');

        //======================================================
        $this->cryptocurrencyRepository->skipPresenter(true);

        $filter = [
            'search' => $request->search,
            'cryptocurrency_info' => true,
            'cryptocurrency' => [
                'from_rank' => 1,
            ],
            'category' => [
                'category_ids' => [$request->category_id],
            ]
        ];
        $cryptocurrencies = $this->cryptocurrencyRepository->orderBy('rank')->list(48, $filter);


        return $this->view('web.cryptocurrency.cryptocurrencies', [
            'cryptocurrencies' => $cryptocurrencies,
            'categories' => $categories,
            'count_total_cryptocurrencies' => $count_total_cryptocurrencies,
            'category_id' => $request->category_id,
            'search' => $request->search,
        ]);
    }

    public function tokenView($lang, Cryptocurrency $cryptocurrency)
    {

        $related_coins = Cryptocurrency::where('cryptocurrencies.id', '>', $cryptocurrency->id)
            ->join('cryptocurrency_info', 'cryptocurrencies.id', '=', 'cryptocurrency_info.cryptocurrency_id')
            ->select('cryptocurrencies.*')
            ->limit(12)
            ->get();
        $exchange_guides = $cryptocurrency->exchange_guides()->get();
        $neko_exchange_guide = [
            'id' => '0',
            'name' => 'NEKO',
            'guide_html' => [
                'steps' => [
                    ['text' => 'Create/Login to your Neko Invest app account',
                        'image_url' => '',],
                    ['text' => 'Go to Market page, click on the Search icon and search [TOKEN] in the search bar.',
                        'image_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/images/1636366375WvZNyMWvLiDgY3y.jpg',],
                    ['text' => 'Click on [TOKEN] logo and choose Invest. ',
                        'image_url' => '',],
                    ['text' => 'Entering the amount of [TOKEN] that you want to buy. Then click on the Get Quotes button.',
                        'image_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/images/1636366322y919PHen13XXakQ.jpg',],
                    ['text' => 'Swipe the Swipe to swap button and now you own  [TOKEN]. You can check your [TOKEN] balance in your wallet by going to Wallet page.',
                        'image_url' => 'https://d1j8r0kxyu9tj8.cloudfront.net/images/1636366282fkVuygewNk3agPb.jpg',],
                ]
            ],
        ];
        return $this->view('web.cryptocurrency.cryptocurrency', [
            'cryptocurrency' => $cryptocurrency,
            'exchange_guides' => $exchange_guides,
            'neko_exchange_guide' => $neko_exchange_guide,
            'related_coins' => $related_coins,
        ]);
    }

    public function cryptocurrencyMobileView(Cryptocurrency $cryptocurrency)
    {
        return $this->view('mobile.cryptocurrency', [
            'cryptocurrency' => $cryptocurrency,
        ]);
    }

    public function termsOfServiceView()
    {
        return $this->view('web.terms_of_service');
    }

    public function privacyPolicyView()
    {
        return $this->view('web.privacy_policy');
    }


    public function blogsView(Request $request)
    {
        $filter = [
            'search' => $request->search,
        ];

        $this->blogRepository->skipPresenter(true);
        $blogs = $this->blogRepository->list(48, $filter);

        return $this->view('web.blog.blogs', [
            'blogs' => $blogs,
            'search' => $request->search
        ]);
    }

    public function blogView(Request $request)
    {
        $slug = $request->slug;
        $blog = Blog::where(function ($q) use ($slug) {
            foreach (Locales::AVAILABLE_LOCALES as $locale) {
                $q->orWhere("slug->{$locale}", $slug);
            }
        })->first();

//        dd($request->slug, $this->locale,$blog);

        if (empty($blog)) {
            abort(404);
        }


        return $this->view('web.blog.blog', [
            'blog' => $blog,
            'slug' => $slug,
        ]);
    }

    public function loginView()
    {

        return $this->view('web.login.login');
    }
}
