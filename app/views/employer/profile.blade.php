@extends('employer.layout')

@section('content')
    <div class="row" style="padding: 0px;">
        <div class="col s12 m12 l12">
            <div class="row">
                <div class="card-panel">
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <form action="{{ asset('/employer/update/picture') }}" method="post" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col s12 m12 l12 valign-wrapper">
                                        <img id="editpicture"  class="center  circle" src="{{ asset('public/uploads/profile/'.(($emp['profilepic']) != null ? $emp['profilepic'] :'facebook.jpg' )) }}" />
                                        <div class="file-field input-field">
                                            <a style="text-decoration: underline; margin-top: 10px">
                                                <span><i class="mdi mdi-camera small "></i></span>
                                                <input type="file" class="photo right" name="profilepic">
                                            </a>
                                            <div class="file-path-wrapper blue-text reveal">
                                                <input class="file-path blue-text validate" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="submit" class="btn reveal blue" name="upload" value="Upload Photo" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col s12 m12 l8">
                            <a class="btn-floating tooltipped btn-large waves-effect waves-light right  red  " data-position="bottom" data-delay="50" data-tooltip="Edit Profile"  href="{{ asset('/employer/update/') }}"><i class="material-icons">mode_edit</i></a>
                            <div class="section">
                                <div class="cText grey-text text-darken-4 name">
                                    <i class="mdi mdi-account"></i>
                                    {{ $emp->fname ." ". $emp->lname }}
                                    <div class="divider"></div>
                                </div>
                                <div class="cText grey-text text-darken-4 valign-wrapper">
                                    <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                    <?php $bdate = explode('-', $emp->bdate); ?>
                                    <i class="tIcon mdi mdi-cake-variant "></i>
                                    {{ $month[$bdate[1]].' ' . $bdate[2] .', ' . $bdate[0]  }}
                                </div>
                                <div class=" grey-text text-darken-4 valign-wrapper">
                                    <i class="tIcon mdi mdi-email"></i>
                                    {{ $emp->email }}
                                </div>
                                <div class="grey-text text-darken-4 valign-wrapper">
                                    <i class="tIcon  mdi mdi-account-location"></i>
                                    {{ $location->location }}
                                </div>
                                <div class="grey-text text-darken-4 valign-wrapper">
                                    <i class="tIcon mdi mdi-phone"></i>
                                    {{ $emp->contactno }}
                                </div>
                                <div class=" valign-wrapper">

                                    <?php
                                    if( $emp->gender  == "Female")
                                    {
                                        echo "<i class=\"tIcon mdi mdi-gender-female \"></i>";
                                    } else
                                    {
                                        echo "<i class=\"tIcon mdi mdi-gender-male \"></i>";
                                    }
                                    ?>
                                    {{ $emp->gender }}
                                </div>

                            </div>
                            <h6 class="divider"></h6>
                            <div class="row">
<<<<<<< HEAD
                                <div class="col s12 m12 l6">

=======
                                <div class="col s12 m12 l12">
                                    <div class="section">
                                        <div class="valign-wrapper">
                                            <i class="tIcon mdi mdi-flag">Nationality: </i>
                                            {{ $emp->nationality }}
                                        </div>
                                        <div class="valign-wrapper">
                                            <i class="tIcon mdi mdi-church">Religion:</i>

                                            {{ $emp->religion }}
                                        </div>

                                        <div class="valign-wrapper">
                                            <i class="tIcon mdi mdi-account-multiple ">Civil Status:</i>
                                            {{ $emp->civilstatus }}
                                        </div>
                                    </div>
>>>>>>> f5dc6829c45661380e7069d518b17cd4f62fef16
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m12 l3">
                    @if($ads and count($ads) >0)
                        <ul class="collection with-header">
                            <li class="collection-header  light-blue darken-1"><h6 class="white-text">Your ads</h6></li>
                        </ul>
                    @else
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <a href="{{ asset('/create/ad') }}" class="orange btn">Create ad</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    @parent
    <script>
        $(document).ready(function() {
            $('.reveal').hide();
            $('.photo').change(function() {
                $('.reveal').show();
            });
        });
    </script>
@stop

@section('css')
    @parent
    <style>
        .name {
            font-size: 2em;
        }
        table tr td {
            padding: 0px;
        }
    </style>
@stop
