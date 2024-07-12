<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <title>@yield('title')</title>
    @include('Website.Layouts.headerCss')
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    @include('Website.Layouts.nav')
    <!-- End Header Area -->

        @yield('content')
    <!-- ========================= include footer ========================= -->
    @include('Website.Layouts.footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= include scripts ========================= -->
            @include('Website.Layouts.script')
            @yield('scripts')
</body>

</html>