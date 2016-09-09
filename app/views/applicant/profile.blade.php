@extends('applicant.layout')

@section('content')
    <div class="row" style="padding: 0px;">
        <div class="col s12 m12 l12">
            <div class="row">
                <div class="card-panel">
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <form action="{{ asset('/applicant/update/picture') }}" method="post" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col s12 m12 l12 valign-wrapper">
                                        <img id="editpicture"  class="center  circle" src="{{ asset('public/uploads/profile/'.(($app['profilepic']) != null ? $app['profilepic'] :'facebook.jpg' )) }}" />
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
                            <a class="btn-floating tooltipped btn-large waves-effect waves-light right  red  " data-position="bottom" data-delay="50" data-tooltip="Edit Profile"  href="{{ asset('/applicant/profile/edit/') }}"><i class="material-icons">mode_edit</i></a>
                            <div class="section">
                                <div class="cText grey-text text-darken-4 name">
                                    <i class="mdi mdi-account"></i>
                                    {{ $app->fname ." ". $app->lname }}
                                    <div class="divider"></div>
                                </div>
                                <div class="cText grey-text text-darken-4 valign-wrapper">
                                    <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                    <?php $bdate = explode('-', $app->birth); ?>
                                    <i class="tIcon mdi mdi-cake-variant "></i>
                                    {{ $month[$bdate[1]].' ' . $bdate[2] .', ' . $bdate[0]  }}
                                </div>
                                <div class=" grey-text text-darken-4 valign-wrapper">
                                    <i class="tIcon mdi mdi-email"></i>
                                    {{ $app->email }}
                                </div>
                                <div class="grey-text text-darken-4 valign-wrapper">
                                    <i class="tIcon  mdi mdi-account-location"></i>
                                    {{ $location->location }}
                                </div>
                                <div class="grey-text text-darken-4 valign-wrapper">
                                    <i class="tIcon mdi mdi-phone"></i>
                                    {{ $app->contactno }}
                                </div>
                                <div class=" valign-wrapper">

                                    <?php
                                    if( $app->gender  == "Female")
                                    {
                                        echo "<i class=\"tIcon mdi mdi-gender-female \"></i>";
                                    } else
                                    {
                                        echo "<i class=\"tIcon mdi mdi-gender-male \"></i>";
                                    }
                                    ?>
                                    {{ $app->gender }}
                                </div>

                            </div>
                            <h6 class="divider"></h6>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="section">
                                        <div class="valign-wrapper">
                                            <i class="tIcon mdi mdi-flag">Nationality: </i>
                                            {{ $app->nationality }}
                                        </div>
                                        <div class="valign-wrapper">
                                            <i class="tIcon mdi mdi-church">Religion:</i>

                                            {{ $app->religion }}
                                        </div>

                                        <div class="valign-wrapper">
                                            <i class="tIcon mdi mdi-account-multiple ">Civil Status:</i>
                                            {{ $app->civilstatus }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="row ">
                <div class="col s12 m12 l3">
                    <h5>Job Availability</h5>

                </div>
                <div class="col s12 m12 l3">
                    <p class="center">
                        <a class="add_new btn blue lighten-2" href="{{ asset('/applicant/create/application') }}">
                            <i class="mdi mdi-newspaper small left"></i></i>Create 
                        </a>
                    </p>
                </div>
            </div>
            @if($application != null and count($application) >0 )
                <?php
                $salary = Salaries::find($application->salaryid);
                $location = Regions::find($application->regionid);
                $jobtype = JobTypes::find($application->jobtypeid);
                $edlevel = array('Elementary', 'High School', 'College');
                $skills = ApplicantSkills::where('applicationid', '=', $application->applicationid)->first();
                $duties = Duties::find($skills->dutyid);
                ?>
                <div class="row">
                    <div class="card-panel">
                        <div class="row">
                            <div class="col s12 m12 l2">
                                {{ $application->created_at }}
                            </div>
                            <div class="col s12 m12 l8 grey lighten-5">
                                <div class="row">
                                    <h5 class="center-align">Basic job ad information</h5>
                                    <table>
                                        <tr>
                                            <td>Job Title : </td>
                                            <td><strong style="text-decoration: underline">{{ $jobtype->description }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Contact :</td>
                                            <td>{{ $app->contactno }}</td>
                                        </tr>
                                        <tr>
                                            <?php $capacity = array('Full Time', 'Part Time'); ?>
                                            <td>Capacity : </td>
                                            <td>{{ $capacity[$application->capacity] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Exptected salary :</td>
                                            <td>{{ $salary->amount_range }} (pesos)</td>
                                        </tr>
                                        <tr>
                                            <td>Helper gender :</td>
                                            <td>{{ $app->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td>Education level :</td>
                                            <td>{{ $edlevel[$application->edlevel] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Experience :</td>
                                            <td>{{ $application->yearexp }} years</td>
                                        </tr>
                                        <tr>
                                            <td>Contract years</td>
                                            <td>{{ $application->contractyears }} years</td>
                                        </tr>
                                    </table>
                                    <p>
                                    <h6><strong>Job description</strong></h6>
                                    {{ $application->pitch }}
                                    </p>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <h6><strong>Perfurmed duties</strong></h6>
                                        @if(isset($duties))
                                            @if($duties->cooking != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->cooking }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->laundry != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->laundry }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->gardening != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->gardening }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->grocery != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->grocery }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->cleaning != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->cleaning }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->tuturing != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->tuturing }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->driving != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->driving }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->pet != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->pet }}</strong>
                                                </div>
                                            @endif
                                            <p>
                                                {{ $duties->other }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12 l2">
                                <div class="center-align">
                                    <div class="row">
                                        <a class="btn blue lighten-3 col s12 m12 l12" href="{{asset ('/applicant/job/application/edit/'. $application->applicationid)}}"><i class="material-icons">mode_edit</i></a>
                                    </div>
                                    <div class="row">
                                        <a class="btn grey lighten-4 black-text col s12 m12 l12" href="{{asset ('/applicant/job/application/delete/'. $application->adid)}}"><i class="material-icons">delete</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
