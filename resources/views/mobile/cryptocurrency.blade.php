@extends('mobile.layout.master')

@section('content')
    <div class="token-wrap">

    <div class="token-content bg-white rounded-7 mt-0">
        <div class="">
            @if(!empty(object_get($cryptocurrency,'cryptocurrency_info.description')))
                <div class="mb-5">
                    <div class="text-main pg-title mb-4">What is {{$cryptocurrency->name}} ({{strtoupper($cryptocurrency->symbol)}})</div>
                    <div class="pg-content">{!!  nl2br(e($cryptocurrency->cryptocurrency_info->description)) !!}</div>
                </div>
            @endif

            @if(count($cryptocurrency->tokens) > 0)
                <div class="mb-5">
                    <div class="text-main pg-title mb-4">Contract Addresses</div>
                    <div class="pg-content">
                        @foreach($cryptocurrency->tokens as $token)
                            <div class=" text-truncate mb-3">
                                <div class="text-main">{{$token->name}} ({{$token->network->name}})</div>
                                @if(!in_array($token->address, \App\Enum\HiddenAddresses::ADDRESS))
                                    <div class="text-truncate mb-3"> {{$token->address}}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!empty(object_get($cryptocurrency,'cryptocurrency_info.links')))
                <div class="mb-5">
                    <div class="text-main pg-title mb-4">More information</div>
                    <div class="pg-content">
                        @foreach(get_object_vars($cryptocurrency->cryptocurrency_info->links) as $key => $links)
                            @if(is_array($links) && count($links) > 0)
                                @foreach($links as $link)
                                    @if($link)
                                        <div class="text-truncate mb-3">
                                            <div class="text-main text-capitalize">
                                                {{preg_replace("/[^A-Za-z0-9.!?]/",' ',$key)}}
                                            </div>
                                            <a target="_blank" href="{{$link}}" class="text-truncate">
                                                {{$link}}
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @elseif(!empty($links) && is_string($links))
                                @switch($key)
                                    @case('twitter_screen_name')
                                    <div class="text-truncate mb-3">
                                        <div class="text-main">
                                            Twitter
                                        </div>
                                        <a target="_blank" href="https://twitter.com/{{$links}}">
                                            twitter.com/{{$links}}
                                        </a>
                                    </div>
                                    @break
                                    @case('telegram_channel_identifier')
                                    <div class="text-truncate mb-3">
                                        <div class="text-main">
                                            Telegram
                                        </div>
                                        <a target="_blank" href="https://t.me/{{$links}}">
                                            t.me/{{$links}}
                                        </a>
                                    </div>
                                    @break
                                    @case('facebook_username')
                                    <div class="text-truncate mb-3">
                                        <div class="text-main">
                                            Facebook
                                        </div>
                                        <a target="_blank" href="https://www.facebook.com/{{$links}}">
                                            www.facebook.com/{{$links}}
                                        </a>
                                    </div>
                                    @break
                                    @case('subreddit_url')
                                    <div class="text-truncate mb-3">
                                        <div class="text-main">
                                            Reddit
                                        </div>
                                        <a target="_blank" href="{{$links}}">
                                            {{$links}}

                                        </a>
                                    </div>
                                    @break
                                    @case('bitcointalk_thread_identifier')
                                    <div class="text-truncate mb-3">
                                        <div class="text-main">
                                            Bitcoin talk
                                        </div>
                                        <a target="_blank"
                                           href="https://bitcointalk.org/index.php?topic={{$links}}">
                                            bitcointalk.org/index.php?topic={{$links}}

                                        </a>
                                    </div>
                                    @break
                                @endswitch
                            @elseif(!empty($links) && $key == 'repos_url' && is_object($links) && !empty($links->github) && is_array($links->github) && count($links->github) > 0 && !empty($links->github[0]))
                                <div class="text-truncate mb-3">
                                    <div class="text-main">
                                        Github
                                    </div>
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

                    <div class="text-truncate mb-3">
                        <div>Twitter</div>
                        <a class="text-main" target="_blank" href="https://twitter.com/Neko_Invest">
                            https://twitter.com/Neko_Invest
                        </a>
                    </div>
{{--                    <div class="text-truncate mb-3">--}}
{{--                        <div>Discord</div>--}}
{{--                        <a class="text-main" target="_blank" href="https://discord.gg/898xnMFXkU">--}}
{{--                            https://discord.gg/898xnMFXkU--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="text-truncate mb-3">--}}
{{--                        <div>Telegram</div>--}}
{{--                        <a class="text-main" target="_blank" href="https://t.me/nekoinvest">--}}
{{--                            https://t.me/nekoinvest--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
            @if(!empty($cryptocurrency->categories) && count($cryptocurrency->categories) > 0)
                <div class="mb-5">
                    <div class="text-main pg-title mb-4">Tags</div>
                    <div class="pg-content">
                        @foreach($cryptocurrency->categories as $category)
                            @if(!empty($category))
                                <a class="bg-main border-0 btn btn-sm btn-xs mb-2 me-2 rounded shadow-sm text-white"
                                   href="#">{{$category->name}}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
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

        .arrow-list ul li {
            position: relative;
        }

        .arrow-list .collapse-btn[aria-expanded='true']:before {
            transform: rotate(90deg);
        }
        .arrow-list .collapse-btn:before {
            content: "\f0da";
            color: black;
            font-family: 'Font Awesome 5 Pro';
            position: absolute;
            left: -15px;
            top: -1.5px;
            font-weight: 900;
            transition: transform .3s;
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

            padding-top: 40px;
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
            background: url('/images/blog/cover.jpg') no-repeat center;
            width: 100%;
            height: 480px;
            background-size: cover;
        }

        .token-time {
            line-height: 140%;
            color: #8C939E;
        }

        .token-title {
            font-size: 34px;
            font-weight: bold;
        }
    </style>
@endsection

