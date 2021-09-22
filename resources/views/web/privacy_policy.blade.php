@extends('web.layout.master')
@section('meta')
    <title>Privacy Policy</title>
@endsection
@section('content')
    <div class="token-wrap">
        <div class="token-cover"></div>
        <div class="token-content bg-white rounded-7">
            <a class="d-flex align-items-center mb-5" href="/">
                <i class="far fa-long-arrow-left"></i>&nbsp;&nbsp;Back
            </a>
            <div class="token-time mb-3">

            </div>
            <div class="token-title mb-5">
                 Terms & Conditions
            </div>
            <hr>
            <div class="pt-5">
                <div class="mb-5">
                    <div class="text-main pg-title mb-4"></div>
                    <div class="pg-content">
                        <div class="indent mb-2">Neko Global built the Neko Wallet app as a Free app. This SERVICE is provided by Neko Global at no cost and is intended for use as it is.</div>
                        <div class="indent mb-2">This page is used to inform visitors regarding our policies with the collection, use, and disclosure of Personal Information if anyone decided to use our Service.</div>
                        <div class="indent mb-2">If you choose to use our Service, then you agree to the collection and use of information in relation to this policy. The Personal Information that we collect is used for providing and improving the Service. We will not use or share your information with anyone except as described in this Privacy Policy.</div>
                        <div class="indent mb-2">The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at Neko Wallet unless otherwise defined in this Privacy Policy.</div>

                    </div>
                </div>

                <div class="mb-5">
                    <div class="text-main pg-title mb-4">Information Collection and Use</div>
                    <div class="pg-content">
                        <div class="indent mb-2">For a better experience, while using our Service, we may require you to provide us with certain information. The information that we request will be retained by us and used as described in this privacy policy.</div>


                    </div>
                </div>
                <div class="mb-5">
                    <div class="text-main pg-title mb-4">Security</div>
                    <div class="pg-content">
                        <div class="indent mb-2">We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it.</div>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="text-main pg-title mb-4">Changes to This Privacy Policy</div>
                    <div class="pg-content">
                        <div class="indent mb-2">We may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page.</div>
                        <div class="indent mb-2">This policy is effective as of 2021-05-14</div>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="text-main pg-title mb-4">Contact Us</div>
                    <div class="pg-content">
                        <div class="indent mb-2">If you have any questions or suggestions about our Terms and Conditions, do not hesitate to contact us at tad@nekoinvest.io</div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
@endsection

@section('styles')
    <style>
        .indent{
            text-indent: 30px;
        }
        .arrow-list ul {
            list-style: none;
        }

        .arrow-list ul li {
            position: relative;
        }

        .arrow-list .collapse-btn[aria-expanded='true']:before {
            transform: rotate(90deg);
        }

        .arrow-list .collapse-btn:before {
            content: "\f0da";
            font-family: 'Font Awesome 5 Pro';
            color: black;
            position: absolute;
            left: -15px;
            top: -1.5px;
            font-weight: 900;
            transition: transform .3s;
        }

        .pg-title {
            font-weight: bold;
            font-size: 24px;
        }

        .pg-content {

            font-weight: normal;
            font-size: 16px;
            line-height: 150%;
        }

        .token-wrap {
            min-height: 100vh;
        }

        .token-content {
            min-height: 80vh;
            /*max-width: max(74vw,min(576px,100vw));*/
            max-width: clamp(74vw, 576px, 100vw);

            margin-top: -284px;
            margin-bottom: 120px;
            margin-left: auto;
            margin-right: auto;

            padding-top: 80px;
            padding-bottom: 120px;
            padding-left: min(110px, max(100vw - 576px, 20px));
            padding-right: min(110px, max(100vw - 576px, 20px));
        }

        .related-coins-wrap {
            margin-left: max(-20px, min(576px - 100vw, 0px));
            margin-right: max(-20px, min(576px - 100vw, 0px));
            /*margin-right: -20px;*/
        }

        .related-coins {

            max-width: clamp(74vw, 576px, 100vw);

            margin-bottom: 120px;
            margin-left: auto;
            margin-right: auto;


        }

        .coin-item {
            border-radius: 12px;
            width: calc(20% - 40px);
            min-width: 180px;
            margin-right: 20px;
            margin-left: 20px;
            margin-bottom: 40px;
        }

        .token-cover {
            background: url("/images/blog/cover.jpg") no-repeat center;
            width: 100%;
            height: 480px;
            background-size: cover;
        }

        .token-time {
            line-height: 140%;
            color: #8C939E;
        }

        .token-title {
            font-size: 44px;
            font-weight: bold;
        }
    </style>
@endsection
