<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/mycss.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/materialize.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/page.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('public/semantic/assets/css/fonts.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/page.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/css/Nav.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/home-style.css')}}" />
    <link rel="icon" href="{{ asset('public/images/icon2.png') }}">
    @section('css')

    @show
    @section('title')
        <title>MaidFinderPH</title>
    @show
</head>
<body class="grey lighten-4">

@include('employer.header')
<div class="container-fluid">
    <div class="row">
        <div class="col s12 m4 l3 hide-on-med-and-down"  style="background: #eff0f1; height: 40em; padding: 2px;">
            @include('employer.sidenav')
        </div>
        <div class="col s12 m8 l9">
            @yield('content')
        </div>
    </div>

</div>

<script src="{{ asset('public/material/js/jquery.js') }}"></script>
<script src="{{ asset('public/material/js/materialize.min.js') }}" ></script>
<script>
    $(document).ready(function() {
        $(".button-collapse").sideNav();
        $('select').material_select();
        //$('.fixed-section').pushpin({ top: $('.fixed-section').offset().top });
    });
</script>
@section('js')
@show
</body>
</html>
