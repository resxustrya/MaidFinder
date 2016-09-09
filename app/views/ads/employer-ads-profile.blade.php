

@extends('ads.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m12 l12">
                <ul class="collection with-header">
                    <li class="collection-item">
                        <h5 class="grey-text">Employer profile</h5>
                        <div class="row">
                            <div class="col s12 m12 l2">
                                <div class="row">
                                    <img id="editpicture" class="responsive-img right-align circle" src="{{ asset('public/uploads/profile/'.(($emp['profilepic']) != null ? $emp['profilepic'] :'facebook.jpg' )) }}" />
                                </div>
                            </div>
                            <div class="col s12 m12 l3">
                                <div class="row">
                                    <table>
                                        <tr>
                                            <td><span class="grey-text text-darken-4 name"><i class="material-icons">perm_identity</i> </span> </td>
                                            <td><span class="grey-text text-darken-4 name">{{ $emp->fname ." ". $emp->lname }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4"><i class="material-icons">email</i> </span> </td>
                                            <td><span class="grey-text text-darken-4">{{ $emp->email }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4"><i class="material-icons">location_on</i></span></td>
                                            <td><span class="grey-text text-darken-4">{{ $location->location }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4"><i class="material-icons">phone</i></span></td>
                                            <td><span class="grey-text text-darken-4">{{ $emp->contactno }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4"><i class="material-icons">supervisor_account</i> </span> </td>
                                            <td><span class="grey-text text-darken-4">{{ $emp->gender }}</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col s12 m12 l5">
                                <div class="row">
                                    <div class="col s12 m12 l6">
                                        <table class="other_info">
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Age :</span> </td>
                                                <td><span class="grey-text text-darken-4">{{ $age }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Nationanlity :</span></td>
                                                <td><span class="grey-text text-darken-4">{{ $emp->nationality }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Religion :</span> </td>
                                                <td><span class="grey-text text-darken-4">{{ $emp->religion }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="grey-text text-darken-4">Civil Status :</span> </td>
                                                <td><span class="grey-text text-darken-4">{{ $emp->civilstatus }}</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php $apply_ad = ApplyAds::where('adid', '=', $ads->adid); ?>
                            @if($apply_ad != null)
                                <div class="container">
                                    <div class="row">
                                        <div class="col s12 m12 l6">
                                            <a href="#modal1" class="apply_btn btn light-blue darken-4 col s12 m12 l12 card-panel">Apply</a>
                                        </div>
                                        <div class="col s12 m12 l6">
                                            <a href="#modal2" class="modal-trigger btn light-blue darken-4 col s12 m12 l12 card-panel">Contact Employer</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col s12 m12 l12 light-blue darken-3">
                                    <h5 class="center-align white-text">Your job application is sent.</h5>
                                </div>
                            @endif
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l6 z-depth-0">
                               <h5 class="grey-text">Job Ad Preferences</h5>
                                <div class="col s12 m12 l12">
                                    <table class="ad_prefer">
                                        <tr>
                                            <td><i class="material-icons tiny">work</i></td>
                                            <td><strong>I'm looking for a {{ $jobtype->description }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons tiny">location_on</i> </td>
                                            <td><strong>{{ $location->location }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><i class="material-icons tiny">loyalty</i> </td>
                                            <td><strong>{{ $salary->amount_range }}</strong></td>
                                        </tr>
                                        <tr>
                                            <?php $capacity = array('Full Time', 'Part Time'); ?>
                                            <td><i class="material-icons tiny">work</i></td>
                                            <td><strong>{{ $capacity[$ads->capacity] }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col s12 m12 l6 z-depth-0">
                               <h5 class="grey-text">Responsibilities</h5>
                                <ul class="browser-default">
                                    @foreach($job_desc as $desc)
                                        <li><i class="material-icons tiny">label</i> {{ $desc->desc }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l3">
                                <h5>Performed Duties</h5>
                            </div>
                            <div class="col s12 m12 l8">
                                <div class="col s12 m12 l12">
                                    @if(isset($duties))
                                        <div class="row">
                                            <div class="col s12 m12 l12">
                                                @if(isset($duties))
                                                    @if($duties->cooking != null)
                                                        <div class="col s12 m12 l4">
                                                            <i class="material-icons">done_all</i>
                                                            <span>{{ $duties->cooking }}</span>
                                                        </div>
                                                    @endif
                                                    @if($duties->laundry != null)
                                                        <div class="col s12 m12 l4">
                                                            <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->laundry }}</strong>
                                                        </div>
                                                    @endif
                                                    @if($duties->gardening != null)
                                                        <div class="col s12 m12 l4">
                                                            <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->gardening }}</strong>
                                                        </div>
                                                    @endif
                                                    @if($duties->grocery != null)
                                                        <div class="col s12 m12 l4">
                                                            <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->grocery }}</strong>
                                                        </div>
                                                    @endif
                                                    @if($duties->cleaning != null)
                                                        <div class="col s12 m12 l4">
                                                            <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->cleaning }}</strong>
                                                        </div>
                                                    @endif
                                                    @if($duties->tuturing != null)
                                                        <div class="col s12 m12 l4">
                                                            <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->tuturing }}</strong>
                                                        </div>
                                                    @endif
                                                    @if($duties->driving != null)
                                                        <div class="col s12 m12 l4">
                                                            <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->driving }}</strong>
                                                        </div>
                                                    @endif
                                                    @if($duties->pet != null)
                                                        <div class="col s12 m12 l4">
                                                            <strong><i class="material-icons">done_all</i></strong><strong>{{ $duties->pet }}</strong>
                                                        </div>
                                                    @endif
                                                    <p>
                                                        {{ $duties->other }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <p>
                                            <span>Other job description : </span> <strong>{{ $duties->other }}</strong>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="message container-fluid">
                <h5 class="center-align grey-text">Make a short story for your job application</h5>
                <div class="divider"></div>
                <div class="row">
                    <div class="cols 12 m12 l20">
                        <form action="{{ asset('/applicant/apply/ad') }}" class="pitch" method="POST">
                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea pitch-msg" rows="20" name="pitch-msg"></textarea>
                                <label for="textarea1" class="grey-text">Tell your employer about yourself and why should they hire you.</label>
                            </div>
                            <label for="textarea1" class="error red-text"></label>
                            <div class="row center-align">
                                <div class="col s12 m12 l12">
                                    <input type="submit" class="btn green" name="submit" value="Submit application" />
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="btn yellow darken-1 modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
        </div>
    </div>
    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4>Message</h4>
            <form action="#" method="POST">
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label for="textarea1">Write your message here</label>
                        <span class="orange-text" id="err"></span>
                    </div>
                </div>
                <div class="row">
                    <button class="btn green col s12 m12 l12 send_btn">Send message</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal3" class="modal" style="padding: 5px;">
        <div class="modal-content center-align">
            <p style="font-size: 1em;" class="valign-center"><i class="material-icons small">done</i> You already sent a request to this employer.</p>
        </div>
    </div>
    <?php
        $applied_ad = ApplyAds::where('appid', '=', $app->appid)
                                ->where('empid', '=', $emp->empid)->first();
        $isApplied = 'false';
        if($applied_ad and count($applied_ad) > 0 and $ads->adid == $applied_ad->adid) {
            $isApplied = 'true';
        }
    ?>
@stop

@section('js')
    @parent
    <script>
        var isApplied = {{ $isApplied }} ;
        $(document).ready(function() {
            $('.apply_btn').click(function(event){
                if(isApplied == true) {
                    $('#modal3').openModal();
                } else {
                    $('#modal1').openModal();
                }
            });
            $('.pitch').submit(function(e){
                e.preventDefault();
                var pitch = $('.pitch-msg').val();
                if(pitch == null || pitch == "") {
                    $('.error').html('<span>Should not be empty</span>');
                } else {
                    var data = {
                        "empid" : {{ $emp->empid }},
                        "adid" : {{ $ads->adid }},
                        "pitch-message" : $('#textarea1').val()
                    };
                    var url =  {{ "'". asset('/applicant/apply/ad') ."'"}};
                    $.post(url, data, function(response){
                        if(response == "ok") {
                            $('#modal1').closeModal();
                            isApplied = true;
                            var $toastContent = $('<h5>Your application request was sent to employer.</h5>');
                            Materialize.toast($toastContent,5000);
                        }
                    });
                }
            });
        });
        function addToList(n,btn) {
            $.post('{{ asset('applicant/shortlist/add') }}',{ adid : n} ,function(data){
                hideBtn(btn)
            });
        }

    </script>
@stop

@section('css')
    @parent
    <style>
        #profilepic {
            height : 200px;
            width: 200px;
        }
        .name {
            font-size: 2em;
        }
        table tr td {
            padding: 0px;
        }
        .name {
            font-size: 1.2em;
            font-family: "DejaVu Sans", sans-serif;
        }
        table.ad_prefer tr td {
            padding:0px;
        }
    </style>
@stop