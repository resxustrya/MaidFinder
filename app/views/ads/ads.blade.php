@extends('ads.layout')
@section('title')
    <title>Employer ads</title>
@stop
@section('content')
    <div class="">
        <div class="row white" style="padding: 0px;">
            <div class="col l1"><span>&nbsp;</span></div>
            <div class="col s12 m12 l10">
                <h4>MaidFinder Employer Ads</h4>
                <p>To get the best search result, use our search filtering feature below that allows you to match a helper based on your job ad criteria. </p>
            </div>
            <div class="col s12 m12 l1">
                <span>&nbsp;</span>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header orange waves-effect btn center-align"><i class="material-icons center-align">search</i>Search Menu</div>
                <div class="collapsible-body white" style="padding: 10px;">
                    <h5>Search Criteria</h5>
                    <h5 class="divider"></h5>
                    <form action="{{ asset('/search/profiles') }}" method="POST">
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <select name="location" class="browser-default">
                                    <option value="" selected>Preffered location</option>
                                    @foreach($locations as $loc)
                                        <option value="{{ $loc->regionid }}">{{ $loc->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col s12 m12 l6">
                                <select name="salary" class="browser-default">
                                    <option value="" selected>Salary (pesos)</option>
                                    @foreach($salary as $sal)
                                        <option value="{{ $sal->salaryid }}">{{ $sal->amount_range }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <select name="jobtype" class="browser-default">
                                    <option value="" selected>Position</option>
                                    @foreach($jobtypes as $job)
                                        <option value="{{ $job->jobtypeid }}">{{ $job->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col s12 m12 l6">
                                <select name="capacity" class="browser-default">
                                    <option value="" selected>Capacity</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <select name="yearexp" class="browser-default">
                                    <option value="" selected>Years Experience</option>
                                    @for($i = 1; $i <= 20; $i++)
                                        <option value="{{$i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col s12 m12 l6">
                                <?php $edlevel = array("Elementary", "High School", "College graduate"); ?>
                                <select name="edlevel" class="browser-default">
                                    <option value="" selected>Eduction level</option>
                                    @foreach($edlevel as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <table border="0">
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
                                </table>
                                <div class="row">
                                    <p>
                                        <input type="submit" class="btn-large green col s12 m12 l12 center-align" name="search" value="Find your match" />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m12 l1">
                &nbsp;
            </div>
            <div class="col s12 m12 l10">
                @foreach($ads as $ad)
                    <?php
                    $location = Regions::find($ad->regionid);
                    $jobtype = JobTypes::find($ad->jobtypeid);
                    $emp = Employers::find($ad->empid);
                    $duties = Duties::where('adid', '=', $ad->adid)->first();
                    ?>
                    <?php $capacity = array('Full Time','Par Time'); ?>
                    <a href="{{ asset('employer/ad/profile/'.$ad->adid)  }}" class="hoverable waves-green">
                        <ul class="collection black-text">
                            <li class="collection-item avatar">
                                <img src="{{ asset('public/uploads/profile/'.(($emp['profilepic']) != null ? $emp['profilepic'] :'facebook.jpg' )) }}" alt="" class="circle">
                                <h5>{{ $emp->fname ." ". $emp->lname }}</h5>
                                <span class="valign-wrapper">
                                    <i class="material-icons">location_on</i>
                                    Location :
                                    <strong class="offset-s12 tab2"> {{ $location->location }}</strong>
                                </span>
                                 <span class="valign-wrapper">
                                    <i class="material-icons">location_on</i>
                                    Nationality :
                                    <strong class="offset-s12 tab2"> {{ $emp->nationality }}</strong>
                                </span>
                            </li>
                        </ul>
                    </a>
                @endforeach
            </div>
            <div class="col s12 m12 l1">

            </div>
        </div>
    </div>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/ads.css') }}" />
@stop
@section('js')
@stop
