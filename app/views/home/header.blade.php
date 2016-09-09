<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content gray-text browser-default">
    <li><a class="black-text" href="{{ asset('/account/logout') }}">Logout</a></li>
</ul>
<!-- Dropdown Structure -->
<ul id="dropdown2" class="dropdown-content gray-text browser-default">
    <li><a class="black-text" href="{{ asset('/account/logout') }}">Logout</a></li>
</ul>
<div class="navbar-fixed">
    <nav class="white navHeader">
        <div class="nav-wrapper navbar-fixed container-fluid" >
            <a href="#" data-activates="mobile-demo" class="blue blue-text btn-floating btn-large waves-effect waves-light button-collapse"><i class="material-icons">menu</i></a>
            <a href="{{asset('/')}}" style="font-family:DancingScript, cursive; margin-left:0;color:#46a7f7; weight:100;font-size:2em;"  class="brand-logo above animated bounceInLeft"><span><img height="55"   src="{{ asset('public/images/header.png') }}" /></span></a>

            <ul class="right hide-on-med-and-down ">
                <li><a class="black-text" href="{{ asset('/') }}">Home</a></li>
                <li><a class="black-text" href="{{ asset('helpers') }}">Find Helpers</a></li>
                <li><a class="black-text" href="{{ asset('helpers') }}">Find Job</a></li>
                <li><a class="black-text" href="badges.html">Recommendations</a></li>
                @if(!isset($user))
                    <li><a class="" href="{{ asset('/user-login') }}">Sign in</a></li>
                    <li><a class="btn blue white-text waves-effect waves-light" href="{{ asset('/user-register') }}">Sign up</a></li>
                @else
                    <li><a class="black-text dropdown-button" data-hover="true" data-beloworigin="true"  data-activates="dropdown1"><strong>{{ $user->fname }}<i class="material-icons right">arrow_drop_down</i></strong></a></li>
                @endif
                    <!-- Dropdown Trigger -->
            </ul>
            <ul class="side-nav blue " id="mobile-demo">
                <li class="blue">
                    <div class="blue collection white-text ">
                        <a class="blue collection-item white-text" href="{{ asset('employer/home') }}">Home</a>
                        <a class=" blue collection-item white-text" href="{{ asset('employer/shortlist') }}">Shortlist</a>
                        <a class="blue collection-item white-text" href="{{ asset('job/request') }}">Job request</a>
                        <a class="blue collection-item white-text" href="{{ asset('employer/message/inbox') }}">Message box</a>
                        <a class="blue collection-item white-text" href="{{ asset('employer/ads') }}">Publish job ads</a>
                    </div>
                </li>
                <li class="blue"><a class="white-text" href="{{ asset('helpers') }}">Find helpers</a></li>
                <li class="blue"><a class="white-text"href="badges.html">Recomendations</a></li>
                <!-- Dropdown Trigger -->
            </ul>
        </div>
    </nav>
</div>
