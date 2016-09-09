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
    @show
</head>
<body class="grey lighten-4">
    @include('ads.header')
        @yield('content')
    <div class="row">
        @include('shared.footer')
    </div>

<script src="{{ asset('public/material/js/jquery.js') }}"></script>
<script src="{{ asset('public/material/js/materialize.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.modal-trigger').leanModal();
        $(".button-collapse").sideNav();
        $('select').material_select();
        $('.close').click(function (e) {
            e.closeModal();
        });
    });
</script>
@section('js')

@show
</body>
</html>
