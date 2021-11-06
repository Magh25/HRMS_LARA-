
<div id="wrapper">
    <!-- Sidebar Section-->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img src="img/avatar.svg">
        </div>
        <div class="sidebar-brand-text mx-3">Manager</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="manager">
          <i class="fas fa-address-card"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Main
      </div>

      <!--Profile Show Section-->
      <li class="nav-item">
        <a class="nav-link" href="manager-profile">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Profile</span>
        </a>
      </li>

       <!--Task Section-->
      <li class="nav-item">
        <a class="nav-link" href="manager-leave">
          <i class="fas fa-clipboard-list"></i>
          <span>Leave Request</span>
        </a>
      </li>


      <!--Task Section-->
      <li class="nav-item">
        <a class="nav-link" href="manager-attandence">
          <i class="fas fa-clipboard-list"></i>
          <span>Attandence</span>
        </a>
      </li>

      <!--Task Section-->
      <li class="nav-item">
        <a class="nav-link" href="manager-events">
          <i class="fas fa-clipboard-list"></i>
          <span>View Events</span>
        </a>
      </li>

      <!--Task Section-->
      <li class="nav-item">
        <a class="nav-link" href="manager-task">
          <i class="fas fa-clipboard-list"></i>
          <span>Task</span>
        </a>
      </li>
      

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        <i class="fas fa-cogs">Settings</i>
      </div>
 
 

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


        

  <?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/include/manager_sidebar.blade.php ENDPATH**/ ?>