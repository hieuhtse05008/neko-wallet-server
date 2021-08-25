@extends('home.layout.master')

@section('content')



<div id="home-vue">
    <!-- Start home table -->
    <div class="container-fluid">
    <div class="container pt-5">
        <div id="table-home" class="table-responsive tableFixHead" v-on:scroll="handleScroll">
            <table class="table table-dark table-sm table-striped table-borderless ">
                <thead>
                <tr>
                    <th v-for="field in fields" scope="col" class="text-nowrap pointer "
                        :id="`head-${field.key}`"
                        @click="onChangeSort(field)">@{{ field.name }}

                        <i v-if="sort.orderBy === field.key && sort.sortedBy == 'desc'"
                           class="bi bi-caret-down-fill"></i>
                        <i v-if="sort.orderBy === field.key && sort.sortedBy == 'asc'" class="bi bi-caret-up-fill"></i>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="isLoading && coins.length == 0">
                    <td colspan="22">
                        <div class="w-100 d-flex align-items-center justify-content-center" style="height: 80vh;">
                            <div class="spinner-grow" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <template v-for="coin in coins">
                    <tr v-if="coin.last_market">
                        <td scope="row" class="text-nowrap align-middle">@{{coin.last_market.market_cap_rank}}</td>
                        <td scope="row" class="text-wrap align-middle">@{{coin.symbol}}-@{{coin.name}}</td>
                        <td scope="row" class="text-nowrap align-middle">@{{parseNumber(coin.last_market.current_price)}}</td>
                        <td scope="row" class="text-nowrap align-middle">@{{parseNumber(coin.last_market.price_change_percentage_24h)}}</td>
                        <td scope="row" class="text-nowrap align-middle">@{{parseNumber(coin.last_market.price_change_percentage_7d_in_currency)}}</td>
                        <td scope="row" class="text-nowrap align-middle">@{{coin.last_market.market_cap}}</td>
                        <td scope="row" class="text-nowrap align-middle">@{{coin.last_market.total_volume}}</td>
                        <td scope="row" class="text-nowrap align-middle">@{{coin.last_market.circulating_supply}}</td>
                        <td scope="row" class="text-nowrap align-middle">
                            <div :class="{increasing: coin.last_market.price_change_percentage_7d_in_currency[0] != '-', decreasing: coin.last_market.price_change_percentage_7d_in_currency[0] == '-'}">
                            <img v-if="coin.coin_market_cap_id"
                                 :data-backup-src="`https://chart.googleapis.com/chart?cht=ls&chf=bg,s,00000000&chd=t:${coin.last_market.sparkline_7d.substr(1,coin.last_market.sparkline_7d.length-2)}&chs=164x48`"
                                 onerror="this.src = $(this).attr('data-backup-src');"
                                 :src="`https://s3.coinmarketcap.com/generated/sparklines/web/7d/usd/${coin.coin_market_cap_id}.png`">
                            <img v-else="coin.last_market.sparkline_7d"
                                 :src="`https://chart.googleapis.com/chart?cht=ls&chf=bg,s,00000000&chd=t:${coin.last_market.sparkline_7d.substr(1,coin.last_market.sparkline_7d.length-2)}&chs=164x48`"
                                 >

                            </div>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>

    </div>
    </div>
    <!-- End home table -->

