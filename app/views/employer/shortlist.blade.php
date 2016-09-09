

@extends('employer.layout')

@section('content')
    <div class="row">
        <h4>Your shortlist</h4>
    </div>
    @if($shortlist != null and count($shortlist) > 0)


    @else
        <div class="row">
            <div class="card-panel" style="padding:10px;">
                <p class="grey-text">Your shortlist is empty. Browse for helper profiles, add them to your shortlist if you like a helper profile. <a class="btn green" href="{{ asset('/helpers') }}">Helpers</a></p>
            </div>
        </div>
    @endif
@stop

@section('css')

@stop

@section('js')

@stop

