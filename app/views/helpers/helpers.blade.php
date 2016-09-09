@extends('helpers.layout')
@section('title')
    <title>Job Seekers</title>
@stop
@section('content')

    <div class="">
        <div class="row white" style="padding: 0px;">
            <div class="col l1"><span>&nbsp;</span></div>
            <div class="col s12 m12 l10">
                <h4>Job Seeker Profiles</h4>
                <p>To get the best search result, use our search filtering feature below that allows you to match a helper based on your job ad criteria. </p>
            </div>
            <div class="col s12 m12 l1">
                <span>&nbsp;</span>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header orange waves-effect btn center-align"><i class="material-icons center-align">search</i>Search Menu</div>
                <div class="collapsible-body white" style="padding: 10px;">
                    <h5>Search Criteria</h5>
                    <h5 class="divider"></h5>
                    <form action="{{ asset('/search/profiles') }}" method="POST">
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <select name="location" class="browser-default">
                                    <option value="" selected>Preffered location</option>
                                    @foreach($locations as $loc)
                                        <option value="{{ $loc->regionid }}">{{ $loc->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col s12 m12 l6">
                                <select name="salary" class="browser-default">
                                    <option value="" selected>Salary (pesos)</option>
                                    @foreach($salary as $sal)
                                        <option value="{{ $sal->salaryid }}">{{ $sal->amount_range }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <select name="jobtype" class="browser-default">
                                    <option value="" selected>Position</option>
                                    @foreach($jobtypes as $job)
                                        <option value="{{ $job->jobtypeid }}">{{ $job->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col s12 m12 l6">
                                <select name="capacity" class="browser-default">
                                    <option value="" selected>Capacity</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <select name="yearexp" class="browser-default">
                                    <option value="" selected>Years Experience</option>
                                    @for($i = 1; $i <= 20; $i++)
                                        <option value="{{$i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col s12 m12 l6">
                                <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                                <select name="edlevel" class="browser-default">
                                    <option value="" selected>Eduction level</option>
                                    @foreach($edlevel as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <table border="0">
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="test5" name="cooking" value="Cooking"/>
                                            <label for="test5">Cooking</label>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="test6" name="laundry" value="Laundry"/>
                                            <label for="test6">Laundry</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="test7" name="gardening" value="gardening"/>
                                            <label for="test7">Gardening</label>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="test8" name="grocery" value="Grocery"/>
                                            <label for="test8">Grocery</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="test9" name="cleaning" value="House Cleaning"/>
                                            <label for="test9">House cleaning</label>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="test10" name="tutoring" value="Tutoring"/>
                                            <label for="test10">Tutoring</label>
                                        </td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <p>
                                        <input type="submit" class="btn-large green col s12 m12 l12 center-align" name="search" value="Find your match" />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row" style="padding: 20px;">
            <div class="col s12 m12 l12">
                <?php $count = 1; ?>
                <?php foreach($application as $app) : ?>
                <?php
                $location = Regions::find($app->regionid);
                $applicant = Applicants::find($app->appid);
                $jobtype = JobTypes::find($app->jobtypeid);
                ?>
                <div class="col s12 m6 l4 hoverable ">
                    <a class="modal-trigger" href="#modal{{$count}}">
                        <div class="card-panel" style="padding: 3px;">
                            <div class="row">
                                <div class="profile-img col s12 m12 l6">
                                    <div class="center-align" style="padding-top: 10px;">
                                        <img class="image circle responsive-img" src="{{ asset('public/uploads/profile/'.(($applicant->profilepic) != null ? $applicant->profilepic :'facebook.jpg' )) }}">
                                    </div>
                                </div>
                                <div class="col s12 m12 l6">
                                    <p>
                                    <table class="black-text info">
                                        <tr>
                                            <td><i class="material-icons">perm_identity</i></td>
                                            <td><span class="name">{{ $applicant->fname ." ". $applicant->lname }}</span> </td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons">room</i> </td>
                                            <td>{{ $location->location }}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons">work</i> </td>
                                            <td>{{ $jobtype->description }}</td>
                                        </tr>
                                    </table>
                                    </p>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col s12 m12 l6">
                                    <p>
                                        <a class="modal-trigger" href="#modal{{$count}}">View helper profile</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div id="modal{{$count}}" class="modal modal-fixed-footer fade ql-modal" role="dialog">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <div class="card-panel">
                                    <div class="row">
                                        <img class="img-fluid square employer-image col s12 m12 l12" src="{{ asset('public/uploads/profile/'.(($applicant->profilepic) != null ? $applicant->profilepic :'facebook.jpg' )) }}">
                                    </div>
                                    <table class="info">
                                        <tr>
                                            <td><i class="material-icons">perm_identity</i></td>
                                            <td><span class="name">{{ $applicant->fname ." ". $applicant->lname }}</span> </td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons">room</i> </td>
                                            <td>{{ $location->location }}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons">work</i> </td>
                                            <td>{{ $jobtype->description }}</td>
                                        </tr>
                                    </table>
                                    <p>
                                        {{ $applicant->pitch }}
                                    </p>
                                </div>
                            </div>
                            <div class="col s12 m12 l8">
                                <div class="row">
                                    <div class="col s12 m12 l12 orange lighten-1 card-panel">
                                        <p class="white-text">
                                            You must subscribe to our membership plan so you can view helper profiles and job application.
                                        </p>
                                    </div>
                                    <div class="col s23 m23 l12">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn green ">Ok</a>
                    </div>
                </div>
                <?php $count++ ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if($application->count() < $application->getTotal())
                <ul class="pagination center-align">
                    {{ $application->links() }}
                </ul>
            @endif
        </div>
    </div>
@stop

@section('css')
    @parent
    <style>
        .profile-img {
            max-height: 150px;
        }
        .image {
            max-width: 150px;
            max-height: 150px;
        }
        .name {
            font-family: "Tahoma";
            font-size: 1.2em;
        }
        table.info tr td {
            padding: 0px;
            color: #333;
        }
        .modal {
            width: 100% !important;
            mex-height: 100% !important;
        }
    </style>
@stop
@section('js')
    @parent
    <script>
        $('.modal-trigger').leanModal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacity of modal background
            in_duration: 100, // Transition in duration
            out_duration: 100, // Transition out duration
        });
    </script>
@stop
