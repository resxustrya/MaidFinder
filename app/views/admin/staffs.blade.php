

@extends('admin.layout')

@section('content')
    <div class="card-panel">
        <div class="row valign-wrapper">
            <span style="font-size: 2em;" class="grey-text">Staff lists</span>
            <p><button class="btn green offset-l4 square right modal-trigger" href="#modal1"><i class="material-icons">note_add</i> </button> </p>
        </div>
        <div class="row">
            <table class="centered highlight">
                <thead>
                    <tr>
                        <th>Staff's name</th>
                        <th>Staff's role</th>
                        <th><i class="material-icons">settings</i> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count =20; ?>
                    @foreach($admin_staffs as $staff)
                        <tr>
                            <td> {{ $staff->fname ." " . $staff->lname }}</td>
                            <td> {{ $staff->usertype == 'adminstaff' ? 'Admin Staff' : '' }}</td>
                            <td>
                                <a class='dropdown-button' href='#' data-activates='dropdown{{$count}}'><i class="material-icons black-text">play_arrow</i> </a>

                                <!-- Dropdown Structure -->
                                <ul id='dropdown{{$count}}' class='dropdown-content'>
                                    <li onclick="edit({{ $staff->adminid }})"><span>edit</span></li>
                                    <li onclick="remove({{ $staff->adminid }})"><span>remove</span> </li>
                                </ul>
                            </td>
                        </tr>
                        <?php $count++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="modal1" class="modal ">
        <div class="row">
            <div class="col s12 m12 l12">
                <ul class="collection with-header center-align">
                    <li class="collection-header blue white-text"><h4>Add new staff account</h4></li>
                    <li class="collection-item">
                        <form action="{{ asset('/admin/staff/new') }}" method="POST">
                            <div class="row">
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" class="validate" required name="username" placeholder="Username">
                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="icon_prefix" type="password" name="password" required class="validate" placeholder="Password">
                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" name="fname" required class="validate" placeholder="First name">
                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" name="lname" required class="validate" placeholder="Last name">
                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <input name="type" value="admin" type="radio" id="test1" />
                                    <label for="test1">Admin</label>

                                    <input name="type" type="radio"  value="adminstaff" id="test2" />
                                    <label for="test2">Admin staff</label>

                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <div class="row center-align">
                                        <input type="submit" name="submit" value="Submit" class="btn-large right green"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    <div id="modal2" class="modal ">
        <p class="row loader">
        <h1 id="test"></h1>
        </p>
        <div class="row" id="modalbody">
            <div class="col s12 m12 l12">
                <ul class="collection with-header center-align">
                    <li class="collection-header blue white-text"><h4>Edit staff account</h4></li>
                    <li class="collection-item">
                        <form action="{{ asset('/admin/edit/staff') }}" method="POST">
                            <input type="hidden" value="" id="adminid" name="adminid" />
                            <div class="row">
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" class="validate username" required name="username" placeholder="Username">
                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="icon_prefix" type="password" name="password" required class="validate password" placeholder="Password">
                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" name="fname" required class="validate fname" placeholder="First name">
                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" name="lname" required class="validate lname" placeholder="Last name">
                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <input name="type" value="admin" type="radio" id="test1" />
                                    <label for="test1">Admin</label>

                                    <input name="type" type="radio"  value="adminstaff" id="test2" checked/>
                                    <label for="test2">Admin staff</label>

                                </div>
                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <div class="row center-align">
                                        <input type="submit" name="submit" value="Edit account" class="btn-large right green"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $('.modal-trigger').leanModal();
        function edit(a) {
            $('.loader').show();
            $('#modal2').openModal();
            $('#modalbody').hide();

            var url = {{ "'". asset('/admin/get/staff')."'"}};
            var data = {
                'id' : a
            };
            $.post(url, data, function(response) {
                $('.loader').hide();
                $('#modalbody').show();
                $('#adminid').val(response.adminid);
                $('.username').val(response.username);
                $('.password').val(response.password);
                $('.fname').val(response.fname);
                $('.lname').val(response.lname);
                if(response.usertype == 'admin') {
                    $('#test1').attr('prop', 'checked');
                } else {
                    $('#test2').attr('prop', 'checked');
                }
            });
        }
        function remove(a) {
            if(confirm('Delete staff') == true) {
                var url = {{ "'". asset('/admin/delete/staff')."'"}};
                var data = {
                    'id': a
                };
                $.post(url, data, function(response) {
                    if(response == "ok") {
                        alert('Staff was succesfully removed');
                        window.location.href = {{ "'". asset('/admin/staffs')."'"}};
                    }
                })
            }
        }
    </script>
@stop


