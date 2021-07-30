var main = new Vue({
    el: '#main',
    data: {
        isLoading: false,
        isSendingTelegram: false,
        _token:null,
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
            const title = `<a href="${href}">${item.title}</a>`;
            let votes = ``;
            if(item.votes){
                this.votes.filter(v=>item.votes[v.key]).forEach(v=>{
                    votes = `${votes} ${v.icon}${item.votes[v.key]}`;
                });
            }
            const vote = `<a>${votes}</a>`;
            return `${title}\n\n${vote}`;
        },
        sendToTelegram: function (chat_id = '-535769292',item) {
            //neko terminal -1001548803112
            this.isSendingTelegram = true;
            console.log(chat_id,item);
            const encoded_text = this.buildTelegramMessage(item);
            const url = `${window.location.origin}/push-news-telegram`;
return;
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
            // let url = 'https://cors-anywhere.herokuapp.com/https://cryptopanic.com/api/v1/posts/?auth_token=01bfba8038c9eab12a673ee05045072b3906a648';
            // let api_url = 'https://cryptopanic.com/api/v1/posts/?auth_token=01bfba8038c9eab12a673ee05045072b3906a648&currencies=BTC,ETH&page=2';
            let url = `https://cryptopanic.com/api/v1/posts/?auth_token=01bfba8038c9eab12a673ee05045072b3906a648&page=${page}&filter=${this.filter.type.key}&kind=${this.filter.kind.key}&currencies=${this.filter.currency.key}`;

            const api_url = `${window.location.origin}/load-cors`;

            this.isLoading = true;
            if (page == 1) {
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
            if ($(window).scrollTop() + $(window).innerHeight() >= $('#scoll-pivot').position().top - 100) {
                console.log(123);
                _this.loadNews(_this.pagination.page + 1);
            }
        });
    }
});
