<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <title>News</title>
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

</head>
<body>
<div id="main" v-cloak>
    <div class="sticky-top bg-white p-3">
        <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-row justify-content-start align-items-center flex-wrap">
                <div class="dropdown me-2 mb-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        @{{ filter.type.name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" v-for="type in types" href="#" v-on:click="changeFilter('type', type)">@{{ type.name }}</a></li>
                    </ul>
                </div>
                <div class="dropdown me-2 mb-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        @{{ filter.kind.name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" v-for="kind in kinds" href="#" v-on:click="changeFilter('kind', kind)">@{{ kind.name }}</a></li>
                    </ul>
                </div>
                <div class="dropdown me-2 mb-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        @{{ filter.currency.name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" v-for="currency in currencies" href="#" v-on:click="changeFilter('currency', currency)">@{{ currency.name }}</a></li>
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

                    <p class="card-text">
                    <div class="d-flex justify-content-between">
                        <div><b>Original url:</b></div>
                        <a v-bind:href="`https://cryptopanic.com/news/${item.id}/click/`" target="_blank"
                           class="text-truncate w-50">@{{
                            `${item.domain}/${item.slug}` }}</a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><b>Crypto Panic url:</b></div>
                        <a v-bind:href="`${item.url}`" target="_blank" class="text-truncate w-50">@{{ `${item.url}`
                            }}</a>
                    </div>
                    </p>
                    <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                            <div class="d-flex align-items-center vote-item me-2" v-for="vote in votes"
                                 v-bind:style="{color:  vote.color} ">
                                <i v-bind:class=" vote.icon" v-bind:style="{color:  vote.color} "></i>
                                &nbsp;@{{ item.votes[vote.key] }}
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                            <button type="button" class="btn btn-primary btn-sm" v-on:click="sendToTelegram(item)"
                                    :disabled="isSendingTelegram">
                                <div class="d-flex align-items-center">
                                    <i v-if="!isSendingTelegram" class="bi bi-telegram"></i>
                                    <div v-if="isSendingTelegram" class="spinner-border btn-spin" role="status"
                                    >
                                        <span class="visually-hidden">Loading...</span>
                                    </div
                                    <div>
                                        <div class="ms-2">Forward to test group</div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>


                </div>
            </div>
            <div class="d-flex justify-content-center my-3">
                <button type="button" class="btn btn-primary btn-sm" v-on:click="loadNews(pagination.page + 1)"
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

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    var main = new Vue({
        el: '#main',
        data: {
            isLoading: true,
            isSendingTelegram: false,
            kinds: [
                {key: '', name: 'All kind'},
                {key: 'news', name: 'News'},
                {key: 'media', name: 'Media'},
        ],
            currencies:[
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
                {key: 'positive', icon: 'bi bi-arrow-up-circle-fill', color: 'green'},
                {key: 'important', icon: 'bi bi-exclamation-triangle-fill', color: '#FFBC34'},
                {key: 'comments', icon: 'bi bi-chat-dots-fill', color: '#3aa2c6'},
                {key: 'negative', icon: 'bi bi-arrow-down-circle-fill', color: '#FF001C'},
                {key: 'liked', icon: 'bi bi-hand-thumbs-up-fill', color: '#12a47b'},
                {key: 'disliked', icon: 'bi bi-hand-thumbs-down-fill', color: '#a42d12'},
                {key: 'saved', icon: 'bi bi-bookmark-star-fill', color: 'black'},
                {key: 'toxic', icon: 'bi bi-x-circle-fill', color: 'purple'},
                {key: 'lol', icon: 'bi bi-emoji-laughing-fill', color: '#ffd84a'},

            ],
            filter:{
                type:{key: null, name: 'All type'},
                kind:{key: '', name: 'All kind'},
                currency:{key: '', name: 'All currency'},
            },
            search: '{!! isset($search) ?: '' !!}',
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
                return `<a href="https://cryptopanic.com/news/${item.id}/click/">${item.title}</a>`;
            },
            sendToTelegram: function (item) {
                this.isSendingTelegram = true;
                console.log(item);
                const encoded_text = this.buildTelegramMessage(item);
                const url = `https://${window.location.host}/push-news-telegram`;

                $.post(url, {
                    encoded_text,
                    "_token": "{{ csrf_token() }}",
                }).then(
                    (res) => {
                        console.log(res);

                        this.isSendingTelegram = false;
                    }
                );
            },
            changeFilter: function (key,val){
                this.filter[key] = val;
                this.loadNews(1);
            } ,
            loadNews: function (page) {
                // let url = 'https://cors-anywhere.herokuapp.com/https://cryptopanic.com/api/v1/posts/?auth_token=01bfba8038c9eab12a673ee05045072b3906a648';
                // let api_url = 'https://cryptopanic.com/api/v1/posts/?auth_token=01bfba8038c9eab12a673ee05045072b3906a648&currencies=BTC,ETH&page=2';
                let url = `https://cryptopanic.com/api/v1/posts/?auth_token=01bfba8038c9eab12a673ee05045072b3906a648&page=${page}&filter=${this.filter.type.key}&kind=${this.filter.kind.key}&currencies=${this.filter.currency.key}`;

                const api_url = `${window.location.origin}/load-cors`;

                this.isLoading = true;
                if(page == 1){
                    this.news = [];
                }
                $.get(api_url, {url}).then(
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
        mounted: function () {

            this.loadNews(1);
            const _this = this;
            $(window).scroll(function () {
                // console.log($(window).scrollTop() + $(window).innerHeight(), $('#scoll-pivot').position().top)
                if ($(window).scrollTop() + $(window).innerHeight() >= $('#scoll-pivot').position().top - 100) {
                    console.log(123);
                    _this.loadNews(_this.pagination.page + 1);
                }
            });
        }
    });


</script>

</body>
</html>
