<!DOCTYPE html>
<html
    lang="en"class="light-style customizer-hide"dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"data-template="vertical-menu-template-free">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('Dashboard')}}/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('Dashboard')}}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('Dashboard')}}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('Dashboard')}}/assets/css/demo.css" />
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('Dashboard')}}/assets/vendor/css/pages/page-auth.css" />

</head>
<body>

        @yield("content")
</body>
</html>