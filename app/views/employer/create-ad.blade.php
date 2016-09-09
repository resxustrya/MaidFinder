
@extends('employer.layout')

@section('content')
    @if(Session::has('error'))
        <?php $error = Session::get('error'); ?>
    @endif
    <div class="row">
        <div class="col s12 m12 l11">
            <ul class="collection with-header">
                <li class="collection-header"><h5 class="grey-text">Create job ads</h5></li>
                <li class="collection-item white">
                    @if(Session::has('message'))
                        <h5 class="orange-text center">{{ Session::get('message') }}</h5>
                    @endif
                    <form action="{{ asset('/create/ad') }}" method="POST">
                        <div class="row">
                            <p><strong class="title">Basic job info</strong></p>
                            <div class="col s12 m12 l4">
                                <label for="location">Location</label>
                                <select name="location" class="browser-default">
                                    <option value="" selected>Preffered location</option>
                                    @foreach($location as $loc)
                                        <option value="{{ $loc->regionid }}">{{ $loc->location }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="location">{{ isset($error)? $error->first('location') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <label for="jobtype">Position</label>
                                <select name="jobtype" class="browser-default">
                                    <option value="" selected>Position</option>
                                    @foreach($jobtype as $job)
                                        <option value="{{ $job->jobtypeid }}">{{ $job->description }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="jobtype">{{ isset($error)? $error->first('position') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <label for="salary">Salary</label>
                                <select name="salary" class="browser-default">
                                    <option value="" selected>Salary (pesos)</option>
                                    @foreach($salary as $sal)
                                        <option value="{{ $sal->salaryid }}">{{ $sal->amount_range }}</option>
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
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="capacity">{{ isset($error)? $error->first('capacity') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <label for="yearexp">Years Experience</label>
                                <select name="yearexp" class="browser-default">
                                    <option value="" selected>Years Experience</option>
                                    @for($i = 1; $i <= 20; $i++)
                                        <option value="{{$i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <label class="red-text" for="yearexp">{{ isset($error)? $error->first('yearexp') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <label for="edlevel">Education level</label>
                                <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                                <select name="edlevel" class="browser-default">
                                    <option value="" selected>Eduction level</option>
                                    @foreach($edlevel as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                    <label class="red-text" for="edlevel">{{ isset($error)? $error->first('edlevel') : '' }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l4">
                                <?php $days = array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday'); ?>
                                    <label for="dayof">Day off</label>
                                    <select name="dayof" class="browser-default">
                                    <option value="" disabled selected>Day off</option>
                                    @foreach($days as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                    <label class="red-text" for="dayof">{{ isset($error)? $error->first('dayof') : '' }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <p><strong class="title">Start date</strong></p>
                            <div class="col s12 m12 l4">
                                <select class="browser-default" name="year">
                                    <option value="" selected disabled>Year</option>
                                    <?php $count = 1 ?>
                                    @for($i = date('Y');20 > $count++; $i++)
                                        <option value="{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                </select>
                                <label class="red-text" for="year">{{ isset($error)? $error->first('year') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <select class="browser-default" name="month">
                                    <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                    <option value="" selected disabled>Month</option>
                                    @foreach($month as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <label class="red-text" for="month">{{ isset($error)? $error->first('month') : '' }}</label>
                            </div>
                            <div class="col s12 m12 l4">
                                <select name="day"  class="browser-default">
                                    <option value="" selected disabled>Day</option>
                                    @for($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <label class="red-text" for="day">{{ isset($error)? $error->first('day') : '' }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <p><strong class="title">Helper gender</strong></p>
                            <div class="col s12 m12 l4">
                                <input type="radio" id="test1" class="with-gap"checked name="gender" value="Female"/>
                                <label for="test1">Female</label>
                                <input type="radio" id="test2" class="with-gap" name="gender" value="Male"/>
                                <label for="test2">Male</label>
                            </div>
                        </div>
                        <div class="row">
                            <p><strong class="title">Job ad description</strong></p>
                            <div class="col s12 m12 l12">
                                <table class="job_desc">
                                    @if(Session::has('job_desc') and count(Session::get('job_desc')) > 0)
                                        @foreach(Session::get('job_desc') as $value)
                                            <tr>
                                                <td><span class="orange-text">* </span></td>
                                                <td>
                                                    <input type="text" name="job_desc[]" value="{{ $value }}" placeholder="Write your job description here"/>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td><span class="orange-text">* </span></td>
                                            <td>
                                                <input type="text" name="job_desc[]" placeholder="Write your job description here"/>
                                            </td>
                                        </tr>
                                    @endif

                                    <?php Session::forget('job_desc'); ?>
                                </table>
                                <a href="javascript;" class="add_desc">Add new description</a>
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
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="test11" name="driving" value="Driving" />
                                                    <label for="test11">Driving</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" id="test12" name="pet" value="Pet Care"/>
                                                    <label for="test12">Pet Care</label>
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
                                                <button class="btn-large waves-effect light-blue darken-2" type="submit" name="action">Create ad
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

@section('css')
    @parent
    <style>
        .add_desc {
            font-size: 0.8em;;
        }
        .title {
            font-size: 1.2em;
        }
        table.senior_set tr td {
            padding:2px;
        }
        table.other_duties tr td {
            padding: 2px;
        }
        table.job_desc tr td {
            padding:0px;
        }
    </style>
@stop