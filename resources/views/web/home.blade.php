@extends('web.layout.master')

@section('content')
    <div class="container-md">
        <div class="row my-5 py-5">
            <div class="col-12 col-sm-6">
                <div class="d-flex flex-column h-100 justify-content-center">
                    <div class="text-spotlight mb-4">
                        <div>Invest in <span class="text-main">more than 6,000 cryptocurrencies </span> from all
                            exchanges.
                        </div>
                    </div>
                    <div class="mb-4">Secured. Hassle-free. 0% fee for private beta.</div>
                    <form class="mb-4 d-flex flex-wrap" id="form-early-access">
                        <input id="input-early-access-email" placeholder="Enter your email"
                               class="rounded mb-3 mb-lg-0  inp-main" type="email" style="" required>
                        <div class="me-3 d-none d-md-block"></div>
                        <button class="btn btn-main px-3 text-center border-light rounded-3">
                            Get early access
                        </button>
                    </form>
                    <div class="mb-5 mb-sm-0">
                        <i class="fas fa-play-circle"></i> See how it works
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="d-flex">
                    <img class="ms-auto" src="/images/home/phone.png">
                </div>
            </div>
        </div>
        <div class="row my-5 py-5 gx-5">
            <div class="col-12 col-sm-6 mb-5 mb-sm-0">
                <img src="/images/home/swipe.png">
            </div>
            <div class="col-12 col-sm-6">
                <div class="h-100 d-flex">
                    <div class="ms-auto my-auto">
                        <div class="text-spotlight mb-4">Exchange any Crypto-assets on any Blockchain networks.</div>
                        <div class="mb-4">Neko is a multichain wallet, Neko is now supports 6000+ tokens on</div>
                        <div class="d-flex flex-wrap">
                            @foreach($networks as $network)
                                <div class="rounded-7 bg-gray py-2 px-2 me-3 d-flex flex-nowrap mb-3 mb-lg-0">
                                    <img src="{{$network->icon_url}}" width="25" height="25">
                                    <div class="mx-2">{{$network->symbol}}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5 py-5 d-flex flex-row-reverse gx-5">
            <div class="col-12 col-sm-6 mb-5 mb-sm-0">
                <img src="/images/home/protect.png">
            </div>
            <div class="col-12 col-sm-6">
                <div class="h-100 d-flex">
                    <div class="ms-auto my-auto">
                        <div class="text-spotlight mb-4">Take your crypto to the next level with Neko.</div>
                        <div class="mb-4">Neko is easy to use, secured, functional</div>
                        <a href="#input-early-access-email" class="btn btn-main px-3 text-center">
                            Get early access
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5 py-5 gx-5">
            <div class="col-12 col-sm-6">
                <img src="/images/home/cute_boat.png">
            </div>
            <div class="col-12 col-sm-6">
                <div class="h-100 d-flex">
                    <div class="ms-auto my-auto">
                        <div class="text-spotlight mb-4">Stay on top of your portfolio. Anytime. Anywhere.</div>
                        <div class="mb-4">Exchange any Crypto-assets on any Blockchain networks.</div>
                        <a href="#input-early-access-email" class="btn btn-main px-3 text-center">
                            Get early access
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5 py-5">
            <div class="text-center">
                <h1 class="text-main">Main Features</h1>
                <h5 class="fw-normal">See what Neko can do</h5>
            </div>
            <div class="py-5"></div>
            <div class="row row-eq-height gx-5 gy-3">
                @foreach($features as $key=>$feature)
                    <div class="col-12 col-sm-4">
                        <div class=" h-100
                        @if(in_array($key,[1,4]))
                            mt-0 mt-sm-5
                        @endif
                            ">
                            <div class="rounded-1-56 shadow-sm p-5">
                                <h5 class="text-main mb-3">{{$feature['title']}}</h5>
                                <div class="mb-5">{{$feature['description']}}</div>
                                <img class="w-100 mx-auto" src="{{$feature['image_url']}}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="my-5 py-5">
            <div class="text-center mb-5">
                <h1 class="text-main">Road map</h1>
                <h5 class="fw-normal">See what is going on with Neko</h5>
            </div>
            <div class="row row-eq-height">
                @foreach($road_maps as $road_map)
                    <div class="col-12 col-sm-6 col-lg-3 gy-3">
                        <div class="rounded-7 p-4 h-100
                            @if(isset($road_map['current']))
                            shadow-sm
                            @endif">
                            <div class="mb-5 rounded-pill btn
                            @if(isset($road_map['current']))
                                bg-main text-white
                                @else
                                bg-gray
                            @endif
                                ">{{$road_map['time']}}</div>
                            <h6 class="mb-5 text-main">{{$road_map['title']}}</h6>
                            @foreach($road_map['items'] as $item)
                                <div class="mb-4">
                                    <div class="d-flex">
                                        <div class="me-2">
                                            @if($item['done'])
                                                <i class="text-main fas fa-check-circle"></i>
                                            @else
                                                <i class="text-main far fa-circle"></i>
                                            @endif
                                        </div>
                                        <div class="
                                            @if($item['done'])
                                            fw-bold
                                            @endif"
                                        >{{$item['title']}}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="my-5 py-5">
            <div class="text-center mb-5 pb-5">
                <h1 class="text-main">Founding Team</h1>
                {{--                <h5 class="fw-normal">See what is going on with Neko</h5>--}}
            </div>
            <div class="row gy-5">
                @foreach($founders as $founder)
                    <div class="col-6 col-md-3 text-center">
                        <img src="{{$founder['avatar']}}">
                        <div class="fw-bold text-uppercase mt-3 mt-lg-5">{{$founder['name']}}</div>
                        <div>{{$founder['role']}}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="my-5 py-5">
            <div class="bg-main w-100 rounded-2-7 text-white text-center py-5 px-3">
                <h3 class="mb-5">Join our beta program for free</h3>
                <div class="mb-5">Leave your email and we will send you a private invitation for beta app</div>

                <form id="form-early-access-2">
                    <div class="mb-4 d-flex flex-wrap justify-content-center mx-0 px-0 mx-lg-5 px-lg-5">
                        <input id="input-early-access-email-2" placeholder="Enter your email"
                               class="rounded mb-3 mb-md-0  inp-main flex-grow-1" type="email" style="" required>
                        <div class="me-3 d-none d-md-block"></div>
                        <button class="btn btn-main px-3 py-2 text-center border-light rounded-3 flex-grow-1 flex-lg-grow-0">
                            Get early access
                        </button>
                    </div>
                </form>
            </div>
            <div class="mx-auto rounded-2-7 " style="
    background: #fc78191a;
    width: 85%;
    height: 139px;
    margin-top: -100px;
