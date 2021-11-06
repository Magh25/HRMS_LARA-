<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="HTML5,CSS3,JS,BOOTSTRAP 4.0">
  <meta name="author" content="Md Abdul Mannan Hridoy">

  <!-----Page Dashboard & Form Level Templetes CSS----->
  <link href="<?php echo e(asset('/dashboard/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo e(asset('/dashboard/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo e(asset('/dashboard/css/ruang-admin.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

  <!-----PROFILE SHOW CSS----->
  <link href="<?php echo e(asset('/css/profile/style.css')); ?>" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



<style>

.bg-navbar {
    background-color: #7aba57;
}
.sidebar-light .sidebar-brand {
    color: #fafafa;
    background-color: #7aba57;
}

  </style>


</head>
<body id="page-top">

    <?php echo $__env->make('include.admin_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('include.admin_topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('main'); ?>

    <!-- SCRIPT SECTION -->
    
        <?php echo $__env->make('include.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    







    <!-----Page Dashboard & Form Level Templetes----->
    <script src="<?php echo e(asset('/dashboard/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/dashboard/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/dashboard/js/ruang-admin.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/dashboard/vendor/chart.js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/dashboard/js/demo/chart-area-demo.js')); ?>"></script>
    <script src="<?php echo e(asset('/dashboard/vendor/jquery.min.js')); ?>"></script>

    <!-----Sweet Alert Javascripts----->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </script>
    <script src="<?php echo e(asset('/sweetalert/sweetalert.all.js')); ?>"></script>
    <script src="<?php echo e(asset('/sweetalert/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/sweetalert.min.js')); ?>"></script>  

<!-- Search Box Work level plugins -->
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('/dashboard/vendor/datatables/jquery.dataTables.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('/dashboard/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-----Page DataTables Custom(Search) Scripts----->
    <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
    </script>
<!-- Search Box Work level plugins -->






        <?php echo $__env->yieldContent('scripts'); ?>



        

</body>
</html>



<?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/layouts/admin.blade.php ENDPATH**/ ?>