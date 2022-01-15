<style>
    .btn-dark{
      box-shadow: 0px 2px 1px 0px grey;
    }
</style>
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="index.html" class="topnav-logo" >
           
           
            <span class="topnav-logo-lg" style="color: white; font-size: 25px; font-weight: bold">
               CODING TASK
            </span>
            <span class="topnav-logo-sm" style="color: white; font-size: 25px; font-weight: bold">
                CODING  TASK
            </span>

            <?php $currenRoute = Route::currentRouteName(); ?>
            <a href="<?php echo e(route('departments')); ?>"  class="btn btn-sm <?php echo e($currenRoute == 'departments' ? 'btn-success' : 'btn-dark'); ?> " style="margin-top: 18px"> <span class="uil-archway"></span> Departments</a>
            &nbsp;
            <a href="<?php echo e(route('employees')); ?>" class="btn btn-sm <?php echo e($currenRoute == 'employees' ? 'btn-success' : 'btn-dark'); ?>" style="margin-top: 18px"> <span class="uil-users-alt"></span> Employees</a>
        
        </a>




        <ul class="list-unstyled topbar-menu float-end mb-0">

        
    
         

         


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="account-user-avatar"> 
                        <img src="<?php echo e(asset('assets/images/users/avatar-1.jpg')); ?>" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name"><?php echo e(\Auth::user()->name); ?></span>
                        <span class="account-position"><?php echo e(\Auth::user()->email); ?></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a  class="dropdown-item notify-item" href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                   <i class="mdi mdi-logout me-1"></i>
                   <span>Logout</span>
               </a>

                 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                     <?php echo csrf_field(); ?>
                 </form>
                       

                </div>
            </li>

        </ul>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
  
    </div>
</div><?php /**PATH /home2/gameandgain/task.gameandgain.in/resources/views/layouts/topbar.blade.php ENDPATH**/ ?>