    <!DOCTYPE html>
    <html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
    <head>
        @include('Dashboard.Layouts.header')
        <title>@yield('title')</title>
        @stack('scripts')
    </head>
    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
            
                    @include('Dashboard.Layouts.mainSidebar')
                <div class="layout-page">
                    @include('Dashboard.Layouts.navbar')
                
                    <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container p-0 flex-grow-1 container-p-y">
                    <div class="row m-0 justfiy-content-center">
                        <div class="col-lg-12 mb-4 ">
                        <div class="card p-3">

                            @yield('content')

                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- / Content -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->

            
                </div>
            </div>


        @include('Dashboard.Layouts.footerscript')
    </body>
    </html>