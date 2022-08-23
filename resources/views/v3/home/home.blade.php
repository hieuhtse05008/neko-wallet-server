@extends('v3.layout.master')
@section('content')

<section style="height: 75vh">
    <div class="text-center" style="padding-top: 25vh;">
        <h1 class="color-gradient fs-60px">Your All-in-one Solution</h1>
        <h1 class="fs-60px mb-3">For NFT & Web3</h1>
        <div class="mb-5 d-none d-md-block">
            <div>
                Our vision is to become the most accessible decentralized financial
            </div>
            <div>
                platform that allows users to invest in any digital assets on any
            </div>
            <div>
                blockchain networks.
            </div>
        </div>
        <div class="mb-5 d-block d-md-none px-2">

            Our vision is to become the most accessible decentralized financial platform that allows users to invest
            in any digital assets on any blockchain networks.

        </div>
        <div class="d-flex justify-content-center">
            <a href="https://play.google.com/store/apps/details?id=io.nekoinvest.wallet">
                <object data="/images/v3/web/google_play.svg" type="image/svg+xml"></object>
            </a>
            <div class="mx-2"></div>
            <a href="https://apps.apple.com/bw/app/neko-invest/id1586438402" class="me-3">
                <object data="/images/v3/web/apple_store.svg" type="image/svg+xml"></object>
            </a>
        </div>
    </div>
</section>
<section class="d-flex flex-column justify-content-center position-relative" id="phone" style="min-height: 100vh;">

    <img src="/images/v3/home/bg-gradient.webp" class="bg position-absolute">


    <div class="text-center position-relative">
        <div id="features-wrap">
            @foreach($features as $items)
            <h2 class="text-feature text-nowrap">
                @for($i = 1; $i <= 5; $i++) @foreach($items as $key=>$item)
                    {{$item}} {{' • '}}
                    @endforeach
                    @endfor
            </h2>
            @endforeach
        </div>

        {{-- <img src="/images/v3/home/phone.png" style="height: calc(100vh / 3 * 2)">--}}
        {{-- <img class="invisible" src="/images/v3/home/phone.webp" style="height: calc(100vh / 3 * 2)">--}}
        <img class="phone-img" src="/images/v3/home/phone.webp" style="">
    </div>
    <div class="mt-3 py-3 mt-md-5 py-md-5"></div>

    <div class="text-center mb-5">
        Neko is now in Alpha mode<br>
        That means our community gets invited to help us to<br>
        test our product and making it become the favorite<br>
        wallet for all people
    </div>
    <div class="text-center ">
        <a href="https://discord.gg/898xnMFXkU" class="btn rounded-pill text-white bg-discord d-inline-flex px-5 py-3 fw-light">
            <h3 class="m-0" style="line-height: 0;"><i class="fab fa-discord text-white me-2 "></i></h3>
            <h4 class="m-0 fw-normal">Join our Discord</h4>
        </a>
    </div>
    {{-- </section>--}}
    {{-- <section class="panel" style="height: auto;">--}}
    <div class="container align-items-center d-md-flex justify-content-between d-none" style="height: 50vh;">
        @foreach($partners as $partner)
        <div class="">
            <img loading="lazy" src="{{$partner}}">
        </div>
        @endforeach
    </div>
    <div class="w-100 d-md-none py-5 my-5">
        <div class="align-items-center d-flex justify-content-between w-100 d-md-none py-3  my-5" style=" overflow-x: scroll; overflow-y:hidden; ">
            @foreach($partners as $partner)
            <div class="me-5">
                <img loading="lazy" src="{{$partner}}">
            </div>
            @endforeach
        </div>
    </div>

</section>

