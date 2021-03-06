<?php $__env->startSection('main'); ?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Task</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
            <li class="breadcrumb-item">Task Tables</li>
            <li class="breadcrumb-item active" aria-current="page">Add Task</li>
        </ol>
    </div>
</div>
<!-- Task Page Section-->
<div class="col-lg-12">
    <!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-body col-6 m-auto">
            <form action="<?php echo e(url('admin/task')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">User</span>
                        </div>
                        <select class="form-control" name="user_id" required>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>">(<?php echo e($user->id); ?>) <?php echo e($user->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Subject</span>
                        </div>
                        <input name="subject" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Duration</span>
                        </div>
                        <select class="form-control" name="duration">
                            <option>1 Week</option>
                            <option>1 Month</option>
                            <option>3 Month</option>
                            <option>6 Month</option>
                            <option>1 Year</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                        <textarea name="description" rows="8" textarea class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="file" name="attachment" class="form-control">
                </div>
                <div class="form-group text-right">
                <button type="submit" class="btn btn-success w-100 ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/admin/task/create.blade.php ENDPATH**/ ?>