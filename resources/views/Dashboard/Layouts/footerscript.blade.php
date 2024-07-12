    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('Dashboard')}}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('Dashboard')}}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('Dashboard')}}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{asset('Dashboard')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{asset('Dashboard')}}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('Dashboard')}}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{asset('Dashboard')}}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{asset('Dashboard')}}/assets/js/dashboards-analytics.js"></script>


        {{-- make image show realtime when upload  --}}
        <script src="{{asset('Dashboard')}}/assets/notify/js/notifIt.js"></script>
        <script src="{{asset('Dashboard')}}/assets/notify/js/notifit-custom.js"></script>
        <script>
            // var loadFile = function(event) {
            //     var output = document.getElementById('output');
            //     output.src = URL.createObjectURL(event.target.files[0]);
            //     output.onload = function() {
            //         URL.revokeObjectURL(output.src) // free memory
            //     }
            // };
        </script>
    <!-- Helpers -->

