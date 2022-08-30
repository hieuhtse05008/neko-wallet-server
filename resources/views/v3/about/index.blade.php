@extends('v3.layout.master',['theme'=>'light'])
@section('content')
<section id='members' class="mt-5">
    <div class="container">
        <div class="row justify-content-center spacing1">
            <div class="col-11">
                <div class="text-center text-md-start">
                    <h1 class="color-gradient title d-inline">We are Neko. </h1>
                    <h1 class="title mb-3 text-dark d-inline">Behind a great product, there’s a great team. We share our passion and vision for the metaverse.</h1>
                </div>
            </div>
        </div>
        <div class="row spacing1 px-2">
            <div class="col-12 d-flex justify-content-center mb-sm-5 pb-sm-5">
                <img class="d-none d-sm-block members-img" src="/images/v3/about/members.png">
                <div class="row justify-content-center d-sm-none">
                    @foreach ($members as $member)
                    <div class="col-4 text-center mb-4 tooltip-element px-1">
                        <img class="avatar" src="{{ $member['avatar'] }}" alt="">
                        @if (!empty($member['tooltip']))
                        <span class="fs-6 tooltiptext">{{ $member['tooltip'] }}</span>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-0 col-md-2"></div>
            <div class="col-12 col-md-8">
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach($tags as $tag)
                    <button type="button" class="btn btn-primary btn-custom rounded-pill m-2 text-nowrap" style="background: {{$tag['color']}}">{{ $tag['content'] }}</button>
                    @endforeach
                </div>
            </div>
            <div class="col-0 col-md-2"></div>
        </div>
    </div>
</section>

<section id='roadmap'>
    <div class="container">
        <div class="row spacing2">
            <div class="col-12">
                <div class="title-2 text-white">Our road map</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="timeline-steps" data-aos="fade-up">
                    <div class="timeline-step mb-0 ">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step mb-0 ">
                        <div class="d-flex flex-column align-items-center">
                            <div class="card mb-3"></div>
                            <div class="text-white fs-4 fw-bold mb-1">2021</div>
                            <div class="text-white mb-4 fs-7 text-nowrap">Former Neko</div>
                        </div>
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step  mb-0">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step  mb-0">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step  mb-0">
                        <div class="d-flex flex-column align-items-center">
                            <div class="card mb-3"></div>
                            <div class="text-white fs-4 fw-bold mb-1">2022</div>
                            <div class="text-white mb-4 fs-7 text-nowrap">Neko all-in-one app</div>
                        </div>
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step  mb-0">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step  mb-0">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step mb-0">
                        <div class="d-flex flex-column align-items-center">
                            <div class="card mb-3"></div>
                            <div class="text-white fs-4 fw-bold mb-1">2023</div>
                            <div class="text-white mb-4 fs-7 text-nowrap">Neko super app</div>
                        </div>
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step mb-0">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id='contact'>
    <div class="row justify-content-end justify-content-sm-between">
        <div class="contact-form col-12 col-sm-6">
            <div class="row">
                <div class="col-12 pb-3 pb-md-5 mb-3">
                    <div class="text-lelt">
                        <h1 class="color-gradient fs-60px fw-bold d-inline">Start a conversation</h1>
                        <h1 class="fs-60px mb-3 text-dark fw-bold d-inline">about a new business or media inquiries</h1>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="fs-5 text-dark fw-500">👋 Tell us more about you.</div>
                </div>
                <div class="col-sm-12 col-md-9">
                    <form>
                        @foreach($form as $item)
                        <div class="mb-4">
                            <label for="{{ $item['id'] }}" class="form-label ps-3 mb-1">{{ $item['label'] }}</label>
                            @if ($item['id'] === 'inputRequest')
                            <textarea class="form-control text-area-request-form" placeholder="{{ $item['placeholder'] }}" style="height: 200px"></textarea>
                            @else
                            <input type="{{ $item['type'] }}" class="form-control" id="{{ $item['id'] }}" placeholder="{{ $item['placeholder'] }}">
                            @endif
                        </div>
                        @endforeach
                        <div class="mb-4 text-end">
                            <button type="submit" class="btn btn-send btn-dark">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="image-iphone col-12 col-sm-6 p-0">
            <img class="w-100" src="/images/v3/about/iphone.png">
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
</script>
@endpush

