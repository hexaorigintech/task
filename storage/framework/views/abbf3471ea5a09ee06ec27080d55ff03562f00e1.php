<div class="leftside-menu leftside-menu-detached">

    <div class="leftbar-user">
        <a href="javascript: void(0);">
            <img src="<?php echo e(asset('assets/images/users/avatar-1.jpg')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
            <span class="leftbar-user-name"><?php echo e(\Auth::user()->name); ?></span>
        </a>
    </div>

    <!--- Sidemenu -->
    <ul class="side-nav">

        <li class="side-nav-title side-nav-item">Navigation</li>

     

     

        <li class="side-nav-item">
            <a href="apps-calendar.html" class="side-nav-link">
                <i class=" uil-slack-alt"></i>
                <span> Departments </span>
            </a>
        </li>


        <li class="side-nav-item">
            <a href="apps-calendar.html" class="side-nav-link">
                <i class="uil-users-alt"></i>
                <span> Employees </span>
            </a>
        </li>


     </ul>

   
    <!-- End Sidebar -->

    <div class="clearfix"></div>
    <!-- Sidebar -left -->

</div><?php /**PATH C:\xampp\htdocs\client\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>