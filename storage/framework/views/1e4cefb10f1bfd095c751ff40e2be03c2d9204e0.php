  <?php $__env->startSection('main'); ?>

  

 
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          	<h5>View Attandence</h5>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
              <li class="breadcrumb-item">View Attandence</li>
            </ol>
          </div>

  <div class="row m-lg-2 mb-3">
    <!-- Total User Card Example -->
   

            <!-- Total Task -->
            <div class="col-xl-12 col-md-10 mb-4">
              <div class="card ">
                 
                <!-- --------------------------- -->
                <form action="<?php echo e(url('admin/reports')); ?>" method="GET">
                <!-- <form action=" " class=" form" method="GET"> -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <div class="form-group col-md-4 m-auto">
                        <h3>From </h3>
                        <input type="date" name="from_date"  id="from_date" class="form-control"  >
                       </div>
                      <div class="form-group col-md-4 m-auto">
                        <h3>To </h3>
                        <input type="date" name="to_date"    id="to_date" class="form-control"  >
                      </div>
                      <div class="form-group col-md-4 m-auto">
                          <h3>Employee</h3>
                          <select name="user" class="form-control" id="user" >
                              <option value="">Select Employee</option>
                              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div> 

                  </div>
                  <div class="form-group col-md-12 m-auto">
                       
                         <button class="btn btn-primary form-control  " type="submit">View</button>
                      </div>
                </form>
                <!-- ----------------------------- -->

              </div>
            </div> 



             
            
 
          </div>


      <!-- Pie Chart Card Example -->    
      <div class="container my-4">
        <div class="card h-100">
          <div class="card-body">
            
              <h5>Total Attandence Pie Chart</h5>
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


  let absent =<?php echo e($absent); ?>;

  let present =<?php echo e($present); ?>;



      //pie ------------------------------------------
      var ctxP = document.getElementById("pieChart").getContext('2d');
      var myPieCharts = new Chart(ctxP, {
        type: 'pie',
        data: {
          labels: ["Present", "Absent"],
          datasets: [{
            data: [present, absent],
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

    $("#to_date").flatpickr({
        maxDate: "today"
    });
</script>




<!-- Pie Chart Scripts -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/admin/report/index.blade.php ENDPATH**/ ?>