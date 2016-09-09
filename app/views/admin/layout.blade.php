<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/mycss.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/materialize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/page.css')}}" />
    @section('css')

    @show
    @section('title')
        <title>MaidFinder PH</title>
    @show
</head>
<body class="grey lighten-3">
<div class="container-fluid">
    @include('admin.header')
    @if(Session::has('new_staff'))
        <div class="card-panel  green lighten-3" style="margin: 0px;">
            <span style="font-size: 1.8em;">{{ Session::get('new_staff') }}</span>
        </div>
    @endif
    @if(Session::has('update_staff'))
        <div class="card-panel  green lighten-3" style="margin: 0px;">
            <span style="font-size: 1.8em;">{{ Session::get('update_staff') }}</span>
        </div>
    @endif
    <div class="row" style="padding-top: -100px;">
        <div class="col s12 m12 l2">
            @include('admin.sidenav')
        </div>
        <div class="col s12 m12 l10">
            @yield('content')
        </div>
    </div>
    <div class="row">
        @include('shared.footer')
    </div>

</div>
<script src="{{ asset('public/material/js/jquery.js') }}"></script>
<script src="{{ asset('public/material/js/materialize.min.js') }}" ></script>
<script>
    $(document).ready(function() {
        $(".button-collapse").sideNav();
        $('select').material_select();
    });
</script>
@section('js')

@show
</body>
</html>
