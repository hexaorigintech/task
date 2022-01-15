<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Error 404 | Coding Task</title>
      
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">

        <!-- App css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/app-modern.min.css')); ?>" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?php echo e(asset('assets/css/app-modern-dark.min.css')); ?>" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="javascript:;">
                                    <span style="font-size: 25px; color:white; text-transform: uppercase"> Coding Task </span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>4</h1>
                                    <h4 class="text-uppercase text-danger mt-3">Page Not Found</h4>
                                    <p class="text-muted mt-3">It's looking like you may have taken a wrong turn. Don't worry... it
                                        happens to the best of us. Here's a
                                        little tip that might help you get back on track.</p>

                                    <a class="btn btn-info mt-3" href="<?php echo e(url('/')); ?>"><i class="mdi mdi-reply"></i> Return Home</a>
                                </div>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

      

        <!-- bundle -->
        <script src="<?php echo e(asset('assets/js/vendor.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
        
    </body>
</html><?php /**PATH C:\xampp\htdocs\task2\resources\views/errors/404.blade.php ENDPATH**/ ?>