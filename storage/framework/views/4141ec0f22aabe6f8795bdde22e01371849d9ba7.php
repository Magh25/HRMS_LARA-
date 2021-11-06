  <?php $__env->startSection('employee'); ?>
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </div>
  </div>

<!------ Profile View Section ---------->

<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4">
            <form action="<?php echo e(url('employee/profile/'.$user->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="profile-img">
                    <img id="image_preview_container"
                        src="<?php echo e(asset("storage/$user->avater")); ?>" alt="" />
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="avater" id="image"/>
                    </div>
                    <div class="form-group">
                        <button id="upload_avater" type="submit" class="btn btn-primary w-50">Save</button>
                    </div>
                </div><br>

            </form>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5>
                    <?php echo e($user->name); ?>

                </h5>
                <h6>
                    <?php echo e($user->department); ?>

                </h6>
                <p class="proile-rating">Award : <span>N/A</span></p>
                <br><br><br><br><br><br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="Personal-tab" data-toggle="tab" href="#Personal" role="tab"
                            aria-controls="Personal" aria-selected="true">Personal Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Company Details</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <h5 class="font-weight-bold">Email</h5>
                <h5><?php echo e($user->email); ?></h5><br />
                <h5 class="font-weight-bold">Blood Group</h5>
                <h5><?php echo e($user->blood); ?></h5><br />
                <h5 class="font-weight-bold">Country</h5>
                <h5><?php echo e($user->country); ?></h5><br />
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="Personal" role="tabpanel" aria-labelledby="Personal-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Fathers Name</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo e($user->father); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Mobile Number</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo e($user->mobile); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Date Of Birth</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo e($user->date_of_birth); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Gender</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo e($user->gender); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Address</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo e($user->address); ?></p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="row">
                        <div class="col-md-6">
                            <label>User ID</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo e($user->id); ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>User Type</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo e($user->type); ?></p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Salary</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo e($user->salary); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Date Of Joining</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo e($user->join); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>NID Number</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo e($user->nid); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <?php $__env->stopSection(); ?>


  <?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function(){

        //Live upload profile photo
        $('#upload_avater').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#image').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_preview_container').attr('src', e.target.result);
                $('#upload_avater').show();
            }
            reader.readAsDataURL(this.files[0]);
        });



    });
</script>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.employee', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/employee/profile/index.blade.php ENDPATH**/ ?>