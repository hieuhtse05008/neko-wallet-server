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
    <link rel="stylesheet" href="/css/web/main-v2.css?123">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
{{--    <style>--}}
{{--        @import "/css/fontawesome/fontawesome.css";--}}
{{--    </style>--}}
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
            const levels = [1,2,3,4,5];
            levels.forEach(level=>{
                try {
                    [...document.querySelectorAll(`.scroll-vertical-up-${level}`)].forEach(e=>{
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link active" href="#">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Learn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Support</a>
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
                    <div class="pointer d-flex align-items-center" style="max-width: 300px">
                        <a href="https://apps.apple.com/bw/app/neko-invest/id1586438402"  class="me-3 ">
                            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652070264oTiwuzsFfBW5v82.png"  class="rounded-3"/>
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=io.nekoinvest.wallet">

                            <img src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1652070268QfV4rizJ5hzOb8s.png" class="rounded-3"/>
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
                <div class="col-md-3 p-5">
                    <a href="/">
                        <img width="42" src="/images/no_padding_light.png" alt="">
                    </a>
                </div>

                <div class="col-md-3 col-6 p-5 text-gray border-end border-gray">
                    <div class="mb-3"><a href="{{route('home')}}">{{__('web.homepage')}}</a></div>
                    <div class="mb-3"><a href="{{route('blogs')}}">{{__('web.blog')}}</a></div>
                    <div class="mb-3"><a href="{{route('home')}}">{{__('web.homepage')}}</a></div>
                    <div class="mb-3"><a href="{{route('blogs')}}">{{__('web.blog')}}</a></div>
                    <div class="mb-3"><a href="{{route('home')}}">{{__('web.homepage')}}</a></div>
                    <div class="mb-3"><a href="{{route('blogs')}}">{{__('web.blog')}}</a></div>
                    <div class="mb-sm-0">
                        <a target="_blank" href="https://docs.nekoinvest.io/" class="pointer">
                            Litepaper
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6 p-5 text-gray border-end border-gray">
                    <div class="mb-3"><a href="{{route('cryptocurrencies')}}">{{__('web.how_to_buy')}}</a></div>
                    <div class="mb-3"><a>Brand assets</a></div>
                    <div class="mb-sm-0"><a class="pointer" data-bs-toggle="modal"
                                            data-bs-target="#modal-check-my-spot">Check my spot</a></div>
                </div>
                <div class="text-gray p-5 col-md-3">
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
    <hr class="m-0">
    <div class="container-md">
        <div class="d-flex justify-content-between align-items-center py-4">
            <div>Copyright © 2022 Neko Global. All rights reserved.</div>
            <div>Copyright © 2022 Neko Global. All rights reserved.</div>
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

@stack('scripts')

</body>
</html>
