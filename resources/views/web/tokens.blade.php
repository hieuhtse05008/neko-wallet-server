@extends('web.layout.master')

@section('content')
    <div id="vue-tokens" class="container" style="min-height: 100vh;">
        <div class="my-5 d-flex justify-content-center flex-column align-items-center">
            <h1>How to buy</h1>
            <div class="mt-3">
            <div class=" search-wrap">
                <input placeholder="Search"

                       v-model="search.symbols" @change="onChangeSearch" class="rounded"
                       type="text" style="">
            </div>
            </div>
        </div>
        <div
            class="d-flex flex-wrap justify-content-center"
{{--            class="row  g-5"--}}
        >
            <div v-if="isLoading" class="w-100 d-flex align-items-center justify-content-center"
                 style="height: 80vh;">
                <div class="spinner-grow" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
{{--            <div v-for="(coin,key) in coins"  v-if="!isLoading" class="pointer"--}}
{{--                 class="col-md-3 col-sm-4 col-lg-2 pointer"--}}

{{--                 @click="openTokenPage(coin)">--}}
                <div  v-for="(coin,key) in coins"  v-if="!isLoading" @click="openTokenPage(coin)"
                      class="coin-item shadow p-3 bg-white pointer">
                    <div class="">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <img :src="coin.image_url" class="table-token-image mr-2 mb-3" style="width: 36px;">
                            <div>
                                <span class="mr-2 mb-3"><b>@{{coin.name}}</b></span>
                            </div>
                            <div>
                                <span class="text-secondary mb-3"><b>@{{coin.symbol.toUpperCase()}}</b></span>
                            </div>
                        </div>
                    </div>
                </div>
{{--            </div>--}}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var homeVue = new Vue({
            el: '#vue-tokens',
            data: {
                isLoading: false,
                page: 1,
                search: {
                    symbols:'',
                    categories: '',
                    platforms: '',
                },
                hint_coins: ({!! collect($coins) !!}),
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
                    orderBy: 'market_cap_rank',
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
                    {key: 'sparkline_7d', name: 'Last 7 days', disableSort: true,},

                ],
                timeout: null,
            },
            methods: {
                openTokenPage: function (coin){
                    window.location.href = `/cryptocurrency/${coin.name}`;
                },
                parseNumber: function (str) {
                    if (str.indexOf(".") == -1) return str;
                    return str.substr(0, str.indexOf(".") + 3);
                },
                onChangeSort: function ({disableSort, orderBy}) {
                    if (disableSort) return;
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
                onChangeSearch: function () {
                    if (this.timeout || this.isLoading) return;
                    if (this.search.symbols.length < 3) {
                        this.filter.symbols = [];

                    }else {
                        this.filter.symbols = [this.search.symbols.toLowerCase()];

                    }
                    this.timeout = 300;
                    setTimeout(() => this.loadCoins(), this.timeout);
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
                            this.timeout = null;
                            console.log(res);
                            this.coins = [
                                // ...this.coins,
                                ...this.solveCoinsInfo(res.coins.items || res.coins),
                            ];
                            this.meta = res.coins.meta;
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
                solveCoinsInfo: function (coins) {
                    return coins.map(c => {
                        let bool_7d = true;
                        let bool_24h = true;
                        if (c.last_market) {
                            bool_7d = c.last_market.price_change_percentage_7d_in_currency.trim()[0] != '-';
                            bool_24h = c.last_market.price_change_percentage_24h[0].trim() != '-';
                        }

                        let image_url = 'http://d1j8r0kxyu9tj8.cloudfront.net/files/16299992038gk3icP7NaLivXU.png';
                        if (c.image_url) {
                            image_url = c.image_url;
                        } else if (c.coin_market_cap_id) {
                            image_url = `https://s2.coinmarketcap.com/static/img/coins/64x64/${c.coin_market_cap_id}.png`;
                        }
                        return {
                            ...c,
                            image_url,
                            bool_7d,
                            bool_24h,
                        };
                    })
                    //https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png
                },
            },
            computed: {

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
                this.hint_coins = this.solveCoinsInfo(this.hint_coins);
            },
        });
    </script>
@endpush


@section('styles')
    <style>
        .coin-item {
            border-radius: 12px;
            width: calc(20% - 40px);
            min-width: 180px;
            margin-right: 20px;
            margin-left: 20px;
            margin-bottom: 40px;
        }

        input {
            border: 1px solid #DCDEE3;
            box-sizing: border-box;
            padding: 13px 16px;
            width: 620px;
            height: 48px;
            max-width: 80vw;
        }

        .dropdown-menu {
            border-radius: 5px;
            max-height: 50vh;
            overflow-y: auto;
        }

        #search-token {
            /*max-width: 250px;*/
            height: 30px;
        }


    </style>
@endsection
