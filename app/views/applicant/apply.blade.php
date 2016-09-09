

@extends('applicant.layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l10">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m12 l6">
                        <?php $capacity = array('Full Time','Par Time'); ?>
                        <span class="black-text jobtype"> Position : {{ $jobtype->description }}</span> - <span>{{ $capacity[$ad->capacity] }}</span>

                        <div class="row" style="padding: 0px;">
                            Employer : <strong>{{ $emp->fname ." ". $emp->lname }}</strong><br />
                            <i class="material-icons small">location_on</i>  <strong>{{ $location->location }}</strong><br />
                            Gender : <strong>{{ $ad->gender }}</strong>
                        </div>
                        <div class="pitch row">
                            <strong class="job-desc">Job ad description :</strong> <br />
                            {{ $ad->pitch }}
                        </div>
                        <div class="row">
                            <strong class="job-desc">Expected duties</strong>
                            <div class="col s12 m12 l12">

                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l6 listbtn">
                        <button onclick="addToList({{$ad->adid}},this);" class="btn green right tooltipped" data-position="bottom" data-delay="25" data-tooltip="Add to your shorlist"><i class="material-icons">note_add</i></button>
                    </div>
                    <div class="row">
                        <a href="{{ asset('employer/ad/profile/'.$ad->adid)  }}" class="col sm s12 view">VIEW FULL AD</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')

@stop


@section('js')

@stop