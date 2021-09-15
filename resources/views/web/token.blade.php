@extends('web.layout.master')

@section('content')
    <div class="token-wrap">
        <div class="token-cover"></div>
        <div class="token-content bg-white rounded-7">
            <a class="d-flex align-items-center mb-5" href="/cryptocurrencies">
                <i class="far fa-long-arrow-left"></i>&nbsp;&nbsp;Back
            </a>
            <div class="token-time mb-3">
                {{$coin->updated_at}}
            </div>
            <div class="token-title mb-5">
                How to purchase {{$coin->name}} ({{strtoupper($coin->symbol)}})
            </div>
            <hr>
            <div class="pt-5">
                @if(!empty(object_get($coin,'cryptocurrency_info.description')))
                    <div class="mb-5">
                        <div class="text-main pg-title mb-4">What is {{$coin->name}}</div>
                        <div class="pg-content">{!! $coin->cryptocurrency_info->description !!}</div>
                    </div>
                @endif

                {{--                <ul>--}}
                {{--                    <li><b>Step 1:&nbsp;</b> Connect your wallet to Pancakeswap, make sure you have connected on Binance Smart Chain--}}
                {{--                        network. In this guide, TrustWallet is used. Go to DApps Browsers and Select Pancakeswap--}}
                {{--                        <img class="w-100 mt-3" src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1631707735At8HM8itnBM7IN8.png">--}}
                {{--                    </li>--}}
                {{--                    <li><b>Step 1:&nbsp;</b> Connect your wallet to Pancakeswap, make sure you have connected on Binance Smart Chain--}}
                {{--                        network. In this guide, TrustWallet is used. Go to DApps Browsers and Select Pancakeswap--}}
                {{--                        <img class="w-100 mt-3" src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1631707735At8HM8itnBM7IN8.png">--}}
                {{--                    </li>--}}
                {{--                </ul>--}}
                @if(count($exchange_guides) > 0)
                    <div class="mb-5">
                        <div class="text-main pg-title mb-4">How to buy {{$coin->symbol}}?</div>
                        <ul class="pg-content arrow-list">
                            @foreach($exchange_guides as $exchange_guide)
                                <li class="">
                                    <div class="fw-bold mb-2"
                                         type="button" data-bs-toggle="collapse"
                                         data-bs-target="#how-to-{{$exchange_guide->id}}">
                                        How to buy {{$coin->symbol}} on {{$exchange_guide->name}}
                                    </div>
                                    <div id="how-to-{{$exchange_guide->id}}" class="collapse">
                                        <ul class=" pb-3">
                                            <li>
                                                <div>Pairs available:</div>
                                                <ul>
                                                    @foreach($coin->exchange_pairs as $exchange_pair)
                                                        @if($exchange_pair->exchange_guide_id == $exchange_guide->id)
                                                            <li>
                                                                <a href="{{$exchange_pair->trade_url ?: $exchange_guide->url }}"
                                                                   target="_blank"
                                                                   class="d-flex text-main">
                                            <span style="max-width: 200px;"
                                                  class="d-block text-truncate">{{$exchange_pair->baseToken->symbol}}</span>/
                                                                    <span style="max-width: 200px;"
                                                                          class="d-block text-truncate">{{$exchange_pair->targetToken->symbol}}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>

                                            @if(!empty($exchange_guide->guide_html))
                                                <li>
                                                    <div
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#guide-{{$exchange_guide->id}}">Guide:
                                                    </div>
                                                    <ul id="guide-{{$exchange_guide->id}}" class="collapse">
                                                        @foreach($exchange_guide->guide_html->steps as $step_key => $step)
                                                            <li>
                                                                <div class="mb-3"><b>Step {{$step_key + 1}}
                                                                        :&nbsp;</b> {{$step->text}}</div>
                                                                @if(!empty($step->image_url))
                                                                    <img class="w-100 mt-3" src="{{$step->image_url}}">
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(count($coin->tokens) > 0)

                    <div class="mb-5">
                        <div class="text-main pg-title mb-4">Contract Addresses</div>
                        <div class="pg-content">
                            @foreach($coin->tokens as $token)
                                <div class=" text-truncate">
                                    <span class="text-main">{{$token->name}}</span>
                                    : {{$token->address}}

                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(!empty(object_get($coin,'cryptocurrency_info.links')))
                    <div class="mb-5">
                        <div class="text-main pg-title mb-4">More information</div>
                        <div class="pg-content">
                            @foreach(get_object_vars($coin->cryptocurrency_info->links) as $key => $links)
                                @if(is_array($links) && count($links) > 0)
                                    @foreach($links as $link)
                                        @if($link)
                                            <div class="d-flex">
                                                <div class="text-main text-capitalize">
                                                    {{preg_replace("/[^A-Za-z0-9.!?]/",' ',$key)}}:
                                                </div>&nbsp;&nbsp;
                                                <a target="_blank" href="{{$link}}" class="text-truncate">
                                                    {{$link}}

                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                @elseif(!empty($links) && is_string($links))
                                    @switch($key)
                                        @case('twitter_screen_name')
                                        <div class="d-flex">
                                            <div class="text-main">
                                                Twitter:
                                            </div>&nbsp;&nbsp;
                                            <a target="_blank" href="twitter.com/{{$links}}">
                                                twitter.com/{{$links}}

                                            </a>
                                        </div>
                                        @break
                                        @case('telegram_channel_identifier')
                                        <div class="d-flex">
                                            <div class="text-main">
                                                Telegram:
                                            </div>&nbsp;&nbsp;
                                            <a target="_blank" href="t.me/{{$links}}">
                                                t.me/{{$links}}

                                            </a>
                                        </div>
                                        @break
                                        @case('facebook_username')
                                        <div class="d-flex">
                                            <div class="text-main">
                                                Facebook:
                                            </div>&nbsp;&nbsp;
                                            <a target="_blank" href="www.facebook.com/{{$links}}">
                                                www.facebook.com/{{$links}}

                                            </a>
                                        </div>
                                        @break
                                        @case('subreddit_url')
                                        <div class="d-flex">
                                            <div class="text-main">
                                                Reddit:
                                            </div>&nbsp;&nbsp;
                                            <a target="_blank" href="{{$links}}">
                                                {{$links}}

                                            </a>
                                        </div>
                                        @break
                                        @case('bitcointalk_thread_identifier')
                                        <div class="d-flex">
                                            <div class="text-main">
                                                Bitcoin talk:
                                            </div>&nbsp;&nbsp;
                                            <a target="_blank"
                                               href="bitcointalk.org/index.php?topic={{$links}}">
                                                bitcointalk.org/index.php?topic={{$links}}

                                            </a>
                                        </div>
                                        @break
                                    @endswitch
                                @elseif(!empty($links) && $key == 'repos_url' && is_object($links) && !empty($links->github) && is_array($links->github) && count($links->github) > 0 && !empty($links->github[0]))
                                    <div class="d-flex">
                                        <div class="text-main">
                                            Github:
                                        </div>&nbsp;&nbsp;
                                        <a target="_blank" href="{{$links->github[0]}}">
                                            {{$links->github[0]}}

                                        </a>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                @endif

                <div class="mb-5">
                    <div class="text-main pg-title mb-4">Join our community at</div>
                    <div class="pg-content">
                        <div class="d-flex">
                            <span>Discord:</span>&nbsp;&nbsp;
                            <a class="text-main" target="_blank" href="https://discord.gg/nekoinvest">
                                https://discord.gg/nekoinvest
                            </a>
                        </div>
                        <div class="d-flex">
                            <span>Telegram:</span>&nbsp;&nbsp;
                            <a class="text-main" target="_blank" href="https://t.me/nekoinvest">
                                https://t.me/nekoinvest
                            </a>
                        </div>
                    </div>
                </div>
                @if(!empty($coin->categories) && count($coin->categories) > 0)
                    <div class="mb-5">
                        <div class="text-main pg-title mb-4">Tags</div>
                        <div class="pg-content">
                            @foreach($coin->categories as $category)
                                @if(!empty($category))
                                    <a class="bg-main border-0 btn btn-sm btn-xs mb-2 me-2 rounded shadow-sm text-white"
                                       target="_blank" href="">{{$category->name}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

        </div>

        <div class="related-coins">
            <div class="text-main pg-title mb-4 ps-3 ps-md-0">Recommended</div>
            <div class="row">
                @foreach($related_coins as $coin)
                    <div class="col-12 col-md-3 col-lg-2">
                        <div class="rounded-7 shadow p-3 mb-3 bg-white pointer">

                            <a href="" class="d-flex justify-content-center align-items-center flex-column">
{{--                                <img src="{{$coin->icon_url}}" class="table-token-image mr-2 mb-3"--}}
{{--                                     style="width: 36px;">--}}
                                <div>
{{--                                    <span class="mr-2 mb-3"><b>{{$coin->name}}</b></span>--}}
                                </div>
                                <div>
{{--                                    <span class="text-secondary mb-3"><b>{{strtoupper($coin->symbol)}}</b></span>--}}
                                </div>
                            </a>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection

@section('styles')
    <style>
        .arrow-list ul {
            list-style: none;
        }
        .arrow-list ul li{
            position: relative;
        }
        .arrow-list ul li:before{
            content: "\f0da";
            font-family: 'Font Awesome 5 Pro';
            color: black;
            position: absolute;
            left: -15px;
            top: -1.5px;
            font-weight: 900;
        }
        .pg-title {
            font-weight: bold;
            font-size: 24px;
        }

        .pg-content {

            font-weight: normal;
            font-size: 16px;
            line-height: 150%;
        }

        .token-wrap {
            min-height: 100vh;
        }

        .token-content {
            min-height: 80vh;
            /*max-width: max(74vw,min(576px,100vw));*/
            max-width: clamp(74vw, 576px, 100vw);

            margin-top: -284px;
            margin-bottom: 120px;
            margin-left: auto;
            margin-right: auto;

            padding-top: 80px;
            padding-bottom: 120px;
            padding-left: min(110px, max(100vw - 576px, 20px));
            padding-right: min(110px, max(100vw - 576px, 20px));
        }

        .related-coins-wrap {
            margin-left: max(-20px, min(576px - 100vw, 0px));
            margin-right: max(-20px, min(576px - 100vw, 0px));
            /*margin-right: -20px;*/
        }

        .related-coins {

            max-width: clamp(74vw, 576px, 100vw);

            margin-bottom: 120px;
            margin-left: auto;
            margin-right: auto;


        }

        .coin-item {
            border-radius: 12px;
            width: calc(20% - 40px);
            min-width: 180px;
            margin-right: 20px;
            margin-left: 20px;
            margin-bottom: 40px;
        }

        .token-cover {
            background: url("/images/blog/cover.jpg") no-repeat center;
            width: 100%;
            height: 480px;
            background-size: cover;
        }

        .token-time {
            line-height: 140%;
            color: #8C939E;
        }

        .token-title {
            font-size: 44px;
            font-weight: bold;
        }
    </style>
@endsection
