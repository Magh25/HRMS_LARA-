<script src="<?php echo e(asset('/vendor/toastr/toastr.min.js')); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/vendor/toastr/toastr.min.css')); ?>">

<script>
    <?php if(Session::has('message')): ?>
        var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
        switch(type){
            case 'info':
                toastr.info('<?php echo e(Session::get('message')); ?>','Info');
            break;

            case 'warning':
                toastr.warning('<?php echo e(Session::get('message')); ?>','Warning');
            break;

            case 'success':
                toastr.success('<?php echo e(Session::get('message')); ?>','Done');
            break;

            case 'error':
                toastr.error('<?php echo e(Session::get('message')); ?>','Error');
            break;
        }
    <?php endif; ?>

    
</script>

<?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/admin/partials/toastr.blade.php ENDPATH**/ ?>