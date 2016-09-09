

@extends('employer.layout')


@section('content')
    @if(count($ads) > 0)
        <span>&nbsp;</span>
        <div class="row">
            <div class="col s12 m12 l11">
               <div class="row">
                   <h5>Your current ad</h5>
                       @foreach($ads as $ad)
                           <?php
                               $dayof =  array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday');
                               $edlevel = array("Elementary", "High School", "College graduate");
                               $salary = Salaries::find($ad->salaryid);
                               $duties = Duties::where('adid', '=', $ad->adid)->first();
                               $jobtype = JobTypes::where('jobtypeid', '=', $ad->jobtypeid)->first();
                               $location = Regions::where('regionid', '=', $ad->regionid)->first();
                               $job_desc = AdDesc::where('adid', '=', $ad->adid)->get();
                           ?>
                            <div class="card-panel">
                               <div class="row" style="padding:10px;">
                                   <div class="col s12 m12 l10">
                                       <h5><span>Position -  </span>{{ $jobtype->description }}</h5>
                                       <span><i class="material-icons">location_on</i> </span><span><strong>{{ $location->location }}</strong></span>
                                       <br/>
                                       <span><i class="material-icons">redeem</i></span><span><strong>{{$salary->amount_range}} - (peso)</strong></span>
                                       <br />
                                       <?php $capacity = array('Full Time', 'Part Time'); ?>
                                       <span><strong>Capacity</strong></span> - <span><strong>{{ $capacity[$ad->capacity] }}</strong></span>
                                   </div>
                                   <div class="col s12 m12 l2">
                                       <a class="btn light-blue darken-3 waves-effect col s12 m12 l12 white-text" href="{{asset ('/employer/ad/edit/'. $ad->adid)}}">Edit ad</a>
                                   </div>
                               </div>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="row">
                                    @if($ads->count() < $ads->getTotal())
                                        <ul class="pagination center-align">
                                            {{ $ads->links() }}
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                @if(count($ads) > 0)
                                    <div class="row">
                                        <h5>Job ad auto suggest</h5>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col s12 m12 l12">
                                                <?php
                                                $count = 1;
                                                $application = DB::table('application')
                                                                ->where('jobtypeid', '=', $ad->jobtypeid)
                                                                ->orWhere('regionid' ,'=', $ad->regionid)
                                                                ->orWhere('salaryid' ,'=', $ad->salaryid)
                                                                ->get();
                                                ?>
                                                <?php foreach($application as $app) : ?>
                                                <?php
                                                    $location = Regions::find($app->regionid);
                                                    $applicant = Applicants::find($app->appid);
                                                    $jobtype = JobTypes::find($app->jobtypeid);
                                                ?>

                                                <div class="col s12 m6 l4 hoverable ">
                                                    <a href="{{ asset('application/view/'. $app->applicationid) }}" class="grey-text">
                                                        <div class="card-panel" style="padding: 3px;">
                                                            <div class="row">
                                                                <div class="profile-img col s12 m12 l4">
                                                                    <div class="center-align" style="padding-top: 10px;">
                                                                    </div>
                                                                </div>
                                                                <div class="col s12 m12 l6">
                                                                    <p>
                                                                    <table class="black-text info">
                                                                        <tr>
                                                                            <td><i class="material-icons">perm_identity</i></td>
                                                                            <td><span class="name">{{ $applicant->fname }}</span> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="material-icons">room</i> </td>
                                                                            <td>{{ $location->location }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="material-icons">work</i> </td>
                                                                            <td>{{ $jobtype->description }}</td>
                                                                        </tr>
                                                                    </table>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="divider"></div>
                                                            <div class="row">
                                                                <div class="col s12 m12 l6">
                                                                    <p>
                                                                        <a href="{{ asset('application/view/'. $app->applicationid) }}">View helper profile</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php $count++ ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                       @endforeach

                   </div>
               </div>
            </div>
        </div>
    @else
       <span>&nbsp;</span>
       <div class="row">
           <div class="col s12 m12 l12 white">
               <h5 class="center-align">Create your job ad now.</h5>
               <p class="center-align">
                   <a href="{{ asset('/create/ad') }}" class="btn green">Create ad</a>
               </p>
           </div>
       </div>
    @endif
@stop

@section('js')
    @parent
    <script>
        $(document).ready(function() {
            $('.carousel').carousel();
            $('.carousel.carousel-slider').carousel({full_width: true});
            $('.indicator-item').css('background-color', 'blue').css('padding', '10px');
        });
    </script>
@stop

@section('css')
    @parent
    <style>
        .profile-img {
            max-height: 150px;
        }
        .image {
            max-width: 150px;
            height: 150px;
        }
        .name {
            font-family: "Tahoma";
            font-size: 1.2em;
        }
        table.info tr td {
            padding: 0px;
            color: #333;
        }
    </style>
@stop