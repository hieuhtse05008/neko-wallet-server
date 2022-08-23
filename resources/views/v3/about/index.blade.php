@extends('v3.layout.master')
@section('content')
<section id='members'>
    <div class="container">
        <div class="row spacing1">
            <div class="col-11">
                <div class="text-lelt">
                    <h1 class="color-gradient title d-inline">We are Neko. </h1>
                    <h1 class="title mb-3 text-dark d-inline">Behind a great product, there’s a great team. We share our passion and vision for the metaverse.</h1>
                </div>
            </div>
        </div>
        <div class="row spacing1">
            <div class="spacing1 col-12 d-flex justify-content-center mb-5 pb-5">
                <img class="members-img" src="/images/v3/about/members.png">
            </div>
        </div>
        <div class="row spacing1">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach($tags as $tag)
                    <button type="button" class="btn btn-primary btn-custom rounded-pill m-2" style="background: {{$tag['color']}}">{{ $tag['content'] }}</button>
                    @endforeach
                </div>
            </div>
            <div class="col-2"></div>
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
            <div class="col">
                <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                    <div class="timeline-step mb-0">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step mb-0">
                        <div class="d-flex flex-column align-items-center">
                            <div class="card mb-3"></div>
                            <div class="text-white fs-4 fw-bold mb-1">2021</div>
                            <div class="text-white mb-4">Former Neko</div>
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
                    <div class="timeline-step mb-0">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step mb-0">
                        <div class="d-flex flex-column align-items-center">
                            <div class="card mb-3"></div>
                            <div class="text-white fs-4 fw-bold mb-1">2022</div>
                            <div class="text-white mb-4">Neko all-in-one app</div>
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
                    <div class="timeline-step mb-0">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top">
                            <div class="inner-circle"></div>
                        </div>
                    </div>
                    <div class="timeline-step mb-0">
                        <div class="d-flex flex-column align-items-center">
                            <div class="card mb-3"></div>
                            <div class="text-white fs-4 fw-bold mb-1">2023</div>
                            <div class="text-white mb-4">Neko super app</div>
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
    <div class="row justify-content-between">
        <div class="contact-form col-6">
            <div class="row">
                <div class="col-12 pb-5 mb-3">
                    <div class="text-lelt">
                        <h1 class="color-gradient fs-60px fw-bold d-inline">Start a conversation</h1>
                        <h1 class="fs-60px mb-3 text-dark fw-bold d-inline">about a new business or media inquiries</h1>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="fs-5 text-dark fw-500">👋 Tell us more about you.</div>
                </div>
                <div class="col-9">
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
        <div class="image-iphone col-6 p-0">
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
        margin-top: 100px;
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

    .members-img {
        width: 90vh;
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
        flex-wrap: wrap
    }

    .timeline-steps .timeline-step {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: end;
        position: relative;
        margin: 1rem
    }

    @media (min-width:768px) {
        .timeline-steps .timeline-step:not(:last-child):after {
            content: "";
            display: block;
            border-top: 0.25rem solid rgba(217, 217, 217, 1);
            width: 7.46rem;
            position: absolute;
            left: 40px;
            top: 169px;
        }

        .timeline-steps .timeline-step:not(:first-child):before {
            content: "";
            display: block;
            border-top: 0.25rem solid rgba(217, 217, 217, 1);
            width: 7.46rem;
            position: absolute;
            right: 2.5rem;
            top: 169px;
        }
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

    .contact-form {
        padding-left: 9rem;
        padding-top: 9rem;
    }

    .image-iphone {
        margin-top: 200px;
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
    @media only screen and (max-width: 600px) {}

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {}

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {}

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {}

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {}
</style>
@endsection
