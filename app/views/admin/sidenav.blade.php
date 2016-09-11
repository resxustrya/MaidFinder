

<div class="collection hide-on-med-and-down" style="height: 500px;">
    <a href="{{ asset('/admin/staffs') }}" class="collection-item {{ (Session::has('url') and Session::get('url') == 'staffs') ? 'active' : '' }}" >Admin staff's</a>
    <a href="{{ asset('/admin/account/users') }}" class="collection-item {{ (Session::has('url') and Session::get('url') == 'accounts') ? 'active' : '' }}">User accounts</a>
    <a href="#!" class="collection-item">Job Description</a>
    <a href="#!" class="collection-item">Alvin</a>
</div>