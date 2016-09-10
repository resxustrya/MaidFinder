@extends('applicant.layout')
@section('content')
        <div class="container container-alt" style="margin-top:7em">
            <div class="block-header">
                <h2>{{ $app->fname ." ". $app->lname }}
                    <small>Nanny, Babysitter, Petsitter</small>
                </h2>

                <ul class="actions m-t-20 hidden-xs">
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="">Privacy Settings</a>
                            </li>
                            <li>
                                <a href="">Account Settings</a>
                            </li>
                            <li>
                                <a href="">Other Settings</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

           <div class="card" id="profile-main">
                <div class="pm-overview c-overflow">

                    <div class="pmo-pic">
                        <form action="{{ asset('/applicant/update/picture') }}" method="post" enctype="multipart/form-data" >
                        <div class="p-relative">
                            <a href="">
                                <img id="editpicture" class="img-responsive" src="{{ asset('public/uploads/profile/'.(($app['profilepic']) != null ? $app['profilepic'] :'facebook.jpg' )) }}" alt="">
                            </a>
                            <div class="dropdown pmop-message">
                                <a data-toggle="dropdown" href="" class="btn bgm-white btn-float z-depth-1">
                                    <i class="zmdi zmdi-comment-text-alt"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <textarea placeholder="Write something..."></textarea>

                                    <button class="btn bgm-green btn-float"><i class="zmdi zmdi-mail-send"></i>
                                    </button>
                                </div>
                            </div>

                           <input id="upload" type="file" name="profilepic" style="display:none">
                            <a href="" id="upload_link" class="pmop-edit" >
                                <i class="zmdi zmdi-camera"></i> <span
                                        class="hidden-xs">Update Profile Picture</span>
                            </a>
                            <div class="row">
                                <input type="submit" class="uploadPhoto" name="upload" value="Upload Photo" />
                            </div>
                             </div>
                            </form>


                        <div class="pmo-stat">
                            <h2 class="m-0 c-white">1562</h2>
                            Total Connections
                        </div>
                    </div>




                    <div class="pmo-block pmo-contact hidden-xs">
                        <h2>Contact</h2>

                        <ul>
                            <li><i class="zmdi zmdi-phone"></i> {{ $app->contactno }}</li>
                            <li><i class="zmdi zmdi-email"></i> {{ $app->email }}</li>
                            <li><i class="zmdi zmdi-facebook-box"></i> {{ $app->fname." ".$app->lname }}</li>
                            <li>
                                <i class="zmdi zmdi-pin"></i>
                                <address class="m-b-0 ng-binding">
                                    {{ $location->location }}
                                </address>
                            </li>
                        </ul>
                    </div>

                    <div class="pmo-block pmo-items hidden-xs">
                        <h2>Connections</h2>

                        <div class="pmob-body">
                            <div class="row">
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/1.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/2.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/3.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/4.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/5.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/6.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/7.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/8.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/1.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/2.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/3.jpg" alt="">
                                </a>
                                <a href="" class="col-xs-2">
                                    <img class="img-circle" src="img/profile-pics/4.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="active"><a href="profile-about.html">About</a></li>
                        <li><a href="profile-timeline.html">Timeline</a></li>
                        <li><a href="profile-photos.html">Photos</a></li>
                        <li><a href="profile-connections.html">Connections</a></li>
                    </ul>


                    <div class="pmb-block">
                        <div class="pmbb-header">
                            <h2><i class="zmdi zmdi-equalizer m-r-10"></i> Summary</h2>

                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a data-ma-action="profile-edit" href="">Edit</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="pmbb-body p-l-30">
                            <div class="pmbb-view">
                                Sed eu est vulputate, fringilla ligula ac, maximus arcu. Donec sed felis vel
                                magna mattis ornare ut non turpis. Sed id arcu elit. Sed nec sagittis tortor.
                                Mauris ante urna, ornare sit amet mollis eu, aliquet ac ligula. Nullam dolor
                                metus, suscipit ac imperdiet nec, consectetur sed ex. Sed cursus porttitor leo.
                            </div>

                            <div class="pmbb-edit">
                                <div class="fg-line">
                                    <textarea class="form-control" rows="5" placeholder="Summary...">Sed eu est vulputate, fringilla ligula ac, maximus arcu. Donec sed felis vel magna mattis ornare ut non turpis. Sed id arcu elit. Sed nec sagittis tortor. Mauris ante urna, ornare sit amet mollis eu, aliquet ac ligula. Nullam dolor metus, suscipit ac imperdiet nec, consectetur sed ex. Sed cursus porttitor leo.</textarea>
                                </div>
                                <div class="m-t-10">
                                    <button class="btn btn-primary btn-sm">Save</button>
                                    <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pmb-block">
                        <div class="pmbb-header">
                            <h2><i class="zmdi zmdi-account m-r-10"></i> Basic Information</h2>

                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a data-ma-action="profile-edit" href="">Edit</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="pmbb-body p-l-30">
                            <div class="pmbb-view">
                                <dl class="dl-horizontal">
                                    <dt >Full Name</dt>
                                    <dd class="text-capitalize">{{ $app->fname . " ". $app->lname }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Gender</dt>
                                    <dd>{{$app->gender}}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                    <?php $bdate = explode('-', $app->birth); ?>
                                    <dt>Birthday</dt>
                                    <dd>{{ $month[$bdate[1]].' ' . $bdate[2] .', ' . $bdate[0]  }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Martial Status</dt>
                                    <dd>{{$app->civilstatus}}</dd>
                                </dl>
                            </div>

                            <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Full Name</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <input type="text" class="form-control"
                                                   placeholder="eg. Mallinda Hollaway">
                                        </div>

                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Gender</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <select class="form-control">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Birthday</dt>
                                    <dd>
                                        <div class="dtp-container dropdown fg-line">
                                            <input type='text' class="form-control date-picker"
                                                   data-toggle="dropdown" placeholder="Click here...">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Martial Status</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <select class="form-control">
                                                <option>Single</option>
                                                <option>Married</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </dd>
                                </dl>

                                <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm">Save</button>
                                    <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pmb-block">
                        <div class="pmbb-header">
                            <h2><i class="zmdi zmdi-phone m-r-10"></i> Contact Information</h2>

                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a data-ma-action="profile-edit" href="">Edit</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="pmbb-body p-l-30">
                            <div class="pmbb-view">
                                <dl class="dl-horizontal">
                                    <dt>Mobile Phone</dt>
                                    <dd>{{ $app->contactno }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Email Address</dt>
                                    <dd>{{ $app->email }}</dd>
                                </dl>
                            </div>

                            <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Mobile Phone</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <input type="text" class="form-control"
                                                   placeholder="eg. 00971 12345678 9">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Email Address</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <input type="email" class="form-control"
                                                   placeholder="eg. malinda.h@gmail.com">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Twitter</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" placeholder="eg. @malinda">
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Skype</dt>
                                    <dd>
                                        <div class="fg-line">
                                            <input type="text" class="form-control"
                                                   placeholder="eg. malinda.hollaway">
                                        </div>
                                    </dd>
                                </dl>

                                <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm">Save</button>
                                    <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop
