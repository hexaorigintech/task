<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Laravel 8 task" name="task" />
        <meta content="Bilal" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{asset('assets/css/app-modern-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
        {{-- DATA TABLE  --}}
        <link href="{{asset('assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <!-- Topbar Start -->
         @include('layouts.topbar')
        <!-- end Topbar -->
        
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- Begin page -->
            <div class="wrapper">

                <!-- ========== Left Sidebar Start ========== -->
              
                <!-- Left Sidebar End -->

                <div class="content-page">
                    <div class="content" style="margin-top: 3%">
                       @yield('content')
                    </div> <!-- End Content -->

                    <!-- Footer Start -->
                     @include('layouts.footer')
                    <!-- end Footer -->

                </div> <!-- content-page -->

            </div> <!-- end wrapper-->
        </div>
        <!-- END Container -->


     

        <div class="rightbar-overlay"></div>
      


        <!-- bundle -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('assets/js/app.min.js')}}"></script>
        <!-- Datatables js -->
        <script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
        <!-- Datatable Init js -->
        <script src="{{asset('assets/js/pages/demo.datatable-init.js')}}"></script>

        @yield('scripts')
        
    </body>
</html>
