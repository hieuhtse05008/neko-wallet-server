@extends('v3.layout.master')
@section('content')
<section id="privacy">
    <div class="container">
        <div class="row">
            <div class="d-none d-md-block col-md-3">
                <div class="selection">
                    <div class="fs-6 mb-3 opacity-60"><a href="{{route('terms')}}">Terms of service</a></div>
                    <div class="fs-6 fw-bold "><a href="{{route('privacy')}}">Privacy Policies</a></div>
                </div>
            </div>
            <div class="d-block d-md-none mb-4">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Privacy Policies
                    </button>
                    <ul class="dropdown-menu px-3" aria-labelledby="dropdownMenuButton1">
                        <li class="p-1">
                            <img class="invisible" src="/images/v3/terms/Fill.png" alt="">
                            <a class="dropdown-item opacity-60" href="#">Choose a category</a>
                        </li>
                        <li class="p-1">
                            <img class="invisible" src="/images/v3/terms/Fill.png" alt="">
                            <a class="dropdown-item" href="{{route('terms')}}">Terms of Service</a>
                        </li>
                        <li class="p-1">
                            <img src="/images/v3/terms/Fill.png" alt="">
                            <a class="dropdown-item" href="{{route('privacy')}}">Privacy Policies</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-8">
                <div class="text-start mb-1">
                    <h1 class="color-gradient title-2 d-inline">Privacy Policies</h1>
                </div>
                <div class="mb-3 mb-sm-5">
                    <span class="font-size-main">Version 3.0 - </span>
                    <span class="font-size-main opacity-60">Sep 30th, 2022</span>
                </div>
                <div class="font-size-main mb-2 mb-sm-5">
                    This Privacy Statement explains how Personal Information about our (potential) customers and other individuals using our services is collected, used and disclosed by Framer B.V., Framer Inc. and its respective affiliates ("us", "we", "our" or "Framer"). This Privacy Statement describes our privacy practices in relation to the use of our websites (including any customer portal or interactive customer website) (https://www.framer.com and https://framer.cloud), our software (Framer), services, solutions, tools, and related applications, services, and programs, including research and marketing activities, offered by us (the "Services"), as well as your choices regarding use, access, storage and correction of Personal Information. It also describes how we collect, use, disclose and otherwise process Personal Information collected in relation to our Services and otherwise in the course of our business activities.
                </div>
                <div class="title-3 mb-4">
                    Personal Information Collection
                </div>
                <div class="font-size-main">
                    We only use your personal information to provide you with the Framer Application or to communicate with you about the services.
                    <br>
                    <br>
                    With respect to any documents or information you may choose to upload to the Framer Application, we take the privacy and confidentiality of such documents seriously. We employ industry standard techniques to protect against unauthorized access of data about you that we store, including personal information.
                    <br>
                    <br>
                    We do not share personal information you have provided to us without your consent, unless:
                    <br>
                    <br>
                    <ul>
                        <li>Doing so is appropriate to carry out your own request;</li>
                        <li>We believe it is needed to enforce our Terms of Service, or that it is legally required;</li>
                        <li>We believe it’s needed to detect, prevent, or address fraud, security, or technical issues;</li>
                        <li>Otherwise protect our property, legal rights, or that of others.</li>
                    </ul>
                    <br>
                    As part of our normal business operations, your usage of our Services, our administration of you as a customer and to comply with local laws and regulations we collect your Personal Information. We will not process Personal Information for other purposes than described in this Privacy Statement.
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

    #privacy {
        margin-top: 160px;
        margin-bottom: 160px;
    }

    .navbar #navbarSupportedContent ul li a {
        color: rgba(16, 16, 16, 1);
    }

    .navbar form button {
        background-color: rgba(16, 16, 16, 0.1);
        color: #101010 !important;
    }

    #footer div {
        color: rgba(16, 16, 16, 0.8);
    }

    #footer div a {
        color: rgba(16, 16, 16, 1) !important;
    }

    #footer .d-flex a i {
        background: rgba(16, 16, 16, 0.1);
        color: black !important;
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
        color: #fff;
        inset: -30px auto auto 0 !important;
    }

    .dropdown-menu .dropdown-item {
        font-size: 16px;
        font-weight: 400;
        color: #FAFAFA;
        display: inline;
    }

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 575px) {
        #privacy {
            margin: 40px 10px;
        }

        .navbar-toggler {
            background: rgba(16, 16, 16, 0.1);
        }

        .navbar-toggler i {
            color: #101010 !important;
        }

        .modal .modal-content a {
            color: #fff;
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
        #privacy {
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
