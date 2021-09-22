@extends('web.layout.master')

@section('content')
    <div class="container" style="min-height: 100vh;">
        <div class="my-5 d-flex justify-content-center flex-column align-items-center">
            <h1>How to buy</h1>
            <div class="mt-3">
                <form method="GET" action="/cryptocurrencies">
                    <div class="align-items-center bg-white d-flex rounded-3 pe-3 text-truncate search-wrap">
                        <i class="far fa-search me-2"></i>

                        <input placeholder="Search" required
                               name="search"
                               value="{{$search}}"
                               class="border-0 flex-grow-1"
                               type="text" style="">
                    </div>
                    <input type="hidden" name="category_id" value="{{$category_id}}">
                </form>
            </div>
        </div>
        {{--    PC    --}}

        <div
            class="smooth-scroll-x mb-5 d-none d-lg-block"
        >
            <div
                class="btn btn-sm mb-2 me-2 pointer px-3 rounded-pill @if(empty($category_id)) bg-main text-white @endif"
                onclick="window.location.href = '/cryptocurrencies?category_id=&search={{$search}}'">
                All ({{ $count_total_cryptocurrencies }})
            </div>

            @foreach($categories as $key=>$category)
                @if($key < 5)
                    <div
                        class="btn btn-sm mb-2 me-2 pointer px-3 rounded-pill @if($category_id == $category['id']) bg-main text-white @endif"
                        onclick="window.location.href = '/cryptocurrencies?category_id={{$category['id']}}&search={{$search}}'"
                    >{{ $category['name'] }} ({{ count($category['cryptocurrencies']) }})
                    </div>
                @endif
            @endforeach
            @if(count($categories) > 5)
                <div class="btn btn-sm mb-2 me-2 pointer px-3 rounded-pill"

                     data-bs-toggle="collapse"
                     data-bs-target="#more-categories"
                     aria-expanded="false"
                >
                    +{{ count($categories) - 5 }} more
                </div>
            @endif
            <div class="collapse" id="more-categories">
                @foreach($categories as $key=>$category)
                    @if($key >= 5)
                        <div
                            class="btn btn-sm mb-2 me-2 pointer px-3 rounded-pill @if($category_id == $category['id']) bg-main text-white @endif"
                            onclick="window.location.href = '/cryptocurrencies?category_id={{$category['id']}}&search={{$search}}'"
                        >{{ $category['name'] }} ({{ count($category['cryptocurrencies']) }})
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        {{--MOBILE --}}
        <div
            class="categories-wrap smooth-scroll-x mb-5 d-block d-lg-none"
        >
            <div
                class="btn btn-sm mb-2 me-2 pointer px-3 rounded-pill @if(empty($category_id)) bg-main text-white @endif"
                onclick="window.location.href = '/cryptocurrencies?category_id=&search={{$search}}'">
                All ({{ $count_total_cryptocurrencies }})
            </div>
            @foreach($categories as $category)
                <div
                    class="btn btn-sm mb-2 me-2 pointer px-3 rounded-pill @if($category_id == $category['id']) bg-main text-white @endif"
                    onclick="window.location.href = '/cryptocurrencies?category_id={{$category['id']}}&search={{$search}}'"
                >
                    {{ $category['name'] }} ({{ count($category['cryptocurrencies']) }})
                </div>
            @endforeach
        </div>
        {{--        <div class="row">--}}
        {{--            <div class="col-12 d-flex align-items-center justify-content-center"--}}
        {{--                 style="height: 80vh;">--}}
        {{--                <img width="250" height="250" src="/images/loading.svg">--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="row row-eq-height">
            @foreach($cryptocurrencies as $cryptocurrency)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 pb-3">
                    <a href="/cryptocurrency/{{$cryptocurrency->name}}">
                        <div
                            class="align-items-center d-flex flex-column h-100 justify-content-center p-3 pointer rounded-7 shadow text-center bg-white">
                            <img src="{{$cryptocurrency->icon_url}}" class="table-token-image mr-2 mb-3"
                                 style="width: 36px;">
                            <div>
                                <span class="mr-2 mb-3"><b>{{$cryptocurrency->name}}</b></span>
                            </div>
                            <div>
                                <span class="text-secondary mb-3"><b>{{strtoupper($cryptocurrency->symbol)}}</b></span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        @if(count($cryptocurrencies) == 0)
            <div class="text-center">
                <svg style="transform: scale(.5);" width="244" height="260" viewBox="0 0 244 260" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M211.831 67.2638L206.172 10.4818C205.052 -0.914868 189.886 -3.9655 184.429 6.07855L158.578 53.5935H85.3928L59.5423 6.07855C54.085 -3.9655 38.9481 -0.886089 37.7992 10.4818L32.1695 67.2925C12.7242 80.9628 0 103.583 0 129.197V227.163C0 245.294 14.6773 260 32.7727 260H211.227C229.323 260 244 245.294 244 227.163V129.197C244 103.583 231.276 80.934 211.831 67.2638Z"
                        fill="#1C2730"/>
                    <path
                        d="M120.241 205.915L101.605 203.868L101.634 202.86L120.111 200.609L126.543 164.645C126.543 164.645 94.5239 158.559 82.0511 185.081H81.3848L87.1256 164.081H42V236.963H80.5804L80.5235 216.613H81.5311L89.0595 236.963H128.765L120.241 205.915Z"
                        fill="white"/>
                    <path
                        d="M98.3106 89.2804C87.2842 89.5567 81.3444 97.2191 77.8829 104.589H77.6188L82.8557 89.2682H42.0083V159.002H81.9294L83.4123 116.217H84.2208L93.7115 159.002H124.504V117.204C124.491 96.886 112.766 88.9188 98.3106 89.2804Z"
                        fill="white"/>
                    <path
                        d="M211.025 129.811C208.262 146.387 193.856 159.027 176.491 159.027H162.544C143.205 159.027 127.53 143.352 127.53 124.013C127.53 104.674 143.205 89 162.544 89H176.491C192.169 89 204.52 99.3074 208.981 113.515C209.904 116.456 207.482 129.547 182.971 129.266C178.758 129.218 174.695 128.637 170.864 127.471C170.88 126.577 170.889 125.663 170.889 124.724C170.889 116.03 170.149 108.985 169.239 108.985C168.329 108.985 167.59 116.034 167.59 124.724C167.59 125.346 167.594 125.959 167.602 126.565C167.59 126.605 167.59 126.646 167.602 126.691C167.602 126.727 167.602 126.768 167.602 126.804L167.744 126.841C177.222 135.657 197.642 134.284 211.025 129.811Z"
                        fill="white"/>
                    <path
                        d="M175.735 164.129H160.443C140.503 164.129 124.337 180.295 124.337 200.236V200.995C124.337 220.936 140.503 237.101 160.443 237.101H175.735C195.676 237.101 211.842 220.936 211.842 200.995V200.236C211.842 180.295 195.676 164.129 175.735 164.129ZM168.089 216.572C167.167 216.572 166.415 209.43 166.415 200.613C166.415 191.801 167.163 184.655 168.089 184.655C169.016 184.655 169.763 191.797 169.763 200.613C169.763 209.426 169.011 216.572 168.089 216.572Z"
                        fill="white"/>
                </svg>
                <h4 class="fw-bold text-center">No result</h4>
            </div>
        @endif
        <div class="mb-5"></div>
        <div class="d-flex justify-content-center">
            @include('web.component.paginator', ['paginator' => $cryptocurrencies, 'suffix'=>"&category_id=$category_id&search=$search"])
        </div>
        <div class="mb-5"></div>
    </div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush


@section('styles')
    <style>

        .search-wrap input:focus {
            outline: none;
        }

        .search-wrap {
            border: 1px solid #DCDEE3;
            box-sizing: border-box;
            padding: 13px 16px;
            width: 620px;
            height: 48px;
            max-width: 80vw;
        }

        .dropdown-menu {
            border-radius: 5px;
            max-height: 50vh;
            overflow-y: auto;
        }

        #search-token {
            /*max-width: 250px;*/
            height: 30px;
        }

        .categories-wrap {
            height: 58px;
            white-space: nowrap;
        }

    </style>
@endsection
