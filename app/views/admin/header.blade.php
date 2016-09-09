
<div class="row white valign-wrapper">
    <div class="col s12 m12 l6">
        <img class="responsive-img" src="{{ asset('/public/images/header.png')}}" >
    </div>
    <div class="col s12 m12 l6 right-align">
        @if(Session::has('admin') or Session::has('admin_staff'))

            <a class='dropdown-button btn blue' data-beloworigin="true"  href='#' data-activates='dropdown1'>
                <?php
                    $data = null;
                    if(Session::has('admin')) {
                        $data = Session::get('admin');
                    }
                    if(Session::has('admin_staff')) {
                        $data = Session::get('admin_staff');
                    }
                ?>
                {{ $data->username }}
                    <i class="material-icons right">arrow_drop_down</i>
            </a>
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="#!">one</a></li>
                <li><a href="#!">two</a></li>
                <li class="divider"></li>
                <li><a href="{{ asset('/admin/logout') }}">Logout</a></li>
            </ul>
        @endif

    </div>
</div>