<section class="snap-container " id="snap" style="height: 100vh; overflow: hidden;">

    <div class="snap-item" style="height: 100vh;">
        <div class="bg  h-100">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center h-100">
                <div class="feature-paginator d-block d-md-none" style="">
                    <div class="rounded-pill mb-2 bg-white"></div>
                    <div class="rounded-pill mb-2 bg-gray"></div>
                    <div class="rounded-pill mb-2 bg-gray"></div>
                    <div class="rounded-pill mb-2 bg-gray"></div>
                </div>
                <div class="position-relative pt-5 pt-md-0">
                    <div class="feature-paginator d-none d-md-block" style="">
                        <div class="rounded-pill mb-2 bg-white"></div>
                        <div class="rounded-pill mb-2 bg-gray"></div>
                        <div class="rounded-pill mb-2 bg-gray"></div>
                        <div class="rounded-pill mb-2 bg-gray"></div>
                    </div>
                    <div class="mb-3 mb-md-5">01</div>
                    <h1 class="mb-4">Flex your tastiest NFT<br>
                        on your inventory</h1>
                    <div>We have a new way for you to get <br> your NFT in front of more eyeballs.</div>
                </div>


                <div class="position-relative h-100 w-100 d-flex d-md-none justify-content-center">

                    <img src="/images/v3/home/features/1-m.png" class="position-absolute w-100 center-y" style="z-index: 1;">
                </div>
                <div class="position-relative h-100 min-width-50 d-none d-md-block">
                    <img src="/images/v3/home/features/1.svg" loading="lazy" class="position-absolute bottom-0 w-100" style="bottom: 0;">
                    <img src="/images/v3/home/features/1-left.png" class="position-absolute bottom-0 w-100" style="z-index: 1;">
                    <img src="/images/v3/home/features/1-right.png" class="position-absolute bottom-0 w-100" style="z-index: 1;">
                    <img src="/images/v3/home/features/1.svg" loading="lazy" class="invisible w-100">

                </div>
            </div>
        </div>
    </div>
    <div class="snap-item opacity-0 d-none" style="height: 100vh;">

        <div class="bg  h-100">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center h-100">
                <div class="feature-paginator d-block d-md-none" style="">
                    <div class="rounded-pill mb-2 bg-gray"></div>
                    <div class="rounded-pill mb-2 bg-white"></div>
                    <div class="rounded-pill mb-2 bg-gray"></div>
                    <div class="rounded-pill mb-2 bg-gray"></div>
                </div>
                <div class="position-relative pt-5 pt-md-0">
                    <div class="feature-paginator d-none d-md-block" style="">
                        <div class="rounded-pill mb-2 bg-gray"></div>
                        <div class="rounded-pill mb-2 bg-white"></div>
                        <div class="rounded-pill mb-2 bg-gray"></div>
                        <div class="rounded-pill mb-2 bg-gray"></div>
                    </div>
                    <div class="mb-3 mb-md-5">02</div>
                    <h1 class="mb-4">Multi-chain.<br>Multiple accounts.</h1>
                    <div>Hold multiple accounts and wallets in<br> one place on multi-chain.</div>
                </div>
                <div class="position-relative h-100 min-width-50">

                    <img src="/images/v3/home/features/2-accounts.png" class="position-absolute center-y w-100">
                    <img src="/images/v3/home/features/2-table.png" class="position-absolute bottom-0 w-100">
                    <img src="/images/v3/home/features/2-token-1.png" class="position-absolute center-y oscilator w-100" style="z-index: 1;">
                    <img src="/images/v3/home/features/2-token-2.png" class="position-absolute center-y oscilator w-100" style="z-index: 1;">
                    <img src="/images/v3/home/features/2-token-3.png" class="position-absolute center-y oscilator w-100" style="z-index: 1;">
                    <img src="/images/v3/home/features/2-accounts.png" class="invisible bottom-0 w-100">

                </div>
            </div>
        </div>
    </div>
    <div class="snap-item opacity-0 d-none" style="height: 100vh;">
        <div class="bg  h-100">

            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center h-100">
                <div class="feature-paginator d-block d-md-none" style="">
                    <div class="rounded-pill mb-2 bg-gray"></div>
                    <div class="rounded-pill mb-2 bg-gray"></div>
                    <div class="rounded-pill mb-2 bg-white"></div>
                    <div class="rounded-pill mb-2 bg-gray"></div>
                </div>
                <div class="position-relative pt-5 pt-md-0">
                    <div class="feature-paginator d-none d-md-block" style="">
                        <div class="rounded-pill mb-2 bg-gray"></div>
                        <div class="rounded-pill mb-2 bg-gray"></div>
                        <div class="rounded-pill mb-2 bg-white"></div>
                        <div class="rounded-pill mb-2 bg-gray"></div>
                    </div>
                    <div class="mb-3 mb-md-5">03</div>
                    <h1 class="mb-4">Lightning Transaction.<br>Super Low Fee.</h1>
                    <div>We know you're busy, so we designed<br> Neko to be fast and easy to use.</div>
                </div>
                <div class="position-relative h-100 min-width-50">
                    <img src="/images/v3/home/features/3-swap.png" class="position-absolute w-100 center-y">
                    <img src="/images/v3/home/features/3-swap.png" class="invisible bottom-0 w-100">
                </div>
            </div>
        </div>
    </div>
    <div class="snap-item opacity-0 d-none" style="height: 100vh;">
        <div class="bg  h-100">

            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center h-100">
                <div class="feature-paginator d-block d-md-none" style="">
                    <div class="rounded-pill mb-2 bg-gray"></div>
                    <div class="rounded-pill mb-2 bg-gray"></div>
                    <div class="rounded-pill mb-2 bg-gray"></div>
                    <div class="rounded-pill mb-2 bg-white"></div>
                </div>
                <div class="position-relative pt-5 pt-md-0">
                    <div class="feature-paginator d-none d-md-block" style="">
                        <div class="rounded-pill mb-2 bg-gray"></div>
                        <div class="rounded-pill mb-2 bg-gray"></div>
                        <div class="rounded-pill mb-2 bg-gray"></div>
                        <div class="rounded-pill mb-2 bg-white"></div>
                    </div>
                    <div class="mb-3 mb-md-5">04</div>
                    <h1 class="mb-4">Explore the best of what<br>the market has to offer</h1>
                    <div>Neko is your one-stop tool <br> for all of your NFT needs.</div>
                </div>
                <div class="position-relative h-100 min-width-50">
                    <img src="/images/v3/home/features/4-phone.png" class="position-absolute bottom-0  w-100">
                    <img src="/images/v3/home/features/4-phone.png" class="invisible bottom-0 w-100">
                </div>
            </div>
        </div>
    </div>
    {{-- <section class="snap-item" style="min-height: 110vh"></section>--}}

