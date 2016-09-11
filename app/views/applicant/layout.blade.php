<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/vendors/bower_components/animate.css/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/vendors/bower_components/sweetalert/dist/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/vendors/farbtastic/farbtastic.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/vendors/bower_components/chosen/chosen.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/template/vendors/bower_components/summernote/dist/summernote.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/template/vendors/bower_components/nouislider/distribute/nouislider.min.css')}}" >
    <!-- CSS -->
    <link href="{{asset('public/template/css/app_1.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/template/css/app_2.min.css')}}" rel="stylesheet">

    <link rel="icon" href="{{ asset('public/images/icon2.png') }}">

    @section('css')

    @show
    @section('title')
        <title>MaidFinderPH</title>
    @show
</head>
<body>
@include('applicant.header')
        <section id="content">
            @yield('content')
        </section>
        <section id="main">
            @include('applicant.sidenav')
        </section>

<!-- Javascript Libraries -->
<script src="{{ asset('public/template/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('public/template/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/template/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('public/template/vendors/bower_components/Waves/dist/waves.min.js') }}"></script>
<script src="{{ asset('public/template/vendors/bootstrap-growl/bootstrap-growl.min.js') }}"></script>
<script src="{{ asset('public/template/vendors/bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('public/template/vendors/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('public/template/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{asset('public/template/vendors/bower_components/chosen/chosen.jquery.js')}}"></script>
<script src="{{asset('public/template/vendors/fileinput/fileinput.min.js')}}"></script>
<script src="{{asset('public/template/vendors/input-mask/input-mask.min.js')}}"></script>
<script src="{{asset('public/template/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('public/template/vendors/summernote/dist/summernote-updated.min.js')}}"></script>
<script src="{{asset('public/template/vendors/farbtastic/farbtastic.min.js')}}"></script>
<script src="{{asset('public/template/vendors/bower_components/chosen/chosen.jquery.js')}}"></script>
<script src="{{asset('public/template/vendors/fileinput/fileinput.min.js')}}"></script>
<script src="{{asset('public/template/vendors/input-mask/input-mask.min.js')}}"></script>
<script src="{{asset('/public/template/vendors/bower_components/nouislider/distribute/nouislider.min.js')}}"></script>


<script src="{{asset('public/template/js/app.min.js')}}"></script>
@section('js')
    <script>
        $(function(){
            $("#upload_link").on('click', function(e){
                e.preventDefault();
                $("#upload:hidden").trigger('click');
            });
        });



    </script>

    <script>
        $(function() {

            $('.uploadPhoto').hide();
            $(document).on('change', "#upload", function() {
                if( document.getElementById("upload").files.length == 0 ) {
                    // addclass to hide the button
                    $('.uploadPhoto').hide();
                }
                else
                {
                    $('.uploadPhoto').show();
                }
            });


        });
    </script>
@show
</body>
</html>
