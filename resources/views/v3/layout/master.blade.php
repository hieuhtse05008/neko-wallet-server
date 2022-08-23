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


    <link rel="stylesheet" href="/css/web/main-v3.css?1233">
    <link rel="stylesheet" href="/css/fontawesome/fontawesome.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
          rel="stylesheet">

    @yield('styles')

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark  bg-transparent sticky-top" id="navbar">
    <div class="container-md">
        <a class="navbar-brand" href="{{route('home')}}">

            <img width="42" src="/images/no_padding_light.png" alt="">

        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            {{--            <span class="navbar-toggler-icon"></span>--}}
            <i class="far fa-bars text-white"></i>
            <i class="far fa-times text-white"></i>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div id="nav-content-mobile" class="align-items-center d-flex d-md-none flex-column h-100 justify-content-center">{{--mobile--}}
                    <div class="d-flex flex-column align-items-center my-5 py-5">
                        <a class="fs-1 fw-bold mb-4" href="#">About</a>
                        <a class="fs-1 fw-bold mb-4" href="{{route('blogs')}}">Blog</a>
                        <a class="fs-1 fw-bold mb-4" href="{{route('faqs')}}">Support</a>
                    </div>
                    <div class="d-flex justify-content-center mb-5">
                        <a href="https://play.google.com/store/apps/details?id=io.nekoinvest.wallet">
                            <object data="/images/v3/web/google_play.svg" type="image/svg+xml"></object>
                        </a>
                        <div class="mx-2"></div>
                        <a href="https://apps.apple.com/bw/app/neko-invest/id1586438402" class="me-3">
                            <object data="/images/v3/web/apple_store.svg" type="image/svg+xml"></object>
                        </a>
                    </div>
                    <hr class="w-100">
                    <div class="container-md">
                        <div class="d-flex justify-content-between align-items-center flex-column flex-sm-row py-4">
                            <div>
                                <div class="text-gray text-center text-gray text-sm-start">© 2022 Neko Global.</div>
                                <div class="text-gray">For partnership, contact us <a class="fw-bold text-white"
                                                                                      href="mailto:info@nekowallet.io">info@nekowallet.io</a>
                                </div>
                                <div class="d-flex mt-3 justify-content-center justify-content-md-start">
                                    <div class="mb-3 text-gray"><a href="/terms-of-service">Terms of Service</a></div>
                                    <div class="mx-2">•</div>
                                    <div class="mb-3 text-gray"><a href="/privacy-policy">Privacy Policies</a></div>
                                </div>
                            </div>


                            <div class="mt-3 d-block d-sm-none"></div>
                            <div class="d-flex">
                                <div class="mb-3">
                                    <a href="https://twitter.com/nekowallet"><i
                                            class="fab fa-twitter  me-2 p-2 rounded-3 text-white bg-gray"></i> </a>
                                </div>
                                <div class="mb-3">
                                    <a href="https://t.me/nekoinvest"><i
                                            class="fab fa-telegram-plane text-white bg-gray me-2 p-2 rounded-3 "></i> </a>
                                </div>
                                <div class="mb-3">
                                    <a href="https://discord.gg/898xnMFXkU"><i
                                            class="fab fa-discord text-white bg-gray me-2 p-2 rounded-3 "></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-white d-none d-md-flex">{{--pc--}}

                    <li class="nav-item">
                        <a class="nav-link active" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('blogs')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('faqs')}}">Support</a>
                    </li>

                </ul>
                <form class="d-none d-sm-flex">{{--pc--}}
                    {{--                <div class="ms-auto d-flex mb-2 mb-sm-0">--}}
                    {{--                    <div class="dropdown ">--}}
                    {{--                        <div class="btn btn-sm rounded btn-main py-2 px-3 dropdown-toggle me-2 text-white" type="button"--}}
                    {{--                             id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">--}}
                    {{--                            EN--}}
                    {{--                        </div>--}}
                    {{--                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">--}}
                    {{--                            @foreach($locales as $lang)--}}
                    {{--                                <li>--}}
                    {{--                                    @if($lang !== $locale)--}}
                    {{--                                        <a href="{{request()->url()}}?redirect_locale={{$lang}}"--}}
                    {{--                                           class="dropdown-item pointer">{{ __("web.$lang") }}</a>--}}
                    {{--                                    @else--}}
                    {{--                                        <a href="#" class="dropdown-item pointer">{{ __("web.$lang") }}</a>--}}
                    {{--                                    @endif--}}
                    {{--                                </li>--}}
                    {{--                            @endforeach--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    <div class="ms-auto d-flex">

                        <div class="pointer d-flex align-items-center" style="max-width: 300px">
                            <a href="https://play.google.com/store/apps/details?id=io.nekoinvest.wallet"
                               class="me-3 shadow-sm btn rounded-3 bg-gray text-white border-0 px-4 py-2">
                                Download
                            </a>

                        </div>
                    </div>

                </form>
        </div>
    </div>
</nav>


@yield('content')
<footer id="footer"
    {{--    class="border-top border-gray"--}}
>
    <hr class="m-0">
    <div class="container-md">
        <div class="d-flex justify-content-between align-items-center flex-column flex-sm-row py-4">
            <div>
                <div class="text-gray text-center text-gray text-sm-start">© 2022 Neko Global.</div>
                <div class="text-gray">For partnership, contact us <a class="fw-bold text-white"
                                                                      href="mailto:info@nekowallet.io">info@nekowallet.io</a>
                </div>
                <div class="d-flex mt-3 justify-content-center justify-content-md-start">
                    <div class="mb-3 text-gray"><a href="/terms-of-service">Terms of Service</a></div>
                    <div class="mx-2">•</div>
                    <div class="mb-3 text-gray"><a href="/privacy-policy">Privacy Policies</a></div>
                </div>
            </div>


            <div class="mt-3 d-block d-sm-none"></div>
            <div class="d-flex">
                <div class="mb-3">
                    <a href="https://twitter.com/nekowallet"><i
                            class="fab fa-twitter  me-2 p-2 rounded-3 text-white bg-gray"></i> </a>
                </div>
                <div class="mb-3">
                    <a href="https://t.me/nekoinvest"><i
                            class="fab fa-telegram-plane text-white bg-gray me-2 p-2 rounded-3 "></i> </a>
                </div>
                <div class="mb-3">
                    <a href="https://discord.gg/898xnMFXkU"><i
                            class="fab fa-discord text-white bg-gray me-2 p-2 rounded-3 "></i> </a>
                </div>
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
