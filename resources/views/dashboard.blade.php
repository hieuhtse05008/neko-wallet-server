@extends('layout.master')

@section('content')
    <div class="container pt-5" id="dashboardVue">
        <div class="row mb-5">
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
                    <input v-model="filter.alt_change_percentage_low" type="number" class="form-control"
                           placeholder="from">
                    <span class="input-group-text"> → </span>
                    <input v-model="filter.alt_change_percentage_high" type="number" class="form-control"
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
                            <div class="dropdown-item"><input class="w-100" type="text" placeholder="Search" v-model="search">
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
        <div class="table-responsive tableFixHead" v-on:scroll="handleScroll">
            <table class="table  table-sm table-striped">
                <thead>
                <tr class="table-danger">
                    <th scope="col" class="text-nowrap">ID</th>
                    <th scope="col" class="text-nowrap">Symbol</th>
                    <th scope="col" class="text-nowrap">Name</th>
                    <th scope="col" class="text-nowrap">Current price</th>
                    <th scope="col" class="text-nowrap">Market cap</th>
                    <th scope="col" class="text-nowrap">Total volume</th>
                    <th scope="col" class="text-nowrap">Price change 24h</th>
                    <th scope="col" class="text-nowrap">Price change percentage 24h</th>
                    <th scope="col" class="text-nowrap">Circulating supply</th>
                    <th scope="col" class="text-nowrap">Total supply</th>
                    <th scope="col" class="text-nowrap">Max supply</th>
                    <th scope="col" class="text-nowrap">Market cap rank</th>
                    <th scope="col" class="text-nowrap">Fully diluted valuation</th>
                    <th scope="col" class="text-nowrap">High 24h</th>
                    <th scope="col" class="text-nowrap">Ath</th>
                    <th scope="col" class="text-nowrap">Ath change percentage</th>
                    <th scope="col" class="text-nowrap">Ath date</th>
                    <th scope="col" class="text-nowrap">Low 24h</th>
                    <th scope="col" class="text-nowrap">Atl</th>
                    <th scope="col" class="text-nowrap">Atl change percentage</th>
                    <th scope="col" class="text-nowrap">Atl date</th>
                    <th scope="col" class="text-nowrap">Last updated</th>
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
                        <td scope="row" class="text-nowrap">@{{coin.last_market.high_24h}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.ath}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.ath_change_percentage}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.ath_date}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.low_24h}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.atl}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.atl_change_percentage}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.atl_date}}</td>
                        <td scope="row" class="text-nowrap">@{{coin.last_market.last_updated}}</td>
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
                    {label: 'Mega caps', key: 'mega_caps', low: 1000000000, high: 0},
                ],
                filter: {
                    symbols: [],
                    market_caps: ["nano_caps", "micro_caps", "small_caps", "mid_caps", "large_caps", "mega_caps"],
                    price_change_percentage_24h_high: 100,
                    price_change_percentage_24h_low: -100,
                    alt_change_percentage_high: 100,
                    alt_change_percentage_low: -100,
                },
            },
            methods: {
                handleScroll: function ({target}){
                    // console.log(e)
                    const {scrollHeight, scrollTop,offsetHeight} = target;
                    if(scrollHeight <= scrollTop +  offsetHeight + 33*150){
                        console.log('==============================')
                        this.loadCoins(this.page+1);
                    }
                    console.log(scrollHeight , scrollTop +  offsetHeight)

                },
                changeFilterArray: function (field, key) {
                    if (this.filter[field].includes(key)) {
                        this.filter[field] = this.filter[field].filter(i => i != key);
                    } else {
                        this.filter[field].push(key);
                    }
                },
                loadCoins: function (page = 1) {
                    if(this.isLoading) return;
                    this.isLoading = true;
                    const {
                        price_change_percentage_24h_high,
                        price_change_percentage_24h_low,
                        alt_change_percentage_high,
                        alt_change_percentage_low,
                        market_caps,
                        symbols,
                    } = this.filter;
                    $.get(`/api/v1/coins?include=last_market`,{
                        page,
                        limit:200,
                        price_change_percentage_24h_high,
                        price_change_percentage_24h_low,
                        alt_change_percentage_high,
                        alt_change_percentage_low,
                        market_caps,
                        symbols,
                    }).then(
                        (res) => {
                            console.log(res);
                            this.coins = [
                                ...this.coins,
                                ...res.coins.items.filter(i => i.last_market),
                            ];
                            if (!this.symbols.length) {
                                this.symbols = this.coins.map(i => i.symbol);
                            }
                            this.isLoading = false;
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
            max-height: calc(100vh - 10rem);
            min-height: calc(100vh - 10rem);
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
    </style>
@endsection
