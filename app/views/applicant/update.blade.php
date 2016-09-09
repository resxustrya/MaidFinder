@extends('applicant.layout')

@section('content')
    <div class="row" style="padding: 0px;">
        <ul class="collection with-header">
            <li class="collection-header  light-blue darken-1"><h5 class="white-text">Update Profile</h5></li>
            <li class="collection-item">
                <form action="{{ asset('/applicant/profile/edit') }}" method="POST">
                    <div class="row">
                        <p><strong>User information</strong></p>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="icon_prefix" type="text" name="fname" value="{{ $app->fname }}" class="validate">
                            <label for="icon_prefix">First Name</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="icon_prefix" type="text" name="lname" value="{{ $app->lname }}" class="validate">
                            <label for="icon_prefix">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <strong>Gender</strong>
                            <select class="browser-default" name="gender">
                                <option value="">Gender</option>
                                <option {{ (isset($app->gender) and $app->gender == "Male") ? 'selected' : ''  }} value="Male">Male</option>
                                <option {{ (isset($app->gender) and $app->gender == "Female") ? 'selected' : ''  }} value="Female">Female</option>
                            </select>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <strong>Civil Status</strong>
                            <select class="browser-default" name="civilstatus">
                                <option disabled value="">Civil status</option>
                                <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                @foreach($status as $key => $value)
                                    <option {{ (isset($app->civilstatus) and $app->civilstatus == $key) ? 'selected' : '' }}  value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <span class="red-text">{{ isset($error) ? $error->first('civilstatus') : '' }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <p><strong>Birthdate</strong></p>
                        <div class="col s12 m12 l4">
                            <select class="browser-default" name="year">
                                <option value="" selected disabled>Year</option>
                                <?php $date = explode('-', $app->birth); $count = 1; ?>
                                @for($i = date('Y');50 > $count++; $i--)
                                    <option {{ $date[0] == $i ? 'selected' : ''}} value="{{ $i }}"> {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col s12 m12 l4">
                            <select class="browser-default" name="month">
                                <option value="" selected disabled>Month</option>
                                <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                @foreach($month as $key => $value)
                                    <option {{ $date[1] == $key ? 'selected' : ''}} value="{{ $key}}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col s12 m12 l4">
                            <select name="day"  class="browser-default">
                                <option value="" selected disabled>Day</option>
                                @for($i = 1; $i <= 31; $i++)
                                    <option {{ $date[2] == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <p><strong>Contact Information</strong></p>
                        <div class="col s12 m12 l6 input-field">
                            <i class="material-icons prefix">phone</i>
                            <input id="icon_prefix" type="text" value="{{ $app->contactno != null ? $app->contactno : '' }}" name="contactno" class="validate">
                            <label for="icon_prefix">Contact number</label>
                        </div>
                        <div class="col s12 m12 l6 input-field">
                            <select name="location" class="browser-default">
                                <option value="" selected disabled>Location</option>
                                @foreach($location as $loc)
                                    <option value="{{ $loc->regionid}}" {{ (($app->regionid == $loc->regionid) ? 'selected' : '') }}>{{ $loc['location'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <p><strong>Complete Address</strong></p>
                        <div class="col s12 m12 l12 input-field">
                            <input id="icon_prefix" type="text" value="{{ $app->address != null ? $app->address: '' }}" name="address" class="validate">
                            <label for="icon_prefix">Full Address</label>
                        </div>
                    </div>
                    <div class="row">
                        <p><strong>Other information</strong></p>
                        <div class="col s12 m12 l6 input-field">
                            <input id="icon_prefix" type="text" value="{{ $app->nationality != null ? $app->nationality : '' }}" name="nationality" class="validate">
                            <label for="icon_prefix">Nationality</label>
                        </div>
                        <div class="col s12 m12 l6 input-field">
                            <input id="icon_prefix" type="text" value="{{ $app->religion != null ? $app->religion: '' }}" name="religion" class="validate">
                            <label for="icon_prefix">Religion</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <h1></h1>
                            <div class="col s12 m12 l12">
                                <p class="center-align">
                                    <button class="btn-large waves-effect green" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>

@stop

@section('js')
    @parent
    <script crossorigin="anonymous">
        $(document).ready(function() {

        });

    </script>
@stop
