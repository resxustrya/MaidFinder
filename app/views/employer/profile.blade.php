@extends('employer.layout')

@section('content')
    <div class="row" style="padding: 0px;">
        <div class="col s12 m12 l12">
            <ul class="collection with-header">
                <li class="collection-header">
                    <strong><h5 class="grey-text">Employer profile</h5></strong>
                </li>
                <li class="collection-item">
                    <div class="row">
                        <div class="col s12 m12 l4">
                            <form action="{{ asset('/employer/update/picture') }}" method="post" enctype="multipart/form-data" />
                                <div class="row">
                                    <img id="editpicture" class="right-align square" src="{{ asset('public/uploads/profile/'.(($emp['profilepic']) != null ? $emp['profilepic'] :'facebook.jpg' )) }}" />
                                </div>
                                <div class="row">
                                    <div class="file-field input-field">
                                        <a class="" style="text-decoration: underline;">
                                            <span>Change Photo</span>
                                            <input type="file" class="photo" name="profilepic">
                                        </a>
                                        <div class="file-path-wrapper reveal">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <input type="submit" class="btn reveal" name="upload" value="Upload Photo" />
                                </div>
                            </form>
                        </div>
                        <div class="col s12 m12 l8">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h6 class="right-align">
                                        <a href="{{ asset('/employer/update') }}">[Edit Profile]</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="row">
                                <table>
                                    <tr>
                                        <td><span class="grey-text text-darken-4 name"><i class="material-icons">perm_identity</i> </span> </td>
                                        <td><span class="grey-text text-darken-4 name">{{ $emp->fname ." ". $emp->lname }}</span></td>
                                    </tr>
                                    <tr>
                                        <?php $month = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"); ?>
                                        <?php $bdate = explode('-', $emp->bdate); ?>
                                        <td><span class="grey-text text-darken-4"><i class="material-icons">redeem</i> </span> </td>
                                        <td><span class="grey-text text-darken-4">{{ $month[$bdate[1]].'/' . $bdate[2] .'/' . $bdate[0]  }}</span></td>
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
                            <h6 class="divider"></h6>
                            <div class="row">
                                <div class="col s12 m12 l6">
                                    <table class="other_info">
                                        <tr>
                                            <td><span class="grey-text text-darken-4">Nationanlity :</span></td>
                                            <?php $n = Nationalities::find($emp->nationality); ?>
                                            <td><span class="grey-text text-darken-4">{{ $n->nationality }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4">Religion :</span> </td>
                                            <?php $r = Religions::find($emp->religion); ?>
                                            <td><span class="grey-text text-darken-4">{{ $r->religion }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="grey-text text-darken-4">Civil Status :</span> </td>
                                            <?php $status = array('Single', 'Married', 'Divorced', 'Widowed'); ?>
                                            <td><span class="grey-text text-darken-4">{{ $status[$emp->civilstatus] }}</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            @if($ads and count($ads) >0)
                <ul class="collection with-header">
                    <li class="collection-header  light-blue darken-1"><h6 class="white-text">Your ads</h6></li>
                </ul>
            @else
                <div class="row">
                    <div class="col s12 m12 l6">
                        <a href="{{ asset('/create/ad') }}" class="orange btn">Create ad</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop

@section('js')
    @parent
    <script>
        $(document).ready(function() {
            $('.reveal').hide();
            $('.photo').change(function() {
                $('.reveal').show();
            });
        });
    </script>
@stop

@section('css')
    @parent
    <style>
      .name {
          font-size: 2em;
      }
      table tr td {
          padding: 0px;
      }
    </style>
@stop
