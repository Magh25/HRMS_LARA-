  <?php $__env->startSection('main'); ?>
  <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
              <li class="breadcrumb-item">User Manage</li>
              <li class="breadcrumb-item active" aria-current="page">View User List</li>
            </ol>
          </div>
    <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Type</th>
                        <th colspan="2" class="text-center">Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->department); ?></td>
                            <td><?php echo e($user->type); ?></td>
                            <td><?php if($user->status): ?>
                                Active
                                <?php else: ?>
                                Inactive
                            <?php endif; ?></td>
                            <td>
                                <?php if($user->status==1): ?>
                                    <form action="<?php echo e(url('admin/users/')); ?>/<?php echo e($user->id); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <input type="hidden" name="status" value="0">
                                        <button type="submit" class="btn btn-warning">Inactive</button>
                                    </form>
                                <?php else: ?>
                                    <form action="<?php echo e(url('admin/users/')); ?>/<?php echo e($user->id); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <input type="hidden" name="status" value="1">
                                        <button type="submit" class="btn btn-primary">Active</button>
                                    </form>
                                <?php endif; ?>


                            </td>
                            <td>
                                <a href="<?php echo e(url('admin/users/')); ?>/<?php echo e($user->id); ?>">
                                    <button type="button" class="btn btn-success">
                                        <li class="far fa-eye"> View</li>
                                    </button>
                                </a>
                                <a href="<?php echo e(url('admin/users/')); ?>/<?php echo e($user->id); ?>/edit">
                                    <button type="button" class="btn btn-primary"><i class="fas fa-user-edit">
                                            Edit</i></button>
                                </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#deleteUser" id="#deleteUserBoard"
                                data-user_id="<?php echo e($user->id); ?>"><i class="fas fa-trash">Delete</i></button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h4>No user found</h4>
                        <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>

    </div>
  </div>



  <!--Delete User Modal Center -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserBoard">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('admin/users/destroy')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id">
                    Are You Sure,You Want To Delete This user?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
    // delete user
    $('#deleteUser').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var user_id = button.data('user_id');
        var modal = $(this);
        modal.find('.modal-title').text('Delete user');
        modal.find('.modal-body #user_id').val(user_id);
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/admin/user/index.blade.php ENDPATH**/ ?>