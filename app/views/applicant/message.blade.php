@extends('applicant.layout')


@section('content')
    <h5>Your messages <i class="material-icons">email</i></h5>
    <div class="row">
        <div class="col s12 m12 l5 white">
            <h5 class="grey-text">Sender</h5>
            <div class="divider"></div>
            <ul class="collection">
                <li class="collection-item avatar">
                    <img src="images/yuna.jpg" alt="" class="circle">
                    <span class="title">Title</span>
                    <p>First Line <br>
                        Second Line
                    </p>
                    <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                </li>
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