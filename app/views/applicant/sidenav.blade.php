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
            <li><a href="{{ asset('/applicant/applicantPost')}}"><i class="zmdi zmdi-case"></i> Job Availability Post</a></li>
            <li><a href="{{asset('/employer/job/ads')}}"><i class="zmdi zmdi-filter-list"></i> Employer Ads</a></li>
            <li><a href="typography.html"><i class="zmdi zmdi-account-box-phone"></i> Recommendations</a></li>
            <li><a href="{{ asset('/applicant/messagebox') }}"><i class="zmdi zmdi-account-box-mail"></i> Messages</a></li>
        </ul>
    </aside>

