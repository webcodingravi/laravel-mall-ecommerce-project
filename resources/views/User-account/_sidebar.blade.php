<aside class="col-md-4 col-lg-3">
    <ul class="mb-3 nav nav-dashboard flex-column mb-md-0" role="tablist">
        <li class="nav-item">
            <a href="{{route('user_dashboard')}}" class="nav-link {{Request::segment(2) == 'dashboard' ? 'active' : ''}}">Dashboard</a>
        </li>

        <li class="nav-item">
            <a href="{{route('user_orders')}}" class="nav-link {{Request::segment(2) == 'orders' ? 'active' : ''}}">Orders</a>
        </li>

        <li class="nav-item">
            <a href="{{route('edit-profile')}}" class="nav-link {{Request::segment(2) == 'edit-profile' ? 'active' : ''}}">Edit Profile</a>
        </li>

        <li class="nav-item">
            <a href="{{route('change-password')}}" class="nav-link {{Request::segment(2) == 'change-password' ? 'active' : ''}}">Change Password</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li>
    </ul>
</aside>
