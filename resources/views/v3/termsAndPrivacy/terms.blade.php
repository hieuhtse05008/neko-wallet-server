@extends('v3.layout.master',['theme'=>'light'])
@section('content')
<section id="terms">
    <div class="container">
        <div class="row">
            <div class="d-none d-md-block col-md-3">
                <div class="selection">
                    <div class="fs-6 fw-bold mb-3"><a href="{{route('terms')}}">Terms of service</a></div>
                    <div class="fs-6 opacity-60"><a href="{{route('privacy')}}">Privacy Policies</a></div>
                </div>
            </div>
            <div class="d-block d-md-none mb-4">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Terms of Service
                    </button>
                    <ul class="dropdown-menu px-3" aria-labelledby="dropdownMenuButton1">
                        <li class="p-1">
                            <img class="invisible" src="/images/v3/terms/Fill.png" alt="">
                            <a class="dropdown-item opacity-60" href="#">Choose a category</a>
                        </li>
                        <li class="p-1">
                            <img src="/images/v3/terms/Fill.png" alt="">
                            <a class="dropdown-item" href="{{route('terms')}}">Terms of Service</a>
                        </li>
                        <li class="p-1">
                            <img class="invisible" src="/images/v3/terms/Fill.png" alt="">
                            <a class="dropdown-item" href="{{route('privacy')}}">Privacy Policies</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-8">
                <div class="text-start mb-1">
                    <h1 class="color-gradient title-2">Terms of Service</h1>
                </div>
                <div class="mb-3 mb-sm-5">
                    <span class="font-size-main">Version 3.0 - </span>
                    <span class="font-size-main opacity-60">Sep 30th, 2022</span>
                </div>
                <div class="font-size-main mb-2 mb-sm-5">
                    This Framer Terms of Service (“Agreement”) is entered into by and between Framer B.V. (“Framer”) and the entity or person placing an order for or accessing the Services (“Customer”). This Agreement consists of the terms and conditions set forth below and any Order Form. The “Effective Date” of this Agreement is the date which is the earlier of (a) Customer’s initial access to the Services through any online provisioning, registration or order process or (b) the Effective Date of the first Order Form. This Agreement will govern Customer’s initial purchase on the Effective Date as well as any future purchases made by Customer that reference this Agreement. Framer may modify this Agreement from time to time as permitted in Section 13.4 (Amendment).
                    <br>
                    <br>
                    Capitalized terms shall have the meanings set forth in Section 1, or in the section where they are first used.
                </div>
                <div class="title-3 mb-4">
                    1. Definitions
                </div>
                <div class="font-size-main">
                    1.1 “Authorized Devices​” means those mobile, desktop, or other devices with which the Services can be accessed and used.
                    <br>
                    <br>
                    1.2 “​Content​” means code, content, fonts, graphics, designs, documents, or materials created using the Services by Customer and its Users or imported into the Services by Customer and its Users.
                    <br>
                    <br>
                    1.3 “Documentation” ​means the technical materials made available by Framer to Customer and/or its Users in hard copy or electronic form describing the use and operation of the Services.
                    <br>
                    <br>
                    1.4 “Services” Framer’s proprietary web-based products and services, along with downloadable desktop and mobile apps. Each Order Form will identify details of Customer’s Services subscription.
                    <br>
                    <br>
                    1.5 “Order Form” means a document signed by both Parties identifying the Enterprise Services to be made available by Framer pursuant to this Agreement.
                    <br>
                    <br>
                    1.6 “​Packages​” or “Components” means add-on modules made available within the Services. Packages and Components may be created by Framer, Customer or other third parties. Packages and Components created by Framer are supported as part of the Services. Framer will use reasonable efforts to support Customer’s use of Packages and Components created by third parties but disclaims all warranties as to such Packages and Components.
                    <br>
                    <br>
                    1.7 “User” means an employee, contractor or other individual associated with Customer who has been provisioned by Customer with access to the Services.
                    <br>
                    <br>
                    1.8 “Services” means Framer’s SaaS product, web design software, tools, along with downloadable desktop and mobile apps. Each Order Form will identify details of Customer’s subscription to the Services.
                </div>
            </div>
            <div class="col-0 col-lg-1 "></div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    body {
        background-color: unset;
        color: black !important;
    }

    #terms {
        margin-top: 160px;
        margin-bottom: 160px;
    }


    .container {
        min-height: 100vh;
    }

    .color-gradient {
        background: linear-gradient(90.46deg, #CD4DCA 33.07%, #7460CB 53.38%, #1AB4D5 65.85%);
        -webkit-text-fill-color: transparent;
        -webkit-background-clip: text;
    }


    .title {
        font-size: 80px;
        font-weight: 600;
        line-height: 90px;
    }

    .title-2 {
        font-size: 60px;
        font-weight: 600;
        line-height: 70px;
    }

    .title-3 {
        font-style: normal;
        font-weight: 600;
        font-size: 44px;
        line-height: 50px;
    }

    .font-size-main {
        font-style: normal;
        font-weight: 400;
        font-size: 22px;
        line-height: 36px;
    }

    .opacity-60 {
        opacity: 0.6;
    }

    .selection {
        margin-top: 60px;
    }

    .selection a:hover {
        color: inherit;
        opacity: 0.8;
    }

    .dropdown-toggle {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: rgba(16, 16, 16, 0.6);
        font-weight: 400;
        font-size: 16px;
        background-color: rgba(238, 238, 238, 1);
        border-radius: 100px;
        padding: 0.5rem 1.5rem;
        border: none;
        width: 100%;
    }

    .dropdown-menu {
        width: 100%;
        background-color: #989898;
        border-radius: 10px;
        color: #FAFAFA;
        inset: -30px auto auto 0 !important;
    }

    .dropdown-menu .dropdown-item {
        font-size: 16px;
        font-weight: 400;
        color: #fff;
        display: inline;
    }

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 575px) {
        #terms {
            margin: 40px 10px;
        }

        .title-2 {
            font-size: 44px;
            line-height: 50px;
        }

        .title-3 {
            font-size: 36px;
        }

        .font-size-main {
            font-size: 18px;
        }

    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 576px) and (max-width: 767px) {
        #terms {
            margin: 40px 10px;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) and (max-width: 991px) {}

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) and (max-width: 1199px) {}

    @media only screen and (min-width: 1200px) {}
</style>
@endsection
