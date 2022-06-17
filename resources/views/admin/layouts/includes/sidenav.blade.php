<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">

        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Core</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="@if ($menu == 'dashboard') active @endif">
                <a href=" {{ route('admin.dashboard') }} ">
                    <span class="pcoded-micon"><i class="bi bi-speedometer2"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="@if ($menu == 'categories') active @endif">
                <a href=" {{ route('category.index') }} ">
                    <span class="pcoded-micon"><i class="bi bi-tag"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Categories</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="@if ($menu == 'subcategories') active @endif">
                <a href=" {{ route('subcategory.index') }} ">
                    <span class="pcoded-micon"><i class="bi bi-tags"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Subcategories</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Services</div>
        <ul class="pcoded-item pcoded-left-item">

            <li class="@if ($menu == 'Softwares') active @endif">
                <a href=" {{ route('softwares.index') }} ">
                    <span class="pcoded-micon"><i class="bi bi-window-sidebar"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Softwares</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="@if ($menu == 'Designs') active @endif">
                <a href=" {{ route('designs.index') }} ">
                    <span class="pcoded-micon"><i class="bi bi-bezier"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Designs</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>


        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Tutorials</div>
        <ul class="pcoded-item pcoded-left-item">

            <li class="@if ($menu == 'articles') active @endif">
                <a href=" {{ route('articles.index') }} ">
                    <span class="pcoded-micon"><i class="bi bi-menu-button-wide-fill"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Articles</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="@if ($menu == 'videos') active @endif">
                <a href=" {{ route('videos.index') }} ">
                    <span class="pcoded-micon"><i class="bi bi-play-btn"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Videos</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>


        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">User section</div>

        <ul class="pcoded-item pcoded-left-item">

            <li class="@if ($menu == 'Feedback') active @endif">
                <a href=" {{ route('feedback.index') }} ">
                    <span class="pcoded-micon"><i class="bi bi-rss"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Users Feedback</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="pcoded-hasmenu @if ($menu == 'homepage') active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="bi bi-house-door"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Homepage</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="@if ($submenu == 'about') active @endif">
                        <a href=" {{ route('about.index') }} ">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">About</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="@if ($submenu == 'team') active @endif">
                        <a href=" {{ route('team.index') }} ">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Team</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>


    </div>
</nav>
