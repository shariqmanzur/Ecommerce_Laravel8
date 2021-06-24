<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('page_title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin_assets/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('admin_assets/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a href="{{ url('admin/dashboard') }}" class="logo">
                            <img src="{{ Config::get('constants.SITE_LOGO') }}" alt="Logo">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="@yield('dashboard_select')">
                            <a href="{{ url('admin/dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </a>
                        </li>
                        <li class="@yield('category_select')">
                            <a href="{{ url('admin/category') }}">
                                <i class="fas fa-list"></i>Categories
                            </a>
                        </li>
                        <li class="@yield('brand_select')">
                            <a href="{{ url('admin/brand') }}">
                                <i class="fas fa-shopping-bag"></i>Brands
                            </a>
                        </li>
                        <li class="@yield('counpon_select')">
                            <a href="{{ url('admin/coupon') }}">
                                <i class="fas fa-tags"></i>Coupons
                            </a>
                        </li>
                        <li class="@yield('size_select')">
                            <a href="{{ url('admin/size') }}">
                                <i class="fas fa-crop"></i>Sizes
                            </a>
                        </li>
                        <li class="@yield('color_select')">
                            <a href="{{ url('admin/color') }}">
                                <i class="fas fa-paint-brush"></i>Colors
                            </a>
                        </li>
                        <li class="@yield('product_select')">
                            <a href="{{ url('admin/product') }}">
                                <i class="fas fa-laptop"></i>Products
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ url('admin/dashboard') }}">
                    <img src="{{ Config::get('constants.SITE_LOGO') }}" alt="Logo">
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard_select')">
                            <a href="{{ url('admin/dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </a>
                        </li>
                        <li class="@yield('category_select')">
                            <a href="{{ url('admin/category') }}">
                                <i class="fas fa-list"></i>Categories
                            </a>
                        </li>
                        <li class="@yield('brand_select')">
                            <a href="{{ url('admin/brand') }}">
                                <i class="fas fa-shopping-bag"></i>Brands
                            </a>
                        </li>
                        <li class="@yield('counpon_select')">
                            <a href="{{ url('admin/coupon') }}">
                                <i class="fas fa-tags"></i>Coupons
                            </a>
                        </li>
                        <li class="@yield('size_select')">
                            <a href="{{ url('admin/size') }}">
                                <i class="fas fa-crop"></i>Sizes
                            </a>
                        </li>
                        <li class="@yield('color_select')">
                            <a href="{{ url('admin/color') }}">
                                <i class="fas fa-paint-brush"></i>Colors
                            </a>
                        </li>
                        <li class="@yield('product_select')">
                            <a href="{{ url('admin/product') }}">
                                <i class="fas fa-laptop"></i>Products
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
            
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">

                                            <div class="account-dropdown__body">

                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ url('admin/logout') }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
        
            @yield('content')

        </div>

    

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('admin_assets/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin_assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/wow/wow.min.js') }}"></script>
    <!-- Main JS-->
    <script src="{{ asset('admin_assets/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->