<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield("meta")

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <title>News</title>
    <style>


        /* width */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
            cursor: pointer;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #eaeaea;
            border-radius: 100px;

        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            cursor: pointer;
            background: #adadad;
            border-radius: 100px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #9e9e9e;
        }

    </style>
    @yield('styles')
</head>
<body>
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    _token = "{{ csrf_token() }}"
</script>
@stack('scripts')
</body>
</html>
