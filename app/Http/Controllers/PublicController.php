<?php


namespace App\Http\Controllers;


use App\Enum\FAQs;
use App\Enum\Locales;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicController extends ViewController
{
    protected $lang;
    protected $blogRepository;

    public function __construct(BlogRepository                   $blogRepository
    )
    {
        parent::__construct();
        $this->lang = config('app.locale');

        $this->blogRepository = $blogRepository;
    }

    public function test()
    {
//        return $this->view('web.test' );
//        return [
//            'ok' => file_exists('httpss://s2.coinmarketcap.com/static/img/coins/200x200/6950.png'),
//            'ok2' => getimagesize('httpss://nekoinvest.io/images/home/protect.png'),
//            'ok3' => getimagesize('httpss://s2.coinmarketcap.com/static/img/coins/200x200/1.png'),
//        ];
    }




    public function homeViewV2(Request $request)
    {
        $pros = [
            [
                'img' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/16520879213YTsl7GENrWWefg.png',
                'title' => 'Non-Custodial',
                'description' => 'Take full control of assets, web3 native (can connect to Web3 Dapp and game)'
            ],
            [
                'img' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652087924JXoLwRosRqcAKfQ.png',
                'title' => 'Security first',
                'description' => 'Your keys... your assets'
            ],
            [
                'img' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652087933zHmLkZmwae7yHwe.png',
                'title' => 'Gaming-friendly',
                'description' => 'Manage and store your Web3 gaming assets wisely'
            ],
        ];

        $features = [
            [
                'title' => 'Inventory',
                'description' => 'Organize digital assets (NFT & Game tokens) by Games & Networks.',
                'active' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652088491vwA7YAsKtwnCp04.png',
                'inactive' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652088486BMO9BteGFypo2vQ.png',

                'img' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652523642eoKGB3iRas4yZYW.png',
                'satellites' => [
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090229sLqrSVXhjZeNWXq.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/16520902525IGkEz2e6zONWtf.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/16520902557pR51LSADEPweXl.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090249SqAi1Y5QTR8V7s3.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090231AE2pY0gLrEzcHEk.png',
                ]
            ],
            [
                'title' => 'True Multi-chain',
                'description' => 'Support multi-chain asset storage and transactions.',
                'active' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652088526a6nVh6C6y9EnR0y.png',
                'inactive' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652088523gfmS4kPAAY5FajU.png',
//                'img' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652088749deQ0TFH2ru1jRcg.png',
                'img' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/1652774847vkEngkJkJNSlW89.png',
                'satellites' => [
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090164yi3iejqSSlKN84i.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090167DXfN7DXpkHMowRc.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/16520901773eSGyq9lhjMEBgf.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090180cwrtSFkGEkRIDVQ.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090184geztbdueAjyrCfl.png',
                ]
            ],
            [
                'title' => 'Dapp Browser',
                'description' => 'Connect/buy/sell your assets on any NFT Marketplace.',
                'active' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652088543JPlIrLqqrN3AnMz.png',
                'inactive' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/16520885416Rfbhlmeqk5N5kM.png',
//                'img' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652088720YUijMuUgwgKa3dY.png',
                'img' => 'https://d1j8r0kxyu9tj8.cloudfront.net/files/16527743458MsQVjPmUgGQaU9.png',
                'satellites' => [
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/16520903028sNsRtLdWA0aQq6.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090304ymFnH81oky7iz8m.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090314iWLwE6XQ6Wif9h2.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090316wwPV7VdyAjiiemG.png',
                    'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652090319JcJeyhlzKV6z9eL.png',
                ]
            ],
        ];
        $designs = [
            'Defi',
            'Gaming',
            'The Metaverse',
            'NFTs & Collectibles',
            'Exchanges',
        ];
        $partners = [
            'https://d1j8r0kxyu9tj8.cloudfront.net/files/16523280644zZhS9SFPMFsNnn.png',
            'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652328067cOlcQFRtgoaycAv.png',
            'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652501189NUbetyvuaINNr7i.png',
            'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652328082JYQSj8g1nbtm3nj.png',
            'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652501192lywVdOyQdbLG8bE.png',
            'https://d1j8r0kxyu9tj8.cloudfront.net/files/1652501207UKGbVqfK3jdK2z9.png',

        ];
        return $this->view('web.home.home-v2', [
            'pros' => $pros,
            'features' => $features,
            'designs' => $designs,
            'partners' => $partners,
        ]);
    }

    public function homeView(Request $request)
    {

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
                    ['title' => 'Aggregate multichain NFT Marketplace', 'done' => false],
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
//            ['name' => 'HOANG DUC LONG', 'role' => 'NFT Dev', 'department' => 'Software Eng. FPT Uni', 'avatar' => '/images/founder/longhd.png'],
        ];
//dd($this->user->tokens);
        return $this->view('web.home', [
            'founders' => $founders,
            'road_maps' => $road_maps,
            'networks' => $networks,
            'features' => $features,
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


    public function faqsView()
    {

        return $this->view('web.faqs',[
            'questions'=>FAQs::items
        ]);
    }


    public function blogsView(Request $request)
    {
        $filter = [
            'search' => $request->search,
            'blog_group'=>[
                'type' => 'kind',
                'ids' =>[2]
            ],
        ];

        $this->blogRepository->skipPresenter(true);
        $blogs = $this->blogRepository->orderBy('created_at', 'desc')->list(48, $filter);

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

//    public function nftView()
//    {
//
//        return $this->view('web.nft.index');
//    }
    public function download()
    {

        return $this->view('web.download');
    }
}
