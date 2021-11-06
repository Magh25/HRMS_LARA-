<!-----Page Dashboard & Form Level Templetes----->
<script src="<?php echo e(asset('/dashboard/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('/dashboard/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>




<!-----Sweet Alert Javascripts----->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script>
<script src="<?php echo e(asset('/sweetalert/sweetalert.all.js')); ?>"></script>
<script src="<?php echo e(asset('/js/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('/sweetalert/toastr.min.js')); ?>"></script>

<!-- Search Box Work level plugins -->

<!-- Page level plugins -->
<script src="<?php echo e(asset('/dashboard/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/dashboard/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-----Page DataTables Custom(Search) Scripts----->
<script>
    $(document).ready(function () {
    $('#dataTable').DataTable(); // ID From dataTable
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>

<?php echo $__env->make('admin.partials.toastr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/include/scripts.blade.php ENDPATH**/ ?>