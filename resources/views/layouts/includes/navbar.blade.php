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
                    src="{{ asset('public/images/logos/TECH_CLOUD_Logo.png') }}" alt="TechCloud"
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
                    <a class="nav-link" @auth href="{{ route('services.softwares') }}" @else
                        data-bs-toggle="modal" href="#authModalToggle" @endauth><i class="bi bi-window-sidebar"></i>
                        Softwares</a>
                </li>

                <li class="nav-item mr-2 @if ($nav == 'Designs') active @endif">
                <a class="nav-link" @auth href="{{ route('services.designs') }}" @else data-bs-toggle="modal"
                    href="#authModalToggle" @endauth><i class="bi bi-bezier"></i>
                    Designs </a>
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

            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        @if (Auth::user()->user_image)
                            <img src="{{ asset('public/images/users') . '/' . Auth::user()->user_image }}"
                                alt="user" class="border" style="height: 35px; width: 35px; border-radius: 50%">
                        @else
                            <img src="{{ asset('public/images/users/user-icon.png') }}" alt="user"
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
                <a class="btn btn-outline-light mx-2" data-bs-toggle="modal" href="#authModalToggle2">Login</a>

                <a class="btn btn-primary" data-bs-toggle="modal" href="#authModalToggle">Register</a>
            @endauth
        </ul>

    </div>

</div>


{{-- Modal for auth starts --}}
<div class="modal fade" id="authModalToggle" aria-hidden="true" aria-labelledby="authModalToggleLabel"
    tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="authModalToggleLabel">Register your account</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            aria-describedby="nameHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" class="form-control py-1" name="user_image" id="user_image"
                            aria-describedby="fileHelpId">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <span>Already have an Account?
                        <a href="" data-bs-target="#authModalToggle2" data-bs-toggle="modal">
                            Login now
                        </a>
                    </span>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="authModalToggle2" aria-hidden="true" aria-labelledby="authModalToggleLabel2"
    tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="authModalToggleLabel2">Login</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal for auth ends --}}

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