</section>



<section class="snap-item" style="min-height: 110vh"></section>

<section id="end-snap" class="position-relative" style="min-height: 100vh; z-index: 9999;background: rgba(1, 0, 2, 1);">
    <h1 class="text-center py-5">The Ultimate Metaverse Wallet</h1>
    <div class="container">
        <div class="row gy-4 gx-4">
            <div class="col-12 col-md-6">
                <div class=" text-center radius " style="background: linear-gradient(315deg, #EF2C85 0%, #AB0FAE 100%);">
                    <h4 class="py-5 m-0">List your NFT for sale on<br>Magic Eden</h4>
                    <img src="/images/v3/home/functions/1.png">

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class=" text-center radius card-gray">
                    <img src="/images/v3/home/functions/2.png">
                    <h4 class="py-5 m-0">Connect to Web3<br>
                        through <span class="color-gradient">Dapp Browser</span>
                    </h4>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div id="card-chart" class="radius card-gray h-100 d-flex flex-column p-4">
                    <img src="/images/v3/home/functions/cryptocurrency.png" width="50" height="50" class="mb-3">
                    <div>Solana</div>
                    <h2 class="text-violet my-2">$35.43</h2>
                    <div class="d-flex">
                        <div class="text-success me-2 rounded px-1" style="background: rgba(0, 164, 120, 0.2);">
                            +7.81%
                        </div>
                        <div class="text-success">Last hour</div>
                    </div>
                    <h4 class="mt-auto text-center">Detailed asset tracker</h4>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="text-center radius card-gray h-100" style="
                            background-image: url(/images/v3/home/functions/custom.svg);
                            background-repeat: no-repeat;
                            background-position: bottom center;
                        ">
                    <h4 class="py-5 mb-0">Customize your wallet as<br>personal profile</h4>
                    <img src="/images/v3/home/functions/custom.svg" class="w-100 invisible">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="h-100 text-center radius bg-white">
                    <img src="/images/v3/home/functions/cards.png" style="    width: 90%;" class="py-5">
                    <h4 class="text-dark pb-5">Buy Crypto with Cash</h4>

                </div>
            </div>

        </div>
    </div>
