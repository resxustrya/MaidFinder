
@extends('applicant.layout')

@section('content')
    <div class="row" style="padding: 0px;">
        <div class="row">
            <h4 class="black-text">Job application</h4>
        </div>
        <div class="card-panel">
            <div class="row">
                <div class="col s12 m12 l2">
                   {{ isset($application->created_at) ? $application->created_at : '' }}
                </div>
                <div class="col s12 m12 l8 grey lighten-5">
                    <div class="row">
                        <h5 class="center-align">Basic job ad information</h5>
                        <table>
                            <tr>
                                <td>Job Title : </td>
                                <td><strong style="text-decoration: underline">{{ isset($jobtype->description) ? $jobtype->description : '' }}</strong></td>
                            </tr>
                            <tr>
                                <td>Contact :</td>
                                <td>{{ isset($app->contactno) ? $app->contactno : '' }}</td>
                            </tr>
                            <tr>
                                <?php $capacity = array('Full Time', 'Part Time'); ?>
                                <?php $index = isset($application->capacity) ? $application->capacity : 0; ?>
                                <td>Capacity : </td>
                                <td>{{ $capacity[$index] }}</td>
                            </tr>
                            <tr>
                                <td>Exptected salary :</td>
                                <td>{{ isset($salary->amount_range) ? $salary->amount_range : '' }} (pesos)</td>
                            </tr>
                            <tr>
                                <td>Helper gender :</td>
                                <td>{{ isset($app->gender) ? $app->gender : '' }}</td>
                            </tr>
                            <tr>
                                <td>Education level :</td>
                                <td>{{ isset($edlevel) ? $edlevel : '' }}</td>
                            </tr>
                            <tr>
                                <td>Experience :</td>
                                <td>{{ isset($application->yearexp) ? $application->yearexp : '' }} years</td>
                            </tr>
                            <tr>
                                <td>Contract years</td>
                                <td>{{ isset($application->contractyears) ? $application->contractyears : '' }} years</td>
                            </tr>
                        </table>
                        <p>
                        <h6><strong>Job description</strong></h6>
                        {{ isset($application->pitch) ? $application->pitch : '' }}
                        </p>
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
                            <a class="btn blue lighten-3 col s12 m12 l12" href="{{asset ('/applicant/job/application/edit/'. $application->applicationid)}}"><i class="material-icons">mode_edit</i></a>
                        </div>
                        <div class="row">
                            <a class="btn grey lighten-4 black-text col s12 m12 l12" href="{{asset ('/applicant/job/application/delete/'. $application->adid)}}"><i class="material-icons">delete</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')

@stop

@section('css')
    @parent
    <style>
        table tr td {
            padding:0px;
        }
    </style>
@stop