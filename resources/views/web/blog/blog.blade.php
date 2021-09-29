@extends('web.layout.master')
@section('content')
    <div class="token-wrap">
        <div class="token-cover"></div>
        <div class="token-content bg-white rounded-7">
            <a class="d-flex align-items-center mb-5" href="/">
                <i class="far fa-long-arrow-left"></i>&nbsp;&nbsp;Back
            </a>
            <div class="token-time mb-3">
                {{$blog->updated_at}}
            </div>
            <div class="token-title mb-5">
                {{$blog->title}}
            </div>
            <hr>
            <div class="pt-5 overflow-auto">
                <div class="ck-content">
                    {!! $blog->content_en !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="/css/ckeditor/ckeditor.css">
    <style>
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
