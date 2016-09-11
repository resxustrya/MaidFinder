

@extends('home.layout')

@section('content')
    <div class="container" style="height: 30em">
        <div class="row ">
            <div class="col s12 m12 l12" style="margin-top: 6em; margin-bottom: 3em;">
                <h3 class="animated flip blue-grey-text">Let us know what you need </h3>
            </div>
            <div class="col s6 m6 l6 center valign-wrapper">
               <h4 class=""> I need a Helper &nbsp;</h4>
                <form action="{{ asset('/account/type')}}" method="POST">
                    <input type="hidden" name="type" value="employer" />
                    <button class="btn-large light-blue waves-effect waves-light">
                        <input class="" type="submit" name="submit" value="Hire" />
                        <i class="mdi mdi-account-search right"></i>
                    </button>
                </form>
            </div>
            <div class="col s6 m6 l6 center valign-wrapper">
                <h4 class="right">I need a Job &nbsp; </h4>
                <form action="{{ asset('/account/type')}}" method="POST">
                    <input type="hidden" name="type" value="applicant" />
                    <button class="btn-large blue-grey lighten-2 waves-effect waves-light">
                        <input class="" type="submit" name="submit" value="Apply" />
                        <i class="mdi mdi-briefcase right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')


@stop


@section('js')

@stop
