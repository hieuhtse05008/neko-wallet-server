@extends('web.layout.master-v2')

@section('content')

    <div class="container p-0 p-sm-5">
        <div class="d-none d-sm-flex" style="margin-top: 100px;"></div>
        <div class="row gx-0 position-relative d-none d-sm-flex">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652072352mvzu065mrCU4QVW.png"
                 class="scroll-vertical-up-2"
                 style="width: unset; position: absolute; z-index: -1; left: 15%; top: 0%; transform: translate3d(0px, 59px, 0px);">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/16520737224GvS7tesiRpiZze.png"
                 class="scroll-vertical-up-2"
                 style="width: unset;position: absolute; z-index: -1; top: 90%; right: 12%; transform: translate3d(0px, 59px, 0px);">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652772085GkYsbMM1oc0U2mz.png"
                 class="scroll-vertical-up-3"
                 style="width: unset; position: absolute; z-index: -1; top: -5%; right: 5%; transform: translate3d(0px, 38px, 0px);">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652771953gIhTDpmyBhTyDNq.png"
                 class="scroll-vertical-up-3"
                 style="width: unset;position: absolute; z-index: -1; top: 30%; right: 64%; transform: translate3d(0px, 59px, 0px);">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652082439EkOmKJWKmUqob4M.png"
                 class="scroll-vertical-up-4"
                 style="width: unset; position: absolute; z-index: -1; top: 13%; left: 80%; transform: translate3d(0px, 30.4px, 0px);">

            <div class="col-10 d-flex">

                <div class="m-auto py-5">

                    <h1 class="text-center">Your</h1>

                    <div style="font-size:10rem;line-height: 11rem;" class="fw-bold text-end pe-5">All-in-one</div>
                    <div style="font-size:10rem;line-height: 11rem;" class="fw-bold text-end">solution</div>
                    <div class="d-flex justify-content-end">
                        <h2 class="pe-5 pt-5 text-center">
                            <div>for NFT & Web 3 Gaming experience</div>
                            <a class="btn btn-warning text-white mt-5"
                               href="http://onelink.to/neko-wallet"
                               style="
               padding: 19px 64px;
               background: linear-gradient(200.42deg, #FCA24F 13.57%, #B8681E 98.35%);
               border-radius: 3px;
               font-size: 24px; font-weight: 500;
         ">Download Neko now
                            </a>
                        </h2>

                    </div>

                </div>
            </div>
            <div class="col-2">

            </div>
        </div>
        {{--        mobile --}}
        <div class="row gx-0 position-relative d-flex d-sm-none overflow-hidden">


            <div class="col-12">

                <div class="m-auto py-5 text-center">

                    <h5 class="text-center">Your</h5>

                    <div style="font-size:4rem;line-height: 5rem;" class="fw-bold text-center">All-in-one</div>
                    <div style="font-size:4rem;line-height: 5rem;" class="fw-bold text-center">solution</div>
                    <h4 class="text-center fw-normal my-3">for NFT & Web 3 Gaming experience</h4>
                    <a class="btn btn-sm py-2 mx-2 text-white text-white mt-5 fw-bold"
                         href="http://onelink.to/neko-wallet"
                         style="font-weight: 500;font-size: 18px;width: 90%;background: linear-gradient(200.42deg, #FCA24F 13.57%, #B8681E 98.35%);">
                        Download Neko now
                    </a>

                </div>
            </div>
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/16520737224GvS7tesiRpiZze.png"
                 class="scroll-vertical-up-2"
                 style="width: 20%; position: absolute; z-index: -1; left: 5%; bottom: 40%; transform: translate3d(0px, 15.6px, 0px);">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652072352mvzu065mrCU4QVW.png"
                 class="scroll-vertical-up-2"
                 style="width: unset; position: absolute; z-index: -1; bottom: 10%; right: -25%; transform: translate3d(0px, 15.6px, 0px);">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652772085GkYsbMM1oc0U2mz.png"
                 class="scroll-vertical-up-3"
                 style="width: unset; position: absolute; z-index: -1; bottom: 45%; right: 25%; transform: translate3d(0px, 23.4px, 0px);">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652771953gIhTDpmyBhTyDNq.png"
                 class="scroll-vertical-up-3"
                 style="width: 90%; position: absolute; z-index: -1; bottom: 8%; right: 45%; transform: translate3d(0px, 23.4px, 0px);">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652082439EkOmKJWKmUqob4M.png"
                 class="scroll-vertical-up-4"
                 style="width: 60%; position: absolute; z-index: -1; bottom: 20%; right: 0%; transform: translate3d(0px, 31.2px, 0px);">
            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652082439EkOmKJWKmUqob4M.png" class="invisible"
                 style="">
        </div>
    </div>
    {{--===========================================================================================================================================================================================================--}}
    <div class="container">
        <div style="margin-top: 300px;" class="d-none d-sm-block"></div>

        <div class="row gy-5">
            @foreach($pros as $pro)
                <div class="col-12 col-sm-4">
                    <div class="rounded text-center p-5 shadow-sm"
                         style="background: rgba(255, 255, 255, 0.07);border: 1px solid rgba(255, 255, 255, 0.07); min-height: 300px;">
                        <img loading="lazy" src="{{$pro['img']}}" class="mb-3">
                        <h4>{{$pro['title']}}</h4>
                        <h6 class="text-gray">{{$pro['description']}}</h6>
                    </div>
                </div>
            @endforeach
        </div>
        {{--===========================================================================================================================================================================================================--}}
        <div style="margin-top: 200px;"></div>
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Built by gamers, for gamers</h1>
                <div class="text-gray">Your all-in-one solution for Web3 Gaming experience.</div>
            </div>

            <div class="col-12 col-sm-6 d-none d-sm-flex">
                @foreach($features as $key=>$feature)
                    <div class="{{$key >0 ? 'd-none' : ''}} position-relative visible overflow-hidden d-none-transition"
                         id="feature-left-{{$key}}"
                         style="height: 600px;width: 600px; max-width: 100vw;">
                        <img loading="lazy" class="img position-absolute"
                             src="{{$feature['img']}}"
                             style="width: 600px;height: auto;z-index: 1;max-width: 100vw;"
                        >
                        @foreach($feature['satellites'] as $key2=>$satellite)
                            <div class="planet"
                                 style="animation-delay: -{{$key2*(90/5)}}s; "
                            >
                                <div class="satellite" style="

                                    left: {{($key2 % 3 ) * 50/2 + 75 }}px;
                                    top: {{($key2 % 3 ) * 50/2 + 75 }}px;
                                    animation-delay: -{{$key2*(90/5)}}s;

                                    "

                                >
                                    <img src="{{$satellite}}">

                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>


            <div class="col-5 offset-1 d-none d-sm-block">
                <div class="py-5 ">
                    @foreach($features as $key=>$feature)
                        <div class="pointer px-3" id="feature-{{$key}}" onclick="activeFeature({{$key}})">
                            @if($key > 0)
                                <hr class="w-100 border-top my-5">
                            @endif
                            <div class="d-flex">
                                <img loading="lazy" src="{{$feature['active']}}" width="58" height="58"
                                     id="img-feature-active-{{$key}}"
                                     class="me-4 active {{$key > 0 ? 'd-none' : ''}}">
                                <img loading="lazy" src="{{$feature['inactive']}}" width="58" height="58"
                                     id="img-feature-inactive-{{$key}}"
                                     class="me-4 {{$key == 0 ? 'd-none' : ''}}">
                                <div>
                                    <h4 id="title-feature-{{$key}}"
                                        class="{{$key == 0 ? 'text-main' : ''}}">{{$feature['title']}}</h4>
                                    <h6 class="fw-normal d-flex text-wrap text-gray">{{$feature['description']}}</h6>
                                </div>

                            </div>

                        </div>

                    @endforeach
                </div>
            </div>


        </div>
    </div>
    {{--mobile--}}
    <div class="d-flex d-sm-none">
        @foreach($features as $key=>$feature)
            <div
                class="{{$key >0 ? 'd-none' : ''}} position-relative visible overflow-hidden d-flex align-items-center justify-content-center d-none-transition"
                id="feature-left-mobile-{{$key}}"
                style="    height: 135vw;    width: 100vw;    ">
                <img loading="lazy" class="img position-absolute"
                     src="{{$feature['img']}}"
                     style="width: 100vw;height: auto;z-index: 1;"
                >
                @foreach($feature['satellites'] as $key2=>$satellite)

                    <div class="planet"
                         style="animation-delay: -{{$key2*(90/5)}}s; "
                    >
                        <div class="satellite" style="

                            left: {{($key2 % 3 ) * 25/2  }}px;
                            top: {{($key2 % 3 ) * 25/2  }}px;
                            animation-delay: -{{$key2*(90/5)}}s;

                            "

                        >
                            <img src="{{$satellite}}">

                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <div id="mobileCarousel" class="d-block d-sm-none carousel slide mt-5 pt-5" data-bs-ride="carousel"
         style="height: 180px;">
        <div class="carousel-inner">
            @foreach($features as $key=>$feature)
                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                    <div class="pointer px-3"
                         onclick="activeFeature({{$key}})"
                    >

                        <div class="d-flex">
                            <img loading="lazy" src="{{$feature['active']}}" width="58" height="58"
                                 id="img-feature-active-{{$key}}"
                                 class="me-4 active ">

                            <div>
                                <h4 id="title-feature-{{$key}}"
                                    class="text-main">{{$feature['title']}}</h4>
                                <h6 class="fw-normal d-flex text-wrap text-gray">{{$feature['description']}}</h6>
                            </div>

                        </div>

                    </div>
                </div>


            @endforeach

        </div>
        <div class="carousel-indicators position-static mt-4">
            <button type="button" data-bs-target="#mobileCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#mobileCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#mobileCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

    </div>
    {{--===========================================================================================================================================================================================================--}}
    <div class="container">
        <div style="margin-top: 200px;"></div>

        <div class="row g-4 row-eq-height">
            <div class="col-12 text-center mt-5 pb-5">
                <h1>Tailored experience for<br>
                    Web3 Gaming enthusiasts</h1>
                <div class="text-gray">A metaverse wallet any-one can use</div>
            </div>
            <div class="col-1 d-none d-sm-block"></div>
            <div class="col-12 col-sm-10">
                <div class="rounded  p-3  p-sm-5 card-gray shadow-sm"
                     style="">
                    <div class="d-flex justify-content-around align-items-center  flex-column flex-sm-row">
                        <div>
                            <h5>Seamlessly</h5>
                            <h4 class="text-main py-3">Buy & Sell your Game Tokens </h4>
                            <div class="text-gray">Swap between assets that belong to <br> different blockchain network
                                with our <br> cross-chain protocol.
                            </div>
                        </div>
                        <div>
                            <img loading="lazy" class="w-100 mt-5 pt-3 mt-sm-0"
                                 src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652155806dbTZg65fgyaMEb9.png">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-1 d-none d-sm-block"></div>
            <div class="col-1 d-none d-sm-block"></div>

            <div class="col-12 col-sm-5 order-1 order-md-0">
                <div class="rounded h-100 card-gray shadow-sm">
                    <div class="d-flex flex-column h-100 rounded"
                         style=" background-image: url(http://d1j8r0kxyu9tj8.cloudfront.net/files/1652159538aNEQZqlkXFlwKSd.png); background-repeat: no-repeat; background-size: contain; background-position-x: center; background-position-y: bottom;">

                        <div class="p-4 ">
                            <h4 class="text-main pb-2">Take full control of your portfolio </h4>
                            <div class="text-gray">Our detailed Portfolio tracker keeps you well informed on your
                                investment.
                            </div>
                        </div>
                        <div class="d-block d-sm-flex h-100">
                            <div class="mt-auto mx-auto d-flex"
                                 style="image-rendering: -webkit-optimize-contrast;">

                                {!! file_get_contents("http://d1j8r0kxyu9tj8.cloudfront.net/files/1652519145FMUyNHfarKrTfXa.svg") !!}
                            </div>

                            {{--                            <img  loading="lazy" src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652159536v6MdJWJLf4BjPMK.png"--}}
                            {{--                                 class="mt-auto mx-auto"--}}
                            {{--                                 style="width: 100%;image-rendering: -webkit-optimize-contrast;">--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-5">
                <div class="rounded h-100 shadow-sm"
                     style="background: linear-gradient(200.42deg, rgba(252, 162, 79, 0.24) 13.57%, rgba(184, 104, 30, 0.12) 98.35%);border: 1px solid rgba(255, 255, 255, 0.07);border-radius: 3px;"
                >
                    <div class="rounded h-100"
                         style=" background-image: url(http://d1j8r0kxyu9tj8.cloudfront.net/files/1652523684k0MkHTZlcQFMXuL.png); background-repeat: no-repeat; background-position-x: center; background-position-y: bottom;     background-size: 60% auto;"
                    >

                        <div class="p-4 ">
                            <h4 class="text-main pb-2">Multi-wallet management </h4>
                            <div class="text-gray">Toggle seamlessly between your different wallets in one click.</div>
                        </div>

                        <div class="pt-0 mt-0  pt-sm-5 mt-sm-5 d-flex">
                            <img loading="lazy" class="invisible" style="    max-height: 80vw;" width="auto"
                                 height="auto"
                                 src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652523684k0MkHTZlcQFMXuL.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--===========================================================================================================================================================================================================--}}
        <div class="d-none d-sm-flex" style="margin-top: 200px;"></div>
        <div class="d-flex d-sm-none" style="margin-top: 50px;"></div>
        <div class="row">
            <div class="col-12 col-sm-5 overflow-hidden d-flex">

                <div class="design-wrap d-flex design-wrap flex-column position-relative" id="designs"
                     style="">
                    <div class="d-flex align-items-center design-left" id="design-left"
                         style="    position: absolute;top: 135px;">
                        Designed for
                        <div class="needle mx-3 mx-sm-4"></div>
                    </div>
                    @foreach($designs as $key=>$design)
                        <div
                            class=" design-item d-flex align-items-center py-3 position-relative {{$key==2 ? 'active' : ''}} "
                            {{--                            id="design-item-{{$key}}"--}}
                        >

                            <div class="d-flex align-items-center design-left invisible">
                                Designed for
                                <div class="needle  mx-3 mx-sm-4"></div>
                            </div>
                            <div class="design-title ">
                                <div class="design-title-mask">{{$design}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--                <button onclick="nextDesign()">Move</button>--}}
            </div>
            <div class="col-1 d-none d-sm-block"></div>
            <div class="col-12 col-sm-6">
                <div class="py-5">
                    <h1 class="text-center text-sm-end">Ready to use the ultimate <br class="d-none d-sm-block">
                        Metaverse Wallet?</h1>
                    <div class="my-5"></div>
                    <div class="pointer d-flex align-items-center justify-content-sm-end justify-content-center">
                        <a href="https://apps.apple.com/bw/app/neko-invest/id1586438402" class="me-3">
                            <img loading="lazy"
                                 src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652070264oTiwuzsFfBW5v82.png"
                                 class="rounded-3"/>
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=io.nekoinvest.wallet">

                            <img loading="lazy"
                                 src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652070268QfV4rizJ5hzOb8s.png"
                                 class="rounded-3"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{--===========================================================================================================================================================================================================--}}
        <div style="margin-top: 200px;" class="d-none d-sm-block"></div>
        <div class="align-items-center d-sm-flex justify-content-between d-none">
            @foreach($partners as $partner)
                <div>
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
        <div style="margin-top: 100px;" class="py-0 py-sm-5"></div>

    </div>




@endsection
@push('scripts')
    <script>
        //=============================================================================================================
        const mobileCarousel = document.querySelector('#mobileCarousel')

        mobileCarousel.addEventListener('slide.bs.carousel', function (e) {
            // $(`#feature-left-mobile-${e.from}`).addClass('d-none');
            // $(`#feature-left-mobile-${e.to}`).removeClass('d-none');
        })
        //=============================================================================================================
        const _designs = {!! collect($designs) !!};

        function nextDesign() {
            const wrapper = $(`#designs`);
            const newChild = wrapper.children().last().clone();
            const firstChild = wrapper.children('.design-left');
            newChild.insertAfter(firstChild);
            const children = wrapper.children('.design-item');
            if (children.length > 6) return;
            children.each(function () {
                const e = $(this);
                e.css({top: '-60px'});
            });

            children.each(function (i) {
                const e = $(this);
                e.css({}).animate({top: `+=60px`}, 200);


            });

            setTimeout(function () {
                children.eq(2).addClass('active');
                children.eq(3).removeClass('active');
                wrapper.children('.design-item').last().remove();
            }, 200);


        }

        setInterval(nextDesign, 1500);
        //=============================================================================================================
        const featureCount = {{count($features)}};

        function activeFeature(index) {
            for (let i = 0; i < featureCount; i++) {
                const iconActive = document.getElementById(`img-feature-active-${i}`);
                const iconInactive = document.getElementById(`img-feature-inactive-${i}`);
                const title = document.getElementById(`title-feature-${i}`);
                const left = document.getElementById(`feature-left-${i}`);
                if (i === index) {
                    left.classList.remove('d-none');
                    iconActive.classList.remove('d-none');
                    iconInactive.classList.add('d-none');
                    title.classList.add('text-main');
                } else {
                    left.classList.add('d-none');
                    iconActive.classList.add('d-none');
                    iconInactive.classList.remove('d-none');
                    title.classList.remove('text-main');
                }
            }
        }


    </script>
@endpush
@section('styles')
    <style>
        body {
            /*background: url("http://d1j8r0kxyu9tj8.cloudfront.net/files/1652070666CoBNfjPfA1fkcum.png") top/cover;*/
            /*background: url("http://d1j8r0kxyu9tj8.cloudfront.net/files/1652684275vmAwY81bOKIe7Ck.svg") top/cover;*/
            background: url("http://d1j8r0kxyu9tj8.cloudfront.net/files/1652776698eaUeX3pEhcBfI67.webp") top/cover;


            /*min-height: 4659px;*/

            transform-style: flat;

            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            /*background: url("data:image/svg+xml,%3Csvg width='1600' height='4659' viewBox='0 0 1600 4659' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg clip-path='url(%23clip0_1894_5610)'%3E%3Crect width='1600' height='4659' fill='%23161C2A'/%3E%3Cg opacity='0.4'%3E%3Cg filter='url(%23filter0_f_1894_5610)'%3E%3Cellipse rx='683' ry='623' transform='matrix(1 0 0 -1 1337 2258)' fill='%234D3589'/%3E%3C/g%3E%3Cg filter='url(%23filter1_f_1894_5610)'%3E%3Cellipse rx='651.829' ry='344.872' transform='matrix(0.983125 -0.182937 -0.182937 -0.983125 269.107 2505.07)' fill='%230025CE'/%3E%3C/g%3E%3Cg filter='url(%23filter2_f_1894_5610)'%3E%3Cpath d='M757 2515C197.742 2544.51 25.5005 3071.5 -169 3056.5C-413.5 3037.64 -367.943 2543.34 -169 2355C65.5005 2133 1136 2495 757 2515Z' fill='%2300EAFF'/%3E%3C/g%3E%3Cg filter='url(%23filter3_f_1894_5610)'%3E%3Cellipse rx='295.5' ry='265' transform='matrix(1 0 0 -1 -23.5 2958)' fill='%23303E57'/%3E%3C/g%3E%3C/g%3E%3Cg opacity='0.4'%3E%3Cg filter='url(%23filter4_f_1894_5610)'%3E%3Cellipse cx='490.907' cy='536.139' rx='408.405' ry='226.668' transform='rotate(-157.625 490.907 536.139)' fill='%230034EB'/%3E%3C/g%3E%3Cg filter='url(%23filter5_f_1894_5610)'%3E%3Ccircle cx='876.348' cy='727.5' r='279.5' transform='rotate(-180 876.348 727.5)' fill='%23425680'/%3E%3C/g%3E%3Cg filter='url(%23filter6_f_1894_5610)'%3E%3Cellipse cx='-97.2979' cy='62.6104' rx='918.493' ry='283' transform='rotate(-150.605 -97.2979 62.6104)' fill='%230A34CD'/%3E%3C/g%3E%3Cg filter='url(%23filter7_f_1894_5610)'%3E%3Cellipse cx='572.556' cy='73.3101' rx='1384.58' ry='372.11' transform='rotate(-156.669 572.556 73.3101)' fill='%2300F3F9'/%3E%3C/g%3E%3Cg filter='url(%23filter8_f_1894_5610)'%3E%3Cellipse cx='159.348' cy='50' rx='486.5' ry='121' transform='rotate(-180 159.348 50)' fill='%2381FFD9'/%3E%3C/g%3E%3C/g%3E%3Cg opacity='0.4'%3E%3Cg filter='url(%23filter9_f_1894_5610)'%3E%3Cellipse cx='1395.96' cy='4593.78' rx='769.889' ry='451.758' transform='rotate(-8.9599 1395.96 4593.78)' fill='%230034EB'/%3E%3C/g%3E%3Cg opacity='0.4' filter='url(%23filter10_f_1894_5610)'%3E%3Cellipse cx='1538' cy='4398.82' rx='291' ry='324.5' fill='%2300EAFF'/%3E%3C/g%3E%3Cg opacity='0.4' filter='url(%23filter11_f_1894_5610)'%3E%3Cellipse cx='1664.34' cy='3977.12' rx='281.5' ry='372' transform='rotate(-14.0221 1664.34 3977.12)' fill='%2300EAFF'/%3E%3C/g%3E%3Cg filter='url(%23filter12_f_1894_5610)'%3E%3Cellipse cx='-355' cy='4731.32' rx='1251' ry='657' fill='%23005080'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3Cdefs%3E%3Cfilter id='filter0_f_1894_5610' x='354' y='1335' width='1966' height='1846' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='150' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter1_f_1894_5610' x='-774.867' y='1745.56' width='2087.95' height='1519.02' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='200' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter2_f_1894_5610' x='-535.728' y='2083.22' width='1573.16' height='1173.59' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='100' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter3_f_1894_5610' x='-619' y='2393' width='1191' height='1130' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='150' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter4_f_1894_5610' x='-246.567' y='-74.8421' width='1474.95' height='1221.96' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='175' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter5_f_1894_5610' x='296.848' y='148' width='1159' height='1159' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='150' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter6_f_1894_5610' x='-1159.64' y='-701.332' width='2124.68' height='1527.88' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='125' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter7_f_1894_5610' x='-1057.44' y='-922.868' width='3260' height='1992.36' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='175' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter8_f_1894_5610' x='-527.152' y='-271' width='1373' height='642' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='100' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter9_f_1894_5610' x='232.172' y='3731.6' width='2327.58' height='1724.38' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='200' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter10_f_1894_5610' x='1047' y='3874.32' width='982' height='1049' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='100' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter11_f_1894_5610' x='1176.66' y='3409.75' width='975.357' height='1134.74' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='100' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter12_f_1894_5610' x='-1906' y='3774.32' width='3102' height='1914' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='150' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3CclipPath id='clip0_1894_5610'%3E%3Crect width='1600' height='4659' fill='white'/%3E%3C/clipPath%3E%3C/defs%3E%3C/svg%3E") top/cover;*/


        }

        @media (min-width: 1024px) {
            body {
                /*background: url("data:image/svg+xml,%3Csvg width='1600' height='4659' viewBox='0 0 1600 4659' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg clip-path='url(%23clip0_1894_5610)'%3E%3Crect width='1600' height='4659' fill='%23161C2A'/%3E%3Cg opacity='0.4'%3E%3Cg filter='url(%23filter0_f_1894_5610)'%3E%3Cellipse rx='683' ry='623' transform='matrix(1 0 0 -1 1337 2258)' fill='%234D3589'/%3E%3C/g%3E%3Cg filter='url(%23filter1_f_1894_5610)'%3E%3Cellipse rx='651.829' ry='344.872' transform='matrix(0.983125 -0.182937 -0.182937 -0.983125 269.107 2505.07)' fill='%230025CE'/%3E%3C/g%3E%3Cg filter='url(%23filter2_f_1894_5610)'%3E%3Cpath d='M757 2515C197.742 2544.51 25.5005 3071.5 -169 3056.5C-413.5 3037.64 -367.943 2543.34 -169 2355C65.5005 2133 1136 2495 757 2515Z' fill='%2300EAFF'/%3E%3C/g%3E%3Cg filter='url(%23filter3_f_1894_5610)'%3E%3Cellipse rx='295.5' ry='265' transform='matrix(1 0 0 -1 -23.5 2958)' fill='%23303E57'/%3E%3C/g%3E%3C/g%3E%3Cg opacity='0.4'%3E%3Cg filter='url(%23filter4_f_1894_5610)'%3E%3Cellipse cx='490.907' cy='536.139' rx='408.405' ry='226.668' transform='rotate(-157.625 490.907 536.139)' fill='%230034EB'/%3E%3C/g%3E%3Cg filter='url(%23filter5_f_1894_5610)'%3E%3Ccircle cx='876.348' cy='727.5' r='279.5' transform='rotate(-180 876.348 727.5)' fill='%23425680'/%3E%3C/g%3E%3Cg filter='url(%23filter6_f_1894_5610)'%3E%3Cellipse cx='-97.2979' cy='62.6104' rx='918.493' ry='283' transform='rotate(-150.605 -97.2979 62.6104)' fill='%230A34CD'/%3E%3C/g%3E%3Cg filter='url(%23filter7_f_1894_5610)'%3E%3Cellipse cx='572.556' cy='73.3101' rx='1384.58' ry='372.11' transform='rotate(-156.669 572.556 73.3101)' fill='%2300F3F9'/%3E%3C/g%3E%3Cg filter='url(%23filter8_f_1894_5610)'%3E%3Cellipse cx='159.348' cy='50' rx='486.5' ry='121' transform='rotate(-180 159.348 50)' fill='%2381FFD9'/%3E%3C/g%3E%3C/g%3E%3Cg opacity='0.4'%3E%3Cg filter='url(%23filter9_f_1894_5610)'%3E%3Cellipse cx='1395.96' cy='4593.78' rx='769.889' ry='451.758' transform='rotate(-8.9599 1395.96 4593.78)' fill='%230034EB'/%3E%3C/g%3E%3Cg opacity='0.4' filter='url(%23filter10_f_1894_5610)'%3E%3Cellipse cx='1538' cy='4398.82' rx='291' ry='324.5' fill='%2300EAFF'/%3E%3C/g%3E%3Cg opacity='0.4' filter='url(%23filter11_f_1894_5610)'%3E%3Cellipse cx='1664.34' cy='3977.12' rx='281.5' ry='372' transform='rotate(-14.0221 1664.34 3977.12)' fill='%2300EAFF'/%3E%3C/g%3E%3Cg filter='url(%23filter12_f_1894_5610)'%3E%3Cellipse cx='-355' cy='4731.32' rx='1251' ry='657' fill='%23005080'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3Cdefs%3E%3Cfilter id='filter0_f_1894_5610' x='354' y='1335' width='1966' height='1846' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='150' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter1_f_1894_5610' x='-774.867' y='1745.56' width='2087.95' height='1519.02' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='200' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter2_f_1894_5610' x='-535.728' y='2083.22' width='1573.16' height='1173.59' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='100' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter3_f_1894_5610' x='-619' y='2393' width='1191' height='1130' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='150' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter4_f_1894_5610' x='-246.567' y='-74.8421' width='1474.95' height='1221.96' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='175' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter5_f_1894_5610' x='296.848' y='148' width='1159' height='1159' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='150' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter6_f_1894_5610' x='-1159.64' y='-701.332' width='2124.68' height='1527.88' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='125' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter7_f_1894_5610' x='-1057.44' y='-922.868' width='3260' height='1992.36' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='175' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter8_f_1894_5610' x='-527.152' y='-271' width='1373' height='642' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='100' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter9_f_1894_5610' x='232.172' y='3731.6' width='2327.58' height='1724.38' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='200' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter10_f_1894_5610' x='1047' y='3874.32' width='982' height='1049' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='100' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter11_f_1894_5610' x='1176.66' y='3409.75' width='975.357' height='1134.74' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='100' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3Cfilter id='filter12_f_1894_5610' x='-1906' y='3774.32' width='3102' height='1914' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='BackgroundImageFix' result='shape'/%3E%3CfeGaussianBlur stdDeviation='150' result='effect1_foregroundBlur_1894_5610'/%3E%3C/filter%3E%3CclipPath id='clip0_1894_5610'%3E%3Crect width='1600' height='4659' fill='white'/%3E%3C/clipPath%3E%3C/defs%3E%3C/svg%3E") top/cover;*/
            }
        }
    </style>

@endsection


