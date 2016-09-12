

@extends('employer.layout')


@section('content')
    <div class="col-sm-12" style="margin-top: 7em;">
        <div class="card">
            <div class="card-header">
                <h2>Hire List
                    <small>You can type anything here...</small>
                </h2>

                <ul class="actions">
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="">Refresh</a>
                            </li>
                            <li>
                                <a href="">Manage Widgets</a>
                            </li>
                            <li>
                                <a href="">Widgets Settings</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            @if($hirelist != null and count($hirelist) > 0)
            <div class="card-body card-padding">

                Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit,
                tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus,
                eu facilisis ante. Mauris nec commodo felis.
            </div>
            @endif
        </div>
    </div>
@stop


@section('js')


@stop


@section('css')