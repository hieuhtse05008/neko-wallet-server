<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Neko Invest</title>
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/logo_light.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/web/main.css">
    <style>
        @import "/css/fontawesome/fontawesome.css";
    </style>
    @yield('styles')

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/images/logo_text_dark.png" alt="">
        </a>
        <button hidden class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
            {{--                <li class="nav-item">--}}
            {{--                    <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
            {{--                </li>--}}
            {{--                --}}
            {{--            </ul>--}}
            {{--            <form class="d-flex">--}}
            {{--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
            {{--                <button class="btn btn-outline-success" type="submit">Search</button>--}}
            {{--            </form>--}}
        </div>
    </div>
</nav>
@yield('content')
<footer>
    <div id="footer-wrap" class="d-flex justify-content-between align-items-center flex-wrap px-3">
        <div class="my-3">
            <img src="/images/logo_text_light.png" alt="">
            <div class="mt-2 text-white">
                © 2021 Neko, All Rights Reserved.
            </div>
        </div>

        <div class="text-white d-flex justify-content-center my-3">
            <div class="me-5"><a>Blog</a></div>
            <div class="me-5"><a href="/cryptocurrencies">How to buy</a></div>
            <div class="me-5 me-sm-0"><a>Check my spot</a></div>
        </div>
        <div class="text-white d-flex justify-content-end my-3">
            <div class="me-5"><a href="https://twitter.com/Neko_Invest"><i class="fab fa-twitter"></i></a></div>
            <div class="me-5"><a href="https://t.me/nekoinvest"><i class="fab fa-telegram-plane"></i></a></div>
            <div><a href="https://discord.gg/DfRF5uFf"><i class="fab fa-discord"></i></a></div>
        </div>
    </div>
</footer>
</body>


<script src="/js/vue.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery.min.js"></script>
<script>
    _token = "{{ csrf_token() }}"
</script>
@stack('scripts')

</body>
</html>
