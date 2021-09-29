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
    <link rel="shortcut icon" type="image/x-icon" href="/images/logo/neko-logo-orange.svg">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/web/main.css">

    <style>
        @import "/css/fontawesome/fontawesome.css";
    </style>
    @yield('styles')

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-md">
        <a class="navbar-brand" href="/">
            <img width="100" height="28" src="/images/logo/long-orange-text-black-neko.svg" alt="">
        </a>
        <button hidden class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="ms-auto">
            <a href="https://docs.nekoinvest.io/" class="btn btn-sm rounded btn-main p-2">White paper</a>
{{--            <a href="/#input-early-access-email" class="btn btn-sm rounded btn-main ">Get early--}}
{{--                access</a>--}}
        </div>
        {{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
        {{--            <div class="ms-auto">--}}
        {{--                <a  href="/#input-early-access-email" class="hide-from-home btn btn-sm rounded btn-main ">Get early access</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
</nav>
@yield('content')
<footer>
    <div class="container-md">
        <div id="footer-wrap" class=" py-5">
            <div class=" row py-5">
                <div class="col-md-3 mb-5">
                    <img width="50"  src="/images/no_padding_light.png" alt="">

                </div>

                <div class="col-md-3 mb-3 text-white">
                    <div class="mb-3"><a href="/">Home</a></div>
                    <div class="mb-3"><a href="/">Blog</a></div>
                    <div class="mb-sm-0">
                        <a class="pointer">
                            White Paper</a>
                    </div>
                </div>
                <div class="col-md-3 mb-5 text-white">
                    <div class="mb-3"><a href="/cryptocurrencies">How to buy</a></div>
                    <div class="mb-3"><a href="https://docs.nekoinvest.io/">Litepaper</a></div>
                    <div class="mb-sm-0"><a class="pointer" data-bs-toggle="modal"
                                            data-bs-target="#modal-check-my-spot">Check
                            my spot</a></div>
                </div>
                <div class="text-white mb-3 col-md-3">
                    <div class="d-flex">
                        <div class="me-5"><a href="https://twitter.com/Neko_Invest"><i class="fab fa-twitter"></i></a>
                        </div>
                        <div class="me-5"><a href="https://t.me/nekoinvest"><i class="fab fa-telegram-plane"></i></a>
                        </div>
                        <div><a href="https://discord.gg/nhZsK6Xarz"><i class="fab fa-discord"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="/js/vue.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery.min.js"></script>
<script>
    _token = "{{ csrf_token() }}"
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
