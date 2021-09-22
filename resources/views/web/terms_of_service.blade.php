@extends('web.layout.master')
@section('meta')
    <title>Terms of service</title>
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
                        <div class="indent mb-2">By accepting our Terms & Condition, these terms will automatically apply to you – you should make sure therefore that you read them carefully before using the app. You’re not allowed to copy, or modify the app, any part of the app, or our trademarks in any way. You’re not allowed to attempt to extract the source code of the app, and you also shouldn’t try to translate the app into other languages, or make derivative versions. The app itself, and all the trade marks, copyright, database rights and other intellectual property rights related to it, still belong to Neko Global.</div>
                        <div class="indent mb-2">Neko Global is committed to ensuring that the app is as useful and efficient as possible. For that reason, we reserve the right to make changes to the app or to charge for its services, at any time and for any reason. We will never charge you for the app or its services without making it very clear to you exactly what you’re paying for.</div>
                        <div class="indent mb-2">The Neko Wallet app stores and processes personal data that you have provided to us, in order to provide our Service. It’s your responsibility to keep your phone and access to the app secure. We therefore recommend that you do not jailbreak or root your phone, which is the process of removing software restrictions and limitations imposed by the official operating system of your device. It could make your phone vulnerable to malware/viruses/malicious programs, compromise your phone’s security features and it could mean that the Neko Wallet app won’t work properly or at all.</div>
                        <div class="indent mb-2">The app does use third party services that declare their own Terms and Conditions.</div>
                        <div class="indent mb-2">You should be aware that there are certain things that Neko Global will not take responsibility for. Certain functions of the app will require the app to have an active internet connection. The connection can be Wi-Fi, or provided by your mobile network provider, but Neko Global cannot take responsibility for the app not working at full functionality if you don’t have access to Wi-Fi, and you don’t have any of your data allowance left.</div>
                        <div class="indent mb-2">If you’re using the app outside of an area with Wi-Fi, you should remember that your terms of the agreement with your mobile network provider will still apply. As a result, you may be charged by your mobile provider for the cost of data for the duration of the connection while accessing the app, or other third party charges. In using the app, you’re accepting responsibility for any such charges, including roaming data charges if you use the app outside of your home territory (i.e. region or country) without turning off data roaming. If you are not the bill payer for the device on which you’re using the app, please be aware that we assume that you have received permission from the bill payer for using the app.</div>
                        <div class="indent mb-2">Along the same lines, Neko Global cannot always take responsibility for the way you use the app i.e. You need to make sure that your device stays charged – if it runs out of battery and you can’t turn it on to avail the Service, Neko Global cannot accept responsibility.</div>
                        <div class="indent mb-2">With respect to Neko Global’s responsibility for your use of the app, when you’re using the app, it’s important to bear in mind that although we endeavour to ensure that it is updated and correct at all times, we do rely on third parties to provide information to us so that we can make it available to you. Neko Global accepts no liability for any loss, direct or indirect, you experience as a result of relying wholly on this functionality of the app.</div>
                        <div class="indent mb-2">At some point, we may wish to update the app. The app is currently available on Android & iOS – the requirements for both systems(and for any additional systems we decide to extend the availability of the app to) may change, and you’ll need to download the updates if you want to keep using the app. Neko Global does not promise that it will always update the app so that it is relevant to you and/or works with the Android & iOS version that you have installed on your device. However, you promise to always accept updates to the application when offered to you, We may also wish to stop providing the app, and may terminate use of it at any time without giving notice of termination to you. Unless we tell you otherwise, upon any termination, (a) the rights and licenses granted to you in these terms will end; (b) you must stop using the app, and (if needed) delete it from your device.</div>

                    </div>
                </div>

                <div class="mb-5">
                    <div class="text-main pg-title mb-4">Changes to This Terms and Conditions</div>
                    <div class="pg-content">
                        <div class="indent mb-2">We may update our Terms and Conditions from time to time. Thus, you are advised to review this page periodically for any changes. We will notify you of any changes by posting the new Terms and Conditions on this page.</div>
                        <div class="indent mb-2">These terms and conditions are effective as of 2021-09-01.</div>

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
