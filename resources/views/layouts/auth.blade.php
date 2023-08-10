<!doctype html>
<html lang="en" dir="ltr">
<head>
    <!-- TITLE -->
    @yield('title')

    @include('partials.head')

</head>
<body class="app sidebar-mini rtl horizontal-body">

<!-- GLOABAL LOADER -->
<div id="global-loader">
    <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
</div>
@yield('nav-button')

<div class="page">
    <div class="">
        <!-- CONTAINER OPEN -->
        @yield('content')
        <!-- CONTAINER CLOSED -->
    </div>
</div>

@include('partials.script')

</body>
@yield('script')
</html>
