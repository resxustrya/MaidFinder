

@extends('home.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col s12 m12 l3 hide-on-med-and-down"></div>
            <div class="col s12 m12 l6">
                <ul class="collection with-header">
                    <li class="collection-header  light-blue darken-1"><h4 class="white-text">Profile picture</h4></li>
                    <form action="{{ asset('/upload/photo') }}" method="POST" enctype="multipart/form-data">
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s12 m12 l12 center-align">
                                    <div class="pic">
                                        <img src="{{ asset('public/images/facebook.jpg') }}" id="photo" class="responsive-img" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                   <input type="file" name="photo" id="picture" onchange="readFile(this);"/>
                                </div>
                            </div>
                            <div class="row">
                                <input type="submit" name="submit" value="Upload photo" class="btn green col l12">
                            </div>
                        </li>
                    </form>
                </ul>
            </div>
            <div class="col s12 m12 l3 hide-on-med-and-down"></div>
        </div>
    </div>
@stop

@section('js')
@parent
    <script>
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop

@section('css')
@parent
   <style>
       .pic {
          height: 300px;
           width: 300px;
       }
       #photo {
           max-height: 100%;
           max-width: 100%;
       }
   </style>

@stop
