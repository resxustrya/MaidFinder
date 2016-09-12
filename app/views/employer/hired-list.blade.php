

@extends('employer.layout')


@section('content')
    <div class="container" style="margin-top: 7em;">
        <div class="card">
            <div class="card-header bgm-bluegray">
                <h2>Hire List
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
                        </ul>
                    </li>
                </ul>
            </div>
            @if($hirelist != null and count($hirelist) > 0)
            <div class="card-body card-padding" >
                @foreach($hirelist as $a)
                    <?php
                    $application = Applications::find($a->applicationid);
                    ?>
                    @if($application != null)
                        <?php $app = Applicants::find($application->appid); ?>
                            <div class="contacts clearfix row">
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="{{ asset('public/uploads/profile/'.(($app['profilepic']) != null ? $app['profilepic'] :'facebook.jpg' )) }}" alt="">
                                        </a>
                                        <div class="c-info text-left ">
                                            <strong>{{ $app->fname ." " .$app->lname }}</strong>
                                            <a href="#"><small class="c-yellow f-19">
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star-half"></i>
                                            <i class="zmdi zmdi-star-outline"></i>
                                            </small></a>
                                            <div class="card-body ">
                                                <div class="pmo-contact">
                                                    <ul class="text-left">
                                                        <?php $jobtype = JobTypes::find($application->jobtypeid); ?>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-search"></i> {{ $jobtype->description }}</small></li>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-tag"></i> &#8369; Salary</small></li>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-book"></i> 2 Experience</small></li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="c-footer">
                                            <button class="waves-effect  btn">
                                                <a href="{{ asset('/application/view/'.$application->applicationid) }}" class="secondary-content btn green waves-effect">View profile</a>
                                            </button>
                                    </div>
                                </div>
                            </div>
                          </div>
                        @else
                            <li><h5>Helpers job application not available.</h5></li>
                        @endif
                        @endforeach
                        @else
                        <div class="card-padding m-l-20 m-t-25 p-25">
                            <p class="c" style="margin-bottom: 2em">Your shortlist is empty. Browse for <a class="btn bgm-gray" href="{{ asset('/helpers') }}">Helpers</a> profiles, add them to your shortlist if you like a helper profile.</p>
                        </div>
                </div>
            @endif
        </div>
    </div>
@stop


@section('js')


@stop


@section('css')