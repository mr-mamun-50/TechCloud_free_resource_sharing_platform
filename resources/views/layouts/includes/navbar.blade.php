<header class="clearfix">

    <!-- Start Top Bar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-bar">
                        <div class="row">

                            <div class="col-md-6">
                                <!-- Start Contact Info -->
                                <ul class="contact-details">
                                    <li><a href="#"><i class="fa fa-phone"></i> +880 1315 959 871</a>
                                    </li>
                                    <li><a href="#"><i class="fas fa-envelope-open"></i> support@tcloud.com</a>
                                    </li>
                                </ul>
                                <!-- End Contact Info -->
                            </div><!-- .col-md-6 -->

                            <div class="col-md-6">

                                <!-- Start Social Links -->
                                <ul class="social-list">
                                    <li>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>
                                <!-- End Social Links -->

                            </div><!-- .col-md-6 -->
                        </div>
                    </div>
                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </div>
    <!-- End Top Bar -->

    <!-- Start  Logo & Naviagtion  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}"><img
                    src="{{ asset('images/logos/TECH_CLOUD_Logo.png') }}" alt="TechCloud"
                    style="height: 35px; width: 170px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="input-group m-2 my-lg-0 ml-lg-5" style="width: 210px">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                        aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                                class="fas fa-search"></i></button>
                    </div>
                </form>

                <ul class="navbar-nav ml-auto d-lg-flex align-items-center">
                    <li class="nav-item mr-2 @if ($nav == 'Home') active @endif">
                        <a class="nav-link" href=" {{ url('/') }} "><i class="bi bi-house-door"></i> Home</a>
                    </li>
                    <li class="nav-item mr-2 @if ($nav == 'Softwares') active @endif">
                        <a class="nav-link" href="{{ route('services.softwares') }}"><i
                                class="bi bi-window-sidebar"></i>
                            Softwares</a>
                    </li>
                    <li class="nav-item mr-2 @if ($nav == 'Designs') active @endif">
                        <a class="nav-link" href="{{ route('services.designs') }}"><i
                                class="bi bi-bezier"></i>
                            Designs</a>
                    </li>
                    <li class="nav-item dropdown mr-2 @if ($nav == 'Tutorials') active @endif">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-workspace"></i> Tutorials
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('tutorials.article') }}">Articles</a>
                            <a class="dropdown-item" href="{{ route('tutorials.video') }}">Videos</a>
                        </div>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-expanded="false">
                                    @if (Auth::user()->user_image)
                                        <img src="{{ asset('images/users') . '/' . Auth::user()->user_image }}" alt="user"
                                            class="border" style="height: 35px; width: 35px; border-radius: 50%">
                                    @else
                                        <img src="{{ asset('images/users/user-icon.png') }}" alt="user"
                                            class="border" style="height: 35px; width: 35px; border-radius: 50%">
                                    @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">My profile</a>
                                    <a class="dropdown-item" href="#">Change password</a>
                                    <div class="dropdown-divider"></div>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" name="logoutform">
                                        @csrf

                                        <button class="logout dropdown-item btn bg-transparent px-4 py-0" type="submit">
                                            Logout</button>
                                    </form>
                                </div>
                            </li>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light mx-2">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                            @endif
                        @endauth
                    @endif
                </ul>

            </div>

        </div>
    </nav>

    {{-- <div class="navbar navbar-default navbar-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Stat Toggle Nav Link For Mobiles -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- End Toggle Nav Link For Mobiles -->
                <a class="navbar-brand" href="index.html">TechCloud</a>
            </div>
            <div class="navbar-collapse collapse">

                <!-- Start Navigation List -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="active" href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About Us</a>
                    </li>
                    <li>
                        <a href="service.html">Service</a>
                    </li>
                    <li>
                        <a href="portfolio.html">Portfolio</a>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>
                        <ul class="dropdown">
                            <li>
                                <a href="blog-item.html">Item Page</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                </ul>
                <!-- End Navigation List -->

            </div>
        </div>
    </div> --}}
    <!-- End Header Logo & Naviagtion -->

</header>
