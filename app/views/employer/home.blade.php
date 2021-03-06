

@extends('employer.layout')


@section('content')
    @if(count($ads) > 0)
    <div class="container container-alt" style="margin-top:7em">
        <div class="block-header">
            <h2>Find Helpers
            </h2>
        </div>
        <div class="card">
            <div class="action-header clearfix">
                <div class="card">
                    <div class="card-header">
                        <p class="f-500 c-lightblue m-b-5">Current Job Ad</p>
                        <div class="btn-demo  pull-right">
                            <button class="btn bgm-lightblue btn-icon waves-effect waves-circle waves-float" type="button" data-toggle="collapse"
                                    data-target="#currentAd" aria-expanded="false"
                                    aria-controls="currentAd">
                                <i class="zmdi zmdi-dropbox "></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body card-padding">
                        <div class="collapse m-t-10" id="currentAd">
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
                                    <div class="card">
                                        <div class="card-header ch-alt m-b-20">
                                            <h2>{{ $jobtype->description }}
                                            </h2>
                                            <ul class="actions">
                                                <li>
                                                    <a href="">
                                                        <i class="zmdi zmdi-refresh-alt"></i>
                                                    </a>
                                                </li>
                                            </ul>

                                            <a href="{{asset ('/employer/ad/edit/'. $ad->adid)}}"> <button class="btn bgm-red btn-float waves-effect" >
                                                    <i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                        </div>

                                        <div class="card-body card-padding">
                                            <div class="pmo-contact">
                                                <ul>
                                                    <li class="ng-binding"><i class="zmdi zmdi-pin"></i>{{ $location->location }}</li>
                                                    <li class="ng-binding"><i class="zmdi zmdi-money-box"></i>{{$salary->amount_range}} - (peso)</li>
                                                    <?php $capacity = array('Full Time', 'Part Time'); ?>
                                                    <li class="ng-binding"><i class="zmdi zmdi-time-interval"></i>{{ $capacity[$ad->capacity] }}</li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                @if($ads->count() < $ads->getTotal())
                                                    <ul class="pagination center-align">
                                                        {{ $ads->links() }}
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
                <div class="card-body card-padding">
                    <div class="contacts clearfix row">
                        @if(count($ads) > 0)
                            <?php
                            $count = 1;
                            $applications = Applications::where('jobtypeid', '=', $ad->jobtypeid)
                                    ->Where('deleted_at' ,'=', NULL)
                                    ->orWhere('regionid', '=', $ad->regionid)
                                    ->orWhere('salaryid', '=', $ad->salaryid)
                                    ->orWhere('yearexp', '=', $ad->yearexp)
                                    ->orderBy('applicationid', 'DESC')
                                    ->get();
                            ?>
                            <?php foreach($applications as $app) : ?>
                            <?php
                            $location = Regions::find($app->regionid);
                            $applicant = Applicants::find($app->appid);
                            $jobtype = JobTypes::find($app->jobtypeid);
                            ?>
                        <div class="col-md-3 col-sm-4 col-xs-6">
                            <div class="c-item">
                                <a href="" class="ci-avatar">
                                    <img src="{{ asset('public/uploads/profile/'.(($applicant['profilepic']) != null ? $applicant['profilepic'] :'facebook.jpg' )) }}" alt="">
                                </a>

                                <div class="c-info text-left ">
                                    <strong>{{ $applicant->fname . " ". $applicant->lname }}</strong>

                                    <a href="#"><small class="c-yellow f-19">
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star-half"></i>
                                            <i class="zmdi zmdi-star-outline"></i>
                                        </small></a>
                                    <div class="card-body ">
                                        <div class="pmo-contact">
                                            <ul class="text-left">
                                                <li class="ng-binding"> <small><i class="zmdi zmdi-search"></i> {{ $jobtype->description }}</small></li>
                                                <li class="ng-binding"> <small><i class="zmdi zmdi-tag"></i> &#8369; Salary</small></li>
                                                <li class="ng-binding"> <small><i class="zmdi zmdi-book"></i> 2 Experience</small></li>

                                                <li>
                                                    <small> <i class="zmdi zmdi-pin"></i>
                                                        <address class="m-b-0 ng-binding">
                                                            {{ $location->location }}
                                                        </address></small>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="c-footer">
                                    <a href="{{ asset('application/view/'. $app->applicationid) }}" class="waves-effect btn w-100">View</a>
                                </div>
                            </div>
                        </div>
                        @if(count($ads) > 8)
                        <div class="load-more">
                            <a href=""><i class="zmdi zmdi-refresh-alt"></i> Load More...</a>
                        </div>
                        @endif
                                <?php $count++ ?>
                                <?php endforeach; ?>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="page-loader">
                <div class="preloader pls-blue">
                    <svg class="pl-circular" viewBox="25 25 50 50">
                        <circle class="plc-path" cx="50" cy="50" r="20" />
                    </svg>

                    <p>Please wait...</p>
                </div>
            </div>
        </div>

    </div>

    @else
        <div class="row">
            <div class="col s12 m12 l12 white">
                <h5 class="center-align">Create your job ad now.</h5>
                <p class="center-align">
                    <a href="{{ asset('/create/ad') }}" class="btn green">Create ad</a>
                </p>
            </div>
        </div>
    @endif
@stop
