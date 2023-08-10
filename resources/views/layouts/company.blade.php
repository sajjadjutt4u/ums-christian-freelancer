<!doctype html>
<html lang="en" dir="ltr">
<head>

    @yield('title')

    @include('partials.head')


</head>
<body class="app sidebar-mini rtl horizontal-body">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
</div>

<div class="page">
    <div class="page-main">

        <!-- app-content-->
        <div class="app-content">

            <!-- HEADER -->
            <div class="header header-fixed ">
                <div class="container">
                    <div class="d-flex">
                        <a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a>
                        <a class="header-brand" href="{{route('company_dashboard')}}">
                            <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo"
                                 alt="Arox logo">
                            <img src="{{asset('assets/images/brand/favicon2.png')}}"
                                 class="header-brand-img mobile-view-logo" alt="Arox logo">
                        </a>
                        <!-- LOGO -->

                        <div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">
                            <a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i
                                    class="ion ion-search"></i></a>

                            <div class="dropdown text-center selector profile-1 d-sm-flex d-none">
                                <a href="#" data-toggle="dropdown" class="nav-link leading-none d-flex">
                                    <span>
                                        @yield('profile_image')
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <div class="text-center bg-image p-4">
                                        @yield('profile_name')
                                    </div>
                                    <a class="dropdown-item" href="{{route('company_edit')}}">
                                        <i class="dropdown-icon mdi mdi-account-outline"></i>Edit Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('logout')}}">
                                        <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                                    </a>
                                </div>
                            </div>
                            <!-- PROFILE -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->

            <!-- HORIZONTAL-MENU -->
            @include('partials.company-navbar')
            <!-- HORIZONTAL-MENU END -->

            <div class="side-app container">

                @yield('content')

            </div>
            <!--CONTAINER CLOSED -->
        </div>
    </div>


    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © 2019 <a href="#">Arox</a>. Designed by <a href="#">Spruko</a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER CLOSED -->
</div>

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

@include('partials.script')
</body>
@yield('script')
</html>
