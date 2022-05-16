<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <div class="mobile-search">
                <div class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <a href="index.html">
                <img class="img-fluid" src="{{ asset('adm') }}/assets/images/logo.png" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <a href="#!">
                        <i class="ti-bell"></i>
                        <span class="badge bg-c-pink"></span>
                    </a>
                    <ul class="show-notification">
                        <li>
                            <h6>Notifications</h6>
                            <label class="label label-danger">New</label>
                        </li>
                        <li>
                            <div class="media">
                                <img class="d-flex align-self-center img-radius"
                                    src="{{ asset('adm') }}/assets/images/avatar-2.jpg"
                                    alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="notification-user">John Doe</h5>
                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                        elit.</p>
                                    <span class="notification-time">30 minutes ago</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <img class="d-flex align-self-center img-radius"
                                    src="{{ asset('adm') }}/assets/images/avatar-4.jpg"
                                    alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="notification-user">Joseph William</h5>
                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                        elit.</p>
                                    <span class="notification-time">30 minutes ago</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <img class="d-flex align-self-center img-radius"
                                    src="{{ asset('adm') }}/assets/images/avatar-3.jpg"
                                    alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="notification-user">Sara Soudein</h5>
                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                        elit.</p>
                                    <span class="notification-time">30 minutes ago</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="user-profile header-notification">
                    <a href="#!">
                        <img src="{{ asset('images/admn/admin_pic.jpg') }}" class="img-radius border"
                            alt="User-Profile-Image">
                        <span>{{ Auth::guard('admin')->user()->name }}</span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li>
                            <a href="">
                                <i class="ti-user"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a href=" {{ route('admin.password.change') }} ">
                                <i class="ti-lock"></i> Change Password
                            </a>
                        </li>
                        <li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('admin.logout') }}" name="logoutform">
                                @csrf

                                <button class="logout btn bg-transparent p-0" type="submit"><i
                                        class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
