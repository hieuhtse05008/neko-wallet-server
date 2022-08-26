@extends('v3.layout.master')
@section('content')
<section id="support-center">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="container text-center">
            <div class="title-2 text-white mb-5">User Support Center</div>
            <div class="input-search input-group mb-3">
                <span class="input-group-text bg-white border border-end-0 p-3" id="basic-addon1">
                    <i class="far fa-search"></i>
                </span>
                <input type="text" class="form-control bg-whiter border border-start-0 ps-0" placeholder="Type here to search..." aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
</section>
<section id="support">
    <div class="container">
        <div class="row pb-5 mb-5">
            <div class="col">
                <div class="banner"></div>
            </div>
            <div class="col">
                <div class="banner"></div>
            </div>
        </div>
        <div class="row pb-5 mb-5">
            <div class="text-start">
                <h1 class="color-gradient title-2 d-inline">Frequently asked</h1>
            </div>
        </div>
        <div class="row">
            <div class="d-none d-md-block col-md-3 pt-5 mt-2">
                <div class="selection">
                    <a class="d-block mb-2" data-bs-toggle="collapse" href="#collapse1" role="button" aria-expanded="true" aria-controls="collapse1">
                        <i class="far fa-angle-right me-2"></i>
                        Networks
                    </a>
                    <div class="collapse show" id="collapse1">
                        <ul>
                            <li class="topic mb-2" onclick="handleClickTopic(this)"><a href="#">Supported chains</a></li>
                            <li class="topic mb-2" onclick="handleClickTopic(this)"><a href="#">NFT doesn’t show up</a></li>
                            <li class="topic mb-2" onclick="handleClickTopic(this)"><a href="#">SFT doesn’t show up</a></li>
                            <li class="topic mb-2" onclick="handleClickTopic(this)"><a href="#">Missing accounts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="selection">
                    <a class="d-block mb-2" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="true" aria-controls="collapse2">
                        <i class="far fa-angle-right me-2"></i>
                        Transaction
                    </a>
                    <div class="collapse show" id="collapse2">
                        <ul>
                            <!-- Topics -->
                        </ul>
                    </div>
                </div>
                <div class="selection">
                    <a class="d-block mb-2" data-bs-toggle="collapse" href="#collapse3" role="button" aria-expanded="true" aria-controls="collapse3">
                        <i class="far fa-angle-right me-2"></i>
                        Privacy
                    </a>
                    <div class="collapse show" id="collapse3">
                        <ul>
                            <!-- Topics -->
                        </ul>
                    </div>
                </div>
                <div class="selection">
                    <a class="d-block mb-2" data-bs-toggle="collapse" href="#collapse4" role="button" aria-expanded="true" aria-controls="collapse4">
                        <i class="far fa-angle-right me-2"></i>
                        Download
                    </a>
                    <div class="collapse show" id="collapse4">
                        <ul>
                            <!-- Topics -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-8 content">
                <div class="mb-5">
                    <div class="title-4 mb-4">Which chains does NEKO support?</div>
                    <div class="font-size-main mb-5">
                        NEKO wallet is a multi-chain wallet. We support tokens in SOLANA, BNC, and Ethereum. Neko Wallet currently supports NFT on SOLANA. For NFT on BNC and Ethereum, please kindly wait for our next update.
                    </div>
                    <hr>
                </div>
                <div class="mb-5">
                    <div class="title-4 mb-4">Why doesn’t my NFT show up?</div>
                    <div class="font-size-main mb-5">
                        At the moment, Neko only supports NFT on SOLANA. If you have NFT from other chains, it will not appear on app. In the next update, Neko app will be able to support NFT from BSC and Ethereum. If your NFT from SOLANA, and it still does show up, there is a good chance that it does comply with the Solana NFT standard. It may be missing the metadata required to be displayed properly. Our recomendation is that you contact the respective NFT project and let them know.
                    </div>
                    <hr>
                </div>
                <div class="mb-5">
                    <div class="title-4 mb-4">Why doesn’t my SFT show up?</div>
                    <div class="font-size-main mb-5">
                        At the moment, Neko has not support SFT. Please kindly wait for our next update for this feature
                    </div>
                    <hr>
                </div>
                <div class="mb-5">
                    <div class="title-4 mb-4">I imported my wallet but some accounts are missing. How can I restore all of my account?</div>
                    <div class="font-size-main mb-5">
                        The easiest way to restore all of your accounts is to make sure each account has some SOL in it so that NEKO can detect it. Follow these steps and let me know if your issue is resolved: 1. Make sure your Secret recovery Phrase is written down correctly and backed up 2. Send a little SOL to each account you would like to restore 3. Go into Settings, scroll down and click the red button that says "Reset Secret recovery Phrase" 4. Re-import your wallet using your Secret recovery Phrase 5. All of your accounts should be detected and available through Phantom again 6. In a future release, we will be adding some functionality to make this process a lot better and Phantom will be much smarter at detecting your wallets. I hope this helps!
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-0 col-lg-1 "></div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    const topics = document.querySelectorAll('.topic');

    function removeActiveAll() {
        topics.forEach(function(topic) {
            console.log(topic)
            topic.classList?.remove('active');
        })
    }

    function addActive(element) {
        element.classList.add('active');
    }

    function handleClickTopic(e) {
        removeActiveAll();
        addActive(e);
    }
</script>
@endpush

@section('styles')
<style>
    body {
        background-color: unset;
        color: black !important;
    }

    ul {
        list-style: none;
    }

    #support-center>div {
        min-height: 468px;
        background-color: black;
    }

    #support {
        margin-top: 80px;
        margin-bottom: 160px;
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

    .title-4 {
        font-style: normal;
        font-weight: 600;
        font-size: 32px;
        line-height: 42px;
    }

    .font-size-main {
        font-style: normal;
        font-weight: 400;
        font-size: 22px;
        line-height: 36px;
        color: rgba(16, 16, 16, 0.6);
    }

    .opacity-60 {
        opacity: 0.6;
    }

    .input-search {
        height: 50px;
        width: 35%;
        margin: auto;
    }

    .input-search input {
        border-radius: 0 100px 100px 0;
    }

    .input-search input::placeholder {
        font-weight: 400;
        font-size: 18px;
        color: rgba(16, 16, 16, 0.6);
    }

    .input-search span {
        border-radius: 100px 0 0 100px;
    }

    .form-control:focus {
        box-shadow: unset;
    }

    .banner {
        background-color: #D9D9D9;
        border-radius: 20px;
        height: 310px;
    }

    .selection a:hover {
        color: inherit;
    }

    [aria-expanded="false"],
    .selection ul li {
        opacity: 0.6;
    }

    [data-bs-toggle="collapse"] i {
        transform: rotate(90deg);
        transition: all linear 0.25s;
    }

    [aria-expanded="true"],
    .show ul .active {
        font-weight: 600;
        opacity: 1;
    }

    [data-bs-toggle="collapse"].collapsed i {
        transform: rotate(0deg);
    }

    .content hr {
        opacity: 0.1;
    }

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 575px) {
        #support {
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
        #support {
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