@section('styles')
<style>
    body {
        background-color: unset;
        color: black !important;
    }

    .container {
        margin-bottom: 100px;
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

    .btn-custom {
        font-size: 24px;
        font-weight: 600;
        padding: 15px 22px;
        border: none;
    }

    .spacing1 {
        margin-bottom: 100px;
    }

    .spacing2 {
        margin-bottom: 250px;
    }

    .fs-7 {
        font-size: 14px;
    }

    .members-img {
        max-width: 60vw;
    }

    #roadmap {
        min-height: 900px;
        background: rgba(1, 0, 2, 1);
    }

    #roadmap .container {
        padding: 100px 0;
    }

    #roadmap .container .card {
        width: 58px;
        height: 58px;
        background: rgba(217, 217, 217, 1);
        border-radius: 10px;
    }

    .timeline-steps {
        display: flex;
        justify-content: center;
    }

    .timeline-steps .timeline-step {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: end;
        position: relative;
        min-width: 119px;
    }

    .timeline-steps .timeline-step:not(:last-child):after {
        content: "";
        display: block;
        border-top: 0.25rem solid rgba(217, 217, 217, 1);
        width: 3.46rem;
        position: absolute;
        right: 0;
        bottom: 13px;
    }

    .timeline-steps .timeline-step:not(:first-child):before {
        content: "";
        display: block;
        border-top: 0.25rem solid rgba(217, 217, 217, 1);
        width: 3.46rem;
        position: absolute;
        left: 0;
        bottom: 13px;
    }

    .timeline-steps .timeline-content {
        width: 5rem;
        text-align: center;
    }

    .timeline-steps .timeline-content .inner-circle {
        border-radius: 1.5rem;
        height: 1rem;
        width: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(250, 250, 250, 1);
    }

    #contact {
        overflow: hidden;
    }

    .contact-form {
        padding-left: 9rem;
        padding-top: 9rem;
    }

    .image-iphone {
        margin-top: 200px;
        width: 50vw;
    }

    .fw-500 {
        font-weight: 500;
    }

    .form-control {
        background-color: rgba(238, 238, 238, 1);
        border-radius: 100px;
        padding: 0.5rem 1.5rem;
        border: none;
    }

    .form-label {
        font-size: 14px;
        font-weight: 400;
    }

    .form-control::placeholder {
        opacity: 0.5;
    }

    .text-area-request-form {
        border-radius: 16px;
    }

    .btn-send {
        border-radius: 100px;
        width: 150px;
    }

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 575px) {
        .container {
            margin-bottom: 50px;
        }

        #roadmap {
            display: none;
        }

        .fs-60px {
            font-size: 44px;
        }

        .title {
            font-size: 32px;
            line-height: 42px;
        }

        .contact-form {
            width: 90%;
            margin: auto;
            padding: 1rem;
        }

        .form-control::placeholder {
            font-size: 14px;
        }

        .image-iphone {
            width: 100vw;
            margin-top: 0;
        }

        .tooltip-element {
            position: relative;
            display: inline-block;
        }

        .tooltip-element .tooltiptext {
            width: 160px;
            background: rgba(202, 161, 255, 1);
            color: #fff;
            text-align: center;
            border-radius: 100px;
            padding: 5px 0;

            /* Position the tooltip */
            position: absolute;
            z-index: 1;
            bottom: 110%;
            left: 50%;
            margin-left: -80px;

        }

        .tooltip-element .tooltiptext::after {
            content: " ";
            position: absolute;
            top: 100%;
            /* At the bottom of the tooltip */
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: rgba(202, 161, 255, 1) transparent transparent transparent;
        }

        .avatar {
            width: 100%;
        }

        .btn-custom {
            font-size: 12px;
            padding: 10px 12px;
        }

        .spacing1 {
            margin-bottom: 60px;
        }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 576px) and (max-width: 767px) {

        .fs-60px {
            font-size: 30px;
        }

        .title {
            font-size: 50px;
            line-height: 60px;
        }

        .timeline-steps .timeline-step {
            min-width: 60px;
            max-width: 60px;
        }

        .timeline-steps .timeline-step:not(:last-child):after {
            width: 2rem;
        }

        .timeline-steps .timeline-step:not(:first-child):before {
            width: 2rem;
        }

        .contact-form {
            padding-left: 5rem;
            padding-top: 5rem;
        }

        .form-control::placeholder {
            font-size: 14px;
        }

        .btn-custom {
            font-size: 24px;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .fs-60px {
            font-size: 40px;
        }

        .title {
            font-size: 60px;
            line-height: 70px;
        }

        .timeline-steps .timeline-step {
            min-width: 85px;
            max-width: 85px;
        }

        .timeline-steps .timeline-step:not(:last-child):after {
            width: 3rem;
        }

        .timeline-steps .timeline-step:not(:first-child):before {
            width: 3rem;
        }

        .contact-form {
            padding-left: 5rem;
            padding-top: 5rem;
        }

        .btn-custom {
            font-size: 16px;
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .fs-60px {
            font-size: 50px;
        }

        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .title {
            font-size: 70px;
            line-height: 80px;
        }

        .contact-form {
            padding-left: 5rem;
            padding-top: 5rem;
        }

        .btn-custom {
            font-size: 20px;
        }
    }

    @media only screen and (min-width: 1200px) {}
</style>
@endsection
