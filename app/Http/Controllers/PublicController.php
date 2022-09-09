<?php


namespace App\Http\Controllers;


use App\Enum\BlogGroup;
use App\Enum\FAQs;
use App\Enum\Locales;
use App\Enum\ViewTexts;
use App\Models\Blog;
use App\Models\RefBlogGroup;
use App\Repositories\BlogGroupRepository;
use App\Repositories\BlogRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicController extends ViewController
{
    protected $lang;
    protected $blogRepository;
    protected $blogGroupRepository;

    public function __construct(
        BlogRepository                   $blogRepository,
        BlogGroupRepository                   $blogGroupRepository
    ) {
        parent::__construct();
        $this->lang = config('app.locale');

        $this->blogRepository = $blogRepository;
        $this->blogGroupRepository = $blogGroupRepository;
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


    public function homeView(Request $request)
    {
        return $this->view('v3.home.home', ViewTexts::HOME);
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

    public function aboutView()
    {
        return $this->view('v3.about.index', ViewTexts::ABOUT);
    }

    public function termsView()
    {
        return $this->view('v3.termsAndPrivacy.terms');
    }

    public function privacyView()
    {
        return $this->view('v3.termsAndPrivacy.privacy');
    }

    public function supportView()
    {
        return $this->view('v3.support.index');
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

        return $this->view('web.faqs', [
            'questions' => FAQs::items,

        ]);
    }


    public function blogsView(Request $request)
    {
        $category_id = (int)$request->get('category');

        $filter = [
            'search' => $request->search,
            'blog_group' => [
                'type' => empty($category_id) ? 'kind' : 'category',
                'ids' => empty($category_id) ? [BlogGroup::BLOG_GROUP_ID] : [$category_id]
            ],
        ];



        $this->blogRepository->skipPresenter();
        $blogs = $this->blogRepository->orderBy('created_at', 'desc')->list(8, $filter);
        $latestBlogs = $this->blogRepository->orderBy('created_at', 'desc')
            ->list(4, ['type' => 'kind','ids' => [BlogGroup::BLOG_GROUP_ID]] );


        $category_ids = \App\Models\BlogGroup::getBlogCategories(BlogGroup::BLOG_GROUP_ID);
        $categories = $this->blogGroupRepository->list(null, ['blog_group' => ['type' => 'category','ids'=>$category_ids]]);

        return $this->view('v3.blog.list', [
            'search' => $request->search,
            'category' => $request->category,
            'latestBlogs' => $latestBlogs,
            'blogs' => $blogs,
            'categories' => $categories,
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

//                dd($request->slug, $this->locale,$blog);

        if (empty($blog)) {
            abort(404);
        }


        return $this->view('v3.blog.detail', [
            'blog' => $blog,
            'slug' => $slug,
        ]);
    }

    public function loginView()
    {

        return $this->view('web.login.login');
    }

    public function manageView()
    {
        return $this->view('web.manage.index');
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
