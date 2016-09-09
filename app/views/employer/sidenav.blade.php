<div class="row fixed-section">
   <div class="row">

   </div>
    <div class="collection black-text">
        <a class="collection-item black-text" href="{{ asset('/employer/hired/list') }}">Hired list</a>
        <a class="collection-item black-text" href="{{ asset('/employer/job/request') }}">Job request
            <?php
                $app_ad = ApplyAds::where('empid','=', $emp->empid)->get();
                $count = count($app_ad);
            ?>
            @if($count > 0)
                <span class="new badge green">{{ $count }}</span>
            @endif
        </a>
        <a class="collection-item black-text" href="{{ asset('/employer/message/inbox') }}">Message inbox</a>
        <a class="collection-item black-text" href="{{ asset('/employer/ads') }}">Job ads</a>
    </div>
</div>
