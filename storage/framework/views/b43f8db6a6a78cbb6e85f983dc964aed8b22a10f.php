<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Laravel 8 task" name="task" />
        <meta content="Bilal" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">

        <!-- App css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/app-modern.min.css')); ?>" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?php echo e(asset('assets/css/app-modern-dark.min.css')); ?>" rel="stylesheet" type="text/css" id="dark-style" />
        
        <link href="<?php echo e(asset('assets/css/vendor/dataTables.bootstrap5.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/vendor/responsive.bootstrap5.css')); ?>" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <!-- Topbar Start -->
         <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end Topbar -->
        
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- Begin page -->
            <div class="wrapper">

                <!-- ========== Left Sidebar Start ========== -->
              
                <!-- Left Sidebar End -->

                <div class="content-page">
                    <div class="content" style="margin-top: 3%">
                       <?php echo $__env->yieldContent('content'); ?>
                    </div> <!-- End Content -->

                    <!-- Footer Start -->
                     <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- end Footer -->

                </div> <!-- content-page -->

            </div> <!-- end wrapper-->
        </div>
        <!-- END Container -->


     

        <div class="rightbar-overlay"></div>
      


        <!-- bundle -->
        <script src="<?php echo e(asset('assets/js/vendor.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
        <!-- Datatables js -->
        <script src="<?php echo e(asset('assets/js/vendor/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/vendor/dataTables.bootstrap5.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/vendor/dataTables.responsive.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/vendor/responsive.bootstrap5.min.js')); ?>"></script>
        <!-- Datatable Init js -->
        <script src="<?php echo e(asset('assets/js/pages/demo.datatable-init.js')); ?>"></script>

        <?php echo $__env->yieldContent('scripts'); ?>
        
    </body>
</html>
<?php /**PATH /home2/gameandgain/task.gameandgain.in/resources/views/layouts/master.blade.php ENDPATH**/ ?>