</section>
<section class="my-5 py-5"></section>

<section style="min-height: 100vh;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="d-none d-md-flex justify-content-center align-items-center">
                    <img src="/images/v3/home/tweets.png" class="max-width-50 w-100">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="h-100 d-flex">
                    <div class="m-auto">
                        <img src="/images/v3/home/party.png" class="" width="90" height="90">
                        <h1 class="color-gradient fs-80 fw-bold">Loved by <br>everyone</h1>
                        <h1 class="fs-80 fw-bold">who <br> loves <br> metaverse</h1>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6">
                <div id="tweets" class="d-block d-md-none carousel slide pt-5" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-indicators">

                        @for($i = 1; $i < 7; $i++ ) <button type="button" data-bs-target="#tweets" data-bs-slide-to="{{$i-1}}" class="{{$i > 1 ? '' : 'active'}}">

                            </button>
                            @endfor
                    </div>
                    <div class="carousel-inner">
                        @for($i = 1; $i < 7; $i++ ) <div class="carousel-item {{$i > 1 ? '' : 'active'}}">
                            <img src="/images/v3/home/tweets/{{$i}}.png" class=" w-100">
                    </div>
                    @endfor

                </div>
                {{-- <button class="carousel-control-prev" type="button" data-bs-target="#tweets" data-bs-slide="prev">--}}
                {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                {{-- <span class="visually-hidden">Previous</span>--}}
                {{-- </button>--}}
                {{-- <button class="carousel-control-next" type="button" data-bs-target="#tweets" data-bs-slide="next">--}}
                {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                {{-- <span class="visually-hidden">Next</span>--}}
                {{-- </button>--}}
            </div>

        </div>
    </div>
</section>
<section class="my-5 py-5 d-none d-md-block"></section>
<section>
    <div class="fw-bold fs-80 text-center mb-3">
        Start using the<br>
        Ultimate Metaverse Wallet
    </div>
    <h5 class="text-center fw-light mb-3">Setup your first Neko wallet in minutes and watch your asset grow</h5>
    <div class="my-5 py-5"></div>
    <div class="d-flex justify-content-center">
        <a href="https://play.google.com/store/apps/details?id=io.nekoinvest.wallet">
            <object data="/images/v3/web/google_play.svg" type="image/svg+xml"></object>
        </a>
        <div class="mx-2"></div>
        <a href="https://apps.apple.com/bw/app/neko-invest/id1586438402" class="me-3">
            <object data="/images/v3/web/apple_store.svg" type="image/svg+xml"></object>
        </a>
    </div>
</section>
<section class="my-5 py-5"></section>

@endsection
@push('scripts')
<script src="/js/jquery-scrolltofixed-min.js"></script>
{{-- z-index: auto; position: static; top: auto;--}}
{{-- z-index: 1000; position: fixed; top: 0px; margin-left: 0px; width: 2135px; left: 0px;--}}
<script>
    var prevScrollpos = window.pageYOffset;
    var matchSnap = false;
    var currentSnap = 0;
    const handleNavbar = function() {

        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-100%";
        }
        prevScrollpos = currentScrollPos;
    }
    //0 5368.3306250000005
    //      1 6569.2681250000005
    //  2 7198.333125
    const handleSnap = function(e) {
        const items = $('.snap-item');
        if (matchSnap) {
            const n = items.length,
                percent = 1 / n;
            const currentScrollPos = window.pageYOffset;
            const height = $('#snap').outerHeight(true);
            const start = $('#phone').offset().top + $('#phone').outerHeight(true);
            const scrolled = (currentScrollPos - start) / height;
            for (let i = 0; i < n - 1; i++) {
                if (scrolled <= (i + 1) * percent) {
                    if (currentSnap !== i) {

                        const oldItem = $(items[currentSnap]);
                        const item = $(items[i]);
                        oldItem.css({}).animate({
                            opacity: 0
                        }, 200, () => {
                            item.css({}).animate({
                                opacity: 1
                            }, 200);
                            item.find('.position-absolute').each((j, e) => $(e).css('visibility', 'visible').hide().fadeIn(j * 500));
                            oldItem.addClass('d-none');
                            item.removeClass('d-none');

                            item.find('.position-absolute').fadeIn('slow');
                        });
                        currentSnap = i;

                    }
                    break;
                }
            }


        }
        // $(window).bind("scroll", () => {
        //     handleNavbar();
        // });
        // $(this).unbind("scroll");


    }

    $(window).bind("scroll", (e) => {
        // console.log(e)
        handleSnap(e);
        handleNavbar(e);
    });


    $(document).ready(function() {

        $('#snap').scrollToFixed({
            limit: $('#snap').offset().top + 2 * $('#snap').outerHeight(true),
            preFixed: function() {
                matchSnap = true;
                $($('.snap-item')[0]).find('.position-absolute').each((j, e) => $(e).css('visibility', 'visible').hide().fadeIn(j * 500));
            },
            postFixed: function() {
                matchSnap = false;
            },
        });
        // $('#end-snap').scrollToFixed();
        const items = $('.snap-item');

    });
</script>
@endpush
@section('styles')

<style>
    body {

        background: rgba(1, 0, 2, 1);

    }

    html {
        scroll-behavior: smooth;
    }

    .text-feature {
        color: rgba(250, 250, 250, 0.3);
    }

    .color-gradient {
        background: linear-gradient(90.46deg, #CD4DCA 33.07%, #7460CB 53.38%, #1AB4D5 65.85%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

    }

    #features-wrap {
        width: 100%;
        overflow: hidden;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: -1;

        background: linear-gradient(90deg, rgba(255, 255, 255, 0) 4%, rgba(255, 255, 255, .3) 50%, rgba(255, 255, 255, 0) 96%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

    }

    .phone-img {
        /*height: calc(100vh / 3 * 2);*/
        width: 32.9562223vh;
        max-width: 60vw;
    }

    #phone .bg {
        width: 100%;
        bottom: calc(-0.71875 * 100vw);
        z-index: -1;
    }

    section#snap {
        background: rgba(1, 0, 2, 1) url("/images/v3/home/features/bg-half.png") no-repeat center;
        background-size: cover;
        background-position-y: top;
    }


    .snap-item .bg {
        /*:not(:last-child)*/
        /*border: solid 1px red;*/
        /*background: rgba(1, 0, 2, 1) url("/images/v3/home/features/bg-half.png") no-repeat center;*/
        /*background-size: cover;*/
    }

    .feature-paginator {
        position: absolute;
        left: -50px;
        top: 50%;
        transform: translateY(-50%);
        opacity: 1 !important;
        /*display: block !important;*/
        width: 6px;
    }

    .feature-paginator .bg-white {
        height: 40px;
    }

    .feature-paginator .bg-gray {
        height: 20px;
    }

    #card-chart {
        background-image: url(/images/v3/home/functions/chart.svg);
        background-repeat: no-repeat;
        background-position: bottom center;
        background-size: contain;
    }

    .oscilator {
        animation: oscillating 2s ease-in-out infinite alternate;

    }

    @keyframes oscillating {
        0% {
            transform: translateY(-48%);
            /*transform-origin: 50% 0 0;*/
        }

        100% {
            transform: translateY(-52%);
            /*transform-origin: 50% 0 0;*/
        }
    }

    .radius {
        border-radius: 20px;
    }

    .card-gray {
        background-color: var(--gray-color);
    }

    #tweets .carousel-indicators [data-bs-target]:not(.active) {
        width: 10px;
    }

    #tweets .carousel-indicators [data-bs-target] {
        border-top: none;
        border-bottom: none;
        border-radius: 10px;
        width: 20px;
    }

    #tweets .carousel-item {
        text-align: center;
    }

    #tweets .carousel-inner {
        min-height: 350px;
    }

    @media (max-width: 576px) {
        section#snap {

            background-size: contain;

        }

        .feature-paginator {
            transform: none;
            left: 10px;
            bottom: 10vh;
            top: auto;
            width: 3px;
        }

        .feature-paginator .bg-white {
            height: 20px;
        }

        .feature-paginator .bg-gray {
            height: 10px;
        }

        img.w-100 {
            max-width: 85vw;
        }

        #card-chart {
            min-height: 100vw;
        }

        .fs-80 {
            font-size: 60px;
        }
    }
</style>

@endsection