@if(false)
    <h1 class="d-none">Home Tech Blog</h1>
    <div class="axil-tech-post-banner pt--30 bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-xl-6 col-md-12 col-12">
                        <!-- Start Post Grid  -->
                        <div class="content-block post-grid post-grid-transparent">
                            <div class="post-thumbnail">
                                <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                    <img src="{{$coins[0]->image_url}}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-grid-content">
                                <div class="post-content">
                                    <div class="post-cat">
                                        <div class="post-cat-list">
                                            <a class="hover-flip-item-wrapper"
                                               href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                                    <span class="hover-flip-item">
                                                        <span data-text="FEATURED POST">FEATURED POST</span>
                                                    </span>
                                            </a>
                                        </div>
                                    </div>
                                    <h3 class="title"><a
                                            href="http://axilthemes.com/demo/template/blogar/post-details.html">Beauty
                                            of deep space. Billions of
                                            galaxies in the universe.</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- Start Post Grid  -->
                    </div>

                    <div class="col-xl-3 col-md-6 mt_lg--30 mt_md--30 mt_sm--30 col-12">
                        <!-- Start Single Post  -->
                        <div class="content-block image-rounded">
                            <div class="post-thumbnail">
                                <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                    <img src="{{$coins[1]->image_url}}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content pt--20">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper"
                                           href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                                <span class="hover-flip-item">
                                                    <span data-text="LEADERSHIP">LEADERSHIP</span>
                                                </span>
                                        </a>
                                    </div>
                                </div>
                                <h5 class="title"><a
                                        href="http://axilthemes.com/demo/template/blogar/post-details.html">Rocket Lab
                                        mission fails shortly after
                                        launch</a></h5>
                            </div>
                        </div>
                        <!-- End Single Post  -->
                        <!-- Start Single Post  -->
                        <div class="content-block image-rounded mt--30">
                            <div class="post-thumbnail">
                                <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                    <img src="{{$coins[2]->image_url}}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content pt--20">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper"
                                           href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                                <span class="hover-flip-item">
                                                    <span data-text="TECHNOLOGY">TECHNOLOGY</span>
                                                </span>
                                        </a>
                                    </div>
                                </div>
                                <h5 class="title"><a
                                        href="http://axilthemes.com/demo/template/blogar/post-details.html">Virtual
                                        Reality or Artificial
                                        Intelligence Technology</a></h5>
                            </div>
                        </div>
                        <!-- End Single Post  -->
                    </div>

                    <div class="col-xl-3 col-md-6 mt_lg--30 mt_md--30 mt_sm--30 col-12">
                        <!-- Start Single Post  -->
                        <div class="content-block image-rounded">
                            <div class="post-thumbnail">
                                <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                    <img src="{{$coins[3]->image_url}}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content pt--20">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper"
                                           href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                                <span class="hover-flip-item">
                                                    <span data-text="PRODUCT UPDATES">PRODUCT UPDATES</span>
                                                </span>
                                        </a>
                                    </div>
                                </div>
                                <h5 class="title"><a
                                        href="http://axilthemes.com/demo/template/blogar/post-details.html">The Morning
                                        After: Uber sets its
                                        sights on Postmates</a></h5>
                            </div>
                        </div>
                        <!-- End Single Post  -->
                        <!-- Start Single Post  -->
                        <div class="content-block image-rounded mt--30">
                            <div class="post-thumbnail">
                                <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                    <img src="{{$coins[4]->image_url}}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content pt--20">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper"
                                           href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                                <span class="hover-flip-item">
                                                    <span data-text="GADGET">GADGET</span>
                                                </span>
                                        </a>
                                    </div>
                                </div>
                                <h5 class="title"><a
                                        href="http://axilthemes.com/demo/template/blogar/post-details.html">Air Pods Pro
                                        with Wireless Charging
                                        Case.</a></h5>
                            </div>
                        </div>
                        <!-- End Single Post  -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Post List Wrapper  -->
    <div class="axil-post-list-area post-listview-visible-color axil-section-gap bg-color-white is-active">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-8">

                @foreach($coins->slice(5) as $coin)
                    <!-- Start Post List  -->
                        <div class="content-block post-list-view mt--30 axil-control">
                            <div class="post-thumbnail">
                                <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                    <img src="{{$coin->image_url}}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper"
                                           href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                            <span class="hover-flip-item">
                                                <span data-text="DESIGN">{{strtoupper($coin->symbol)}}</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="title">
                                    <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                        {{ explode('.',$coin->description)[0]}}
                                    </a>
                                </h4>
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper"
                                                   href="http://axilthemes.com/demo/template/blogar/author.html">
                                                    <span class="hover-flip-item">
                                                        <span data-text="Nusrat Ara">{{$coin->name}}</span>
                                                    </span>
                                                </a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li>Feb 17, 2019</li>
                                                <li>3 min read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="social-share-transparent justify-content-end">
                                        <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                                    class="fas fa-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Post List  -->
                    @endforeach

                </div>
                <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                    <!-- Start Sidebar Area  -->
                    <div class="sidebar-inner">

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_categories mb--30">
                            <ul>
                                <li class="cat-item">
                                    <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"
                                       class="inner">
                                        <div class="thumbnail">
                                            <img
                                                src="./Tech Blog __ Blogar - Personal Blog Template_files/category-image-01.jpg"
                                                alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Tech</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="cat-item">
                                    <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"
                                       class="inner">
                                        <div class="thumbnail">
                                            <img
                                                src="./Tech Blog __ Blogar - Personal Blog Template_files/category-image-02.jpg"
                                                alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Style</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="cat-item">
                                    <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"
                                       class="inner">
                                        <div class="thumbnail">
                                            <img
                                                src="./Tech Blog __ Blogar - Personal Blog Template_files/category-image-03.jpg"
                                                alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Travel</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="cat-item">
                                    <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"
                                       class="inner">
                                        <div class="thumbnail">
                                            <img
                                                src="./Tech Blog __ Blogar - Personal Blog Template_files/category-image-04.jpg"
                                                alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Food</h5>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_search mb--30">
                            <h5 class="widget-title">Search</h5>
                            <form action="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                <div class="axil-search form-group">
                                    <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title">Popular on Blogar</h5>
                            <!-- Start Post List  -->
                            <div class="post-medium-block">

                                <!-- Start Single Post  -->
                                <div class="content-block post-medium mb--20">
                                    <div class="post-thumbnail">
                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                            <img
                                                src="./Tech Blog __ Blogar - Personal Blog Template_files/blog-sm-01.jpg"
                                                alt="Post Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h6 class="title"><a
                                                href="http://axilthemes.com/demo/template/blogar/post-details.html">The
                                                underrated design book that transformed the way I
                                                work </a></h6>
                                        <div class="post-meta">
                                            <ul class="post-meta-list">
                                                <li>Feb 17, 2019</li>
                                                <li>300k Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Post  -->

                                <!-- Start Single Post  -->
                                <div class="content-block post-medium mb--20">
                                    <div class="post-thumbnail">
                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                            <img
                                                src="./Tech Blog __ Blogar - Personal Blog Template_files/blog-sm-02.jpg"
                                                alt="Post Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h6 class="title"><a
                                                href="http://axilthemes.com/demo/template/blogar/post-details.html">Here’s
                                                what you should (and shouldn’t) do when</a>
                                        </h6>
                                        <div class="post-meta">
                                            <ul class="post-meta-list">
                                                <li>Feb 17, 2019</li>
                                                <li>300k Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Post  -->

                                <!-- Start Single Post  -->
                                <div class="content-block post-medium mb--20">
                                    <div class="post-thumbnail">
                                        <a href="http://axilthemes.com/demo/template/blogar/post-details.html">
                                            <img
                                                src="./Tech Blog __ Blogar - Personal Blog Template_files/blog-sm-03.jpg"
                                                alt="Post Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h6 class="title"><a
                                                href="http://axilthemes.com/demo/template/blogar/post-details.html">How
                                                a developer and designer duo at Deutsche Bank keep
                                                remote</a></h6>
                                        <div class="post-meta">
                                            <ul class="post-meta-list">
                                                <li>Feb 17, 2019</li>
                                                <li>300k Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Post  -->

                            </div>
                            <!-- End Post List  -->

                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_social mb--30">
                            <h5 class="widget-title">Stay In Touch</h5>
                            <!-- Start Post List  -->
                            <ul class="social-icon md-size justify-content-center">
                                <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                            class="fab fa-slack"></i></a></li>
                                <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                            <!-- End Post List  -->
                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_instagram mb--30">
                            <h5 class="widget-title">Instagram</h5>
                            <!-- Start Post List  -->
                            <ul class="instagram-post-list-wrapper">
                                <li class="instagram-post-list">
                                    <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                        <img src="./Tech Blog __ Blogar - Personal Blog Template_files/instagram-01.jpg"
                                             alt="Instagram Images">
                                    </a>
                                </li>
                                <li class="instagram-post-list">
                                    <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                        <img src="./Tech Blog __ Blogar - Personal Blog Template_files/instagram-02.jpg"
                                             alt="Instagram Images">
                                    </a>
                                </li>
                                <li class="instagram-post-list">
                                    <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                        <img src="./Tech Blog __ Blogar - Personal Blog Template_files/instagram-03.jpg"
                                             alt="Instagram Images">
                                    </a>
                                </li>
                                <li class="instagram-post-list">
                                    <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                        <img src="./Tech Blog __ Blogar - Personal Blog Template_files/instagram-04.jpg"
                                             alt="Instagram Images">
                                    </a>
                                </li>
                                <li class="instagram-post-list">
                                    <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                        <img src="./Tech Blog __ Blogar - Personal Blog Template_files/instagram-05.jpg"
                                             alt="Instagram Images">
                                    </a>
                                </li>
                                <li class="instagram-post-list">
                                    <a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                        <img src="./Tech Blog __ Blogar - Personal Blog Template_files/instagram-06.jpg"
                                             alt="Instagram Images">
                                    </a>
                                </li>
                            </ul>
                            <!-- End Post List  -->
                        </div>
                        <!-- End Single Widget  -->
                    </div>
                    <!-- End Sidebar Area  -->


                </div>
            </div>
        </div>
    </div>
    <!-- End Post List Wrapper  -->

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
                                <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#"><i
                                            class="fab fa-linkedin-in"></i></a></li>
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
                                <a href="http://axilthemes.com/demo/template/blogar/index.html">
                                    <img class="dark-logo"
                                         src="./Tech Blog __ Blogar - Personal Blog Template_files/logo-black.png"
                                         alt="Logo Images">
                                    <img class="light-logo"
                                         src="./Tech Blog __ Blogar - Personal Blog Template_files/logo-white2.png"
                                         alt="Logo Images">
                                </a>
                            </div>
                            <ul class="mainmenu justify-content-start">
                                <li>
                                    <a class="hover-flip-item-wrapper"
                                       href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                            <span class="hover-flip-item">
                                        <span data-text="Contact Us">Contact Us</span>
                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="hover-flip-item-wrapper"
                                       href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                            <span class="hover-flip-item">
                                        <span data-text="Terms of Use">Terms of Use</span>
                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="hover-flip-item-wrapper"
                                       href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                            <span class="hover-flip-item">
                                        <span data-text="AdChoices">AdChoices</span>
                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="hover-flip-item-wrapper"
                                       href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                            <span class="hover-flip-item">
                                        <span data-text="Advertise with Us">Advertise with Us</span>
                                            </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="hover-flip-item-wrapper"
                                       href="http://axilthemes.com/demo/template/blogar/home-tech-blog.html#">
                                            <span class="hover-flip-item">
                                        <span data-text="Blogar Store">Blogar Store</span>
                                            </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="copyright-right text-left text-lg-right mt_md--20 mt_sm--20">
                            <p class="b3">All Rights Reserved © 2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </div>
    <!-- End Footer Area  -->
