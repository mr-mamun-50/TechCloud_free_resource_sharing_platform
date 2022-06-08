<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">

        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Core</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="@if ($menu == 'dashboard') active @endif">
                <a href=" {{ route('admin.dashboard') }} ">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded-hasmenu @if ($menu == 'categories') active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="bi bi-tag"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Categories</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="@if ($submenu == 'add_cat') active @endif">
                        <a href=" {{ route('category.create') }} ">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add Category</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="@if ($submenu == 'manage_cat') active @endif">
                        <a href=" {{ route('category.index') }} ">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Manage
                                Category</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="@if ($menu == 'subcategories') active @endif">
                <a href=" {{ route('subcategory.index') }} ">
                    <span class="pcoded-micon"><i class="bi bi-tags"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Subcategories</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Tutorials
        </div>
        <ul class="pcoded-item pcoded-left-item">

            <li class="pcoded-hasmenu @if ($menu == 'articles') active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="bi bi-menu-button-wide-fill"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Articles</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="@if ($submenu == 'add_artcl') active @endif">
                        <a href=" {{ route('articles.create') }} ">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add Article</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="@if ($submenu == 'manage_artcl') active @endif">
                        <a href=" {{ route('articles.index') }} ">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Manage
                                Article</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu @if ($menu == 'videos') active pcoded-trigger @endif">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="bi bi-play-btn"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Videos</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="@if ($submenu == 'add_vid') active @endif">
                        <a href=" {{ route('videos.create') }} ">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add Video</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="@if ($submenu == 'manage_vid') active @endif">
                        <a href=" {{ route('videos.index') }} ">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Manage
                                Videos</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Core</div>
        <ul class="pcoded-item pcoded-left-item">

            <li class="@if ($menu == 'Softwares') active @endif">
                <a href=" {{ route('softwares.index') }} ">
                    <span class="pcoded-micon"><i class="bi bi-tags"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Softwares</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

    </div>
</nav>
