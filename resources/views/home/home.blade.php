@extends('home.layout.master')

@section('content')



    <div id="home-vue" class="py-5" v-cloak>
        <!-- Start home table -->
        <div class="container-fluid">
            <div class="container-lg">
                <div class="row">
                    <div class="col-0 col-lg-8 col-md-6"></div>
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="axil-single-widget widget widget_search mb--30 p-3 content">
                            <div class="axil-search form-group dropdown">
                                <button type="submit" class="search-button">
                                    <i class="fal fa-search"></i></button>
                                <input type="text" class="form-control dropdown-toggle" placeholder="Search"
                                       role="button" id="search-token" data-toggle="dropdown" aria-haspopup="true"
                                       @keyup.enter="enterClicked"
                                       v-model="search.hint_coins">
                                <div class="dropdown-menu shadow  border-0 w-100 mt-3" aria-labelledby="dropdownMenuLink">
                                    <a v-for="coin in _hint_coins" class="pointer dropdown-item px-5 py-4 text-wrap"
                                       :href="`/token/${coin.name}`" target="_blank">
                                        <img :src="coin.image_url" class="table-token-image mr-2 mb-3">
                                        <b class="mr-2 mb-3">@{{coin.name}}</b> <span><b class="text-secondary mb-3">@{{coin.symbol.toUpperCase()}}</b></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table-home" class="table-responsive tableFixHead" v-on:scroll="handleScroll">
                    <table class="table table-dark table-sm table-striped table-borderless ">
                        <thead>
                        <tr>
                            <th v-for="(field,key) in fields" scope="col" class="text-nowrap pointer text-uppercase p-4"
                                :id="`head-${field.key}`"
                                :class="{'text-right':key>1 && key < fields.length - 1, 'text-center' : key == 0}"
                                :style="{width: key == 0 ?  '50px' : '' }"
                                @click="onChangeSort(field)">@{{ field.name }}

                                <i v-if="sort.orderBy === field.key && sort.sortedBy == 'desc'"
                                   class="bi bi-caret-down-fill"></i>
                                <i v-if="sort.orderBy === field.key && sort.sortedBy == 'asc'"
                                   class="bi bi-caret-up-fill"></i>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="isLoading && coins.length == 0">
                            <td colspan="22">
                                <div class="w-100 d-flex align-items-center justify-content-center"
                                     style="height: 80vh;">
                                    <div class="spinner-grow" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <template v-for="coin in coins">
                            <tr v-if="coin.last_market">
                                <td scope="row" class="text-nowrap align-middle text-center">
                                    @{{coin.last_market.market_cap_rank}}
                                </td>
                                <td scope="row" class="p-4 text-wrap align-middle">
                                    <a class="pointer" :href="`/token/${coin.name}`" target="_blank">
                                        <img :src="coin.image_url" class="table-token-image mr-2">
                                        <b class="mr-2">@{{coin.name}}</b> <span><b class="text-secondary">@{{coin.symbol.toUpperCase()}}</b></span>
                                    </a>
                                </td>
                                <td scope="row" class="p-4 text-nowrap align-middle text-right">
                                    @{{parseNumber(coin.last_market.current_price)}}
                                </td>
                                <td scope="row" class="p-4 text-nowrap align-middle text-right"
                                    :class="{'text-danger':coin.bool_24h,'text-success':!coin.bool_24h}">
                                    @{{parseNumber(coin.last_market.price_change_percentage_24h)}}
                                </td>
                                <td scope="row" class="p-4 text-nowrap align-middle text-right"
                                    :class="{'text-danger':coin.bool_7d,'text-success':!coin.bool_7d}">
                                    @{{parseNumber(coin.last_market.price_change_percentage_7d_in_currency)}}
                                </td>
                                <td scope="row" class="p-4 text-nowrap align-middle text-right">
                                    @{{coin.last_market.market_cap}}
                                </td>
                                <td scope="row" class="p-4 text-nowrap align-middle text-right">
                                    @{{coin.last_market.total_volume}}
                                </td>
                                <td scope="row" class="p-4 text-nowrap align-middle text-right">
                                    @{{coin.last_market.circulating_supply}}
                                </td>
                                <td scope="row" class="text-nowrap align-middle">
                                    <div :class="{increasing: coin.bool_7d, decreasing: !coin.bool_7d}">
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
                    hint_coins: '',
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

                ]
            },
            methods: {
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
                enterClicked: function () {
                    console.log(this.search.hint_coins)
                    // if (this.search.symbols) {
                    //     this.filter.symbols = [this.search.symbols];
                    //     setTimeout(this.apply, 200);
                    // }
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
                                ...this.solveCoinsInfo(res.coins.items),
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
                            bool_7d = c.last_market.price_change_percentage_7d_in_currency[0] != '-';
                            bool_24h = c.last_market.current_price[0] != '-';
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
                _hint_coins: function () {
                    const _search = this.search.hint_coins.trim().toLowerCase();
                    let res = this.hint_coins.filter(c => {
                        const name = c.name.trim().toLowerCase();
                        const symbol = c.symbol.trim().toLowerCase();
                        return (
                            _search.includes(name) || name.includes(_search)
                            ||
                            _search.includes(symbol) || symbol.includes(_search)
                        );
                    });
                    if (_search.length < 3) {
                        res = res.slice(0, Math.min(res.length, 5));
                    }
                    return res;
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
                this.hint_coins = this.solveCoinsInfo(this.hint_coins);
            },
        });
    </script>
@endpush


@section('styles')
    <style>
        .table-responsive {
            overflow-y: auto;
            max-height: calc(100vh);
            min-height: 75vh;
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

        .increasing {
            filter: hue-rotate(
                85deg
            ) saturate(80%) brightness(0.85);
        }

        .decreasing {
            filter: hue-rotate(
                300deg
            ) saturate(210%) brightness(0.7) contrast(170%);
        }

        table {
            font-size: var(--font-size-b3);
        }

        .table-token-image {
            width: 30px;
        }

        body.active-dark-mode .dropdown-menu {
            background-color: var(--color-body);
        }

        .dropdown-menu {
            font-size: var(--font-size-b3);
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
