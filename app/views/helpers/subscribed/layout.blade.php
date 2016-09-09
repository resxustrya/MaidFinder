<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

    <link rel="stylesheet" href="{{ asset('public/material/css/mycss.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/material/css/materialize.css') }}" type="text/css" />
    <link src="{{ asset('public/material/css/style.css') }}" type="text/css" rel="stylesheet" />
    @section('title')
    @show
    @section('css')
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }
            main {
                flex: 1 0 auto;
            }
        </style>
    @show
</head>
<body class="grey lighten-3">

    @include('helpers.subscribed.header')
        @yield('content')
    @include('shared.footer')

<script src="{{ asset('public/material/js/jquery.js') }}"></script>
<script src="{{ asset('public/material/js/materialize.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".button-collapse").sideNav();
        $('select').material_select();
    });
</script>
@section('js')
    <script>
        $(document).ready(function() {
            $('.modal-trigger').leanModal();

            $('.close').click(function (e) {
                e.closeModal();
            });
        });
    </script>
@show
</body>
</html>
