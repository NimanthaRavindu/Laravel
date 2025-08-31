

<?php $__env->startSection('content'); ?>
<div class="container" style="max-width: 400px; margin: 40px auto;">
    <h2>Welcome to Authentication</h2>
    <p>Please choose an action:</p>
    <div class="d-grid gap-2">
        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary mb-2">Login</a>
        <a href="<?php echo e(route('signup')); ?>" class="btn btn-success mb-2">Sign Up</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nimantha\Desktop\Laravel\example-app\resources\views/auth/index.blade.php ENDPATH**/ ?>