@endif
    <!-- Start Back To Top  -->
    <a id="backto-top" class=""></a>
    <!-- End Back To Top  -->
</div>

@endsection

@push('scripts')
    <script>
        var homeVue = new Vue({
            el: '#home-vue',
            data: {
                isLoading: false,
                page: 1,
                search: {
                    symbols: '',
                    categories: '',
                    platforms: '',
                },
                symbols: {!! collect($symbols) !!},
                categories: {!! collect($categories) !!},
                platforms: {!! collect($platforms) !!},
                coins: [],
                caps: [
                    {label: 'Nano caps', key: 'nano_caps', low: -1, high: 10000},
                    {label: 'Micro caps', key: 'micro_caps', low: 100000, high: 1000000},
                    {label: 'Small caps', key: 'small_caps', low: 1000000, high: 1000000},
                    {label: 'Mid caps', key: 'mid_caps', low: 10000000, high: 100000000},
                    {label: 'Large caps', key: 'large_caps', low: 100000000, high: 1000000000},
                    {label: 'Mega caps', key: 'mega_caps', low: 1000000000, high: -1},
                ],
                filter: {
                    symbols: [],
                    categories: [],
                    platforms: [],
                    market_caps: ["nano_caps", "micro_caps", "small_caps", "mid_caps", "large_caps", "mega_caps"],
                    price_change_percentage_24h_high: '',
                    price_change_percentage_24h_low: '',
                    atl_change_percentage_high: '',
                    atl_change_percentage_low: '',
                },
                sort: {
                    orderBy:'market_cap_rank',
                    sortedBy: 'asc',
                },
                meta: {
                    current_page: 1,
                    total_pages: 0,
                },
                fields: [
                    {key: 'market_cap_rank', name: '#',},
                    {key: 'name', name: 'Name',},
                    {key: 'current_price', name: 'Price',},
                    {key: 'price_change_percentage_24h', name: '24h %',},
                    {key: 'price_change_percentage_7d_in_currency', name: '7d %',},
                    {key: 'market_cap', name: 'Market cap',},
                    {key: 'total_volume', name: 'Total volume',},
                    {key: 'circulating_supply', name: 'Circulating supply',},
                    {key: 'sparkline_7d', name: 'Last 7 days',disableSort:true,},

                ]
            },
            methods: {
                imageError: (coin)=>{
                    console.log('imageError',coin, this);
                    this.src=`https://chart.googleapis.com/chart?cht=ls&chf=bg,s,00000000&chd=t:${coin.last_market.sparkline_7d.substr(1,coin.last_market.sparkline_7d.length-2)}&chs=164x48`;
                },
                parseNumber: function (str){
                    return str.substr(0,str.indexOf(".") + 3);
                },
                onChangeSort: function ({disableSort,orderBy}) {
                    if(disableSort) return;
                    const sortedBy = orderBy == this.sort.orderBy ? {
                        '': 'desc',
                        'desc': 'asc',
                        'asc': '',
                    }[this.sort.sortedBy] : 'desc';
                    this.sort = {
                        orderBy: sortedBy === '' ? '' : orderBy,
                        sortedBy
                    }
                    this.apply();
                },
                apply: function () {
                    document.getElementById("table-home").scrollTop = 0;
                    this.coins = [];
                    this.loadCoins(1);
                },
                handleScroll: function (e) {
                    console.log(e)
                    const {target} = e;
                    const {current_page, total_pages,} = this.meta;
                    if (current_page == total_pages) return;
                    // console.log(e)
                    const {scrollHeight, scrollTop, offsetHeight} = target;
                    if (scrollTop + offsetHeight >= scrollHeight - 800) {
                        console.log('==============================')
                        this.loadCoins(current_page + 1);
                    }
                    console.log(scrollHeight, scrollTop, offsetHeight)

                },
                changeFilterArray: function (field, key) {
                    if (this.filter[field].includes(key)) {
                        this.filter[field] = this.filter[field].filter(i => i != key);
                    } else {
                        this.filter[field].push(key);
                    }
                },
                loadCoins: function (page = 1) {
                    if (this.isLoading || (page > 1 && this.page == page)) return;
                    this.isLoading = true;
                    const {
                        price_change_percentage_24h_high,
                        price_change_percentage_24h_low,
                        atl_change_percentage_high,
                        atl_change_percentage_low,
                        market_caps,
                        symbols,
                        platforms,
                        categories,
                    } = this.filter;

                    $.get(`/api/v1/coins?include=last_market`, {
                        page,
                        limit: 200,
                        last_market: {
                            price_change_percentage_24h_high,
                            price_change_percentage_24h_low,
                            atl_change_percentage_high,
                            atl_change_percentage_low,
                            market_caps,
                        },
                        platforms,
                        categories,
                        symbols,
                        ...this.sort
                    }).then(
                        (res) => {
                            console.log(res);
                            this.coins = [
                                ...this.coins,
                                ...res.coins.items.filter(i => i.last_market),
                            ];
                            this.meta = res.coins.meta;
                            if (!this.symbols.length) {
                                this.symbols = this.coins.map(i => i.symbol);
                            }
                            this.isLoading = false;

                            setTimeout(function () {
                                const head = document.getElementById(`head-${homeVue.sort.orderBy}`);
                                if (head) {
                                    document.getElementById("table-home").scrollLeft = head.offsetLeft;
                                }
                            }, 100)
                        }
                    );
                },
            },
            computed: {
                _symbols: function () {
                    const _search = this.search.symbols.trim().toLowerCase();
                    return this.symbols.filter(c => {
                        const s = c.trim().toLowerCase();
                        return _search.includes(s) || s.includes(_search);
                    });
                },
                _categories: function () {
                    const _search = this.search.categories.trim().toLowerCase();
                    return this.categories.filter(c => {
                        const s = c.name.trim().toLowerCase();
                        return _search.includes(s) || s.includes(_search);
                    });
                },
                _platforms: function () {
                    const _search = this.search.platforms.trim().toLowerCase();
                    return this.platforms.filter(c => {
                        const s = c.name.trim().toLowerCase();
                        return _search.includes(s) || s.includes(_search);
                    });
                },
            },
            created() {
                this.loadCoins();
            },
        });
    </script>
@endpush


@section('styles')
    <style>
        .table-responsive {
            overflow-y: auto;
            max-height: calc(100vh);
            min-height: 650px;
            transform: translate3d(0, 0, 0);
        }

        .tableFixHead {
            overflow: auto;
            height: 100px;
        }

        .tableFixHead thead th {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .pointer {
            cursor: pointer;
        }

        .increasing{
            filter: hue-rotate(
                85deg
            ) saturate(80%) brightness(0.85);
        }
        .decreasing{
            filter: hue-rotate(
                300deg
            ) saturate(210%) brightness(0.7) contrast(170%);
        }
        table{
            font-size: var(--font-size-b3);
        }
    </style>
@endsection
