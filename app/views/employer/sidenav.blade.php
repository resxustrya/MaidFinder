<aside id="sidebar" class="sidebar c-overflow">
    <div class="s-profile">
        <a href="" data-ma-action="profile-menu-toggle">
            <div class="sp-pic">
                <img src="{{ asset('public/uploads/profile/'.(($emp['profilepic']) != null ? $emp['profilepic'] :'facebook.jpg' )) }}" alt="Contact Person">
            </div>

            <div class="sp-info " style="text-transform:capitalize">
                {{ $emp->fname ." ". $emp->lname }}

                <i class="zmdi zmdi-caret-down"></i>
            </div>
        </a>

        <ul class="main-menu">
            <li>
                </a>
                <a href="{{ asset('employer/profile') }}"><i class="zmdi zmdi-account"></i> View Profile</a>
            </li>
            <li>
                <a href="{{ asset('employer/logout') }}"><i class="zmdi zmdi-time-restore"></i> Logout</a>
            </li>
        </ul>
    </div>

    <ul class="main-menu">
        <li><a href="{{asset('/')}}"><i class="zmdi zmdi-home"></i> Home</a></li>
        <li><a href="{{ asset('/employer/hired/list') }}"><i class="zmdi zmdi-accounts-list"></i> Hired List</a></li>
        <li><a href="{{ asset('/employer/hired/list') }}"><i class="zmdi zmdi-accounts-list-alt"></i> Shortlist
                <?php
                $app_ad = ApplyAds::where('empid','=', $emp->empid)->get();
                $count = count($app_ad);
                ?>
                @if($count > 0)
                    <span class="new badge red ">{{ $count }}</span>
                @endif</a></li>
        <li><a href="{{ asset('/employer/job/request') }}"><i class="zmdi zmdi-pin-account"></i> Job Request
                <?php
                $app_ad = ApplyAds::where('empid','=', $emp->empid)->get();
                $count = count($app_ad);
                ?>
                @if($count > 0)
                    <span class="new badge red ">{{ $count }}</span>
                @endif
            </a></li>
        <li><a href="{{ asset('/employer/ads') }}"><i class="zmdi zmdi-case"></i> Job Ads</a></li>
        <li><a href="{{asset('/employer/job/ads')}}"><i class="zmdi zmdi-filter-list"></i> Employer Ads</a></li>
        <li><a href="typography.html"><i class="zmdi zmdi-account-box-phone"></i> Recommendations</a></li>
        <li><a href="{{ asset('/employer/message/inbox') }}"><i class="zmdi zmdi-account-box-mail"></i> Messages</a></li>
    </ul>
</aside>

