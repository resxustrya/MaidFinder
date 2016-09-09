

@extends('employer.layout')


@section('content')
    <h5>Your messages <i class="material-icons">email</i></h5>
    <div class="row">
        <div class="col s12 m12 l5 white">
            <h5 class="grey-text">Sender</h5>
            <div class="divider"></div>
            <ul class="collection">
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
                        <a href="{{ asset('') }}" class="black-text" >
                            <li class="collection-item avatar">
                                <img src="{{ asset('public/uploads/profile/'.(($app['profilepic']) != null ? $app['profilepic'] :'facebook.jpg' )) }}" alt="" class="circle">
                                <span class="title"><strong>{{ $app->fname ." ". $app->lname }}</strong></span>
                                <p>
                                    <span>{{ $location->location }}</span>
                                </p>
                                <a href="{{ asset('') }}" class="secondary-content"><i class="material-icons">replay</i></a>
                            </li>
                        </a>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="col s12 m12 l7 grey lighten-4">
            <h5>Messages</h5>
            <form action="{{ asset('') }}" method="POST">
                <div class="row">
                    <div class="col s12 m12 l6">
                        <div class="message_box white">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" name="message" length="120" />
                        <label for="textarea1">Type your message here</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l4">
                        <input type="submit" name="submit" value="Send message" class="btn green"/>
                    </div>
                </div>
            </form>
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