">
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-register-early-access-success" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 rounded-7">
                <div class="modal-body p-5">
                    <button type="button" class="btn-close end-0 me-3 mt-3 position-absolute top-0"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="d-flex justify-content-center mb-4">
                        <img src="/images/no_padding_light.png  " width="95" height="100">
                    </div>
                    <div class="text-center mb-4 fw-bold fs-36">
                        Thank you!
                    </div>
                    <div class="text-center bg-gray p-3 mb-4 rounded-7">
                        <div class="text-center mb-3">
                            We have added your email <span class="text-main" id="early-access-email">(benedict.strange@gmail.com)</span>
                            to the signup queue.
                        </div>
                        <div class="fw-bold" style="font-size: 24px;">You’re the <span id="count-all"></span>!</div>
                    </div>
                    <div class="text-center mb-4">
                        Get access sooner by referring your friends.<br>
                        The more friends that join, the sooner you’ll get access.
                    </div>

                    <div class="mb-4 d-flex justify-content-center flex-wrap" id="form-share-ref">
                        <input readonly id="input-share-ref" placeholder="Url here"
                               class="flex-grow-1 inp-main mb-3 rounded" type="text" style="">
                        <div class="me-3"></div>
                        <button onclick="
                                    document.getElementById('text-copy-ref').innerText = 'Copied!';
                                    document.getElementById('input-share-ref').select();
                                    document.execCommand('copy');
                                " class="btn btn-main px-3 text-center">
                            <i class="fal fa-copy"></i>
                            <span id="text-copy-ref">Copy link</span>
                        </button>
                    </div>

                    <div class="text-center mb-4">
                        <div class="text-center mb-3">
                            Or share to your social
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-wrap p-3">
                            <div class="me-3">
                                <a class="rounded-circle text-white d-flex"
                                   style="background: #1DA0F1;"
                                   href="https://twitter.com/Neko_Invest"><i
                                        class="fab fa-twitter link-icon"></i></a></div>
                            {{--                                <div class="me-3">--}}
                            {{--                                    <a class="rounded-circle text-white d-flex"--}}
                            {{--                                       style="background: #2CA5E0;"--}}
                            {{--                                       href="https://t.me/nekoinvest">--}}
                            {{--                                        <i class="fab fa-telegram-plane link-icon"></i>--}}
                            {{--                                    </a>--}}
                            {{--                                </div>--}}
                            {{--                                <div>--}}
                            {{--                                    <a class="rounded-circle text-white d-flex"--}}
                            {{--                                       style="background: #7289da;"--}}
                            {{--                                       href="https://discord.gg/nhZsK6Xarz"><i--}}
                            {{--                                            class="fab fa-discord  link-icon"></i>--}}
                            {{--                                    </a>--}}
                            {{--                                </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function submitFormEarlyAccess(e, input_id) {
            e.preventDefault();
            const email = $(input_id).val();
            $.post(`/register-early-access`, {email, _token, ref: '{{ app('request')->input('ref')}}'}).then(res => {
                console.log(res);
                if (res.info) {
                    $('#input-share-ref').val(`https://www.nekoinvest.io/?ref=${res.info.code}`);
                    $('#early-access-email').text(`${email}`);
                    $('#count-all').text((`${res.register_count}`).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $('#modal-register-early-access-success').modal('show');

                }
            });
        }

        $('#form-early-access').on('submit', e => submitFormEarlyAccess(e, '#input-early-access-email'));
        $('#form-early-access-2').on('submit', e => submitFormEarlyAccess(e, '#input-early-access-email-2'));
    </script>
@endpush
@section('styles')
    <style>
        img {
            max-width: 100%;
        }

        body {
            /*background: linear-gradient(225deg, rgba(252, 120, 25, 0.1) 0%, rgba(255, 255, 255, 0) 35%, rgba(252, 120, 25, 0.1) 100%);*/
            background: white;
        }

        #modal-register-early-access-success .link-icon {
            width: 44px;
            height: 44px;
            line-height: 44px;
        }


        #form-early-access-2 input {

            /*width: 413px;*/
            max-width: 100%;
        }

        .text-spotlight {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 30px;
            line-height: 140%;
            color: #0E0928;

        }

        @media (min-width: 0) {

            .text-spotlight {
                font-size: 24px;
            }

        }

        @media (min-width: 576px) {

            .text-spotlight {
                font-size: 24px;
            }

        }

        @media (min-width: 768px) {

            .text-spotlight {
                font-size: 30px;
            }

        }
    </style>
@endsection
