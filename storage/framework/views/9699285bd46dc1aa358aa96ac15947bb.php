

<?php $__env->startSection('title', 'Customers'); ?>

<?php $__env->startSection('content'); ?>
<h1>Customers</h1>

<a href="<?php echo e(route('customers.create')); ?>" class="btn btn-primary mb-3">Add New Customer</a>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($customer->name); ?></td>
            <td><?php echo e($customer->email); ?></td>
            <td><?php echo e($customer->phone); ?></td>
            <td>
                <a href="<?php echo e(route('customers.edit', $customer->id)); ?>" class="btn btn-sm btn-warning">Edit</a>

                <form action="<?php echo e(route('customers.destroy', $customer->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="4" class="text-center">No customers found.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php echo e($customers->links()); ?> <!-- Pagination links -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nimantha\Desktop\Laravel\example-app\resources\views/customers/index.blade.php ENDPATH**/ ?>