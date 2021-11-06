  <?php $__env->startSection('main'); ?>
  <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Notice Board Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>

              <li class="breadcrumb-item active" aria-current="page">Notice Board</li>
            </ol>
          </div>
    <div class="row">

            <!--Notice Board DataTable with Hover Section-->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="<?php echo e(url('admin/notice/create')); ?>"><button type="button" class="btn btn-success" data-toggle="modal">Add Notice</button></a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php ($i=1); ?>
                      <?php $__currentLoopData = $notice_boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice_boards): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($notice_boards->notice_title); ?></td>
                        <td><?php echo e($notice_boards->notice_description); ?></td>
                        <td><?php echo e($notice_boards->created_at); ?></td>
                        <td><button data-notice_id="<?php echo e($notice_boards->id); ?>" data-notice_title="<?php echo e($notice_boards->notice_title); ?>" data-notice_description="<?php echo e($notice_boards->notice_description); ?>" type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateNotice"
                    	id="#updateNoticeBoard"><i class="fas fa-user-edit">Update</i></button>
                		<button data-notice_id="<?php echo e($notice_boards->id); ?>" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteNotice"
                    	id="#deleteNoticeBoard"><i class="fas fa-trash">Delete</i></button>
                    	</td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



          <!--Update Notice Board Modal Center -->
          	<div class="modal fade" id="updateNotice" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="updateNoticeBoard">Update Leave</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <form action="admin-notice-update" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
          <div class="modal-body">
            <input type="hidden" name="notice_id" id="notice_id">
              <input name="notice_title" id="notice_title" class="form-control  mb-3" type="text" placeholder="Update Notice Title">
              <input name="notice_description" id="notice_description" class="form-control  mb-3" type="text" placeholder="Update Notice Description">
        </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <!--Delete Notice Modal Center -->
      <div class="modal fade" id="deleteNotice" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteNoticeBoard">Delete Notice</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <form action="admin/notice" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                    <div class="modal-body">
                      <input type="hidden" name="notice_id" id="notice_id">
                      Are You Sure,You Want To Delete This Notice?
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        /*-----Update Notice Board Modal Update Scripts-----*/
        $('#updateNotice').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var notice_title = button.data('notice_title')
            var notice_description = button.data('notice_description')
            var notice_id = button.data('notice_id')
            var modal = $(this)
            modal.find('.modal-title').text('Update Notice')
            modal.find('.modal-body #notice_title').val(notice_title);
            modal.find('.modal-body #notice_description').val(notice_description);
            modal.find('.modal-body #notice_id').val(notice_id);
        });


        /*-----Delete Notice Board Modal Delete Scripts-----*/
        $('#deleteNotice').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var notice_id = button.data('notice_id')
            var modal = $(this)
            modal.find('.modal-title').text('Delete Notice')
            modal.find('.modal-body #notice_id').val(notice_id);
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/admin/notice/index.blade.php ENDPATH**/ ?>