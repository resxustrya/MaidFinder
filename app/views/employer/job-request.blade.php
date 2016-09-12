

@extends('employer.layout')
@section('css')

@stop

@section('content')
    <div class="container" style="margin-top:7em;">
        <div class="block-header">
            <h2>Job Request</h2>
        </div>
        @if($apply_ad != null and count($apply_ad) > 0)
        <div class="card">
            <div class="list-group lg-odd-black">
            @foreach($apply_ad as $a)
                <?php
                $applicant = Applicants::find($a->appid);
                $application = Applications::find($applicant->appid);
                ?>
                @if($application)
                <div class="list-group-item media">
                    <div class="pull-left">
                        <img class="lgi-img" src="{{ asset('public/uploads/profile/'.(($applicant['profilepic']) != null ? $applicant['profilepic'] :'facebook.jpg' )) }}" alt="">
                    </div>
                    <div class="pull-right">
                        <div class="actions dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="true">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="{{ asset('/application/view/'.$application->applicationid) }}">View</a>
                                </li>
                                <li>
                                    <a href="">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="media-body">
                        <div class="lgi-heading">{{ $a->message }}</div>
                        <ul class="lgi-attrs">
                            <li>Full Name: {{ $applicant->fname ." " .$applicant->lname }}</li>
                            <?php $jobtype = JobTypes::find($application->jobtypeid); ?>
                            <li>Applying for:{{ $jobtype->description }}</li>
                        </ul>
                    </div>
                    @else
                        <li><h5>Helpers job application not available.</h5></li>
                    @endif

                </div>
                        @endforeach
            </div>
        </div>
        @else
            <div class="row">
                <div class="cols s12 m12 l10 card-panel teal lighten-4">
                    <p>You don't have any job request now. <a href="{{ asset('/helpers') }}">Find a helper</a> and add them to your hirelist. </p>
                </div>
            </div>
        @endif
    </div>

@stop

@section('js')

@stop