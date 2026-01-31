<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('frontend.layout.head')
</head>

<body class="white-bg">

    <!--Preloader-->
    <div id="preloader" class="white-bg">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{ asset('frontend/assets/img/firape/firape.png') }}" alt="Preloader"></div>
            </div>
        </div>
    </div>
    <!--Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="fas fa-arrow-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    @include('frontend.layout.header')
    <!-- header-area-end -->

    <!-- main-area -->
    <main class="fix ">
        @yield('main-content')
    </main>
    <!-- main-area-end -->

    @include('frontend.layout.footer')
</body>

</html>
