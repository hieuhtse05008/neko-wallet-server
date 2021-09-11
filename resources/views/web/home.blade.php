@extends('web.layout.master')

@section('content')
    <div class="">
        <div class="spotlight d-flex flex-column justify-content-center align-items-center">
            <div class="text-spotlight text-center mt-auto">
                <div>Invest in <span class="text-main">more than 6,000 cryptocurrencies </span> from all exchanges.</div>
                <div>Secured. Hassle-free. 0% fee for private beta.</div>

            </div>
            <form class="my-5 d-flex justify-content-center flex-wrap" id="form-early-access" >
                <input id="input-early-access-email" placeholder="Enter your email"
                       class="rounded mb-3 inp-main" type="email" style="" required>
                <div class="me-3"></div>
                <button class="btn btn-main px-3 text-center"
{{--                        data-bs-toggle="modal" data-bs-target="#modal-register-early-access-success"--}}
                >
                    Get early access
                </button>
            </form>
            <div class="mb-auto"><i class="fas fa-play-circle"></i> See how it works</div>
        </div>
        <div class="benefits bg-white py-5 px-sm-0 px-md-4 px-lg-5">
            <div class="benefits-title mb-5">Take your crypto to the next level with Neko</div>
            <div class="benefits-items row">
                <div class="col-md-4">
                    <div class="benefits-item d-flex flex-column justify-content-between text-center">
                        <div><img src="/images/home/benefit_1.png"></div>
                        <div class="my-5 ">Exchange any Crypto-assets on <br>
                            any Blockchain networks
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefits-item d-flex flex-column justify-content-between text-center">
                        <div><img src="/images/home/benefit_2.png"></div>
                        <div class="my-5 ">Non-custodial Wallet.<br>
                            Own your keys. Own your coins.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefits-item d-flex flex-column justify-content-between text-center">
                        <div><img src="/images/home/benefit_3.png"></div>
                        <div class="my-5 ">Stay on top of your portfolio.<br>
                            Anytime. Anywhere.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-register-early-access-success" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-0 rounded-7">
                    <div class="modal-body p-5">
                        <button type="button" class="btn-close end-0 me-3 position-absolute top-0" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <input readonly id="input-share-ref" placeholder="Url here" class="flex-grow-1 inp-main mb-3 rounded" type="text" style="" >
                            <div class="me-3"></div>
                            <button onclick="copyRefLink()" class="btn btn-main px-3 text-center">
                                <i class="fal fa-copy"></i>
                                <span  id="btn-copy-ref">Copy link</span>
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
                                <div class="me-3">
                                    <a class="rounded-circle text-white d-flex"
                                       style="background: #2CA5E0;"
                                       href="https://t.me/nekoinvest">
                                        <i                                            class="fab fa-telegram-plane link-icon"></i>
                                    </a>
                                </div>
                                <div>
                                    <a class="rounded-circle text-white d-flex"
                                       style="background: #7289da;"
                                       href="https://discord.gg/DfRF5uFf"><i
                                            class="fab fa-discord  link-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        function copyRefLink(){
            document.getElementById('btn-copy-ref').innerText = 'Copied!';
            document.getElementById('input-share-ref').select();
            document.execCommand("copy");

        }
        $('#form-early-access').on('submit', function (e){
            e.preventDefault();
            const email = $('#input-early-access-email').val();
            $.post(`/register-early-access`,{email,_token, ref: '{{ app('request')->input('ref')}}'}).then(res=>{
                console.log(res);
                if(res.info){
                    $('#input-share-ref').val(`https://www.nekoinvest.io/?ref=${res.info.code}`);
                    $('#early-access-email').val(`${email}`);
                    $('#count-all').text((`${res.info.id}`).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $('#modal-register-early-access-success').modal('show');

                }
            });
        }
        );
    </script>
@endpush
@section('styles')
    <style>
        .hide-from-home{
            display: none;
        }

        .navbar {
            background-color: transparent !important;
        }

        body {
            background: linear-gradient(225deg, rgba(252, 120, 25, 0.1) 0%, rgba(255, 255, 255, 0) 35%, rgba(252, 120, 25, 0.1) 100%);

        }

        #modal-register-early-access-success .link-icon {
            width: 44px;
            height: 44px;
            line-height: 44px;
        }

        #form-early-access button, #modal-register-early-access-success button {
            height: 48px;

        }

        #form-early-access input {

            width: 413px;
            max-width: 80vw;
        }

        .benefits {
            min-height: 613px;

            /*padding-left: 140px;*/
            /*padding-right: 140px;*/
        }

        .benefits-items img{
            max-width: 100vw;
        }
        .benefits-items {
            /*display: flex;*/
        }

        .benefits-item {
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 140%;
            min-height: 339px;
        }

        .benefits-title {
            margin-bottom: 80px;
            font-style: normal;
            font-weight: 500;
            font-size: 24px;
            line-height: 140%;
            /* identical to box height, or 34px */

            text-align: center;

            /* Brand/Black */

            color: #0E0928;
        }

        .spotlight {
            min-height: 514px;
        }

        .text-spotlight {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 36px;
            line-height: 140%;
            /* or 50px */

            text-align: center;

            /* Brand/Black */

            color: #0E0928;

        }

        @media (min-width:0) {

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
                font-size: 36px;
            }

        }
    </style>
@endsection
