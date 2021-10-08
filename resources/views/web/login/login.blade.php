@extends('web.layout.master')

@section('content')
    <div class="container-fluid py-5">
        <div class="container" >
            <div class="row d-flex align-items-center">
                <div class="col-4">
                    <form class="p-5 bg-white rounded-7" method="POST" id="form-login"  action="/login">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   name="email"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        @csrf

                        <button type="submit" class="btn btn-main w-100 mt-5" >Login</button>
                    </form>
                </div>
                <div class="col-8 h-100" style="min-height: 50vh;">
                    <img class="w-100 p-5" src="/images/full_model_neko.png">
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

        // $('#form-login').on('submit',function (e){
        //     e.preventDefault();
        //     let data = $('#form-login').serializeArray().reduce(function(obj, item) {
        //         obj[item.name] = item.value;
        //         return obj;
        //     }, {});
        //     console.log(data)
        //     axios.get('/sanctum/csrf-cookie').then(() => {
        //         axios.post('/login', data).then(()=>{window.location.href = '/'});
        //     });
        //
        // });

    </script>
@endpush
@section('styles')
    <style>
        body{
            background-color: var(--main-color, #FC7819);;
        }
    </style>
@endsection
