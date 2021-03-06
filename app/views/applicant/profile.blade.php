@extends('applicant.layout')
@section('content')
    @if($application != null and count($application) >0 )
        <?php
        $salary = Salaries::find($application->salaryid);
        $location = Regions::find($application->regionid);
        $jobtype = JobTypes::find($application->jobtypeid);
        $edlevel = array('Elementary', 'High School', 'College');
        $skills = ApplicantSkills::where('applicationid', '=', $application->applicationid)->first();
        $duties = Duties::find($skills->dutyid);
        ?>
        <div class="container container-alt" style="margin-top:7em">
            <div class="block-header">
                <h2>{{ $app->fname ." ". $app->lname }}
                    <small>{{$jobtype->description}}</small>
                </h2>
                <ul class="actions m-t-20 hidden-xs">
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="">Privacy Settings</a>
                            </li>
                            <li>
                                <a href="">Account Settings</a>
                            </li>
                            <li>
                                <a href="">Other Settings</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
             <div class="card" id="profile-main">
                <div class="pm-overview c-overflow">

                    <div class="pmo-pic">
                        <form action="{{ asset('/applicant/update/picture') }}" method="post" enctype="multipart/form-data" >
                        <div class="p-relative">
                            <a href="">
                                <img id="editpicture" class="img-responsive" src="{{ asset('public/uploads/profile/'.(($app['profilepic']) != null ? $app['profilepic'] :'facebook.jpg' )) }}" alt="">
                            </a>
                            <div class="dropdown pmop-message">
                                <a data-toggle="dropdown" href="" class="btn bgm-white btn-float z-depth-1">
                                    <i class="zmdi zmdi-comment-text-alt"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <textarea placeholder="Write something..."></textarea>

                                    <button class="btn bgm-green btn-float"><i class="zmdi zmdi-mail-send"></i>
                                    </button>
                                </div>
                            </div>

                           <input id="upload" type="file" name="profilepic" style="display:none">
                            <a href="" id="upload_link" class="pmop-edit" >
                                <i class="zmdi zmdi-camera"></i> <span
                                        class="hidden-xs">Update Profile Picture</span>
                            </a>
                            <div class="row">
                                <input type="submit" class="uploadPhoto btn btn-sm btn-primary" name="upload" value="Upload Photo" />
                            </div>
                             </div>
                        </form>
                        <div class="pmo-stat">
                            <h2 class="m-0 c-white">{{$application->yearexp}}</h2>
                            Experience
                        </div>
                    </div>
                    <div class="pmo-block pmo-contact hidden-xs">
                        <h2>Contact</h2>
                        <ul>
                            <li><i class="zmdi zmdi-phone"></i> {{ $app->contactno }}</li>
                            <li><i class="zmdi zmdi-email"></i> {{ $app->email }}</li>
                            <li><i class="zmdi zmdi-facebook-box"></i> {{ $app->fname." ".$app->lname }}</li>
                            <li>
                                <i class="zmdi zmdi-pin"></i>
                                <address class="m-b-0 ng-binding">
                                    {{ $location->location }}

                                </address>
                            </li>
                        </ul>
                    </div>

                    <div class="pmo-block pmo-items hidden-xs">
                        <h2>Employers</h2>
                        <div class="pmob-body">
                            <div class="row">
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/1.jpg')}}" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/2.jpg')}}" alt="">

                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/3.jpg')}}" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/4.jpg')}}" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/5.jpg')}}" alt="">

                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/6.jpg')}}" alt="">

                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/7.jpg')}}" alt="">

                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/8.jpg')}}" alt="">

                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/9.jpg')}}" alt="">

                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/1.jpg')}}" alt="">

                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/2.jpg')}}" alt="">

                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="{{asset('public/template/img/profile-pics/3.jpg')}}" alt="">

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                 <form action="{{ asset('/applicant/profile/edit') }}" method="POST">
                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="active"><a href="/applicant/profile">About</a></li>
                        <li><a href="profile-timeline.html">Timeline</a></li>
                        <li><a href="profile-photos.html">Certifications</a></li>
                        <li><a href="profile-connections.html">Ratings</a></li>
                    </ul>
                    <div class="pmb-block">
                        <div class="pmbb-header">
                            <h2><i class="zmdi zmdi-account m-r-10"></i> Basic Information</h2>

                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a data-ma-action="profile-edit" href="">Edit</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="pmbb-body p-l-30">
                            <div class="pmbb-view">
                                <dl class="dl-horizontal">
                                    <dt >Full Name</dt>
                                    <dd class="text-capitalize">{{ $app->fname . " ". $app->lname }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Gender</dt>
                                    <dd>{{$app->gender}}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                    <?php $bdate = explode('-', $app->birth); ?>
                                    <dt>Birthday</dt>
                                    <dd>{{ $month[$bdate[1]].' ' . $bdate[2] .', ' . $bdate[0]  }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Martial Status</dt>
                                    <dd>{{$app->civilstatus}}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt> Nationality</dt>
                                    <dd>{{$app->nationality}}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Religion</dt>
                                    <dd>{{$app->religion}}</dd>
                                </dl>
                            </div>
                            <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Full Name</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <input type="text" name= "fname" class="form-control"
                                                   placeholder="eg.FirstName" value="{{ $app->fname }}">
                                            <input type="text" name= "lname" class="form-control"
                                                   placeholder="eg.LasttName" value="{{ $app->lname }}">
                                        </div>

                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Gender</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <select class="chosen" name="gender">
                                                        <option {{ (isset($app->gender) and $app->gender == "Male") ? 'selected' : ''  }} value="Male">Male</option>
                                                        <option {{ (isset($app->gender) and $app->gender == "Female") ? 'selected' : ''  }} value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Birthday</dt>
                                    <dd>
                                        <div class="dtp-container dropdown fg-line">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <select class="chosen" name="year">
                                                        <option value="" selected disabled>Year</option>
                                                        <?php $date = explode('-', $app->birth); $count = 1; ?>
                                                        @for($i = date('Y');50 > $count++; $i--)
                                                            <option {{ $date[0] == $i ? 'selected' : ''}} value="{{ $i }}"> {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select class="chosen" name="month">
                                                        <option value="" selected disabled>Month</option>
                                                        <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                                        @foreach($month as $key => $value)
                                                            <option {{ $date[1] == $key ? 'selected' : ''}} value="{{ $key}}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select name="day"  class="chosen">
                                                        <option value="" selected disabled>Day</option>
                                                        @for($i = 1; $i <= 31; $i++)
                                                            <option {{ $date[2] == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Martial Status</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <select class="chosen" name="civilstatus">
                                                <option disabled value="">Civil status</option>
                                                <option disabled value="">Civil status</option>
                                                <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                                @foreach($status as $key => $value)
                                                    <option {{ (isset($app->civilstatus) and $app->civilstatus == $key) ? 'selected' : '' }}  value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            <span class="red-text">{{ isset($error) ? $error->first('civilstatus') : '' }}</span>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt> Nationality</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <input class="typeahead form-control" type="text" value="{{ $app->nationality != null ? $app->nationality : '' }}" name="nationality">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Religion</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <input class="typeahead form-control" type="text" value="{{ $app->religion != null ? $app->religion: '' }}" name="religion">
                                        </div>
                                    </dd>
                                </dl>
                                <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" type="submit" name="action">Save</button>
                                    <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pmb-block">
                        <div class="pmbb-header">
                            <h2><i class="zmdi zmdi-phone m-r-10"></i> Contact Information</h2>

                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a data-ma-action="profile-edit" href="">Edit</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="pmbb-body p-l-30">
                            <div class="pmbb-view">
                                <dl class="dl-horizontal">
                                    <dt>Mobile Phone</dt>
                                    <dd>{{ $app->contactno }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Email Address</dt>
                                    <dd>{{ $app->email }}</dd>
                                </dl>
                            </div>

                            <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Mobile Phone</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <input type="text" class="form-control"value="{{ $app->contactno != null ? $app->contactno : '' }}" name="contactno"
                                                   placeholder="eg. 00971 12345678 9">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Email Address</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <input type="email" class="form-control"
                                                   placeholder="eg. malinda.h@gmail.com">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Address</dt>
                                    <dd>
                                        {{$location->location}}
                                    </dd>
                                </dl>

                                <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm"type="submit" name="action">Save</button>
                                    <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            @endif
        </div>
@stop

@stop
