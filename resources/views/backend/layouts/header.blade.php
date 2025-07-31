<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">

        @if (!empty(getSystemSetting()->logo))
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('uploads/setting/logo/' . getSystemSetting()->logo) }}" alt="logo" width="105"
                    height="25">
            </a>
        @endif


        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge badge-number"
                        style="background: #cc9966; border:none">{{ getUnreadNotification()->count() }}</span>
                </a><!-- End Notification Icon -->

                @if (!empty(getUnreadNotification()->count()))
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have {{ getUnreadNotification()->count() }} new notifications
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        @foreach (getUnreadNotification() as $notification)
                            <li class="notification-item">

                                <div>
                                    <h4>
                                        <a
                                            href="{{ $notification->url }}?noti_id={{ $notification->id }}">{{ $notification->message }}</a>

                                    </h4>
                                    <p>{{ $notification->created_at->diffForHumans() }}</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endforeach

                        <li class="dropdown-footer">
                            <a href="{{ route('notification') }}">Show all notifications</a>
                        </li>

                    </ul>

            </li>
            @endif

            <li class="nav-item dropdown pe-3">
                @if (!empty(Auth::user()->image) || !empty(Auth::user()->name))
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('uploads/profile_pic/' . Auth::user()->image) }}" alt="Profile"
                            class="rounded-circle">

                        <span class="d-none d-md-block dropdown-toggle ps-2"
                            style="color: #cc9966;">{{ Auth::user()->name }}</span>


                    </a>
                @endif
                <!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->name }}</h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>



                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('AccountSetting') }}">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>


                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>

</header>
