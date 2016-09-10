<aside id="sidebar" class="sidebar c-overflow">
        <div class="s-profile">
            <a href="" data-ma-action="profile-menu-toggle">
                <div class="sp-pic">
                    <img src="{{ asset('public/uploads/profile/'.(($app['profilepic']) != null ? $app['profilepic'] :'facebook.jpg' )) }}" alt="Contact Person">
                </div>

                <div class="sp-info " style="text-transform:capitalize">
                   {{ $app->fname ." ". $app->lname }}

                    <i class="zmdi zmdi-caret-down"></i>
                </div>
            </a>

            <ul class="main-menu">
                <li>
                    </a>
                    <a href="{{ asset('applicant/profile') }}"><i class="zmdi zmdi-account"></i> View Profile</a>
                </li>
                <li>
                    <a href="{{ asset('applicant/logout') }}"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                </li>
            </ul>
        </div>

        <ul class="main-menu">
            <li><a href="{{asset('/')}}"><i class="zmdi zmdi-home"></i> Home</a></li>
            <li><a href="{{ asset('/applicant/applications/list')}}"><i class="zmdi zmdi-accounts-list"></i> Employer List</a></li>
            <li><a href="{{ asset('/applicant/shortlist')}}"><i class="zmdi zmdi-accounts-list-alt"></i> Shortlist
                    <?php
                    $count = 0;
                    $count = ApplyAds::where('appid', '=', $app->appid)->count();
                    ?>
                    @if($count > 0)
                        <span class="red badge new">{{ $count}} </span>
                    @endif</a></li>
            <li><a href="{{ asset('/employer/job/request')}}"><i class="zmdi zmdi-pin-account"></i> Employer Request</a></li>
            <li><a href="{{ asset('/employer/job/request')}}"><i class="zmdi zmdi-case"></i> Job Availability Post</a></li>
            <li><a href="typography.html"><i class="zmdi zmdi-filter-list"></i> Employer Ads</a></li>
            <li><a href="typography.html"><i class="zmdi zmdi-account-box-phone"></i> Recommendations</a></li>
            <li><a href="{{ asset('/applicant/messagebox') }}"><i class="zmdi zmdi-account-box-mail"></i> Messages</a></li>
        </ul>
    </aside>

    <aside id="chat" class="sidebar">

        <div class="chat-search">
            <div class="fg-line">
                <input type="text" class="form-control" placeholder="Search People">
                <i class="zmdi zmdi-search"></i>
            </div>
        </div>

        <div class="lg-body c-overflow">
            <div class="list-group">
                <a class="list-group-item media" href="">
                    <div class="pull-left p-relative">
                        <img class="lgi-img" src="img/profile-pics/2.jpg" alt="">
                        <i class="chat-status-busy"></i>
                    </div>
                    <div class="media-body">
                        <div class="lgi-heading">Jonathan Morris</div>
                        <small class="lgi-text">Available</small>
                    </div>
                </a>

                <a class="list-group-item media" href="">
                    <div class="pull-left">
                        <img class="lgi-img" src="img/profile-pics/1.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <div class="lgi-heading">David Belle</div>
                        <small class="lgi-text">Last seen 3 hours ago</small>
                    </div>
                </a>

                <a class="list-group-item media" href="">
                    <div class="pull-left p-relative">
                        <img class="lgi-img" src="img/profile-pics/3.jpg" alt="">
                        <i class="chat-status-online"></i>
                    </div>
                    <div class="media-body">
                        <div class="lgi-heading">Fredric Mitchell Jr.</div>
                        <small class="lgi-text">Availble</small>
                    </div>
                </a>

                <a class="list-group-item media" href="">
                    <div class="pull-left p-relative">
                        <img class="lgi-img" src="img/profile-pics/4.jpg" alt="">
                        <i class="chat-status-online"></i>
                    </div>
                    <div class="media-body">
                        <div class="lgi-heading">Glenn Jecobs</div>
                        <small class="lgi-text">Availble</small>
                    </div>
                </a>

                <a class="list-group-item media" href="">
                    <div class="pull-left">
                        <img class="lgi-img" src="img/profile-pics/5.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <div class="lgi-heading">Bill Phillips</div>
                        <small class="lgi-text">Last seen 3 days ago</small>
                    </div>
                </a>

                <a class="list-group-item media" href="">
                    <div class="pull-left">
                        <img class="lgi-img" src="img/profile-pics/6.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <div class="lgi-heading">Wendy Mitchell</div>
                        <small class="lgi-text">Last seen 2 minutes ago</small>
                    </div>
                </a>
            </div>
        </div>
    </aside>
