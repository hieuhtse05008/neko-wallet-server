<?php


namespace App\Http\Controllers;


use App\Models\Blog;
use App\Models\Cryptocurrency;
use App\Models\CryptocurrencyInfo;
use App\Models\EarlyAccessEmail;
use App\Models\Network;
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
        $total_register = (int)((now()->timestamp - $start_time->timestamp) / 3600 * 40 + 1293);

        return [
            'info' => $object,
            'register_count' => $register_count,
            'total_register' => $total_register,
        ];
    }


    public function homeView(Request $request)
    {
        $networks = Network::whereIn('id', [1, 2, 4])->get();
        $features = [
            [
                'title' => 'Send & Receive Crypto',
                'description' => 'Get your first $50 of Bitcoin, Ethereum, Binance Coin and many other cryptocurrencies.',
                'image_url' => '/images/feature/boat.png',
            ],
            [
                'title' => 'Swap between tokens',
                'description' => 'Get your first $50 of Bitcoin, Ethereum, Binance Coin and many other cryptocurrencies.',
                'image_url' => '/images/feature/exchange.png',
            ],
            [
                'title' => 'NFTs',
                'description' => 'Get your first $50 of Bitcoin, Ethereum, Binance Coin and many other cryptocurrencies.',
                'image_url' => '/images/feature/nft.png',
            ],
            [
                'title' => 'dApps Connect',
                'description' => 'Get your first $50 of Bitcoin, Ethereum, Binance Coin and many other cryptocurrencies.',
                'image_url' => '/images/feature/dapps.png',
            ],
            [
                'title' => 'Market Overview',
                'description' => 'Get your first $50 of Bitcoin, Ethereum, Binance Coin and many other cryptocurrencies.',
                'image_url' => '/images/feature/market.png',
            ],
            [
                'title' => 'Project inspect',
                'description' => 'Get your first $50 of Bitcoin, Ethereum, Binance Coin and many other cryptocurrencies.',
                'image_url' => '/images/feature/inspect.png',
            ],
        ];
        $road_maps = [
            [
                'time' => '2021',
                'title' => 'MINIMUM VIABLE PRODUCT',
                'current' => true,
                'items' => [
                    ['title' => 'Finish MVP Aggregator & multichain Wallet', 'done' => true],
                    ['title' => 'Add support for BSC, Ethereum & Solana', 'done' => true],
                    ['title' => 'Secure Angel round', 'done' => true],
                    ['title' => 'Integrate BSC, Ethereum & Solana DEXes', 'done' => true],
                    ['title' => 'Secure Seed round', 'done' => true],
                    ['title' => 'Release public beta', 'done' => true],
                    ['title' => 'Secure strategic rounds', 'done' => true],
                ],
            ],
            [
                'time' => 'Q1-Q2 2022',
                'title' => 'REFINE PLATFORM',
                'items' => [
                    ['title' => 'Integrate all popular networks', 'done' => false],
                    ['title' => 'Integrate popular cexes', 'done' => false],
                    ['title' => 'Continue adding more DEXes', 'done' => false],
                    ['title' => 'Smart contracts audits', 'done' => false],
                    ['title' => 'Release neko bridge', 'done' => false],
                    ['title' => 'Public sales', 'done' => false],
                ],
            ],
            [
                'time' => 'Q3-Q4 2022',
                'title' => 'PUBLIC RELEASE',
                'items' => [
                    ['title' => 'Continue adding networks, DEXes & CEXes', 'done' => false],
                    ['title' => 'Neko NFT', 'done' => false],
                    ['title' => 'Neko Index', 'done' => false],
                    ['title' => 'Neko Decentralized Investment Funds', 'done' => false],
                ],
            ],
            [
                'time' => '2023',
                'title' => 'USER GROWTH',
                'items' => [
                    ['title' => 'Continue adding networks, DEXes & CEXes', 'done' => false],
                    ['title' => 'Yield Aggregator', 'done' => false],
                    ['title' => 'Saving Products', 'done' => false],
                ],
            ],
        ];
        $founders = [
            ['name' => 'LEO NGUYEN', 'role' => 'CEO', 'department' => 'Msc. Strategy - Aalto Uni','avatar'=>'/images/founder/locnv.png'],
            ['name' => 'NGUYEN VIET HUNG', 'role' => 'Product', 'department' => 'Computer Science FPT Uni','avatar'=>'/images/founder/hungnv.png'],
            ['name' => 'TRINH ANH DUC', 'role' => 'Strategy & Finance', 'department' => 'Venture Capital','avatar'=>'/images/founder/ducta.png'],
            ['name' => 'NGUYEN QUANG THAI', 'role' => 'Growth', 'department' => 'Founder DTX Asia','avatar'=>'/images/founder/thainq.png'],
            ['name' => 'PHAN MINH DUONG', 'role' => 'Blockchain Dev', 'department' => 'Master ICT - USTH','avatar'=>'/images/founder/duongpm.png'],
            ['name' => 'HA TRUNG HIEU', 'role' => 'Blockchain Dev', 'department' => 'Master ICT - USTH','avatar'=>'/images/founder/hieuht.png'],
            ['name' => 'DUONG NHAT ANH', 'role' => 'NFT Designer', 'department' => 'Graphic Design FPT Uni','avatar'=>'/images/founder/anhnd.png'],
            ['name' => 'HOANG DUC LONG', 'role' => 'NFT Dev', 'department' => 'Software Eng. FPT Uni','avatar'=>'/images/founder/longhd.png'],
        ];
        return view('web.home', [
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
        $categories = $this->categoryRepository->with(['cryptocurrencies'])->list(null, [], true);
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

    public function termsOfServiceView()
    {
        return view('web.terms_of_service');
    }

    public function privacyPolicyView()
    {
        return view('web.privacy_policy');
    }

}
