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
                @if(!empty($coin->description))
                    <div class="mb-5">
                        <div class="text-main pg-title mb-4">What is {{$coin->name}}</div>
                        <div class="pg-content">{!! $coin->description !!}</div>
                    </div>
                @endif
                @if(is_array($platforms) && count($platforms) > 0)
                    <div class="mb-5">
                        <div class="text-main pg-title mb-4">Contract Addresses</div>
                        <div class="pg-content">
                            @foreach($platforms as $platform)
                                @if(!empty($coin->platforms->{$platform->asset_platform_id}))
                                    <div>
                                        <a target="_blank" href="#" class="text-main">{{$platform->name}}
                                            : {!! $coin->platforms->{$platform->asset_platform_id} !!}
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(is_array($coin->tickers) && count($coin->tickers) > 0)
                    <div class="mb-5">
                        <div class="text-main pg-title mb-4">Purchase on</div>
                        <div class="pg-content">
                            @foreach($coin->tickers as $ticker)
                                <div class="d-flex">
                                    <a target="_blank" class="text-main" href="{{$ticker->trade_url}}">
                                        {{$ticker->market->name}}


                                    </a>&nbsp;-&nbsp;
                                    <span style="max-width: 200px;"
                                          class="d-block text-truncate">{{$ticker->base}}</span>/
                                    <span style="max-width: 200px;"
                                          class="d-block text-truncate">{{$ticker->target}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(is_object(get_object_vars($coin->links)) && count(get_object_vars($coin->links))>0)

                    <div class="mb-5">
                        <div class="text-main pg-title mb-4">More information</div>
                        <div class="pg-content">
                            @foreach(get_object_vars($coin->links) as $key => $links)
                                @if(is_array($links) && count($links) > 0)
                                    @foreach($links as $link)
                                        @if($link)
                                            <div class="d-flex">
                                                <div class="text-main">
                                                    {{preg_replace("/[^A-Za-z0-9.!?]/",' ',$key)}}:
                                                </div>&nbsp;&nbsp;
                                                <a target="_blank" href="{{$link}}">
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
                @if(is_string($coin->categories) && count(explode(',',$coin->categories)) > 0)
                    <div class="mb-5">
                        <div class="text-main pg-title mb-4">Tags</div>
                        <div class="pg-content">
                            @foreach(explode(',',$coin->categories) as $category)
                                @if(!empty($category))
                                    <a class="bg-main border-0 btn btn-sm btn-xs mb-2 me-2 rounded shadow-sm text-white"
                                       target="_blank" href="#">{{$category}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
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
