  <?php $__env->startSection('main'); ?>



<!-- Add Attendance Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Attendance</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Attendance</li>
                    <li class="breadcrumb-item active" aria-current="page">Add Attendance</li>
                </ol>
            </div>

            <div class="row">
              <!--Add Attendance DataTable with Hover Section-->
              <div class="col-lg-12 text-center">

                <!-- --------------------------- -->
                <form action="<?php echo e(url('admin/attendance')); ?>" method="POST">
                <!-- <form action=" " class=" form" method="GET"> -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <div class="form-group col-md-6 m-auto">
                        <h3>Pick an attendance date <?php echo e($att_date ?? ''); ?></h3>
                        <input type="date" name="date" value="<?php echo e($att_date ?? ''); ?>" id="date" class="form-control" required>
                        <!-- <button class="btn btn-primary form-control mt-3" type="submit">View</button> -->
                      </div>
                      
                  </div>
                <!-- </form> -->
                <!-- ----------------------------- -->

 
                        <?php echo csrf_field(); ?>
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        
                    </div>


                      <div class="card mb-4">

                        <div class="table-responsive p-3">
                          <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                              <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Department</th>
                                <th>User Type</th>
                                <th>Present</th> 
                              </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <input type="hidden" name="user_id[]" value="<?php echo e($user->id); ?>">
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->department); ?></td>
                                    <td><?php echo e($user->type); ?></td>
                    
                                    <td>
                                        <div class="form-control">
                                      
                                        <label for="Present[<?php echo e($user->id); ?>]">Present :</label> <input checked type="radio" name="attendance[<?php echo e($user->id); ?>]" value="Present" id="Present[<?php echo e($user->id); ?>]" class="form-aa mr-3" >

                                        <label for="Absent[<?php echo e($user->id); ?>]">Absent :</label> <input type="radio" name="attendance[<?php echo e($user->id); ?>]" value="Absent" id="Absent[<?php echo e($user->id); ?>]" class="form-contaaarol" >
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center" colspan="5">
                                            <h4>No Active User Found!</h4>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  <?php if(empty(!$users)): ?>
                    <button type="submit" class="btn btn-primary">Take Todays Attendance</button>
                  <?php endif; ?>
                </form>
              </div>
            </div>

<!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

    $("#date").flatpickr({
        maxDate: "today"
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/admin/attendance/create.blade.php ENDPATH**/ ?>