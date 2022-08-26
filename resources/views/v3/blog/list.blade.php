@extends('v3.layout.master',['theme'=>'dark'])
@section('content')
    <section class="text-center py-5 mb-5">
        <h1>Latest News</h1>
        <div>Stay up to date with the latest stories and commentary brought to you by Neko,<br> the world's leading blockchain and crypto ecosystem.</div>
    </section>

    <section  class="container">
        <div id="carousel-latest" class="carousel slide pt-5"
             data-bs-interval="3000"
        >
            <div class="carousel-indicators">

                @foreach($latestBlogs as $key=>$latestBlog)
                    <button type="button" data-bs-target="#carousel-latest"
                            data-bs-slide-to="{{$key}}"
                            class="{{$key > 0 ? '' : 'active'}}">

                    </button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($latestBlogs as $key=>$latestBlog)

                <div class="carousel-item {{$key > 0 ? '' : 'active'}}">
                        <div style="background: url('{{$latestBlog['image_url']}}') center/cover;"
                             class="rounded-20px w-100 h-100">
                                <img src="{{$latestBlog['image_url']}}" class="w-100 invisible">
                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <div class="my-5 py-5"></div>
    <section class="my-5 py-5">
        <div class="d-flex justify-content-center align-items-center">
        <div class="align-items-center bg-white d-flex  pe-3 text-truncate" id="search" >
            <i class="far fa-search me-2 text-dark"></i>
            <input placeholder="Type to search..." required name="search" value="" class=""
                   type="text" style="">

        </div>
        </div>
    </section>
@endsection
@section('styles')
<style>
    #carousel-latest .carousel-indicators{
        top: calc(100% + 28px);
    }
    #carousel-latest .carousel-indicators [data-bs-target]:not(.active) {
        width: 12px;
    }

    #carousel-latest .carousel-indicators [data-bs-target] {
        border-top: none;
        border-bottom: none;
        border-radius: 10px;
        width: 32px;
        height: 6px;
    }

    #search{
        box-sizing: border-box;
        padding: 13px 16px;
        width: 620px;
        height: 48px;
        max-width: 80vw;
        border-radius: 100px;
    }
    #search input, #search input:focus, #search input:focus-visible{
        height: 48px;
        border: none;
        width: 100%;
        outline: none;
    }

</style>
@endsection
