<!DOCTYPE html>
<!-- saved from url=(0062)http://axilthemes.com/demo/template/blogar/home-tech-blog.html -->
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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo_light.png')}}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
                    <a href="http://axilthemes.com/demo/template/blogar/index.html">
                        <img class="dark-logo" src="./Tech Blog __ Blogar - Personal Blog Template_files/logo-black.png"
                             alt="Logo Images">
                        <img class="light-logo"
                             src="./Tech Blog __ Blogar - Personal Blog Template_files/logo-white2.png"
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
                <li class="menu-item-has-children"><a
                        href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">Home</a>
                    <ul class="axil-submenu">
                        <li><a href="http://axilthemes.com/demo/template/blogar/index.html">Home Default</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/home-creative-blog.html">Home Creative
                                Blog</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/home-seo-blog.html">Home Seo Blog</a>
                        </li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html">Home Tech Blog</a>
                        </li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/home-lifestyle-blog.html">Home Lifestyle
                                Blog</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a
                        href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">Categories</a>
                    <ul class="axil-submenu">
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Accessibility</a>
                        </li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Android Dev</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Accessibility</a>
                        </li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Android Dev</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a
                        href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">Post Format</a>
                    <ul class="axil-submenu">
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-format-standard.html">Post Format
                                Standard</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-format-video.html">Post Format
                                Video</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-format-gallery.html">Post Format
                                Gallery</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-format-text.html">Post Format Text
                                Only</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-layout-1.html">Post Layout One</a>
                        </li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-layout-2.html">Post Layout Two</a>
                        </li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-layout-3.html">Post Layout
                                Three</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-layout-4.html">Post Layout Four</a>
                        </li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-layout-5.html">Post Layout Five</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a
                        href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">Pages</a>
                    <ul class="axil-submenu">
                        <li><a href="http://axilthemes.com/demo/template/blogar/post-list.html">Post List</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/archive.html">Post Archive</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/author.html">Author Page</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/about.html">About Page</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/maintenance.html">Maintenance</a></li>
                        <li><a href="http://axilthemes.com/demo/template/blogar/contact.html">Contact Us</a></li>
                    </ul>
                </li>
                <li><a href="http://axilthemes.com/demo/template/blogar/404.html">404 Page</a></li>
                <li><a href="http://axilthemes.com/demo/template/blogar/contact.html">Contact Us</a></li>
            </ul>
            <div class="buy-now-btn">
                <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">Buy Now <span class="badge">$15</span></a>
            </div>
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
                            <img class="dark-logo" src="{{asset('images/logo_light.png')}}" alt="Logo Images">
                            <img class="light-logo" src="{{asset('images/logo_dark.png')}}" alt="Logo Images">
                        </a>
                    </div>
                </div>

                <div class="col-xl-8 d-none d-xl-block">
                    <div class="mainmenu-wrapper">
                        <nav class="mainmenu-nav">
                            <!-- Start Mainmanu Nav -->
                            <ul class="mainmenu">
                                <li class="menu-item-has-children"><a href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">Home</a>
                                    <ul class="axil-submenu">
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/index.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Home Default">Home Default</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/home-creative-blog.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Home Creative Blog">Home Creative Blog</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/home-seo-blog.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Home SEO Blog">Home SEO Blog</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Home Tech Blog">Home Tech Blog</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/home-lifestyle-blog.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Home Lifestyle Blog">Home Lifestyle Blog</span>
                                                    </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">Posts</a>
                                    <ul class="axil-submenu">
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-format-standard.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post Format Standard">Post Format Standard</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-format-video.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post Format Video">Post Format Video</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-format-gallery.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post Format Gallery">Post Format Gallery</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-format-text.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post Format Text Only">Post Format Text Only</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post Layout One">Post Layout One</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-2.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post Layout Two">Post Layout Two</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-3.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post Layout Three">Post Layout Three</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-4.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post Layout Four">Post Layout Four</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-5.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post Layout Five">Post Layout Five</span>
                                                    </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children megamenu-wrapper"><a href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">Mega Menu</a>
                                    <ul class="megamenu-sub-menu">
                                        <li class="megamenu-item">

                                            <!-- Start Verticle Nav  -->
                                            <div class="axil-vertical-nav">
                                                <ul class="vertical-nav-menu">
                                                    <li class="vertical-nav-item active">
                                                        <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#tab1">
                                                                <span class="hover-flip-item">
                                    <span data-text="Accessibility">Accessibility</span>
                                                                </span>
                                                        </a>
                                                    </li>
                                                    <li class="vertical-nav-item">
                                                        <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#tab2">
                                                                <span class="hover-flip-item">
                                    <span data-text="Android Dev">Android Dev</span>
                                                                </span>
                                                        </a>
                                                    </li>
                                                    <li class="vertical-nav-item">
                                                        <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#tab3">
                                                                <span class="hover-flip-item">
                                    <span data-text="Blockchain">Blockchain</span>
                                                                </span>
                                                        </a>
                                                    </li>
                                                    <li class="vertical-nav-item">
                                                        <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#tab4">
                                                                <span class="hover-flip-item">
                                    <span data-text="Gadgets">Gadgets</span>
                                                                </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Start Verticle Nav  -->

                                            <!-- Start Verticle Menu  -->
                                            <div class="axil-vertical-nav-content">
                                                <!-- Start One Item  -->
                                                <div class="axil-vertical-inner tab-content" id="tab1" style="display: block;">
                                                    <div class="axil-vertical-single">
                                                        <div class="row">

                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-01.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">India may require online shops to hand</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->

                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-02.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="CREATIVE">CREATIVE</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Lightweight, grippable, and ready to go.</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->

                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-03.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="TRAVEL">TRAVEL</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Bold new experience. Same Mac magic.</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->

                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-04.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="GADGETS">GADGETS</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Creative Game With The New DJI Mavic Air</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End One Item  -->

                                                <!-- Start One Item  -->
                                                <div class="axil-vertical-inner tab-content" id="tab2">
                                                    <div class="axil-vertical-single">
                                                        <div class="row">

                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-04.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">India may require online shops to hand</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->
                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-03.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Lightweight, grippable, and ready to go.</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->
                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-02.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Bold new experience. Same Mac magic.</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->
                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-04.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Creative Game With The New DJI Mavic Air</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End One Item  -->

                                                <!-- Start One Item  -->
                                                <div class="axil-vertical-inner tab-content" id="tab3">
                                                    <div class="axil-vertical-single">
                                                        <div class="row">

                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-04.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Creative Game With The New DJI Mavic Air</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->
                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-03.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Bold new experience. Same Mac magic.</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->
                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-02.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Lightweight, grippable, and ready to go.</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->
                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-04.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">India may require online shops to hand</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End One Item  -->

                                                <!-- Start One Item  -->
                                                <div class="axil-vertical-inner tab-content" id="tab4">
                                                    <div class="axil-vertical-single">
                                                        <div class="row">

                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-01.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">India may require online shops to hand</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->
                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-04.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Lightweight, grippable, and ready to go.</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->

                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-03.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Bold new experience. Same Mac magic.</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->

                                                            <!-- Start Post List  -->
                                                            <div class="col-lg-3">
                                                                <div class="content-block image-rounded">
                                                                    <div class="post-thumbnail mb--20">
                                                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                                                            <img class="w-100" src="./Post Layout One __ Blogar - Personal Blog Template_files/mega-post-04.jpg" alt="Post Images">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">
                                                                                        <span class="hover-flip-item">
                                                            <span data-text="DESIGN">DESIGN</span>
                                                                                        </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="title"><a href="http://axilthemes.com/demo/template/blogar/post-details.html">Creative Game With The New DJI Mavic Air</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Post List  -->

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End One Item  -->

                                            </div>
                                            <!-- End Verticle Menu  -->
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#">Pages</a>
                                    <ul class="axil-submenu">
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/post-list.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post List">Post List</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/archive.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Post Archive">Post Archive</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/author.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Author Page">Author Page</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/about.html">
                                                    <span class="hover-flip-item">
                        <span data-text="About Page">About Page</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/contact.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Contact Us">Contact Us</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/404.html">
                                                    <span class="hover-flip-item">
                        <span data-text="404 Page">404 Page</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/maintenance.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Maintenance">Maintenance</span>
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="http://axilthemes.com/demo/template/blogar/privacy-policy.html">
                                                    <span class="hover-flip-item">
                        <span data-text="Privacy Policy">Privacy Policy</span>
                                                    </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="http://axilthemes.com/demo/template/blogar/home-lifestyle-blog.html">Lifestyle</a></li>
                                <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html">Gadgets</a></li>
                            </ul>
                            <!-- End Mainmanu Nav -->
                        </nav>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
                    <div class="header-search text-right d-flex align-items-center">
                        <form class="header-search-form">
                            <div class="axil-search form-group">
                                <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                        <ul class="metabar-block">
                            <li class="icon"><a href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#"><i class="fas fa-bookmark"></i></a></li>
                            <li class="icon"><a href="http://axilthemes.com/demo/template/blogar/post-layout-1.html#"><i class="fas fa-bell"></i></a></li>
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
<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="{{asset('js/modernizr.min.js')}}"></script>
<!-- jQuery JS -->
<script src="{{asset('js/jquery.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/tweenmax.min.js')}}"></script>
<script src="{{asset('js/js.cookie.js')}}"></script>
<script src="{{asset('js/jquery.style.switcher.js')}}"></script>


<!-- Main JS -->
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/vue.js')}}"></script>
@stack('scripts')

</body>
</html>
