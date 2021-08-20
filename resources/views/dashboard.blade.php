@extends('layout.master')

@section('content')
    <div class="container pt-5" id="dashboardVue" v-cloak>
        <div class="row mb-2">
            <div class="col-md-3">
                <label class="form-label"><b>Market Caps Segment</b></label>
                <div class="dropdown mb-3">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Select market caps
                    </button>
                    <ul class="dropdown-menu" id="dropdownCaps">
                        <li v-for="item in caps">
                            <div class="dropdown-item" @click="changeFilterArray('market_caps',item.key)">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           :checked="filter.market_caps.includes(item.key)">
                                    <label class="form-check-label">
                                        @{{ item.label }}@{{ filter.market_caps.includes(item.key) }}
                                    </label>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class=" col-md-3">
                <label class="form-label"><b>Price change percentage 24h</b></label>
                <div class="input-group mb-3">
                    <input v-model="filter.price_change_percentage_24h_low" type="number" class="form-control"
                           placeholder="from">
                    <span class="input-group-text"> → </span>
                    <input v-model="filter.price_change_percentage_24h_high" type="number" class="form-control"
                           placeholder="to">
                </div>

            </div>
            <div class=" col-md-3">
                <label class="form-label"><b>All time low change percentage</b></label>
                <div class="input-group mb-3">
                    <input v-model="filter.atl_change_percentage_low" type="number" class="form-control"
                           placeholder="from">
                    <span class="input-group-text"> → </span>
                    <input v-model="filter.atl_change_percentage_high" type="number" class="form-control"
                           placeholder="to">
                </div>

            </div>
            <div class=" col-md-3">
                <label class="form-label"><b>Symbols</b></label>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Select symbols
                    </button>
                    <ul class="dropdown-menu w-100" id="dropdownSymbols"
                        style="max-height: 60vh;overflow-y: scroll;padding-top:0;">
                        <li class="bg-white sticky-top">
                            <div class="dropdown-item"><input class="w-100" type="text" placeholder="Search"
                                                              v-model="search">
                            </div>
                        </li>
                        <li v-for="item in _symbols">
                            <div class="dropdown-item" @click="changeFilterArray('symbols',item)">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           :checked="filter.symbols.includes(item)">
                                    <label class="form-check-label text-truncate w-100">
                                        @{{ item }}
                                    </label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mb-5">
            <button class="btn btn-success" @click="apply" :disabled="isLoading">Apply</button>
        </div>
        <div class="d-flex justify-content-end">
            <div>Page: @{{ meta.current_page }}/@{{ meta.total_pages }}</div>
        </div>

        <div id="table-market" class="table-responsive tableFixHead" v-on:scroll="handleScroll">
            <table class="table  table-sm table-striped">
                <thead>
                <tr class="table-danger">
                    <th v-for="field in fields" scope="col" class="text-nowrap pointer"
                        :id="`head-${field.key}`"
                        @click="onChangeSort(field.key)">@{{ field.name }}

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
                        <th scope="row" class="text-nowrap">@{{coin.id}}</th>
                        <td scope="row" class="text-nowrap">@{{coin.symbol}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.name}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.holder_count}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.current_price}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.market_cap}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.total_volume}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.price_change_24h}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.price_change_percentage_24h}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.circulating_supply}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.total_supply}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.max_supply}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.market_cap_rank}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.fully_diluted_valuation}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.asset_platform_id}}</td>
                        <td scope="row" class="text-nowrap">@{{
                            Object.keys(JSON.parse(coin.platforms||'{}')).join(', ')
                            }}
                        </td>
                        <td scope="row" class="text-nowrap">@{{coin.categories}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.high_24h}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.ath}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.ath_change_percentage}}</td>
                        <td scope="row" class="text-nowrap">@{{new Date(coin.last_market.ath_date*1000).toLocaleString()
                            }}
                        </td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.low_24h}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.atl}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.atl_change_percentage}}</td>
                        <td scope="row" class="text-nowrap">@{{new Date(coin.last_market.atl_date*1000).toLocaleString()
                            }}
                        </td>
                        <td scope="row" class="text-nowrap">@{{new
                            Date(coin.last_market.last_updated*1000).toLocaleString() }}
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        var dashboardVue = new Vue({
            el: '#dashboardVue',
            data: {
                isLoading: false,
                page: 1,
                search: '',
                symbols: {!! collect($all_coins) !!}.map(i => i.symbol),
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
                    market_caps: ["nano_caps", "micro_caps", "small_caps", "mid_caps", "large_caps", "mega_caps"],
                    price_change_percentage_24h_high: 100,
                    price_change_percentage_24h_low: -100,
                    atl_change_percentage_high: 100,
                    atl_change_percentage_low: -100,
                },
                sort: {
                    // orderBy:'symbol',
                    sortedBy: '',
                },
                meta: {
                    current_page: 1,
                    total_pages: 0,
                },
                fields: [
                    {key: 'id', name: 'ID',},
                    {key: 'symbol', name: 'Symbol',},
                    {key: 'name', name: 'Name',},
                    {key: 'holder_count', name: 'Holders',},
                    {key: 'current_price', name: 'Current price',},
                    {key: 'market_cap', name: 'Market cap',},
                    {key: 'total_volume', name: 'Total volume',},
                    {key: 'price_change_24h', name: 'Price change 24h',},
                    {key: 'price_change_percentage_24h', name: 'Price change percentage 24h',},
                    {key: 'circulating_supply', name: 'Circulating supply',},
                    {key: 'total_supply', name: 'Total supply',},
                    {key: 'max_supply', name: 'Max supply',},
                    {key: 'market_cap_rank', name: 'Market cap rank',},
                    {key: 'fully_diluted_valuation', name: 'Fully diluted valuation',},
                    {key: 'asset_platform_id', name: 'Asset platform',},
                    {key: 'platforms', name: 'Platforms',},
                    {key: 'categories', name: 'Categories',},
                    {key: 'high_24h', name: 'High 24h',},
                    {key: 'ath', name: 'Ath',},
                    {key: 'ath_change_percentage', name: 'Ath change percentage',},
                    {key: 'ath_date', name: 'Ath date',},
                    {key: 'low_24h', name: 'Low 24h',},
                    {key: 'atl', name: 'Atl',},
                    {key: 'atl_change_percentage', name: 'Atl change percentage',},
                    {key: 'atl_date', name: 'Atl date',},
                    {key: 'last_updated', name: 'Last updated',},
                ]
            },
            methods: {
                onChangeSort: function (orderBy) {
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
                    document.getElementById("table-market").scrollTop = 0;
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
                                const head = document.getElementById(`head-${dashboardVue.sort.orderBy}`);
                                if (head) {
                                    document.getElementById("table-market").scrollLeft = head.offsetLeft;
                                }
                            }, 100)
                        }
                    );
                },
            },
            computed: {
                _symbols: function () {
                    const _search = this.search.trim().toLowerCase();
                    return this.symbols.filter(c => {
                        const s = c.trim().toLowerCase();
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
    </style>
@endsection
