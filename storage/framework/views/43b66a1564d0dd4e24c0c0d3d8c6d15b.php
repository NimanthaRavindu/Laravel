

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Create New Bill</h1>
    <form action="<?php echo e(route('billing.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required step="0.01">
        </div>

        <div class="mb-3">
            <label for="billing_date" class="form-label">Billing Date</label>
            <input type="date" name="billing_date" id="billing_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Bill</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nimantha\Desktop\Laravel\example-app\resources\views/billing/create.blade.php ENDPATH**/ ?>