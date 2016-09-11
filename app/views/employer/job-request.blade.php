

@extends('employer.layout')
@section('css')

@stop

@section('content')
    <div class="row">
        <h4>Job request</h4>
    </div>
    @if($apply_ad != null and count($apply_ad) > 0)
        <div class="row">
            <div class="col s12 m12 l10">
                <ul class="collection">
                    @foreach($apply_ad as $a)
                        <?php
                        $applicant = Applicants::find($a->appid);
                        $application = Applications::find($applicant->appid);
                        ?>
                        @if($application)
                            <li class="collection-item avatar card-panel">
                                <img src="{{ asset('public/uploads/profile/'.(($applicant['profilepic']) != null ? $applicant['profilepic'] :'facebook.jpg' )) }}" alt="" class="circle">
                                <h4>{{ $applicant->fname ." " .$applicant->lname }}</h4>
                                <?php $jobtype = JobTypes::find($application->jobtypeid); ?>
                                <p>Applying for - <strong>{{ $jobtype->description }}</strong><br>
                                </p>
                                <table>
                                    <tr>
                                        <td class="center-align"><i class="material-icons">visibility</i> </td>
                                        <td class="left-align">{{ $a->message }}</td>
                                    </tr>
                                </table>
                                <a href="{{ asset('/application/view/'.$application->applicationid) }}" class="secondary-content btn green waves-effect">View profile</a>
                            </li>
                        @else
                            <li><h5>Helpers job application not available.</h5></li>
                        @endif
                    @endforeach
                </ul>
            </div>

        </div>
    @else
        <div class="row">
            <div class="cols s12 m12 l10 card-panel teal lighten-4">
                <p>You don't have any job request now. <a href="{{ asset('/helpers') }}">Find a helper</a> and add them to your hirelist. </p>
            </div>
        </div>
    @endif

@stop

@section('js')

@stop