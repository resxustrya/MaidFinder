
<div class="row fixed-section">
   <div class="row">

   </div>
    <div class="collection black-text">
        <a class="collection-item black-text" href="{{ asset('/applicant/applications/list')}}">Applications
            <?php
                $count = 0;
                $count = ApplyAds::where('appid', '=', $app->appid)->count();                
            ?>
            @if($count > 0)
                <span class="badge new">{{ $count}} </span>
            @endif    
        </a>
        <a class="collection-item black-text" href="{{ asset('/applicant/shortlist/') }}">Ad shortlist</a>
        <a class="collection-item black-text" href="{{ asset('/employer/job/request') }}">Employers request</a>
        <a class="collection-item black-text" href="{{ asset('/applicant/messagebox') }}">Message box</a>
        <a class="collection-item black-text" href="{{ asset('/applicant/profile') }}">Profile</a>
    </div>
</div>
