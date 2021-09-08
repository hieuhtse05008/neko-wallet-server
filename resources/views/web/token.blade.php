@extends('web.layout.master')

@section('content')
    <div class="token-wrap">
        <div class="token-cover"></div>
        <div class="token-content bg-white rounded-7">
            <div class="d-flex align-items-center mb-5">
                <i class="far fa-long-arrow-left"></i>&nbsp;&nbsp;Back
            </div>
            <div class="token-time mb-3">
                {{$coin->updated_at}}
            </div>
            <div class="token-title mb-5">
                How to purchase {{$coin->name}}
            </div>
            <hr>
            <div>
                <div class="pt-5">
                    <div class="text-main pg-title mb-4">What is {{$coin->name}}</div>
                    <div class="pg-content">{!! $coin->description !!}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .pg-title{
            font-weight: bold;
            font-size: 24px;
        }
        .pg-content{

            font-weight: normal;
            font-size: 16px;
            line-height: 150%;
        }
        .token-wrap {
            min-height: 100vh;
        }
        .token-content{
            min-height: 80vh;
            /*max-width: max(74vw,min(576px,100vw));*/
            max-width: clamp(74vw,576px,100vw);

            margin-top: -284px;
            margin-bottom: 120px;
            margin-left: auto;
            margin-right: auto;

            padding-top: 80px;
            padding-bottom: 120px;
            padding-left: min(110px, max(100vw - 576px, 20px));
            padding-right: min(110px, max(100vw - 576px, 20px));
        }
        .token-cover{
            background: url("/images/blog/cover.jpg") no-repeat center;
            width: 100%;
            height: 480px;
            background-size: cover;
        }
        .token-time{
            line-height: 140%;
            color: #8C939E;
        }
        .token-title{
            font-size: 44px;
            font-weight: bold;
        }
    </style>
@endsection
