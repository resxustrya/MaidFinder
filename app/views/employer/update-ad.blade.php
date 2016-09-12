
@extends('employer.layout')

@section('content')
    @if(Session::has('error'))
        <?php $error = Session::get('error'); ?>
    @endif
    <div class="container" style="margin-top:7em;">
        <div class="block-header">
            <h2>Update your Job Ad</h2>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>Job Information
                    <small>Complete the following fields.</small>
                    @if(Session::has('message'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                </h2>
            </div>
            <div class="card-body card-padding">
                <form action="{{ asset('/employer/ad/edit') }}" method="POST" role="form">
                    <input type="hidden" value="{{ $ad->adid }}" name="adid" />
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="location" class="c-black f-500 m-b-2">Location</label>
                            <label class="c-red" for="location">{{ isset($error)? $error->first('location') : '' }}</label>
                            <div class="form-group">
                                <div class="fg-line select">
                                    <select name="location" class="form-control">
                                        <option value="" selected>Preferred location</option>
                                        @foreach($location as $loc)
                                            <option value="{{ $loc->regionid }}" {{ $ad->regionid == $loc->regionid ? 'selected' : '' }}>{{ $loc->location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="position" class="c-black f-500 m-b-2">Position</label>
                            <label class="c-red" for="position">{{ isset($error)? $error->first('position') : '' }}</label>
                            <div class="form-group">
                                <div class="fg-line select">
                                    <select name="jobtype" class="form-control">
                                        <option value="" selected>Position</option>
                                        @foreach($jobtype as $job)
                                            <option value="{{ $job->jobtypeid }}" {{ $ad->jobtypeid == $job->jobtypeid ? 'selected' : '' }}>{{ $job->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="salary" class="c-black f-500 m-b-2">Expected Salary</label>
                            <label class="c-red" for="salary">{{ isset($error)? $error->first('salary') : '' }}</label>
                            <div class="form-group">
                                <div class="fg-line select">
                                    <select name="salary" class="form-control">
                                        <option value="" selected>Salary (pesos)</option>
                                        @foreach($salary as $sal)
                                            <option value="{{ $sal->salaryid }}" {{ $ad->salaryid == $sal->salaryid ? 'selected' : '' }}>{{ $sal->amount_range }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <?php $capacity = array('Full Time', 'Part Time'); ?>
                            <label for="capacity" class="c-black f-500 m-b-2">Capacity</label>
                                <label class="c-red" for="capacity">{{ isset($error)? $error->first('capacity') : '' }}</label>
                            <div class="form-group">
                                <div class="fg-line select">
                                    <select name="capacity" class="form-control">
                                        <option value="" selected>Capacity</option>
                                        @foreach($capacity as $key => $value)
                                            <option value="{{ $key }}" {{ $ad->capacity == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="edlevel" class="c-black f-500 m-b-2">Yr of Experience</label>
                            <label class="c-red" for="yearexp">{{ isset($error)? $error->first('yearexp') : '' }}</label>
                            <div class="form-group">
                                <div class="fg-line select">
                                    <select name="yearexp" class="form-control">
                                        <option value="" selected>Years Experience</option>
                                        @for($i = 1; $i <= 20; $i++)
                                            <option value="{{$i}}" {{ $ad->yearexp == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <?php $edlevel = array("Elementary", "High School", "College Level"); ?>
                            <label for="edlevel" class="c-black f-500 m-b-2">Education Level</label>
                                <label class="c-red" for="edlevel">{{ isset($error)? $error->first('edlevel') : '' }}</label>
                            <div class="form-group">
                                <div class="fg-line select">
                                    <select name="edlevel" class="form-control">
                                        <option value="" selected>Eduction level</option>
                                        @foreach($edlevel as $key => $value)
                                            <option value="{{ $key }}" {{ $ad->edlevel == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <?php $days = array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday','TBD','Flexible'); ?>
                            <label for="dayoff" class="c-black f-500 m-b-2">Day Off</label>
                                <label class="c-red" for="dayof">{{ isset($error)? $error->first('dayof') : '' }}</label>
                            <div class="form-group">
                                <div class="fg-line select">
                                    <select name="dayof" class="form-control">
                                        <option value="" disabled selected>Day off</option>
                                        @foreach($days as $key => $value)
                                            <option value="{{ $key }}" {{ $ad->dayof == $key ? 'selected' :'' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <?php $startdate = explode('-', $ad->startdate); ?>
                                <label for="year" class="c-black f-500 m-b-2">Year</label>
                                <label class="c-red" for="year">{{ isset($error)? $error->first('year') : '' }}</label>
                                <div class="form-group">
                                    <div class="fg-line select">
                                        <select name="year" class="form-control">
                                            <option value="" disabled selected>Year</option>
                                            <?php $count = 1 ?>
                                            @for($i = date('Y');20 > $count++; $i++)
                                                <option value="{{ $i }}" {{ $startdate[0] == $i ? 'selected' : '' }}> {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-sm-2">
                            <label for="month" class="c-black f-500 m-b-2">Year</label>
                            <label class="c-red" for="month">{{ isset($error)? $error->first('month') : '' }}</label>
                            <div class="form-group">
                                <div class="fg-line select">
                                    <select name="month" class="form-control">
                                        <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                        <option value="" disabled selected>Month</option>
                                        @foreach($month as $key => $value)
                                            <option value="{{ $key }}" {{ $startdate[1] == $key ? 'selected' :'' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label for="day" class="c-black f-500 m-b-2">Day</label>
                            <label class="c-red" for="day">{{ isset($error)? $error->first('day') : '' }}</label>
                            <div class="form-group">
                                <div class="fg-line select">
                                    <select name="day" class="form-control">
                                        <option value="" disabled selected>Day</option>
                                            @for($i = 1; $i <= 31; $i++)
                                                <option value="{{ $i }}" {{ $startdate[2] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 m-b-20">
                            <p><strong class="title">Helper gender</strong></p>
                            <label for="gender" class="radio radio-inline m-r-20">
                                <input type="radio" id="test2" class="with-gap" name="gender" {{ $ad->gender == "Male" ? 'selected' : '' }} value="Male"/>
                                <i class="input-helper"></i>
                                Male
                            </label>
                            <label for="gender" class="radio radio-inline m-r-20">
                                <input type="radio" id="test1" class="with-gap"checked name="gender" {{ $ad->gender == "Female" ? 'selected' : '' }} value="Female"/>
                                <i class="input-helper"></i>
                                Female
                            </label>
                        </div>
                        <div class="col-sm-12">
                            <label for="pitch" class="c-black f-500 m-b-2">Job Application Pitch</label>
                            <label class=" has-error c-red" for="pitch">{{ isset($error)? $error->first('pitch') : '' }}</label>
                            <div class="form-group">
                                <div class="fg-line">
                                <textarea class="form-control" name="pitch" id="textarea1" placeholder ="Tell us what kind of employee you are expecting...">
                                {{ isset($ad->pitch) ?  $ad->pitch : '' }}
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <p class="c-black f-500 m-b-20">Expected Duties</p>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" value="laundry"{{ (Session::has('duties') and Session::get('duties')->laundry != null) ? 'checked' : ''}}/>
                                <i class="input-helper"></i>
                                Laundry
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="cooking" value="Cooking"{{ (Session::has('duties') and Session::get('duties')->cooking != null) ? 'checked' : '' }} />/>
                                <i class="input-helper"></i>
                                Cooking
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="Gardening" value="Gardening"{{ (isset($duties->gardening) and $duties->gardening != null) ? 'checked' : '' }}/>
                                <i class="input-helper"></i>
                                Gardening
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="grocery" value="Grocery"{{ (Session::has('duties') and Session::get('duties')->grocery != null) ? 'checked' : '' }}/>
                                <i class="input-helper"></i>
                                Grocery
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="cleaning" value="House Cleaning" {{ (Session::has('duties') and Session::get('duties')->cleaning != null) ? 'checked' : '' }}/>
                                <i class="input-helper"></i>
                                House Cleaning
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="tutoring" value="Tutoring" {{ (Session::has('duties') and Session::get('duties')->tuturing != null) ? 'checked' : '' }}/>
                                <i class="input-helper"></i>
                                Tutoring
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="driving" value="Driving" {{ (Session::has('duties') and Session::get('duties')->driving != null) ? 'checked' : '' }}/>
                                <i class="input-helper"></i>
                                Driving
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="pet"value="Pet Care"{{ (Session::has('duties') and Session::get('duties')->pet != null) ? 'checked' : '' }}/>
                                <i class="input-helper"></i>
                                Pet Care
                            </label>

                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-offset-2 col-sm-10 m-t-25">
                                <button class="btn btn-primary btn-lg pull-right" type="submit" name="action">Update
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-5 m  -t-30">
                            <a class="-format-underlined " href="{{asset('/applicant/applicantPost')}}">Cancel</a>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script>
        var input_count = 1;
        $(document).ready(function() {
            $('.add_desc').click(function(e) {
                e.preventDefault();
                if(input_count != 10) {
                    $('.job_desc').append('<tr><td><span class="orange-text">* </span></td><td> <input type="text" name="job_desc[]" placeholder="Write your job description here"/></td></tr>');
                    input_count ++;
                }
            });
        });
    </script>
@stop
