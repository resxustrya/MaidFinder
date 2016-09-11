
@extends('employer.layout')

@section('content')
    @if(Session::has('error'))
        <?php $error = Session::get('error'); ?>
    @endif
    <div class="row">
        <div class="col s12 m12 l11">
            <ul class="collection with-header">
                <li class="collection-header light-blue darken-1"><h5 class="white-text">Update job ads</h5></li>
                <li class="collection-item grey lighten-5">
                    @if(Session::has('message'))
                        <h5 class="orange center">{{ Session::get('message') }}</h5>
                    @endif
                    <form action="{{ asset('/employer/ad/edit') }}" method="POST">
                        <input type="hidden" value="{{ $ad->adid }}" name="adid" />
                        <div class="row">
                            <p><strong class="title">Basic job info</strong></p>
                            <div class="col s12 m12 l4">
                                <label for="location">Location</label>
                                <select name="location" class="browser-default">
                                    <option value="" selected>Preffered location</option>
                                    @foreach($location as $loc)
                                        <option value="{{ $loc->regionid }}" {{ $ad->regionid == $loc->regionid ? 'selected' : '' }}>{{ $loc->location }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="location">{{ isset($error)? $error->first('location') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <label for="jobtype">Position</label>
                                <select name="jobtype" class="browser-default">
                                    <option value="" selected>Position</option>
                                    @foreach($jobtype as $job)
                                        <option value="{{ $job->jobtypeid }}" {{ $ad->jobtypeid == $job->jobtypeid ? 'selected' : '' }}>{{ $job->description }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="jobtype">{{ isset($error)? $error->first('position') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <label for="salary">Salary</label>
                                <select name="salary" class="browser-default">
                                    <option value="" selected>Salary (pesos)</option>
                                    @foreach($salary as $sal)
                                        <option value="{{ $sal->salaryid }}" {{ $ad->salaryid == $sal->salaryid ? 'selected' : '' }}>{{ $sal->amount_range }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="salary">{{ isset($error)? $error->first('salary') : '' }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <?php $capacity = array('Full Time', 'Part Time'); ?>
                                <label for="capacity">Capacity</label>
                                <select name="capacity" class="browser-default">
                                    <option value="" selected>Capacity</option>
                                    @foreach($capacity as $key => $value)
                                        <option value="{{ $key }}" {{ $ad->capacity == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="capacity">{{ isset($error)? $error->first('capacity') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <label for="yearexp">Year Experience</label>
                                <select name="yearexp" class="browser-default">
                                    <option value="" selected>Years Experience</option>
                                    @for($i = 1; $i <= 20; $i++)
                                        <option value="{{$i}}" {{ $ad->yearexp == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <label class="red-text" for="yearexp">{{ isset($error)? $error->first('yearexp') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                                    <label for="edlevel">Education level</label>
                                    <select name="edlevel" class="browser-default">
                                    <option value="" selected>Eduction level</option>
                                    @foreach($edlevel as $key => $value)
                                        <option value="{{ $key }}" {{ $ad->edlevel == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="edlevel">{{ isset($error)? $error->first('edlevel') : '' }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <label for="dayof">Day off</label>
                                <?php $days = array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday'); ?>
                                <select name="dayof" class="browser-default">
                                    <option value="" disabled selected>Day off</option>
                                    @foreach($days as $key => $value)
                                        <option value="{{ $key }}" {{ $ad->dayof == $key ? 'selected' :'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="dayof">{{ isset($error)? $error->first('dayof') : '' }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                                $startdate = explode('-', $ad->startdate);
                            ?>
                            <p><strong class="title">Start date</strong></p>
                            <div class="col s12 m12 l4">
                                <label for="year">Year</label>
                                <select class="browser-default" name="year">
                                    <option value="" selected disabled>Year</option>
                                    <?php $count = 1 ?>
                                    @for($i = date('Y');20 > $count++; $i++)
                                        <option value="{{ $i }}" {{ $startdate[0] == $i ? 'selected' : '' }}> {{ $i }}</option>
                                    @endfor
                                </select>
                                <label class="red-text" for="year">{{ isset($error)? $error->first('year') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <label for="month">Month</label>
                                <select class="browser-default" name="month">
                                    <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                    <option value="" selected disabled>Month</option>
                                    @foreach($month as $key => $value)
                                        <option value="{{ $key }}" {{ $startdate[1] == $key ? 'selected' :'' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="month">{{ isset($error)? $error->first('month') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <label for="day">Day</label>
                                <select name="day"  class="browser-default">
                                    <option value="" selected disabled>Day</option>
                                    @for($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" {{ $startdate[2] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <label class="red-text" for="day">{{ isset($error)? $error->first('day') : '' }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <p><strong class="title">Helper gender</strong></p>
                            <div class="col s12 m12 l4">
                                <input type="radio" id="test1" class="with-gap"checked name="gender" {{ $ad->gender == "Female" ? 'selected' : '' }} value="Female"/>
                                <label for="test1">Female</label>
                                <input type="radio" id="test2" class="with-gap" name="gender" {{ $ad->gender == "Male" ? 'selected' : '' }} value="Male"/>
                                <label for="test2">Male</label>
                            </div>
                        </div>
                        <div class="row">
                            <p><strong class="title">Job ad description</strong></p>
                            <div class="col s12 m12 l12">
                                <textarea name="pitch"  placeholder="Write your job description here" style="height: 150px;" cols="20">{{ isset($ad->pitch) ?  $ad->pitch : '' }}</textarea>

                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="row">
                                    <div class="col s12 m12 l3">
                                        <p><strong class="title">Expected duties</strong></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l2"></div>
                                    <div class="col s12 m12 l6">
                                        <table border="0" class="other_duties">
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="test5" name="cooking"  value="Cooking" {{ (Session::has('duties') and Session::get('duties')->cooking != null) ? 'checked' : '' }} />
                                                    <label for="test5">Cooking</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="test6" name="laundry" value="Laundry" {{ (Session::has('duties') and Session::get('duties')->laundry != null) ? 'checked' : '' }} />
                                                    <label for="test6">Laundry</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="test7" name="gardening" value="gardening" {{ (Session::has('duties') and Session::get('duties')->gardening != null) ? 'checked' : '' }}/>
                                                    <label for="test7">Gardening</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="test8" name="grocery" value="Grocery" {{ (Session::has('duties') and Session::get('duties')->grocery != null) ? 'checked' : '' }}/>
                                                    <label for="test8">Grocery</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="test9" name="cleaning" value="House Cleaning" {{ (Session::has('duties') and Session::get('duties')->cleaning != null) ? 'checked' : '' }}/>
                                                    <label for="test9">House cleaning</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="test10" name="tutoring" value="Tutoring" {{ (Session::has('duties') and Session::get('duties')->tuturing != null) ? 'checked' : '' }}/>
                                                    <label for="test10">Tutoring</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="test10" name="driving" value="Driving" {{ (Session::has('duties') and Session::get('duties')->driving != null) ? 'checked' : '' }}/>
                                                    <label for="test10">Driving</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="test11" name="pet" value="Pet Care" {{ (Session::has('duties') and Session::get('duties')->pet != null) ? 'checked' : '' }}/>
                                                    <label for="test11">Pet Care</label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="row">
                                        <h1></h1>
                                        <div class="col s12 m12 l12">
                                            <p class="center-align">
                                                <button class="btn-large waves-effect light-blue darken-2" type="submit" name="action">Update ad
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
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
