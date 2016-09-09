

@extends('applicant.layout')
@section('css')

@stop

@section('content')
    <div class="row">
        <div class="card-panel">
            <h6><strong>Find helpers</strong></h6>
            <form action="{{ asset('') }}" method="get">
                <div class="row">
                    <div class="col s12 m12 l6">
                        <select name="location" class="browser-default">
                            @foreach($location as $loc)
                                <option value="{{ $loc['regionid'] }}">{{ $loc['location'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s12 m12 l6">
                        <select name="jobtype" class="browser-default">
                            @foreach($jobtype as $type)
                                <option value="{{ $type['jobtypeid'] }}">{{ $type['description'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 center-align">
                        <div class="center-align"><input type="submit" href="{{ asset('helpers') }}" class="btn cyan lighten-3 col s12 l12 m12" value="Find a match" /> </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')

@stop