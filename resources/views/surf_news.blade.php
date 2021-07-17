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

        body{
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
        .vote-item{
            line-height: 14px;
        }
    </style>

</head>
<body>
<div id="main" v-cloak>
    <div class="sticky-top bg-white p-3">
        <div class="d-flex justify-content-end">
            Total: @{{pagination.count}}
        </div>
    </div>
{{--    <div class="spinner-border spinner-main" role="status" v-if="isLoading">--}}
{{--        <span class="visually-hidden">Loading...</span>--}}
{{--    </div>--}}
    <div class="w-100 h-100 container pb-5">

        <div>
            <div v-for="item in news" class="card w-100 my-2">
                <div class="card-body">
                    <h3 class="card-title">[@{{ item.id }}] @{{ item.title }}</h3>

                    <p class="card-text">
                    <div class="d-flex justify-content-between">
                        <div><b>Original url:</b></div>
                        <a v-bind:href="`https://cryptopanic.com/news/${item.id}/click/`" target="_blank" class="text-truncate w-50">@{{
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
                            <div class="d-flex align-items-center vote-item me-2" v-for="vote in votes" v-bind:style="{color:  vote.color} ">
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
                        :disabled="isLoading">
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
            votes:[
                {key: 'positive', icon:'bi bi-arrow-up-circle-fill', color: 'green'},
                {key: 'important', icon:'bi bi-exclamation-triangle-fill', color: '#FFBC34'},
                {key: 'comments', icon:'bi bi-chat-dots-fill', color: '#3aa2c6'},
                {key: 'negative', icon:'bi bi-arrow-down-circle-fill', color: '#FF001C'},
                {key: 'liked', icon:'bi bi-hand-thumbs-up-fill', color: '#12a47b'},
                {key: 'disliked', icon:'bi bi-hand-thumbs-down-fill', color: '#a42d12'},
                {key: 'saved', icon:'bi bi-bookmark-star-fill', color: 'black'},
                {key: 'toxic', icon:'bi bi-x-circle-fill', color: 'purple'},
                {key: 'lol', icon:'bi bi-emoji-laughing-fill', color: '#ffd84a'},

            ],
            search: '{!! isset($search) ? $search : '' !!}',
            news: [],
            pagination: {
                count: 0,
                page: 1,
                next: null,
                previous: null,
            }
        },
        methods: {
            buildTelegramMessage: function(item){
                return `<a href="https://cryptopanic.com/news/${item.id}/click/">${item.title}</a>`;
            },
            sendToTelegram: function (item) {
                this.isSendingTelegram = true;
                console.log(item);
                const encoded_text = this.buildTelegramMessage(item);
                const url = `https://${window.location.host}/push-news-telegram`;

                $.post(url,{
                    encoded_text,
                    "_token": "{{ csrf_token() }}",
                }).then(
                    (res) => {
                        console.log(res);

                        this.isSendingTelegram = false;
                    }
                );
            },
            loadNews: function (page) {
                // let url = 'https://cors-anywhere.herokuapp.com/https://cryptopanic.com/api/v1/posts/?auth_token=01bfba8038c9eab12a673ee05045072b3906a648';
                // let api_url = 'https://cryptopanic.com/api/v1/posts/?auth_token=01bfba8038c9eab12a673ee05045072b3906a648&currencies=BTC,ETH&page=2';
                let url = `https://cryptopanic.com/api/v1/posts/?auth_token=01bfba8038c9eab12a673ee05045072b3906a648&page=${page}`;
                const api_url = `${window.location.origin}/load-cors`;

                this.isLoading = true;
                $.get(api_url,{
                    url
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
        mounted: function () {
            this.loadNews(1);
        }
    });

    $(window).scroll(function() {
        buffer = 40 // # of pixels from bottom of scroll to fire your function. Can be 0
        if ($(".myDiv").prop('scrollHeight') - $(".myDiv").scrollTop() <= $(".myDiv").height() + buffer )   {

        }
    });
</script>

</body>
</html>
