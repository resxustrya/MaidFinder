
<?php
    $error = null;
    if(Session::has('error')) {
        $error = Session::get('error');
    }
    $input = null;
?>

@extends('home.layout')

@section('content')
    <div class="container">
        <div class="row">
            @if(Session::has('input'))
                <?php $input = Session::get('input'); ?>
            @endif
        </div>
        <div class="row">
           <div class="col s12 m12 l12">
               <ul class="collection with-header">
                   <li class="collection-header  light-blue darken-1"><h5 class="white-text">Complete your profile information</h5></li>
                   <li class="collection-item">
                       <form action="{{ asset('/create/profile') }}" method="POST">
                           <p><strong>User information</strong></p>
                           <div class="row">
                               <div class="input-field col s12 m12 l6">
                                   <div class="valign-wrapper">
                                       <i class="material-icons prefix">account_circle</i>
                                       <input id="icon_prefix" type="text" name="fname" value="{{ isset($user->fname) ? $user->fname : ''}}" class="validate" placeholder="Firstname">
                                   </div>
                                  <span class="red-text tab3">{{ isset($error) ? $error->first('fname') : '' }}</span>
                               </div>
                               <div class="input-field col s12 m12 l6">
                                   <div class="valign-wrapper">
                                       <i class="material-icons prefix">account_circle</i>
                                       <input id="icon_prefix" type="text" name="lname" value="{{ isset($user->lname) ? $user->lname : ''}}" class="validate" placeholder="Lastname">
                                   </div>
                                   <span class="red-text tab3">{{ isset($error) ? $error->first('lname') : '' }}</span>
                               </div>
                           </div>
                           <div class="row">
                               <div class="input-field col s12 m12 l6">
                                   <strong>Gender</strong>
                                       <select class="browser-default" name="gender">
                                           <option value="">Gender</option>
                                           <option {{(isset($input['gender']) and $input['gender'] == "Male") ? 'selected' : '' }} value="Male">Male</option>
                                           <option {{(isset($input['gender']) and $input['gender'] == "Female") ? 'selected' : '' }} value="Female">Female</option>
                                       </select>
                                       <span class="red-text">{{ isset($error) ? $error->first('gender') : '' }}</span>
                               </div>
                               <div class="input-field col s12 m12 l6">
                                   <strong>Civil Status</strong>
                                       <select class="browser-default" name="civilstatus">
                                           <option disabled value="">Civil status</option>
                                           <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                           @foreach($status as $key => $value)
                                               <option {{ (isset($input['civilstatus']) and $input['civilstatus'] == $key) ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
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
                                       <?php $count = 1; ?>
                                       @for($i = date('Y');50 > $count++; $i--)
                                           <option {{ (isset($input['year']) and $input['year'] == $i) ? 'selected' : ''}} value="{{ $i }}"> {{ $i }}</option>
                                       @endfor
                                   </select>
                                   <span class="red-text">{{ isset($error) ? $error->first('year') : '' }}</span>
                               </div>
                               <div class="col s12 m12 l4">
                                   <select class="browser-default" name="month">
                                       <option value="" selected disabled>Month</option>
                                       <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                       @foreach($month as $key => $value)
                                           <option {{ (isset($input['month']) and $input['month'] == $key) ? 'selected' : ''}} value="{{ $key}}">{{ $value }}</option>
                                       @endforeach
                                   </select>
                                   <span class="red-text">{{ isset($error) ? $error->first('month') : '' }}</span>
                               </div>
                               <div class="col s12 m12 l4">
                                   <select name="day"  class="browser-default">
                                       <option value="" selected disabled>Day</option>
                                       @for($i = 1; $i <= 31; $i++)
                                           <option {{ (isset($input['day']) and $input['day'] == $i) ? 'selected' : ''}} value="{{ $i }}">{{ $i }}</option>
                                       @endfor
                                   </select>
                                   <span class="red-text">{{ isset($error) ? $error->first('day') : '' }}</span>
                               </div>
                           </div>
                           <div class="row">
                               <p><strong>Contact Information</strong></p>
                               <div class="col s12 m12 l6 input-field">
                                   <div class="valign-wrapper">
                                       <i class="material-icons prefix">phone</i>
                                       <input id="icon_prefix" type="text" value="{{ (isset($input['contactno'] )) ? $input['contactno'] : ''}}" name="contactno" class="validate" placeholder="Phone number">
                                   </div>
                                   <span class="red-text tab3">{{ isset($error) ? $error->first('contactno') : '' }}</span>
                               </div>
                               <div class="col s12 m12 l6 input-field">
                                   <select name="location" class="browser-default">
                                       <option value="" selected disabled>City</option>
                                       @foreach($location as $loc)
                                           <option {{ (isset($input['location'] ) and $input['location'] == $loc->regionid) ? 'selected' : ''}} value="{{$loc->regionid}}">{{ $loc['location'] }}</option>
                                       @endforeach
                                   </select>
                                   <span class="red-text">{{ isset($error) ? $error->first('location') : '' }}</span>
                               </div>
                           </div>
                           <div class="row">
                               <p><strong>Complete Address</strong></p>
                               <div class="col s12 m12 l12 input-field valign-wrapper">
                                   <input id="icon_prefix" type="text" value="{{ (isset($input['address'] )) ? $input['address'] : ''}}" name="address" class="validate" placeholder="Complete address">
                               </div>
                               <span class="red-text">{{ isset($error) ? $error->first('address') : '' }}</span>
                           </div>
                           <div class="row">
                               <p><strong>Other information</strong></p>
                               <div class="col s12 m12 l6 input-field">
                                   <div class="valign-wrapper">
                                       <input id="icon_prefix" type="text" value="{{ (isset($input['nationality'] )) ? $input['nationality'] : ''}}" name="nationality" class="validate" placeholder="Nationality">
                                   </div>
                                   <span class="red-text">{{ isset($error) ? $error->first('nationality') : '' }}</span>
                               </div>
                               <div class="col s12 m12 l6 input-field">
                                   <input id="icon_prefix" type="text" value="{{ (isset($input['religion'] )) ? $input['religion'] : ''}}" name="religion" class="validate" placeholder="Religion">
                               </div>
                               <span class="red-text">{{ isset($error) ? $error->first('religion') : '' }}</span>
                           </div>
                           <div class="row">
                               <div class="row">
                                   <h1></h1>
                                   <div class="col s12 m12 l12 center-align">
                                       <p>
                                           <button class="btn-large waves-effect green" type="submit" name="action">Finish
                                               <i class="material-icons right">send</i>
                                           </button>
                                       </p>
                                       <p>Next step, you will upload your profile picture.</p>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </li>
               </ul>
           </div>
        </div>
    </div>
@stop
<?php Session::forget('input'); ?>
@section('css')

@stop


@section('js')

@stop
