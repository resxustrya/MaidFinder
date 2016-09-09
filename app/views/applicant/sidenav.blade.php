
<div class="side-nav fixed" style="margin-top: 4.3em; width:22rem; background:#eff0f1">
    <div class="sideNav">
    <div class="collection" style="border:0">
        <a class="collection-item" href="{{ asset('/applicant/applications/list')}}">Applied List<i class="mdi mdi-briefcase-download small right "></i>
            <?php
                $count = 0;
                $count = ApplyAds::where('appid', '=', $app->appid)->count();                
            ?>
            @if($count > 0)
                <span class="red badge new">{{ $count}} </span>
            @endif    
        </a>
        <a class="collection-item " href="{{ asset('/applicant/shortlist/') }}">Ad shortlist<i class="mdi mdi-format-list-bulleted small right "></i></a>
        <a class="collection-item " href="{{ asset('/employer/job/request') }}">Employers request <i class="mdi mdi-human-greeting small right" ></i>
        <a class="collection-item " href="{{ asset('/applicant/messagebox') }}">Message<i class="mdi mdi-inbox-arrow-down small right"></i> </a>
    </div>
    </div>
</div>
