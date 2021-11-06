<?php $__env->startSection('main'); ?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Task Tables</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>

            <li class="breadcrumb-item active" aria-current="page">Task</li>
        </ol>
    </div>

    <div class="row">
        <!--Task DataTable with Hover Section-->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="<?php echo e(url('admin/task/create')); ?>"><button type="button"
                            class="btn btn-success" data-toggle="modal">Add New Task</button></a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>User</th>
                                <th>Subject</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($task->user->name); ?> (<?php echo e($task->user->id); ?>)</td>
                                    <td><?php echo e($task->subject); ?></td>
                                    <td><?php echo e($task->duration); ?></td>
                                    <td><?php echo e($task->status); ?></td>
                                    <td>
                                        <?php if($task->status == 'Pending'): ?>
                                            <form
                                                action="<?php echo e(url('admin/task/')); ?>/<?php echo e($task->id); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <input type="hidden" name="status" value="Compeleted">
                                                <input type="hidden" name="id" value="<?php echo e($task->id); ?>">
                                                <button type="submit" class="btn btn-primary">Compelete</button>
                                            </form>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#updateTask" id="#updateTaskBoard"
                                                data-subject="<?php echo e($task->subject); ?>"
                                                data-description="<?php echo e($task->description); ?>"><i
                                                    class="fas fa-user-edit">Update</i></button>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteTask" id="#deleteTaskBoard"
                                            data-task_id="<?php echo e($task->id); ?>"><i class="fas fa-trash">Delete</i></button>
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

<!--Update Task Modal Center -->
<div class="modal fade" id="updateTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="<?php echo e(url('admin/task')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTaskBoard">Update Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mb-3 font-weight-bold">Subject</label>
                        <input name="subject" id="subject" class="form-control  mb-3" type="text" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label class="mb-3 font-weight-bold">Duration</label>
                        <select class="form-control mb-3 font-weight-bold">
                            <option>1 Week</option>
                            <option>1 Month</option>
                            <option>3 Month</option>
                            <option>6 Month</option>
                            <option>1 Year</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-3 font-weight-bold">Description</label>
                        <textarea rows="8" textarea class="form-control mb-3" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="mb-3 font-weight-bold">Status</label>
                        <select name="status" class="form-control mb-3 font-weight-bold" placeholder="Status">
                            <option>Completed</option>
                            <option>Pending</option>
                            <option>Rejected</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Delete Task Modal Center -->
<div class="modal fade" id="deleteTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTaskName">Delete Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('admin/task/destroy')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-body">
                    <input type="hidden" name="task_id" id="task_id">
                    Are You Sure,You Want To Delete This Task?
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


<script>
    $('#updateTask').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var subject = button.data('subject')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #subject').val(subject);
        modal.find('.modal-body #description').val(description);
    });

    // delete task
    $('#deleteTask').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var task_id = button.data('task_id')
        var modal = $(this)
        modal.find('.modal-title').text('Delete Task Name')
        modal.find('.modal-body #task_id').val(task_id);
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/admin/task/index.blade.php ENDPATH**/ ?>