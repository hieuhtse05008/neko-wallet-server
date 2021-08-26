@extends('home.layout.master')

@section('content')
    <!-- Start Post Single Wrapper  -->
    <div class="post-single-wrapper axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <!-- Start Banner Area -->
                    <div class="banner banner-single-post post-formate post-layout pb--40">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Start Single Slide  -->
                                    <div class="content-block">
                                        <!-- Start Post Content  -->
                                        <div class="post-content">
                                            <div class="post-cat">
                                                <div class="post-cat-list">
                                                    <a class="hover-flip-item-wrapper" href="#">
                                                            <span class="hover-flip-item">
                                                                <span
                                                                    data-text="{{strtoupper($coin->symbol)}}">{{strtoupper($coin->symbol)}}</span>
                                                            </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <h1 class="title">How to
                                                purchase {{empty($asset_platform) ? '': $asset_platform->name}} {{strtoupper($coin->symbol)}}</h1>
                                            <!-- Post Meta  -->
                                            <div class="post-meta-wrapper">
                                                <div class="post-meta">
                                                    <div class="post-author-avatar border-rounded">
                                                        <img src="{{$coin->image_url ?: 'http://d1j8r0kxyu9tj8.cloudfront.net/files/16299992038gk3icP7NaLivXU.png'}}" alt="Token Images">
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="post-author-name">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                    <span class="hover-flip-item">
                                                                        <span
                                                                            data-text="{{$coin->name}}">{{$coin->name}}</span>
                                                                    </span>
                                                            </a>
                                                        </h6>
                                                        <ul class="post-meta-list">
                                                            <li>{{$coin->views}} Views</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul class="social-share-transparent justify-content-end">
                                                    <li>
                                                        <a target="_blank" href="twitter.com/Neko_Invest">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a target="_blank" href="t.me/nekoinvest">
                                                            <i class="fab fa-telegram"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a target="_blank" href="discord.gg/nekoinvest">
                                                            <i class="fab fa-discord"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Post Content  -->
                                    </div>
                                    <!-- End Single Slide  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Banner Area -->
                    <!-- Start Blog Details  -->
                    <div class="axil-post-details">

                        <h2>What is {{strtoupper($coin->symbol)}}</h2>
                        <p>{!! $coin->description !!}</p>

                        @if(is_array($platforms) && count($platforms) > 0)
                            <h2>Contract Addresses</h2>
                            <ul>
                                @foreach($platforms as $platform)
                                    @if(!empty($coin->platforms->{$platform->asset_platform_id}))
                                        <li>
                                            <a target="_blank" href="#">{{$platform->name}}
                                                : {!! $coin->platforms->{$platform->asset_platform_id} !!}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif

                        @if(is_array($coin->tickers) && count($coin->tickers) > 0)
                            <h2>Purchase on</h2>
                            <ul>
                                @foreach($coin->tickers as $ticker)
                                    <li>
                                        <div class="d-flex">
                                            <a target="_blank" href="{{$ticker->trade_url}}">
                                                {{$ticker->market->name}}


                                            </a>&nbsp;-&nbsp;
                                            <span style="max-width: 50px;"
                                                  class="d-block text-truncate">{{$ticker->base}}</span>/
                                            <span style="max-width: 50px;"
                                                  class="d-block text-truncate">{{$ticker->target}}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if(is_object(get_object_vars($coin->links)) && count(get_object_vars($coin->links))>0)
                            <h2>More information</h2>
                            <ul>
                                @foreach(get_object_vars($coin->links) as $key => $links)
                                    @if(is_array($links) && count($links) > 0)
                                        @foreach($links as $link)
                                            @if($link)
                                                <li>
                                                    <div class="d-flex">
                                                        <div class="text-capitalize">
                                                            {{preg_replace("/[^A-Za-z0-9.!?]/",' ',$key)}}:
                                                        </div>&nbsp;&nbsp;
                                                        <a target="_blank" href="{{$link}}">
                                                            {{$link}}

                                                        </a>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @elseif(!empty($links) && is_string($links))
                                        @switch($key)
                                            @case('twitter_screen_name')
                                            <li>
                                                <div class="d-flex">
                                                    <div class="text-capitalize">
                                                        Twitter:
                                                    </div>&nbsp;&nbsp;
                                                    <a target="_blank" href="twitter.com/{{$links}}">
                                                        twitter.com/{{$links}}

                                                    </a>
                                                </div>
                                            </li>
                                            @break
                                            @case('telegram_channel_identifier')
                                            <li>
                                                <div class="d-flex">
                                                    <div class="text-capitalize">
                                                        Telegram:
                                                    </div>&nbsp;&nbsp;
                                                    <a target="_blank" href="t.me/{{$links}}">
                                                        t.me/{{$links}}

                                                    </a>
                                                </div>
                                            </li>
                                            @break
                                            @case('facebook_username')
                                            <li>
                                                <div class="d-flex">
                                                    <div class="text-capitalize">
                                                        Facebook:
                                                    </div>&nbsp;&nbsp;
                                                    <a target="_blank" href="www.facebook.com/{{$links}}">
                                                        www.facebook.com/{{$links}}

                                                    </a>
                                                </div>
                                            </li>
                                            @break
                                            @case('subreddit_url')
                                            <li>
                                                <div class="d-flex">
                                                    <div class="text-capitalize">
                                                        Reddit:
                                                    </div>&nbsp;&nbsp;
                                                    <a target="_blank" href="{{$links}}">
                                                        {{$links}}

                                                    </a>
                                                </div>
                                            </li>
                                            @break
                                            @case('bitcointalk_thread_identifier')
                                            <li>
                                                <div class="d-flex">
                                                    <div class="text-capitalize">
                                                        Bitcoin talk:
                                                    </div>&nbsp;&nbsp;
                                                    <a target="_blank"
                                                       href="bitcointalk.org/index.php?topic={{$links}}">
                                                        bitcointalk.org/index.php?topic={{$links}}

                                                    </a>
                                                </div>
                                            </li>
                                            @break
                                        @endswitch
                                    @elseif(!empty($links) && $key == 'repos_url' && is_object($links) && !empty($links->github) && is_array($links->github) && count($links->github) > 0 && !empty($links->github[0]))

                                        <li>
                                            <div class="d-flex">
                                                <div class="text-capitalize">
                                                    Github:
                                                </div>&nbsp;&nbsp;
                                                <a target="_blank" href="{{$links->github[0]}}">
                                                    {{$links->github[0]}}

                                                </a>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif

                        <h2>Join our community at</h2>
                        <ul>
                            <li>
                                <div class="d-flex">
                                    <span>Discord:</span>&nbsp;&nbsp;
                                    <a target="_blank" href="discord.gg/nekoinvest">
                                        https://discord.gg/nekoinvest
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <span>Telegram:</span>&nbsp;&nbsp;
                                    <a target="_blank" href="t.me/nekoinvest">
                                        t.me/nekoinvest
                                    </a>
                                </div>
                            </li>
                        </ul>

                        @if(is_string($coin->categories) && count(explode(',',$coin->categories)) > 0)
                            <div class="tagcloud">
                                @foreach(explode(',',$coin->categories) as $category)
                                    @if(!empty($category))
                                        <a target="_blank" href="#">{{$category}}</a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        <div class="social-share-block">
                            <div class="post-like">
                                <a target="_blank" href="#"><span>2.2k Like</span></a>
                            </div>
                            <ul class="social-icon icon-rounded-transparent md-size">
                                <li><a target="_blank" href="twitter.com/Neko_Invest"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a target="_blank" href="t.me/nekoinvest"><i class="fab fa-telegram"></i></a></li>
                                <li><a target="_blank" href="discord.gg/nekoinvest"><i class="fab fa-discord"></i></a>
                                </li>
                            </ul>
                        </div>


                    </div>
                    <!-- End Blog Details  -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Post Single Wrapper  -->

@endsection

@section('styles')
<style>
    .axil-post-details a {
        color: var(--color-primary)!important;
    }
</style>
@endsection
