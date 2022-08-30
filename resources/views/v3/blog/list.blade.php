@extends('v3.layout.master',['theme'=>'dark'])
@section('content')
    <div class="py-5 mb-5"></div>
    <div class="mb-5"></div>
    <section class="text-center">
        <h1>Latest News</h1>
        <div>Stay up to date with the latest stories and commentary brought to you by Neko,<br> the world's leading
            blockchain and crypto ecosystem.
        </div>
    </section>
    <div class="py-5 mb-5"></div>

    <section class="container">
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
            <div class="align-items-center bg-white d-flex  pe-3 text-truncate" id="search">
                <i class="far fa-search me-2 text-dark"></i>
                <input placeholder="Type to search..." required name="search" value="" class=""
                       type="text" style="">

            </div>
        </div>
    </section>
    <section class="my-5 py-5 container">
        <div class="d-flex justify-content-center align-items-center flex-wrap">
            <div class="me-3 mb-2 {{empty($category) ? 'bg-gray me-3 px-2 py-1 rounded-3' : ''}}">
                All articles
            </div>
            @foreach($categories as $item)
                <a href="{{route('blogs',['category'=>$item['id']])}}"
                   class="me-3 mb-2 {{$category == $item['id'] ? 'bg-gray me-3 px-2 py-1 rounded-3' : ''}}">
                    {{$item['name']}}
                </a>
            @endforeach
        </div>
    </section>
    <section class="my-5 py-5">
        <div class="container-md">
            <div class="row gx-5 gy-5">
                @foreach($blogs as $blog)
                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="">
                        <a href="{{route('blog',['slug'=>$blog['slug']])}}" class="pointer">

                            <div class="mb-4 img-blog rounded-3 img-blog bg-white shadow" style="background-image: url('{{$blog['image_url']}}')"></div>

                            <div class="">
                                <div class="d-flex flex-wrap text-wrap text-break">
                                    <span class="pb-2"><b>{{$blog['title']}}</b></span>
                                </div>
                                                            <div class="d-flex flex-wrap text-wrap text-break">
                                                                <span class="text-secondary"><b>{{($blog->created_at->format('d M, Y'))}}</b></span>
                                                            </div>


                            </div>

                        </a>

                    </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            @include('v3.common.paginator', ['paginator' => $blogs, 'suffix'=>"&search=$search"])
        </div>
    </section>

@endsection
@section('styles')
    <style>
        body{
            background: -webkit-linear-gradient(top, #101010, #101010 85vh, #010002 85vh, #010002);
        }
        #carousel-latest .carousel-indicators {
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

        #search {
            box-sizing: border-box;
            padding: 13px 16px;
            width: 620px;
            height: 48px;
            max-width: 80vw;
            border-radius: 100px;
        }

        #search input, #search input:focus, #search input:focus-visible {
            height: 48px;
            border: none;
            width: 100%;
            outline: none;
        }

        .img-blog{
            width: 100%;
            height: 100%;
            min-height: 300px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top center;
        }

    </style>
@endsection
