

@extends('home.layout')

@section('content')
    <div class="container">
        <div class="row center-align">
            <div class="card-panel" style="padding: 10px;">
                <p>Chose what you need</p>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l2">

            </div>
            <div class="col s12 m12 l8">
                <div class="row">
                    <div class="col s12 m12 l6 center-align">
                      <form action="{{ asset('/account/type')}}" method="POST">
                        <input type="hidden" name="type" value="employer" />
                        <input class="btn blue white-text" type="submit" name="submit" value="I need a helper" />
                      </form>
                    </div>
                    <div class="col s12 m12 l6 center-align">
                      <form action="{{ asset('/account/type')}}" method="POST">
                        <input type="hidden" name="type" value="applicant" />
                        <input class="btn blue white-text" type="submit" name="submit" value="I need a job" />
                      </form>
                    </div>
                </div>
            </div>
            <div class="col s1 m12 l2">
                <h1>&nbsp;</h1>
            </div>
        </div>
    </div>
@stop

@section('css')


@stop


@section('js')

@stop
