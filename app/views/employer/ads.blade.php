
@extends('employer.layout')

@section('content')
    <div class="row">
        <div class="col-sm-12"style="margin-top:7em;" >
            <div class="card">
                <div class="card-header ch-alt m-b-20">
                    <h2> Job Availability Post
                        @if(Session::has('message'))
                            <small>{{ Session::get('message') }}</small>
                        @endif
                    </h2>
                    <ul class="actions">
                        <li>
                            <a href="">
                                <i class="zmdi zmdi-refresh-alt"></i>
                            </a>
                        </li>
                    </ul>
                    <a href="{{ asset('create/ad') }}">
                        <button  class="btn bgm-red btn-float waves-effect"><i class="zmdi zmdi-plus"></i>
                        </button></a>
                </div>


                    <div class="row m-l-10 m-r-10">
                        <?php $jobcount = 1; ?>
                        @foreach($ads as $ad)
                            <?php
                            $dayof =  array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday');
                            $edlevel = array("Elementary", "High School", "College graduate");
                            $salary = Salaries::find($ad->salaryid);
                            $duties = Duties::where('adid', '=', $ad->adid)->first();
                            $jobtype = JobTypes::where('jobtypeid', '=', $ad->jobtypeid)->first();
                            $location = Regions::where('regionid', '=', $ad->regionid)->first();
                            $job_desc = AdDesc::where('adid', '=', $ad->adid)->get();

                            ?>
                        <div class="col-sm-12">
                            <div class="card z-depth-3">
                                <div class="card-header bgm-bluegray">
                                    <h2>
                                        <p>Job Ad {{ $jobcount }}</p>
                                        <small>Looking for a Helper with the following desc</small>
                                        <small><i>Job Type: </i>{{ $jobtype->description }}</small>
                                        <small><i>posted: </i>{{ $ad->created_at }}</small>
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
                                                    <a href="{{asset ('/employer/ad/edit/'. $ad->adid)}}">Edit</a>
                                                </li>
                                                <li>
                                                    <a id="sa-params" href="{{asset ('/employer/ad/delete/'. $ad->adid)}}">Delete</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body card-padding">
                                    <div class="pmo-contact">
                                        <ul>
                                            <li class="ng-binding"><i class="zmdi zmdi-phone"></i> {{ $ad->contactno }}</li>
                                            <?php $capacity = array('Full Time', 'Part Time'); ?>
                                            <li class="ng-binding"><i class="zmdi zmdi-time-interval"></i>{{ $capacity[$ad->capacity] }}</li>
                                            <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                            <?php $startdate = explode('-', $ad->startdate); ?>
                                            <li class="ng-binding"><i class="zmdi zmdi-calendar"></i>{{  $month[$startdate[1]].'/' . $startdate[2] .'/' . $startdate[0] }}</li>
                                            <li class="ng-binding"><i class="zmdi zmdi-tag"></i> {{ $salary->amount_range }} (pesos)</li>
                                            <li class="ng-binding">
                                                @if( $ad->gender  == "Male")
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
                                            <li class="ng-binding"><i class="zmdi zmdi-graduation-cap"></i>{{ $edlevel[$ad->edlevel] }}</li>
                                            <li class="ng-binding"><i class="zmdi zmdi-calendar"></i>{{ $ad->yearexp }} years Experience</li>
                                            <li class="ng-binding"><i class="zmdi zmdi-time"></i>{{ $ad->contractyears }}years Contract</li>
                                            <li class="ng-binding"><i class="zmdi zmdi-account"></i>{{ isset($ad->pitch) ? nl2br($ad->pitch) : '' }}</li>
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
                        <?php $jobcount++ ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')
    @parent
    <style>
        table tr td {
            padding: 1px;
        }
        ul.pagination li {
            font-size: inherit;
        }
    </style>
@stop
@section('js')
    <script>
        $('#sa-params').click(function(){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm){
                if (isConfirm) {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });
    </script>
    @stop
