
@extends('employer.layout')

@section('content')
    <div class="row">
        @if(Session::has('message'))
            <div class="card-panel light-green lighten-3">
                <span class="center-align">
                    {{ Session::get('message') }}
                </span>
            </div>
        @endif
    </div>
    @if(count($ads) >0)
        <div class="row" style="padding: 0px;">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="col s12 m12 l6">
                        <h4 class="black-text">Your job ads</h4>
                    </div>
                    <div class="col s12 m12 l6 right-align">
                        <p>
                            <a class="btn green" href="{{ asset('create/ad') }}">Create new ad</a>
                        </p>
                    </div>
                </div>
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
                        <div class="row card-panel">
                            <div class="col s12 m12 l2">
                                <h6>Job ad {{ $jobcount }}</h6>
                                <span>Create at : {{ $ad->created_at }}</span>
                            </div>
                            <div class="col s12 m12 l8">
                                <div class="row">
                                    <h6><strong class="material-icons">work</strong> <strong>Job ad preferences</strong></h6>
                                    <table>
                                        <tr>
                                            <td>Job Title : </td>
                                            <td><strong style="text-decoration: underline">{{ $jobtype->description }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Contact :</td>
                                            <td>{{ $ad->contactno }}</td>
                                        </tr>
                                        <tr>
                                            <?php $capacity = array('Full Time', 'Part Time'); ?>
                                            <td>Capacity : </td>
                                            <td>{{ $capacity[$ad->capacity] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Start date :</td>
                                            <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                            <?php $startdate = explode('-', $ad->startdate); ?>
                                            <td>{{  $month[$startdate[1]].'/' . $startdate[2] .'/' . $startdate[0] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Exptected salary :</td>
                                            <td>{{ $salary->amount_range }} (pesos)</td>
                                        </tr>
                                        <tr>
                                            <td>Helper gender :</td>
                                            <td>{{ $ad->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td>Education level :</td>
                                            <td>{{ $edlevel[$ad->edlevel] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Experience :</td>
                                            <td>{{ $ad->yearexp }} years</td>
                                        </tr>
                                        <tr>
                                            <td>Contract years</td>
                                            <td>{{ $ad->contractyears }} years</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <h6><strong class="material-icons">description</strong> <strong>Job ad description</strong></h6>
                                    <ul>
                                        @foreach($job_desc as $desc)
                                            <li><span class="grey-text">* </span> {{ $desc->desc }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="divider"></div>

                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <h6><strong>Perfurmed duties</strong></h6>
                                        @if(isset($duties))
                                            @if($duties->cooking != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->cooking }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->laundry != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->laundry }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->gardening != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->gardening }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->grocery != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->grocery }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->cleaning != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->cleaning }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->tuturing != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->tuturing }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->driving != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->driving }}</strong>
                                                </div>
                                            @endif
                                            @if($duties->pet != null)
                                                <div class="col s12 m12 l4">
                                                    <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->pet }}</strong>
                                                </div>
                                            @endif
                                            <p>
                                                {{ $duties->other }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12 l2">
                                <div class="center-align">
                                    <div class="row">
                                        <a class="btn light-blue darken-3 waves-effect col s12 m12 l12 white-text" href="{{asset ('/employer/ad/edit/'. $ad->adid)}}">Edit ad</a>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <a class="btn light-blue darken-3 waves-effect col s12 m12 l12 white-text" href="{{asset ('/employer/ad/delete/'. $ad->adid)}}">Delete ad</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <?php $jobcount++ ?>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@stop

@section('js')

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
