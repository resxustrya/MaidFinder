
@extends('applicant.layout')

@section('content')
    <div class="row">
        <h4>Your ads shortlist</h4>
        @if(count($list) > 0)
            <ul class="collection">
                @foreach($list as $item)
                    <?php
                        $ad = Ads::find($item->adid);
                        $employer = Employers::find($ad->empid);
                        $jobtype = JobTypes::find($ad->regionid);
                        $location = Regions::find($ad->regionid);
                    ?>
                    <li class="collection-item avatar">
                        <img src="{{ asset('public/uploads/profile/'.(($employer->profilepic) != null ? $employer->profilepic :'facebook.jpg' )) }}" alt="" class="circle">
                        <span class="title"><strong>{{ $employer->fname ." ".$employer->lname }}</strong></span>
                        <p><br>
                            {{ $jobtype->description }} <br />
                            {{ $location->location }}
                        </p>
                        <a href="{{ asset('employer/ad/profile/'.$ad->adid) }}" class="secondary-content btn green">View ad</a>
                    </li>
                @endforeach
            </ul>
        @else
            <h5>Shortlist is empty</h5>
        @endif
    </div>
@stop

@section('css')

@stop

@section('js')

@stop