@extends('v3.layout.master')
@section('content')
    <section class="">
        <div class="text-center" style="margin-top: 25vh;">
            <h1 id="first-title" class="fs-60px">Your All-in-one Solution</h1>
            <h1 class="fs-60px mb-3">For NFT & Web3</h1>
            <div class="mb-5 d-none d-sm-block">
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
            <div class="mb-5 d-block d-sm-none px-2">

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
    <section class="" style="margin-top: 25vh;">
        <div class="text-center position-relative">
            <div id="features-wrap">
                @foreach($features as $items)
                    <h2 class="text-feature text-nowrap">
                        @for($i = 1; $i <= 5; $i++)
                            @foreach($items as $key=>$item)
                                {{$item}} {{' • '}}
                            @endforeach
                        @endfor

                    </h2>
                @endforeach
            </div>

            {{--            <img src="/images/v3/home/phone.png" style="height: calc(100vh / 3 * 2)">--}}
            <img src="/images/v3/home/phone.webp" style="height: calc(100vh / 3 * 2)">
        </div>
        <div class="mt-5 py-5">

        </div>

        <div class="text-center mb-5">
            Neko is now in Alpha mode<br>
            That means our community gets invited to help us to<br>
            test our product and making it become the favorite<br>
            wallet for all people
        </div>
        <div class="text-center mb-5">

            <a href="https://discord.gg/898xnMFXkU"
               class="btn rounded-pill text-white bg-discord d-inline-flex px-5 py-3 fw-light">
                <h3 class="m-0" style="line-height: 0;"><i class="fab fa-discord text-white me-2 "></i></h3>
                <h4 class="m-0 fw-normal">Join our Discord</h4>
            </a>
        </div>
        <div class="container align-items-center d-sm-flex justify-content-between d-none">
            @foreach($partners as $partner)
                <div class="">
                    <img loading="lazy" src="{{$partner}}">
                </div>
            @endforeach
        </div>
        <div class="align-items-center d-flex justify-content-between w-100 d-sm-none py-3"
             style="overflow-x: scroll; overflow-y:hidden; ">
            @foreach($partners as $partner)
                <div class="me-5">
                    <img loading="lazy" src="{{$partner}}">
                </div>
            @endforeach
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function () {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-100%";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
@endpush
@section('styles')

    <style>
        body {
            background: rgba(1, 0, 2, 1);
        }

        .text-feature {
            color: rgba(250, 250, 250, 0.3);
        }

        #first-title {
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

    </style>
@endsection
