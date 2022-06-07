<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield("meta")

    <title>Neko Wallet</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/logo/neko-logo-orange.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/web/main-v2.css?1233">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
          rel="stylesheet">
    <style>
        @import "/css/fontawesome/fontawesome.css";
    </style>
    @yield('styles')

    <script>
        function trans(element, rate) {
            var parent = element;
            while (!parent.classList.contains('container')) {
                parent = parent.parentElement;
            }
            var difference = window.pageYOffset - parent.offsetTop;

            if (difference > -500) {
                var velocity = difference * rate;

                element.style.transform = 'translate3d(0px, ' + velocity + 'px,0px)';
            }

        };
        window.addEventListener('scroll', function () {
            var scrolled = window.pageYOffset;
            const levels = [1, 2, 3, 4, 5];
            levels.forEach(level => {
                try {
                    [...document.querySelectorAll(`.scroll-vertical-up-${level}`)].forEach(e => {
                        trans(e, -0.1 * level);
                    });
                } catch (error) {

                }
            });


        });
    </script>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark  bg-transparent">
    <div class="container-md">
        <a class="navbar-brand" href="{{route('home')}}">

            <img width="42" src="/images/no_padding_light.png" alt="">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
                {{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" href="#">Overview</a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('blogs')}}">Learn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('faqs')}}">Support</a>
                </li>
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
                {{--                        Dropdown--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                {{--                        <li><a class="dropdown-item" href="#">Action</a></li>--}}
                {{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
                {{--                        <li><hr class="dropdown-divider"></li>--}}
                {{--                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
                {{--                </li>--}}
            </ul>
            <form class="d-block d-sm-flex">
                <div class="ms-auto d-flex mb-2 mb-sm-0">
                    <div class="dropdown ">
                        <div class="btn btn-sm rounded btn-main py-2 px-3 dropdown-toggle me-2 text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            EN
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach($locales as $lang)
                                <li>
                                    @if($lang !== $locale)
                                        <a href="{{request()->url()}}?redirect_locale={{$lang}}"
                                           class="dropdown-item pointer">{{ __("web.$lang") }}</a>
                                    @else
                                        <a href="#" class="dropdown-item pointer">{{ __("web.$lang") }}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    </div>
                <div class="ms-auto d-flex">

                <div class="pointer d-flex align-items-center" style="max-width: 300px">
                        <a href="https://play.google.com/store/apps/details?id=io.nekoinvest.wallet" class="me-3 " class="shadow-sm">
{{--                            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652070264oTiwuzsFfBW5v82.png" class="rounded-3">--}}
                            {!! file_get_contents("http://d1j8r0kxyu9tj8.cloudfront.net/files/1653276286WEsctcH0oa9e4sq.svg") !!}

                        </a>
                        <a href="https://apps.apple.com/bw/app/neko-invest/id1586438402" class="shadow-sm">
{{--                            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652070268QfV4rizJ5hzOb8s.png" class="rounded-3">--}}
                            {!! file_get_contents("http://d1j8r0kxyu9tj8.cloudfront.net/files/1653276620pg71wEkqZEzA2wh.svg") !!}


                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</nav>


@yield('content')
<footer
    {{--    class="border-top border-gray"--}}
>
    <hr class="m-0">
    <div class="container-md">
        <div class="row">
            <div class="col-md-2 col-12 p-5 text-center text-sm-start">
                <a href="/">
                    <img width="42" height="42" src="/images/no_padding_light.png" alt="">
                </a>
            </div>
            <div class="col-md-3 col-12 p-5 pt-0 pt-sm-5 text-gray text-center text-sm-start">
                <div class="mb-3"><a href="#">About us</a></div>

                <div class="mb-3"><a href="{{route('blogs')}}">Learn</a></div>
                <div class="mb-3"><a href="{{route('faqs')}}">Support</a></div>
                <div class="mb-3"><a href="/terms-of-service">Terms of Service</a></div>
                <div class="mb-3"><a href="/privacy-policy">Privacy Policy</a></div>
                {{--                    <div class="mb-sm-0">--}}
                {{--                        <a target="_blank" href="https://docs.nekoinvest.io/" class="pointer">--}}
                {{--                            Litepaper--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
            </div>
            <div class="border-end border-gray col-auto p-0"></div>

            <div class="col-md-3 col-12 p-5 px-0 px-sm-5 text-white text-center text-sm-start">
                <h5 class="mb-4">
                    Join us on
                </h5>
                <div class="d-flex justify-content-between d-sm-block">
                    <div class="mb-3">
                        <a href="https://twitter.com/nekowallet"><i
                                class="fab fa-twitter bg-white me-2 p-2 rounded-circle text-dark"></i> Twitter</a>
                    </div>
                    <div class="mb-3">
                        <a href="https://t.me/nekoinvest"><i
                                class="fab fa-telegram-plane bg-white me-2 p-2 rounded-circle text-dark"></i> Telegram</a>
                    </div>
                    <div class="mb-3">
                        <a href="https://discord.gg/898xnMFXkU"><i
                                class="fab fa-discord bg-white me-2 p-2 rounded-circle text-dark"></i> Discord</a>
                    </div>
                </div>

            </div>
            <div class="border-end border-gray col-auto p-0"></div>

            <div class="p-5 col-md-3 col-12 text-center text-sm-start ">
                <h5 class="mb-4 tex">For partnership</h5>
                <div class="mb-1">Contact us</div>
                <div class="mb-3"><a href="mailto:info@nekowallet.io">info@nekowallet.io</a></div>
            </div>
        </div>

    </div>
    <hr class="m-0">
    <div class="container-md">
        <div class="d-flex justify-content-between align-items-center flex-column flex-sm-row py-4">
            <div class="text-gray text-center text-gray text-sm-start">Copyright © 2022 Neko Global. <br class="d-block d-sm-none"> All rights reserved.</div>
            <div class="mt-3 d-block d-sm-none"></div>
            <div onclick="document.body.scrollTop = 0;document.documentElement.scrollTop = 0;"
                 class="d-flex align-items-center pointer text-gray justify-content-center">
                Back to top
                <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652501566cOmWW7pIToQR1ik.png" height="32"
                     width="32" class="ms-2">
            </div>
        </div>
    </div>
</footer>

<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/axios.js"></script>
<script src="/js/jquery.min.js"></script>
<script>
    _token = "{{ csrf_token() }}";
    _locale = '{{$locale}}';
    axios.defaults.withCredentials = true;
    axios.defaults.credentials = true;


</script>
@include('web.modal.check_my_spot')

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q091EE5SJE"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-Q091EE5SJE');
</script>

@stack('scripts')

</body>
</html>
