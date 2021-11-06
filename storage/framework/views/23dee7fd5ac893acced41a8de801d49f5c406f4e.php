  <?php $__env->startSection('employee'); ?>

  <!-- HTML Scrolling-text -->
    <!-- <center><h1>Notice</h1></center>
    <div class="notice-a">
      <marquee 
          behavior="scroll" 
          direction="left" 
          onmouseover="this.stop();" 
          onmouseout="this.start();">
          <a href="#">Hower over and hold the mouse marquee stop</a>
      </marquee>
    </div>
 -->







  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
            </ol>
          </div>
  </div>


  <div class="row m-lg-2 mb-3">
    <!-- Total User Card Example -->
   

            <!-- Total Task -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Present</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($present); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> 


            <!-- Total Department Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Absent</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($absent); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
 
          </div>


      <!-- Pie Chart Card Example -->    
      <div class="container my-4">
        <div class="card h-100">
          <div class="card-body">
            
              <h5>Total   Attandence Pie Chart</h5>
              <hr class="my-4">
            <div class="row no-gutters align-items-center">

              <div class="col  col-md-6">
                <canvas id="pieChart" style="max-width: 500px;"></canvas>
              </div>
              <!-- <div class="col  col-md-6">
                <canvas id="pieChart2" style="max-width: 500px;"></canvas>
              </div> -->
            </div>
          </div>
        </div>
      </div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('scripts'); ?>



<!--Attandence Pie Chart Scripts -->
<script type="text/javascript">
      //pie ------------------------------------------
      var ctxP = document.getElementById("pieChart").getContext('2d');
      var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
          labels: ["Present", "Absent"],
          datasets: [{
            data: [<?php echo e($present); ?>, <?php echo e($absent); ?>],
            backgroundColor: ["#46BFBD", "#FDB45C","#F7464A"],
            hoverBackgroundColor: ["#5AD3D1", "#FFC870","#FF5A5E"]
          }]
        },
        options: {
          responsive: true
        }
      });


      //     //pie ----------------------22222--------------------
      //     var ctxP = document.getElementById("pieChart2").getContext('2d');
      // var myPieChart = new Chart(ctxP, {
      //   type: 'line',
      //   data: {
      //     labels: ["Present", "Absent"],
      //     datasets: [{
      //       data: [50, 100],
      //       backgroundColor: ["#46BFBD", "#FDB45C","#F7464A"],
      //       hoverBackgroundColor: ["#5AD3D1", "#FFC870","#FF5A5E"]
      //     }]
      //   },
      //   options: {
      //     responsive: true
      //   }
      // });
</script>
<!-- Pie Chart Scripts -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.employee', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/employee/index.blade.php ENDPATH**/ ?>