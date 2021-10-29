<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield("meta")
    <title>Neko Invest</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/logo/neko-logo-orange.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/web/main.css?123">

    <style>
        @import "/css/fontawesome/fontawesome.css";
    </style>
    @yield('styles')

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light  bg-white">
    <div class="container-md">
        <a class="navbar-brand" href="{{route('home')}}">
            <img width="100" height="28" src="/images/logo/long-orange-text-black-neko.svg" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Link</a>--}}
{{--                </li>--}}
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
            <form class="d-flex">
                <div class="ms-auto d-flex">
                    <div class="dropdown">
                        <div class="btn btn-sm rounded btn-main py-2 px-3 dropdown-toggle me-2" type="button"
                             id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ strtoupper($locale) }}
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
                    <a href="https://docs.nekoinvest.io/" target="_blank" class="btn btn-sm rounded btn-main py-2 px-3">Litepaper</a>
                </div>
{{--                <div class="ms-auto">--}}
{{--                    <a href="/#input-early-access-email" class="hide-from-home btn btn-sm rounded btn-main ">Get early--}}
{{--                        access</a>--}}
{{--                </div>--}}
            </form>
        </div>
    </div>
</nav>


@yield('content')
<footer>
    <div class="container-md">
        <div id="footer-wrap" class=" py-5">
            <div class="row py-0 py-sm-5">
                <div class="col-md-3 mb-5">
                    <a href="/">
                        <img width="50" src="/images/no_padding_light.png" alt="">
                    </a>
                </div>

                <div class="col-md-3 col-6 mb-3 text-white">
                    <div class="mb-3"><a href="{{route('home')}}">{{__('web.homepage')}}</a></div>
                    <div class="mb-3"><a href="{{route('blogs')}}">{{__('web.blog')}}</a></div>
                    <div class="mb-sm-0">
                        <a target="_blank" href="https://docs.nekoinvest.io/" class="pointer">
                            Litepaper
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-5 text-white">
                    <div class="mb-3"><a href="{{route('cryptocurrencies')}}">{{__('web.how_to_buy')}}</a></div>
                    <div class="mb-3"><a>Brand assets</a></div>
                    <div class="mb-sm-0"><a class="pointer" data-bs-toggle="modal"
                                            data-bs-target="#modal-check-my-spot">Check my spot</a></div>
                </div>
                <div class="text-white mb-3 col-md-3">
                    <div class="d-flex">
                        <div class="me-5"><a href="https://twitter.com/Neko_Invest"><i class="fab fa-twitter"></i></a>
                        </div>
                        <div class="me-5"><a href="https://t.me/nekoinvest"><i class="fab fa-telegram-plane"></i></a>
                        </div>
                        <div><a href="https://discord.gg/898xnMFXkU"><i class="fab fa-discord"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="/js/vue.js"></script>
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

{{--<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>--}}
{{--<script>--}}
{{--    function addDarkmodeWidget() {--}}
{{--        new Darkmode().showWidget();--}}
{{--    }--}}
{{--    window.addEventListener('load', addDarkmodeWidget);--}}
{{--</script>--}}
@stack('scripts')

</body>
</html>
