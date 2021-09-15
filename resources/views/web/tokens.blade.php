@extends('web.layout.master')

@section('content')
    <div id="vue-tokens" class="container" style="min-height: 100vh;">
        <div class="my-5 d-flex justify-content-center flex-column align-items-center">
            <h1>How to buy</h1>
            <div class="mt-3">
            <div class=" search-wrap">
                <input placeholder="Search in ~6,000 cryptocurrencies "

                       v-model="search.symbols" @change="onChangeSearch" class="rounded"
                       type="text" style="">
            </div>
            </div>
        </div>
        <div
            class="d-flex flex-wrap justify-content-center"
        >
            <div v-if="isLoading" class="w-100 d-flex align-items-center justify-content-center"
                 style="height: 80vh;">
                <img width="250" height="250" src="/images/loading.svg">

            </div>
                <a :href="`/cryptocurrency/${coin.name}`"
                   v-for="(coin,key) in cryptocurrencies"  v-if="!isLoading" @click="openTokenPage(coin)"
                      class="coin-item shadow p-3 bg-white pointer">
                    <div class="">
                        <div class="d-flex justify-content-center align-items-center text-center flex-column">
                            <img :src="coin.icon_url" class="table-token-image mr-2 mb-3" style="width: 36px;">
                            <div>
                                <span class="mr-2 mb-3"><b>@{{coin.name}}</b></span>
                            </div>
                            <div>
                                <span class="text-secondary mb-3"><b>@{{coin.symbol.toUpperCase()}}</b></span>
                            </div>
                        </div>
                    </div>
                </a>
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
                hint_coins: [],
                categories: {!! collect($categories) !!},
                platforms: {!! collect($platforms) !!},
                cryptocurrencies: [],
                caps: [
                    {label: 'Nano caps', key: 'nano_caps', low: -1, high: 10000},
                    {label: 'Micro caps', key: 'micro_caps', low: 100000, high: 1000000},
                    {label: 'Small caps', key: 'small_caps', low: 1000000, high: 1000000},
                    {label: 'Mid caps', key: 'mid_caps', low: 10000000, high: 100000000},
                    {label: 'Large caps', key: 'large_caps', low: 100000000, high: 1000000000},
                    {label: 'Mega caps', key: 'mega_caps', low: 1000000000, high: -1},
                ],
                filter: {
                    from_rank: 1,
                },
                sort: {
                    orderBy: 'rank',
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

                onChangeSearch: function () {
                    if (this.timeout || this.isLoading) return;
                    if (this.search.symbols.length < 3) {
                        this.filter.symbols = [];
                    }else {
                        this.filter.symbols = [this.search.symbols.toLowerCase()];

                    }
                    this.timeout = 300;
                    setTimeout(() => this.loadCryptocurrencies(), this.timeout);
                },
                loadCryptocurrencies: function (page = 1) {
                    if (this.isLoading || (page > 1 && this.page == page)) return;
                    this.isLoading = true;
                    const {
                        symbols,
                        from_rank,
                    } = this.filter;

                    $.get(`/api/v1/cryptocurrencies?include=last_market`, {
                        page,
                        limit: 30,
                        cryptocurrency_info: true,
                        symbols,
                        from_rank,
                        ...this.sort
                    }).then(
                        (res) => {
                            this.timeout = null;
                            console.log(res);
                            this.cryptocurrencies = [
                                // ...this.cryptocurrencies,
                                ...(res.cryptocurrencies.items || res.cryptocurrencies),
                            ];
                            this.meta = res.cryptocurrencies.meta;
                            this.isLoading = false;

                        }
                    );
                },
            },
            computed: {

            },
            created() {
                this.loadCryptocurrencies();
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
