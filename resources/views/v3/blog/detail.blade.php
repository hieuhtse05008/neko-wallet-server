@extends('v3.layout.master',['theme'=>'dark'])
@section('content')
<section class="container">
    <div class="navigation-bar indent mb-4">
        <i class="far fa-arrow-left me-2"></i>
        <span class="fw-600 fs-16px me-4">All articles</span>
        <span class="fs-16px fw-400 opacity-60">{{($blog->created_at->format('d M, Y'))}}</span>
    </div>
    <div class="title indent mb-4">{{ $blog['title'] }}</div>
    <div class="indent mb-5">
        <img class="me-3" src="/images/v3/blog/NullAva.png" alt="">
        <span class="me-1">by Neko wallet</span>
        <span class="me-2">-</span>
        <span>3 mins read</span>
    </div>
    <div class="blog-image pb-5 mb-5"><img src="{{ $blog['image_url'] }}" alt=""></div>
    <div class="ck-content content indent mb-5">
        <div class="share">
            <span class="fs-16px me-3">SHARE</span>
            <i class="fal fa-link icon me-2"></i>
            <i class="fal fa-paper-plane icon me-3"></i>
            <i class="fab fa-facebook icon me-3 tooltip-element"></i>
            <i class="fab fa-twitter icon"></i>
        </div>
        {!! $blog['content'] !!}
    </div>
</section>

<section id="test" data-blog='{{ $blog }}'>
</section>
@endsection

@push('scripts')
<script>
    const data = JSON.parse(document.querySelector('#test').getAttribute('data-blog'));
    console.log(data);
</script>
@endpush

@section('styles')
<link rel="stylesheet" href="/css/ckeditor/ckeditor.css">
<style>
    * {
        color: #FAFAFA;
    }

    body {
        background: black;
    }

    .fw-400 {
        font-weight: 400;
    }

    .fw-600 {
        font-weight: 600;
    }

    .fs-16px {
        font-size: 16px;
    }

    .opacity-60 {
        opacity: 0.6;
    }

    .title {
        font-size: 60px;
        line-height: 68px;
        font-weight: 600;
        color: #FAFAFA;
    }

    .navigation-bar {
        margin-top: 100px;
    }

    .indent {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    .blog-image img {
        width: 100%;
        border-radius: 20px;
    }

    .ck-content {
        position: relative;
    }

    .ck-content span {
        color: rgba(250, 250, 250, 0.8) !important;
        background-color: unset !important;
    }

    .icon {
        font-size: 12px;
        padding: 5px;
        border-radius: 50%;
        border: 1px solid #FAFAFA;
    }

    .fa-facebook {
        border: unset;
        padding: 0;
        transform: scale(2);
    }

    .fa-twitter {
        color: #FAFAFA;
        background-color: rgba(29, 161, 242, 1);
        border: unset;
    }

    .ck-content {
        position: relative;
    }

    .share {
        position: absolute;
        top: 0;
        right: 0;
        left: auto;
        bottom: auto;
    }
</style>
@endsection
