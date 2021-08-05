@extends('layout.master')

@section('content')
    <div class="container pt-5" id="dashboardVue">
        <div class="row mb-3">
            <div class=" col-md-3">
                <label class="form-label"><b>Market Caps Segment</b></label>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button"
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
                    <input v-model="filter.price_change_percentage_24h.low" type="number" class="form-control"
                           placeholder="from">
                    <span class="input-group-text"> → </span>
                    <input v-model="filter.price_change_percentage_24h.high" type="number" class="form-control"
                           placeholder="to">
                </div>

            </div>
            <div class=" col-md-3">
                <label class="form-label"><b>All time low change percentage</b></label>
                <div class="input-group mb-3">
                    <input v-model="filter.alt_change_percentage.low" type="number" class="form-control"
                           placeholder="from">
                    <span class="input-group-text"> → </span>
                    <input v-model="filter.alt_change_percentage.high" type="number" class="form-control"
                           placeholder="to">
                </div>

            </div>
            <div class="col-md-3">
                <label class="form-label"><b>Symbols</b></label>
                <div class="dropdown me-2 mb-2 w-100">
                    <div class="btn btn-outline-secondary  w-100" type="button"
                         data-bs-toggle="dropdown" aria-expanded="false">
                        <template v-if="!filter.symbols.length">Select symbols</template>
                        <div v-else>
                            <div class="d-flex flex-wrap">
                                <button v-for="item in filter.symbols"
                                        @click="changeFilterArray('symbols',item)"
                                        class="btn  btn-dark btn-sm me-2 mb-2">
                                    @{{ item }} <i class="bi bi-x-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="dropdown-menu w-100" id="dropdownSymbols"
                        style="max-height: 60vh;overflow-y: scroll;padding-top:0;">
                        <li class="bg-white sticky-top">
                            <div class="dropdown-item"><input type="text" placeholder="Search" v-model="search">
                            </div>
                        </li>
                        <li v-for="item in _symbols">
                            <div class="dropdown-item" @click="changeFilterArray('symbols',item)">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           :checked="filter.symbols.includes(item)">
                                    <label class="form-check-label">
                                        @{{ item }}
                                    </label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive tableFixHead">
                <table class="table  table-sm table-striped">
                    <thead>
                    <tr class="table-danger">
                        <th scope="col">ID</th>
                        <th scope="col">Symbol</th>
                        <th scope="col">Name</th>
                        <th scope="col">Current price</th>
                        <th scope="col">Market cap</th>
                        <th scope="col">Total volume</th>
                        <th scope="col">Price change 24h</th>
                        <th scope="col">Price change percentage 24h</th>
                        <th scope="col">Circulating supply</th>
                        <th scope="col">Total supply</th>
                        <th scope="col">Max supply</th>
                        <th scope="col">Market cap rank</th>
                        <th scope="col">Fully diluted valuation</th>
                        <th scope="col">High 24h</th>
                        <th scope="col">Ath</th>
                        <th scope="col">Ath change percentage</th>
                        <th scope="col">Ath date</th>
                        <th scope="col">Low 24h</th>
                        <th scope="col">Atl</th>
                        <th scope="col">Atl change percentage</th>
                        <th scope="col">Atl date</th>
                        <th scope="col">Last updated</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="isLoading">
                        <td colspan="22">
                            <div class="w-100 d-flex align-items-center justify-content-center" style="height: 80vh;">
                                <div class="spinner-grow" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <template v-for="coin in coins">
                        <tr v-if="coin.last_market && !isLoading">
                            <th scope="row">@{{coin.id}}</th>
                            <td scope="row">@{{coin.symbol}}</td>
                            <td scope="row">@{{coin.name}}</td>
                            <td scope="row">@{{coin.last_market.current_price}}</td>
                            <td scope="row">@{{coin.last_market.market_cap}}</td>
                            <td scope="row">@{{coin.last_market.total_volume}}</td>
                            <td scope="row">@{{coin.last_market.price_change_24h}}</td>
                            <td scope="row">@{{coin.last_market.price_change_percentage_24h}}</td>
                            <td scope="row">@{{coin.last_market.circulating_supply}}</td>
                            <td scope="row">@{{coin.last_market.total_supply}}</td>
                            <td scope="row">@{{coin.last_market.max_supply}}</td>
                            <td scope="row">@{{coin.last_market.market_cap_rank}}</td>
                            <td scope="row">@{{coin.last_market.fully_diluted_valuation}}</td>
                            <td scope="row">@{{coin.last_market.high_24h}}</td>
                            <td scope="row">@{{coin.last_market.ath}}</td>
                            <td scope="row">@{{coin.last_market.ath_change_percentage}}</td>
                            <td scope="row">@{{coin.last_market.ath_date}}</td>
                            <td scope="row">@{{coin.last_market.low_24h}}</td>
                            <td scope="row">@{{coin.last_market.atl}}</td>
                            <td scope="row">@{{coin.last_market.atl_change_percentage}}</td>
                            <td scope="row">@{{coin.last_market.atl_date}}</td>
                            <td scope="row">@{{coin.last_market.last_updated}}</td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const allCoins = {!! collect($all_coins) !!};
        var dashboardVue = new Vue({
            el: '#dashboardVue',
            data: {
                isLoading: true,
                search: '',
                symbols: allCoins.map(i => i.symbol),
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
                    price_change_percentage_24h: {high: 100, low: -100,},
                    alt_change_percentage: {high: 100, low: -100,},
                },
            },
            methods: {
                changeFilterArray: function (field, key) {
                    if (this.filter[field].includes(key)) {
                        this.filter[field] = this.filter[field].filter(i => i != key);
                    } else {
                        this.filter[field].push(key);
                    }
                },
                loadCoins: function (page = 1) {
                    this.isLoading = true;
                    $.get(`/api/v1/coins?include=last_market&page=${page}`).then(
                        (res) => {
                            console.log(res);
                            this.coins = res.coins.filter(i => i.last_market);
                            this.filter = {
                                ...this.filter,
                                ...this.pivots
                            };
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
                pivots: function () {
                    const coins = this.coins.filter(c => c.last_market);
                    const price_change_percentage_24h = coins.map(c => c.last_market.price_change_percentage_24h);
                    const alt_change_percentage = coins.map(c => c.last_market.ath_change_percentage);
                    return {
                        price_change_percentage_24h: {
                            low: Math.min(...price_change_percentage_24h),
                            high: Math.max(...price_change_percentage_24h),
                        },
                        alt_change_percentage: {
                            low: Math.min(...alt_change_percentage),
                            high: Math.max(...alt_change_percentage),
                        },
                    }
                },
            },
            created() {
                // this.loadCoins();
            },
        });
    </script>
@endpush

@section('styles')
    <style>
        .table-responsive {
            overflow-y: auto;
            max-height: 90vh;
            min-height: 90vh;
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
