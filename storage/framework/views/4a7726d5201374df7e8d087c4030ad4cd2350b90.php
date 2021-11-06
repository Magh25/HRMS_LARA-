

<div id="wrapper">
    <!-- Sidebar Section-->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(url('/admin')); ?>">
          <i class="fas fa-address-card"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Main
      </div>

      <!--Profile Show Section-->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.profile')); ?>">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Profile</span>
        </a>
      </li>

      <!--System Manage Section-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fab fa-windows"></i>
          <span>System Manage</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">System Manage</h6>
            <a class="collapse-item" href="<?php echo e(url('admin/departments')); ?>">Department</a>
            <a class="collapse-item" href="<?php echo e(url('admin/countries')); ?>">Country</a>
          </div>
        </div>
      </li>

      <!--attendance Manage Section-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseattendance"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Attendance</span>
        </a>
        <div id="collapseattendance" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Attendance</h6>
            <a class="collapse-item" href="<?php echo e(url('admin/attendance/create')); ?>">Add Attendance</a>
            <a class="collapse-item" href="<?php echo e(url('admin/attendance')); ?>">View Attendance</a>
          </div>
        </div>
      </li>


      <!--Salary Section-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-dollar-sign"></i>
          <span>Salary</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Salary</h6>
            <a class="collapse-item" href="<?php echo e(url('admin/salaries')); ?>">Add Salary</a>
            <a class="collapse-item" href="<?php echo e(url('admin/payment')); ?>">Pay Salary</a>
          </div>
        </div>
      </li>
  
 



      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        <i class="fas fa-cogs">Settings</i>
      </div>

      <!--Report Section-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Report</span>
        </a>
        <div id="collapseReport" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Report</h6> 
            <a class="collapse-item" href="<?php echo e(url('admin/reports')); ?>">Employee Report</a>
          </div>
        </div>
      </li>



      <!--User Manage Section-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-users"></i>
          <span>User Manage</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Manage</h6>
            <a class="collapse-item" href="<?php echo e(url('admin/users/create')); ?>">Add User</a>
            <a class="collapse-item" href="<?php echo e(url('admin/users')); ?>">View User List</a>
          </div>
        </div>
      </li>

 


      <!--Task Section-->
      <li class="nav-itemm">
        <a class="nav-link"  > 
          <span> </span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <!--Task Section-->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
          <i class="fas fa-clipboard-list"></i>
          <span><?php echo e(__('Logout')); ?></span>
        </a>
      </li>

 


      <hr class="sidebar-divider">
    </ul>
    <!-- Sidebar Section-->
<?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/include/admin_sidebar.blade.php ENDPATH**/ ?>