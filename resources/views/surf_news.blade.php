@extends('layout.master')

@section('styles')
    <style>
    body {
    background-color: lightgrey;
    }

    .spinner-main {
    position: fixed;
    top: calc(50vh - 2rem);
    left: calc(50vw - 2rem);
    }

    .btn-spin {
    width: 14px;
    height: 14px;
    }

    .vote-item {
    line-height: 14px;
    }
    </style>
@endsection

@section('content')
    <div id="newsVue" v-cloak>

        <div class="sticky-top bg-white p-3">
            <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-row justify-content-start align-items-center flex-wrap">
                    <div class="dropdown me-2 mb-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            @{{ filter.type.name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item" v-for="item in types" href="#"
                                   :class="{active: item.key == filter.type.key}"
                                   @click="changeFilter('type', item)">@{{ item.name }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown me-2 mb-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            @{{ filter.kind.name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item" v-for="item in kinds" href="#"
                                   :class="{active: item.key == filter.kind.key}"
                                   @click="changeFilter('kind', item)">@{{ item.name }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown me-2 mb-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            @{{ filter.currency.name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                            style="max-height: 60vh;overflow-y: scroll;padding-top:0;">
                            <li class="bg-white sticky-top">
                                <div class="dropdown-item"><input type="text" placeholder="Search" v-model="search">
                                </div>
                            </li>
                            <li v-for="item in _currencies">
                                <a class="dropdown-item" :class="{active: item.key == filter.currency.key}"
                                    href="#" @click="changeFilter('currency', item)">@{{
                                    item.name }}</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="d-flex flex-row justify-content-start align-items-center flex-wrap">
                    {{--                Total: @{{pagination.count}}--}}
                </div>
            </div>

        </div>
        {{--    <div class="spinner-border spinner-main" role="status" v-if="isLoading">--}}
        {{--        <span class="visually-hidden">Loading...</span>--}}
        {{--    </div>--}}
        <div class="w-100 h-100 container pb-5">
            <div></div>
            <div>
                <div v-for="item in news" class="card w-100 my-2">
                    <div class="card-body">
                        <h3 class="card-title">[@{{ item.id }}] @{{ item.title }}</h3>

                        <div class="card-text mb-5">
                            <div class="d-flex justify-content-between">
                                <div><b>Original url:</b></div>
                                <a :href="`https://cryptopanic.com/news/${item.id}/click/`" target="_blank"
                                   class="text-truncate w-50">@{{
                                    `${item.domain}/${item.slug}` }}</a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div><b>Crypto Panic url:</b></div>
                                <a :href="`${item.url}`" target="_blank" class="text-truncate w-50">@{{
                                    `${item.url}`
                                    }}</a>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                            <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-3">
                                <div class="d-flex align-items-center vote-item me-2 mb-2" v-for="vote in votes"
                                >
                                    {{--                                <i v-bind:class=" vote.icon" v-bind:style="{color:  vote.color} "></i>--}}
                                    @{{ vote.icon }}@{{ item.votes[vote.key] }}
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-end align-items-center flex-wrap mb-2">
                                <button type="button" class="btn btn-primary btn-sm ms-2 mb-2"
                                        @click="sendToTelegram('-1001548803112',item)"
                                        :disabled="isSendingTelegram">
                                    <div class="d-flex align-items-center">
                                        <i v-if="!isSendingTelegram" class="bi bi-telegram"></i>
                                        <div v-if="isSendingTelegram" class="spinner-border btn-spin" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div>
                                            <div class="ms-2">Forward to NEKO Terminal</div>
                                        </div>
                                    </div>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm ms-2 mb-2"
                                        @click="sendToTelegram('-535769292',item)"
                                        :disabled="isSendingTelegram">
                                    <div class="d-flex align-items-center">
                                        <i v-if="!isSendingTelegram" class="bi bi-telegram"></i>
                                        <div v-if="isSendingTelegram" class="spinner-border btn-spin" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <div>
                                            <div class="ms-2">Forward to NekoTestSignal</div>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="d-flex justify-content-center my-3">
                    <button type="button" class="btn btn-primary btn-sm" @click="loadNews(pagination.page + 1)"
                            :disabled="isLoading" id="scoll-pivot">
                        <div class="spinner-border btn-spin" role="status" v-if="isLoading">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        Load more
                    </button>
                </div>
            </div>
        </div>


    </div>

@endsection

@push('scripts')
    <script>
        var newsVue = new Vue({
            el: '#newsVue',
            data: {
                isLoading: false,
                isSendingTelegram: false,
                _token: null,
                kinds: [
                    {key: '', name: 'All kind'},
                    {key: 'news', name: 'News'},
                    {key: 'media', name: 'Media'},
                ],
                currencies: [
                    {key: '', name: 'All currency'},
                    {
                        "key": "BTC",
                        "name": "BTC"
                    },
                    {
                        "key": "ETH",
                        "name": "ETH"
                    },
                    {
                        "key": "USDT",
                        "name": "USDT"
                    },
                    {
                        "key": "TOMO",
                        "name": "TOMO"
                    },
                    {
                        "key": "LINK",
                        "name": "LINK"
                    },
                    {
                        "key": "CHI",
                        "name": "CHI"
                    },
                    {
                        "key": "BNB",
                        "name": "BNB"
                    },
                    {
                        "key": "UNI",
                        "name": "UNI"
                    },
                    {
                        "key": "TRX",
                        "name": "TRX"
                    },
                    {
                        "key": "FLM",
                        "name": "FLM"
                    },
                    {
                        "key": "KNC",
                        "name": "KNC"
                    },
                    {
                        "key": "BCH",
                        "name": "BCH"
                    },
                    {
                        "key": "BTT",
                        "name": "BTT"
                    },
                    {
                        "key": "SOL",
                        "name": "SOL"
                    },
                    {
                        "key": "DOGE",
                        "name": "DOGE"
                    },
                    {
                        "key": "SUSHI",
                        "name": "SUSHI"
                    },
                    {
                        "key": "SRM",
                        "name": "SRM"
                    },
                    {
                        "key": "YFI",
                        "name": "YFI"
                    },
                    {
                        "key": "VET",
                        "name": "VET"
                    },
                    {
                        "key": "YFII",
                        "name": "YFII"
                    },
                    {
                        "key": "SXP",
                        "name": "SXP"
                    },
                    {
                        "key": "ONT",
                        "name": "ONT"
                    },
                    {
                        "key": "BZRX",
                        "name": "BZRX"
                    },
                    {
                        "key": "IOST",
                        "name": "IOST"
                    },
                    {
                        "key": "WAVES",
                        "name": "WAVES"
                    },
                    {
                        "key": "COMP",
                        "name": "COMP"
                    },
                    {
                        "key": "DASH",
                        "name": "DASH"
                    },
                    {
                        "key": "ATOM",
                        "name": "ATOM"
                    },
                    {
                        "key": "NAMI",
                        "name": "NAMI"
                    },
                    {
                        "key": "DAM",
                        "name": "DAM"
                    },
                    {
                        "key": "TDC",
                        "name": "TDC"
                    },
                    {
                        "key": "XRP",
                        "name": "XRP"
                    },
                    {
                        "key": "EOS",
                        "name": "EOS"
                    },
                    {
                        "key": "LTC",
                        "name": "LTC"
                    },
                    {
                        "key": "NEXO",
                        "name": "NEXO"
                    },
                    {
                        "key": "USDC",
                        "name": "USDC"
                    },
                    {
                        "key": "USDS",
                        "name": "USDS"
                    },
                    {
                        "key": "DAI",
                        "name": "DAI"
                    },
                    {
                        "key": "PAX",
                        "name": "PAX"
                    },
                    {
                        "key": "LUA",
                        "name": "LUA"
                    },
                    {
                        "key": "AAVE",
                        "name": "AAVE"
                    },
                    {
                        "key": "AAPL",
                        "name": "AAPL"
                    },
                    {
                        "key": "AMZN",
                        "name": "AMZN"
                    },
                    {
                        "key": "FB",
                        "name": "FB"
                    },
                    {
                        "key": "GOOGL",
                        "name": "GOOGL"
                    },
                    {
                        "key": "NFLX",
                        "name": "NFLX"
                    },
                    {
                        "key": "TSLA",
                        "name": "TSLA"
                    },
                    {
                        "key": "OLC",
                        "name": "OLC"
                    },
                    {
                        "key": "VIDB",
                        "name": "VIDB"
                    },
                    {
                        "key": "KAI",
                        "name": "KAI"
                    },
                    {
                        "key": "WHC",
                        "name": "WHC"
                    },
                    {
                        "key": "OMG",
                        "name": "OMG"
                    },
                    {
                        "key": "XLM",
                        "name": "XLM"
                    },
                    {
                        "key": "ADA",
                        "name": "ADA"
                    },
                    {
                        "key": "NEO",
                        "name": "NEO"
                    },
                    {
                        "key": "DOT",
                        "name": "DOT"
                    },
                    {
                        "key": "BDS",
                        "name": "BDS"
                    },
                    {
                        "key": "CAKE",
                        "name": "CAKE"
                    },
                    {
                        "key": "BAKE",
                        "name": "BAKE"
                    },
                    {
                        "key": "DIA",
                        "name": "DIA"
                    },
                    {
                        "key": "ALGO",
                        "name": "ALGO"
                    },
                    {
                        "key": "NKN",
                        "name": "NKN"
                    },
                    {
                        "key": "XVS",
                        "name": "XVS"
                    },
                    {
                        "key": "THETA",
                        "name": "THETA"
                    },
                    {
                        "key": "MATIC",
                        "name": "MATIC"
                    },
                    {
                        "key": "RVN",
                        "name": "RVN"
                    },
                    {
                        "key": "MANA",
                        "name": "MANA"
                    },
                    {
                        "key": "CHR",
                        "name": "CHR"
                    },
                    {
                        "key": "LIT",
                        "name": "LIT"
                    },
                    {
                        "key": "XTZ",
                        "name": "XTZ"
                    },
                    {
                        "key": "OGN",
                        "name": "OGN"
                    },
                    {
                        "key": "FIL",
                        "name": "FIL"
                    },
                    {
                        "key": "ALPHA",
                        "name": "ALPHA"
                    },
                    {
                        "key": "AVAX",
                        "name": "AVAX"
                    },
                    {
                        "key": "FTM",
                        "name": "FTM"
                    },
                    {
                        "key": "1INCH",
                        "name": "1INCH"
                    },
                    {
                        "key": "GRT",
                        "name": "GRT"
                    },
                    {
                        "key": "REEF",
                        "name": "REEF"
                    },
                    {
                        "key": "FIO",
                        "name": "FIO"
                    },
                    {
                        "key": "BEL",
                        "name": "BEL"
                    },
                    {
                        "key": "ZRX",
                        "name": "ZRX"
                    },
                    {
                        "key": "CVC",
                        "name": "CVC"
                    },
                    {
                        "key": "LTO",
                        "name": "LTO"
                    },
                    {
                        "key": "NANO",
                        "name": "NANO"
                    },
                    {
                        "key": "SFP",
                        "name": "SFP"
                    },
                    {
                        "key": "BAT",
                        "name": "BAT"
                    },
                    {
                        "key": "KSM",
                        "name": "KSM"
                    },
                    {
                        "key": "ZEC",
                        "name": "ZEC"
                    },
                    {
                        "key": "AXS",
                        "name": "AXS"
                    },
                    {
                        "key": "ROSE",
                        "name": "ROSE"
                    },
                    {
                        "key": "BNT",
                        "name": "BNT"
                    },
                    {
                        "key": "CRV",
                        "name": "CRV"
                    },
                    {
                        "key": "ENJ",
                        "name": "ENJ"
                    },
                    {
                        "key": "CHZ",
                        "name": "CHZ"
                    },
                    {
                        "key": "OCEAN",
                        "name": "OCEAN"
                    },
                    {
                        "key": "XEM",
                        "name": "XEM"
                    },
                    {
                        "key": "EUR",
                        "name": "EUR"
                    },
                    {
                        "key": "COTI",
                        "name": "COTI"
                    },
                    {
                        "key": "SUN",
                        "name": "SUN"
                    },
                    {
                        "key": "LUNA",
                        "name": "LUNA"
                    },
                    {
                        "key": "SAND",
                        "name": "SAND"
                    },
                    {
                        "key": "ATS",
                        "name": "ATS"
                    },
                    {
                        "key": "VNCT",
                        "name": "VNCT"
                    },
                    {
                        "key": "BAMI",
                        "name": "BAMI"
                    },
                    {
                        "key": "BABA",
                        "name": "BABA"
                    },
                    {
                        "key": "NVDA",
                        "name": "NVDA"
                    },
                    {
                        "key": "NIO",
                        "name": "NIO"
                    },
                    {
                        "key": "DPET",
                        "name": "DPET"
                    },
                    {
                        "key": "TFUEL",
                        "name": "TFUEL"
                    },
                    {
                        "key": "SFO",
                        "name": "SFO"
                    },
                    {
                        "key": "SHC",
                        "name": "SHC"
                    },
                    {
                        "key": "SHIB1000",
                        "name": "SHIB1000"
                    },
                    {
                        "key": "FIO",
                        "name": "FIO"
                    },
                    {
                        "key": "ENJ",
                        "name": "ENJ"
                    },
                    {
                        "key": "AQUAGOAT1M",
                        "name": "AQUAGOAT1M"
                    },
                    {
                        "key": "CORGIB10K",
                        "name": "CORGIB10K"
                    },
                    {
                        "key": "TPH",
                        "name": "TPH"
                    },
                    {
                        "key": "MAN",
                        "name": "MAN"
                    },
                    {
                        "key": "KCS",
                        "name": "KCS"
                    },
                    {
                        "key": "LTD",
                        "name": "LTD"
                    },
                    {
                        "key": "SLP",
                        "name": "SLP"
                    },
                    {
                        "key": "DEGO",
                        "name": "DEGO"
                    },
                    {
                        "key": "FARA",
                        "name": "FARA"
                    },
                    {
                        "key": "ERN",
                        "name": "ERN"
                    }
                ],
                types: [
                    {key: null, name: 'All type'},
                    {key: 'rising', name: 'Rising'},
                    {key: 'hot', name: 'Hot'},
                    {key: 'bullish', name: 'Bullish'},
                    {key: 'bearish', name: 'Bearish'},
                    {key: 'important', name: 'Important'},
                    {key: 'saved', name: 'Saved'},
                    {key: 'lol', name: 'LOL'},
                ],
                votes: [
                    // '🤮⭐⚠⬆⬇☢☣💬👍👎😄😂'
                    {key: 'positive', icon: '⬆', color: 'green'},
                    {key: 'important', icon: '⚠', color: '#FFBC34'},
                    {key: 'comments', icon: '💬', color: '#3aa2c6'},
                    {key: 'negative', icon: '⬇', color: '#FF001C'},
                    {key: 'liked', icon: '👍', color: '#12a47b'},
                    {key: 'disliked', icon: '👎', color: '#a42d12'},
                    {key: 'saved', icon: '⭐', color: 'black'},
                    {key: 'toxic', icon: '☢', color: 'purple'},
                    {key: 'lol', icon: '😂', color: '#ffd84a'},

                ],
                filter: {
                    type: {key: null, name: 'All type'},
                    kind: {key: '', name: 'All kind'},
                    currency: {key: '', name: 'All currency'},
                },
                search: '',
                news: [],
                pagination: {
                    count: 0,
                    page: 1,
                    next: null,
                    previous: null,
                }
            },
            methods: {
                buildTelegramMessage: function (item) {
                    const href = `https://cryptopanic.com/news/${item.id}/click/`;
                    const title = `${item.title}`;
                    const link = ` - <a href="${href}">Link</a>`;
                    let votes = ``;
                    if (item.votes) {
                        this.votes.filter(v => item.votes[v.key]).forEach(v => {
                            votes = `${votes} ${v.icon}${item.votes[v.key]}`;
                        });
                    }
                    const vote = `<a>${votes}</a>`;
                    return `${title}${link}\n\n${vote}`;
                },
                sendToTelegram: function (chat_id = '-535769292', item) {
                    //neko test -535769292
                    //neko terminal -1001548803112
                    //neko internal -1001334835359
                    this.isSendingTelegram = true;
                    console.log(chat_id, item);
                    const encoded_text = this.buildTelegramMessage(item);
                    const url = `${window.location.origin}/push-news-telegram`;
                    $.post(url, {
                        chat_id,
                        encoded_text,
                        _token: this._token,
                    }).then(
                        (res) => {
                            console.log(res);

                            this.isSendingTelegram = false;
                        }
                    );
                },
                changeFilter: function (key, val) {
                    this.filter[key] = val;
                    this.loadNews(1);
                    this.search = '';
                },
                loadNews: function (page) {
                    if (this.isLoading) return;

                    const api_url = `${window.location.origin}/load-news`;

                    this.isLoading = true;
                    if (page == 1) {
                        this.news = [];
                    }

                    $.get(api_url, {
                        page,
                        type: this.filter.type.key,
                        kind: this.filter.kind.key,
                        currencies: this.filter.currency.key,

                    }).then(
                        (res) => {
                            const data = JSON.parse(res);
                            console.log(data);
                            this.news = [...this.news, ...data.results];
                            this.pagination.count = data.count;
                            this.pagination.page = page;
                            this.isLoading = false;
                        }
                    );

                    // const Http = new XMLHttpRequest();
                    //
                    // Http.open("GET", url);
                    // Http.send();
                    //
                    // Http.onreadystatechange = (e) => {
                    //     console.log(e,Http.responseText)
                    // }
                },
            },
            computed: {
                _currencies: function () {
                    const _search = this.search.trim().toLowerCase();
                    return this.currencies.filter(c => {
                        const s = c.name.trim().toLowerCase();
                        return _search.includes(s) || s.includes(_search);
                    });
                },
            },
            mounted: function () {
                this._token = _token;
                this.loadNews(1);
                const _this = this;
                $(window).scroll(function () {
                    // console.log($(window).scrollTop() + $(window).innerHeight(), $('#scoll-pivot').position().top)
                    if ($(window).scrollTop() + $(window).innerHeight() >= $('#scoll-pivot').position().top - Math.max(500, $(window).innerHeight())) {
                        console.log(123);
                        _this.loadNews(_this.pagination.page + 1);
                    }
                });
            }
        });

    </script>

@endpush
