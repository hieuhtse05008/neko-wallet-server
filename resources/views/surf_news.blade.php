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

        /* width */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
            cursor: pointer;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #eaeaea;
            border-radius: 100px;

        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            cursor: pointer;
            background: #adadad;
            border-radius: 100px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #9e9e9e;
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
                        <li>
                            <a class="dropdown-item" v-for="item in types" href="#"
                               v-bind:class="{active: item.key == filter.type.key}"
                               v-on:click="changeFilter('type', item)">@{{ item.name }}</a>
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
                               v-bind:class="{active: item.key == filter.kind.key}"
                               v-on:click="changeFilter('kind', item)">@{{ item.name }}</a>
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
                            <div class="dropdown-item"><input type="tex" placeholder="Search" v-model="search"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" v-bind:class="{active: item.key == filter.currency.key}"
                               v-for="item in _currencies" href="#" v-on:click="changeFilter('currency', item)">@{{
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
                            <a v-bind:href="`https://cryptopanic.com/news/${item.id}/click/`" target="_blank"
                               class="text-truncate w-50">@{{
                                `${item.domain}/${item.slug}` }}</a>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><b>Crypto Panic url:</b></div>
                            <a v-bind:href="`${item.url}`" target="_blank" class="text-truncate w-50">@{{ `${item.url}`
                                }}</a>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-3">
                            <div class="d-flex align-items-center vote-item me-2" v-for="vote in votes"
                            >
                                {{--                                <i v-bind:class=" vote.icon" v-bind:style="{color:  vote.color} "></i>--}}
                                @{{ vote.icon }}@{{ item.votes[vote.key] }}
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-end align-items-center flex-wrap mb-2">
                            <button type="button" class="btn btn-primary btn-sm me-2 mb-2" v-on:click="sendToTelegram('-1001548803112',item)"
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
                            <button type="button" class="btn btn-primary btn-sm mb-2" v-on:click="sendToTelegram('-535769292',item)"
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
    _token = "{{ csrf_token() }}"
</script>
<script src="{{asset('/js/surf_news.js')}}"></script>

</body>
</html>
