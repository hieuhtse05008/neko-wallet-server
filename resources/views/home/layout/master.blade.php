<!DOCTYPE html>
<html
    class="js sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers"
    lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Neko Invest</title>
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/logo_light.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/plugins.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>


        /* width */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
            cursor: pointer;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #eaeaea;
            border-radius: 100px;

        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            cursor: pointer;
            background: #adadad;
            border-radius: 100px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #9e9e9e;
        }

    </style>
    @yield('styles')

</head>

<body class="active-dark-mode">
<div class="main-wrapper">
    <div id="my_switcher" class="my_switcher">
        <ul>
            <li>
                <a href="javascript: void(0);" data-theme="light" class="setColor light">
                    <span title="Light Mode">Light</span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" data-theme="dark" class="setColor dark active">
                    <span title="Dark Mode">Dark</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Start Mobile Menu Area  -->
    <div class="popup-mobilemenu-area">
        <div class="inner">
            <div class="mobile-menu-top">
                <div class="logo">
                    <a href="#">
                        <img class="dark-logo" src="/images/logo_light.png"
                             alt="Logo Images">
                        <img class="light-logo"
                             src="/images/logo_dark.png"
                             alt="Logo Images">
                    </a>
                </div>
                <div class="mobile-close">
                    <div class="icon">
                        <i class="fal fa-times"></i>
                    </div>
                </div>
            </div>
            <ul class="mainmenu">
                <li class="menu-item-has-children">
                    <a href="/">Home</a>

                </li>
            </ul>
        </div>
    </div>
    <!-- End Mobile Menu Area  -->
    <!-- Start Header -->
    <header class="header axil-header  header-light header-sticky header-with-shadow container-fluid">
        <div class="header-wrap container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-12" style="margin-right: -100px;">
                    <div class="logo">
                        <a href="/">
                            <img class="dark-logo" src="/images/logo_light.png" alt="Logo Images">
                            <img class="light-logo" src="/images/logo_dark.png" alt="Logo Images">
                        </a>
                    </div>
                </div>

                <div class="col-xl-8 d-none d-xl-block">
                    <div class="mainmenu-wrapper">
                        <nav class="mainmenu-nav">
                            <!-- Start Mainmanu Nav -->
                            <ul class="mainmenu">
                                <li class="menu-item-has-children"><a
                                        href="/">Home</a>
                                </li>

                            </ul>
                            <!-- End Mainmanu Nav -->
                        </nav>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
                    <div class="header-search text-right d-flex align-items-center justify-content-end">
{{--                        <form class="header-search-form">--}}
{{--                            <div class="axil-search form-group">--}}
{{--                                <button type="submit" class="search-button"><i class="fal fa-search"></i></button>--}}
{{--                                <input type="text" class="form-control" placeholder="Search">--}}
{{--                            </div>--}}
{{--                        </form>--}}
                        <ul class="metabar-block">
                            <li class="icon"><a href="#"><i
                                        class="fas fa-bookmark"></i></a></li>
                            <li class="icon"><a href="#"><i
                                        class="fas fa-bell"></i></a></li>
                        </ul>
                        <!-- Start Hamburger Menu  -->
                        <div class="hamburger-menu d-block d-xl-none">
                            <div class="hamburger-inner">
                                <div class="icon"><i class="fal fa-bars"></i></div>
                            </div>
                        </div>
                        <!-- End Hamburger Menu  -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start Header -->

</div>
    @yield('content')

<!-- Start Footer Area  -->
<div class="axil-footer-area axil-footer-style-1 bg-color-white">
    <!-- Start Footer Top Area  -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Start Post List  -->
                    <div class="inner d-flex align-items-center flex-wrap">
                        <h5 class="follow-title mb--0 mr--20">Follow Us</h5>

                        <ul class="social-icon color-tertiary md-size justify-content-start">
                            <li><a target="_blank" href="twitter.com/Neko_Invest"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li><a target="_blank" href="t.me/nekoinvest"><i class="fab fa-telegram"></i></a></li>
                            <li><a target="_blank" href="discord.gg/nekoinvest"><i class="fab fa-discord"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Post List  -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top Area  -->

    <!-- Start Copyright Area  -->
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-12">
                    <div class="copyright-left">
                        <div class="logo">
                            <a href="/">
                                <img class="dark-logo" src="/images/logo_light.png" alt="Logo Images">
                                <img class="light-logo" src="/images/logo_dark.png" alt="Logo Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="copyright-right text-left text-lg-right mt_md--20 mt_sm--20">
                        <p class="b3">All Rights Reserved © 2021</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</div>
<!-- End Footer Area  -->
<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="/js/modernizr.min.js"></script>
<!-- jQuery JS -->
<script src="/js/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/tweenmax.min.js"></script>
<script src="/js/js.cookie.js"></script>
<script src="/js/jquery.style.switcher.js"></script>


<!-- Main JS -->
<script src="/js/main.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/vue.js"></script>
@stack('scripts')

</body>
</html>
