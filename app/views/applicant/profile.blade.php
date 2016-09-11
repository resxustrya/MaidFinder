@extends('applicant.layout')

@section('content')
    <div class="row" style="padding: 0px;">
        <div class="col s12 m12 l12">
            <div class="row">
                <h5 class="black-text">Your profile</h5>
            </div>
            <div class="row">
                <div class="card-panel">
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <form action="{{ asset('/applicant/update/picture') }}" method="post" enctype="multipart/form-data" />
                            <div class="row">
                                <img id="editpicture" class="right-align circle" src="{{ asset('public/uploads/profile/'.(($app['profilepic']) != null ? $app['profilepic'] :'facebook.jpg' )) }}" />
                            </div>
                            <div class="row">
                                <div class="file-field input-field">
                                    <a class="" style="text-decoration: underline;">
                                        <span>Change Photo</span>
                                        <input type="file" class="photo" name="profilepic">
                                    </a>
                                    <div class="file-path-wrapper reveal">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <input type="submit" class="btn reveal" name="upload" value="Upload Photo" />
                            </div>
                            </form>
                        </div>
                        <div class="col s12 m12 l8">
                            <div class="row">
                                <table>
                                    <tr>
                                        <td><span class="grey-text text-darken-4 name"><i class="material-icons">perm_identity</i> </span> </td>
                                        <td><span class="grey-text text-darken-4 name">{{ $app->fname ." ". $app->lname }}</span></td>
                                    </tr>
                                    <tr>
                                        <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                        <?php $bdate = explode('-', $app->birth); ?>
                                        <td><span class="grey-text text-darken-4"><i class="material-icons">redeem</i> </span> </td>
                                        <td><span class="grey-text text-darken-4">{{ $month[$bdate[1]].'/' . $bdate[2] .'/' . $bdate[0]  }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="grey-text text-darken-4"><i class="material-icons">email</i> </span> </td>
                                        <td><span class="grey-text text-darken-4">{{ $app->email }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="grey-text text-darken-4"><i class="material-icons">location_on</i></span></td>
                                        <td><span class="grey-text text-darken-4">{{ $location->location }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="grey-text text-darken-4"><i class="material-icons">phone</i></span></td>
                                        <td><span class="grey-text text-darken-4">{{ $app->contactno }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="grey-text text-darken-4"><i class="material-icons">supervisor_account</i> </span> </td>
                                        <td><span class="grey-text text-darken-4">{{ $app->gender }}</span></td>
                                    </tr>
                                </table>
                            </div>
                            <h6 class="divider"></h6>
                            <div class="row">
                                <table>
                                    <tr>
                                        <td><span class="grey-text text-darken-4">Nationanlity :</span></td>
                                        <?php $n = Nationalities::find($app->nationality); ?>
                                        <td><span class="grey-text text-darken-4">{{ $n->nationality }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="grey-text text-darken-4">Religion :</span> </td>
                                        <?php $r = Religions::find($app->religion); ?>
                                        <td><span class="grey-text text-darken-4">{{ $r->religion }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="grey-text text-darken-4">Civil Status :</span> </td>
                                        <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                        <td><span class="grey-text text-darken-4">{{ $status[$app->civilstatus] }}</span></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h6 class="right-align">
                                        <a class="btn blue darken-1" href="{{ asset('/applicant/profile/edit/') }}">Edit Profile</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m12 l3"><h5>Job Preferences</h5></div>
                <div class="col s12 m12 l3">
                    <p>
                        <a class="add_new btn blue lighten-2" href="{{ asset('/applicant/create/application') }}">
                            <b>Create new</b>
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
                                        <a class="btn grey lighten-4 black-text col s12 m12 l12" href="{{asset ('/applicant/job/application/delete/'. $application->applicationid)}}"><i class="material-icons">delete</i></a>
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
