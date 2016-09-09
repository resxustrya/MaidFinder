


@extends('admin.layout')


@section('content')
    <div class="card-panel">
        <div class="row">
            <div class="col s12 m12 l6 center-align">
                <h4>Applicants</h4>
                <?php $not_verified_count = Applicants::where('isVerified', '=', 0)->count(); ?>
                <?php $verified_count = Applicants::where('isVerified', '=', 1)->count(); ?>
                <p>
                    <a href="{{ asset('/admin/applicant/accounts-pending') }}" class="btn orange"><span class="circle grey white-text" >{{ $not_verified_count }}</span><span>New applicants</span></a>
                </p>
                <p>
                    <a href="{{ asset('/admin/applicant/accounts/') }}" class="btn blue white-text">{{ $verified_count }} applicants</a>
                </p>
            </div>
            <div class="col s12 m12 l6 center-align">
                <h4>Employers</h4>
                <?php $not_verified_count = Employers::where('isVerified', '=', 0)->count(); ?>
                <?php $verified_count = Employers::where('isVerified', '=', 1)->count(); ?>
                <p>
                    <a class="btn orange"><span class="circle grey white-text" >{{ $not_verified_count }}</span><span>New employers</span></a>
                </p>
                <p>
                    <a class="btn blue white-text">{{ $verified_count }} employers</a>
                </p>
            </div>
        </div>
    </div>
@stop


@section('js')

@stop


@section('css')


@stop
