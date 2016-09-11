@extends('applicant.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12"style="margin-top:7em;" >
            <div class="card">
                <div class="card-header ch-alt m-b-20">
                    <h2> Job Availability Post
                        <small></small>
                    </h2>
                    <ul class="actions">
                        <li>
                            <a href="">
                                <i class="zmdi zmdi-refresh-alt"></i>
                            </a>
                        </li>
                    </ul>
                    <a href="{{asset('/applicant/create/application')}}">
                    <button  class="btn bgm-red btn-float waves-effect"><i class="zmdi zmdi-plus"></i>
                    </button></a>
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
                <div class="row m-l-20 ">
                    <div class="col-sm-6">
                        <div class="card z-depth-3">
                            <div class="card-header bgm-bluegray">
                                <h2>
                                    {{ $jobtype->description }}
                                    <small><i>posted: </i>{{ $application->created_at }}</small>
                                </h2>

                                <ul class="actions actions-alt">
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="">Refresh</a>
                                            </li>
                                            <li>
                                                <a href="{{asset ('/applicant/job/application/edit/'. $application->applicationid)}}">Edit</a>
                                            </li>
                                            <li>
                                                <a href="{{asset ('/applicant/job/application/delete/'. $application->adid)}}">Delete</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body card-padding">
                                <div class="pmo-contact">
                                    <ul>
                                        <li class="ng-binding"><i class="zmdi zmdi-phone"></i> {{ $app->contactno }}</li>
                                        <?php $capacity = array('Full Time', 'Part Time'); ?>
                                        <li class="ng-binding"><i class="zmdi zmdi-time-interval"></i>{{ $capacity[$application->capacity] }}</li>
                                        <li class="ng-binding"><i class="zmdi zmdi-tag"></i> {{ $salary->amount_range }} (pesos)
                                        </li>
                                        <li class="ng-binding">
                                            @if( $app->gender == "Male")
                                              <i class="zmdi zmdi-male"></i>Male
                                                @else
                                              <i class="zmdi zmdi-female"></i> Female

                                            @endif
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-pin"></i>
                                            <address class="m-b-0 ng-binding">
                                                {{$location->location}}
                                            </address>
                                        </li>
                                        <li class="ng-binding"><i class="zmdi zmdi-graduation-cap"></i>{{ $edlevel[$application->edlevel] }}</li>
                                        <li class="ng-binding"><i class="zmdi zmdi-calendar"></i>{{ $application->yearexp }} years Experience</li>
                                        <li class="ng-binding"><i class="zmdi zmdi-time"></i>{{ $application->contractyears }} years Contract</li>
                                        <li class="ng-binding"><i class="zmdi zmdi-account"></i>{{ $application->pitch }}</li>
                                    </ul>
                                    <div class="panel-footer">
                                        <p class="c-black f-500 m-b-20 m-t-20">Expected Duties</p>
                                        @if(isset($duties))
                                            @if($duties->cooking != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="zmdi zmdi-check"></i></strong><strong>{{ $duties->cooking }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->laundry != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="zmdi zmdi-check"></i></strong><strong>{{ $duties->laundry }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->gardening != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="zmdi zmdi-check"></i></strong><strong>{{ $duties->gardening }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->grocery != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="zmdi zmdi-check"></i></strong><strong>{{ $duties->grocery }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->cleaning != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="zmdi zmdi-check"></i></strong><strong>{{ $duties->cleaning }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->tuturing != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="zmdi zmdi-check"></i></strong><strong>{{ $duties->tuturing }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->driving != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="zmdi zmdi-check"></i></strong><strong>{{ $duties->driving }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->pet != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="zmdi zmdi-check"></i></strong><strong>{{ $duties->pet }}</strong>
                                                </div>
                                            @endif
                                            <p>
                                                {{ $duties->other }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                @endif
                </div>
             </div>
         </div>
        </div>
    </div>
@stop