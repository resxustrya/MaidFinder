
@extends('applicant.layout')


@section('content')
    @if(Session::has('error'))
        <?php $error = Session::get('error'); ?>
    @endif
    <div class="container" style="margin-top:7em;">
        <div class="block-header">
            <h2>Create your job Availability</h2>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Job Preferences Information
                    <small>Create your preferred job specifically
                    </small>
                </h2>
            </div>

            <div class="card-body card-padding">
                <form action="{{ asset('/applicant/create/application') }}" method="POST" role="form">
                    <div class="row">
                    <div class="col-sm-4">
                        <label for="location" class="c-black f-500 m-b-2">Location</label>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            {{ isset($error)? $error->first('location') : '' }}
                        </div>
                        <div class="form-group has-error">
                            <div class="fg-line select">
                                <select name="location" class="form-control">
                                    @foreach($location as $loc)
                                        <option value="{{ $loc['regionid'] }}">{{ $loc['location'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="position" class="c-black f-500 m-b-2">Position</label>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            {{ isset($error)? $error->first('position') : '' }}
                        </div>
                        <div class="form-group has-error">
                            <div class="fg-line select">
                                <select name="jobtype" class="form-control">
                                    <option value="" selected>Position</option>
                                    @foreach($jobtype as $job)
                                        <option value="{{ $job->jobtypeid }}">{{ $job->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="salary" class="c-black f-500 m-b-2">Expected Salary</label>
                        <label class=" has-error c-red" for="salary">{{ isset($error)? $error->first('salary') : '' }}</label>
                        <div class="form-group">
                            <div class="fg-line select">
                                <select name="salary" class="form-control">
                                    <option value="" selected>Salary (pesos)</option>
                                    @foreach($salary as $sal)
                                        <option value="{{ $sal->salaryid }}">{{ $sal->amount_range }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php $capacity = array('Full Time', 'Part Time'); ?>
                        <label for="capacity" class="c-black f-500 m-b-2">Capacity</label>
                            <label class="has-error c-red" for="capacity">{{ isset($error)? $error->first('capacity') : '' }}</label>
                        <div class="form-group">
                            <div class="fg-line select">
                                <select name="capacity" class="form-control">
                                    <option value="" selected>Capacity</option>
                                    @foreach($capacity as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php $edlevel = array("Elementary", "High School", "College Level"); ?>
                        <label for="edlevel" class="c-black f-500 m-b-2">Education Level</label>
                        <label class=" has-error c-red" for="edlevel">{{ isset($error)? $error->first('edlevel') : '' }}</label>
                        <div class="form-group">
                            <div class="fg-line select">
                                <select name="edlevel" class="form-control">
                                    <option value="" selected>Eduction level</option>
                                    @foreach($edlevel as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php $days = array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday','TBD','Flexible'); ?>
                        <label for="dayoff" class="c-black f-500 m-b-2">Day Off</label>
                        <label class=" has-error c-red" for="dayof">{{ isset($error)? $error->first('dayof') : '' }}</label>
                        <div class="form-group">
                            <div class="fg-line select">
                                <select name="dayof" class="form-control">
                                    <option value="" disabled selected>Day off</option>
                                    @foreach($days as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="pitch" class="c-black f-500 m-b-2">Job Application Pitch</label>
                        <label class=" has-error c-red" for="pitch">{{ isset($error)? $error->first('pitch') : '' }}</label>
                        <div class="form-group">
                            <div class="fg-line">
                                <textarea class="form-control" name="pitch" id="textarea1" placeholder ="Tell the employer why you are best suited for this role. Highlight specific skills and how you can contribute.">
                                </textarea>
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-12">
                            <p class="c-black f-500 m-b-20">Expected Duties</p>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" value="laundry">
                                <i class="input-helper"></i>
                                Laundry
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="cooking" value="Cooking">
                                <i class="input-helper"></i>
                                Cooking
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="Gardening" value="Gardening">
                                <i class="input-helper"></i>
                                Gardening
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="grocery" value="Grocery">
                                <i class="input-helper"></i>
                                Grocery
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="cleaning" value="House Cleaning">
                                <i class="input-helper"></i>
                                House Cleaning
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="tutoring" value="Tutoring">
                                <i class="input-helper"></i>
                                Tutoring
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="driving" value="Driving">
                                <i class="input-helper"></i>
                                Driving
                            </label>
                            <label class="checkbox checkbox-inline m-r-20">
                                <input type="checkbox" name="pet"value="Pet Care">
                                <i class="input-helper"></i>
                                Pet Care
                            </label>

                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-offset-2 col-sm-10 m-t-25">
                                <button class="btn btn-primary btn-lg pull-right" type="submit" name="action">Create
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-5" style="margin-top:2em;">
                            <a class="-format-underlined " href="{{asset('/applicant/applicantPost')}}">Cancel</a>
                        </div>

                    </div>
                </form>
               
            </div>
        </div>
    </div>

@stop

@section('js')

@stop
