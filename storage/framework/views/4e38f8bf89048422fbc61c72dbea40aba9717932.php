  <?php $__env->startSection('main'); ?>



<!-- Add attendance Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">View attendance</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View attendance</li>
                    <li class="breadcrumb-item active" aria-current="page">Add attendance</li>
                </ol>
            </div>

            <div class="row">
                <!--Add attendance DataTable with Hover Section-->
                <div class="col-lg-12 text-center">
                    <form action="<?php echo e(url('admin/attendance')); ?>" method="GET">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="form-group col-6 m-auto">
                                <h3>Pick an attendance date <?php echo e($att_date ?? ''); ?></h3>
                                <input type="date" name="date" value="<?php echo e($att_date ?? ''); ?>" id="date" class="form-control" required>
                                <button class="btn btn-primary" type="submit">View</button>
                            </div>
                        </div>
                     </form>
              <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Department</th>
                        <th>Attendance</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $attendances ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                            <td><?php echo e($attendance->user_id); ?></td>
                            <td><?php echo e($attendance->user->name); ?></td>
                            <td><?php echo e($attendance->user->department); ?></td>
                            <td><?php echo e($attendance->attendance); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5">
                                    <h3>No attendance Found</h3>

                                </td>
                           </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
                </div>
              </div>
              <?php if($attendances ?? ''): ?>
                <a href="<?php echo e(url('admin/attendance/'.$att_date.'/edit')); ?>" class="btn btn-primary">Edit attendance</a>
              <?php endif; ?>
        </div>
    </div>
  <!--Add attendance Modal Center -->
  <div class="modal fade" id="addattendance" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">

             <div class="modal-header">
                  <h5 class="modal-title" id="addattendanceBoard">Add attendance</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
              </div>

                <div class="modal-body">
                    <label class="mb-3 font-weight-bold">Add attendance Date</label>
                    <input class="form-control  mb-3" type="date" placeholder="Update attendance Date">
                </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a href="#"><button type="button" class="btn btn-warning">Add</button></a>

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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

    $("#date").flatpickr({
        maxDate: "today"
    });
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/admin/attendance/index.blade.php ENDPATH**/ ?>