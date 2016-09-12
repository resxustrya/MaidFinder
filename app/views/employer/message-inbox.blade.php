

@extends('employer.layout')


@section('content')
    <div class="container container-alt" style="margin-top:6em">
        <div class="messages card">
            <div class="m-sidebar">
                <header>
                    <h2 class="hidden-xs">Messages</h2>

                    <ul class="actions">
                        <li>
                            <a href="">
                                <i class="zmdi zmdi-comment-text"></i>
                            </a>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="">Profile & Status</a>
                                </li>
                                <li>
                                    <a href="">Help</a>
                                </li>
                                <li>
                                    <a href="">Settings</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </header>

                <div class="ms-search hidden-xs">
                    <div class="fg-line">
                        <i class="zmdi zmdi-search"></i>

                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div>

                <div class="list-group c-overflow">
                    <?php
                    $msg = ApplicantMessages::where('empid', '=', $emp->empid)->get();
                    ?>
                    @if($msg != null and count($msg) > 0)
                        @foreach($msg as $m)
                            <?php
                            $application = Applications::find($m->appid);
                            $app = Applicants::find($application->appid);
                            $location = Regions::find($application->regionid);
                            ?>
                    <a class="list-group-item media" href="{{ asset('') }}">
                        <div class="pull-left">
                            <img src="{{ asset('public/uploads/profile/'.(($app['profilepic']) != null ? $app['profilepic'] :'facebook.jpg' )) }}" alt="" class="lgi-img">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">{{ $app->fname ." ". $app->lname }}</div>
                            <small class="lgi-text"></small>
                            <small class="ms-time">{{ $location->location }} 05:00 PM</small>
                        </div>
                    </a>

                    <a class="list-group-item media active" href="">
                        <div class="pull-left">
                            <img src="{{asset('public/template/img/profile-pics/2.jpg')}}" alt="" class="lgi-img">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Ann Watkinson</div>
                            <small class="lgi-text">Cum sociis natoque penatibus </small>
                            <small class="ms-time">10:02 AM</small>
                        </div>
                    </a>
                            @endforeach
                        @endif

                    <a class="list-group-item media" href="">
                        <div class="pull-left">
                            <img src="{{asset('public/template/img/profile-pics/3.jpg')}}" alt="" class="lgi-img">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Marse Walter</div>
                            <small class="lgi-text">Suspendisse sapien ligula</small>
                            <small class="ms-time">Yesterday</small>
                        </div>
                    </a>

                    <a class="list-group-item media" href="">
                        <div class="pull-left">
                            <img src="{{asset('public/template/img/profile-pics/2.jpg')}}" alt="" class="lgi-img">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Jeremy Robbins</div>
                            <small class="lgi-text">Phasellus porttitor tellus nec</small>
                            <small class="ms-time">23/04/16</small>
                        </div>
                    </a>

                    <a class="list-group-item media" href="">
                        <div class="pull-left">
                            <img src="{{asset('public/template/img/profile-pics/4.jpg')}}" alt="" class="lgi-img">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Reginald Horace</div>
                            <small class="lgi-text">Quisque consequat arcu eget</small>
                            <small class="ms-time">15/04/16</small>
                        </div>
                    </a>

                    <a class="list-group-item media" href="">
                        <div class="pull-left">
                            <img src="{{asset('public/template/img/profile-pics/5.jpg')}}" alt="" class="lgi-img">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Shark Henry</div>
                            <small class="lgi-text">Nam lobortis odio et leo maximu</small>
                            <small class="ms-time">30/03/16</small>
                        </div>
                    </a>

                    <a class="list-group-item media" href="">
                        <div class="pull-left">
                            <img src="{{asset('public/template/img/profile-pics/2.jpg')}}" alt="" class="lgi-img">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Paul Van Dack</div>
                            <small class="lgi-text">Nam posuere purus sed velit auctor sodales</small>
                            <small class="ms-time">10/03/16</small>
                        </div>
                    </a>
                </div>

            </div>

            <div class="m-body">
                <header class="mb-header">
                    <div class="mbh-user clearfix">
                        <img src="{{asset('public/template/img/profile-pics/2.jpg')}}" alt="">
                        <div class="p-t-5">Ann Watkinson</div>
                    </div>

                    <ul class="actions">
                        <li>
                            <a href="">
                                <i class="zmdi zmdi-refresh-alt"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="zmdi zmdi-delete"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="">Contact Info</a>
                                </li>
                                <li>
                                    <a href="">Mute</a>
                                </li>
                                <li>
                                    <a href="">Clear Messages</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </header>

                <div class="mb-list">
                    <div class="mbl-messages c-overflow">
                        <div class="mblm-item mblm-item-left">
                            <div>
                                Nullam id dolor id nibh ultricies vehicula ut id elit
                            </div>
                            <small>5:47 PM</small>
                        </div>
                        <div class="mblm-item mblm-item-right">
                            <div>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quamurabitur blandit tempus porttitor
                            </div>
                            <small>5:49 PM</small>
                        </div>
                        <div class="mblm-item mblm-item-right">
                            <div>
                                blandit tempus
                            </div>
                            <small>5:55 PM</small>
                        </div>
                        <div class="mblm-item mblm-item-left">
                            <div>
                                Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec ullamcorper nulla non metus auctor fringilla. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo.
                            </div>
                            <small>6:10 PM</small>
                        </div>
                        <div class="mblm-item mblm-item-left">
                            <div>
                                Donec id elit non mi porta gravida at eget metus
                            </div>
                            <small>6:11 PM</small>
                        </div>
                        <div class="mblm-item mblm-item-right">
                            <div>
                                Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Sed posuere consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.                                    </div>
                            <small>6:15 PM</small>
                        </div>
                    </div>
                    <form action="{{ asset('') }}" method="POST"></form>

                    <div class="mbl-compose">
                        <textarea placeholder="Type a message..."></textarea>

                        <button  type="submit" name="submit" ><i class="zmdi zmdi-mail-send"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent

@stop

@section('css')
    @parent
    <style>
        .message_box {
            height: 500px;
            width :500px;
            overflow: scroll;
        }
    </style>
@stop