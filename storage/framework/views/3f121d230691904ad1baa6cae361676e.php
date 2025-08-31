<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>


<?php $__env->startSection('content'); ?>
    <h1>Product List</h1>
    <?php if(session('sucess')): ?>
     <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?> 

    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary mb-3">Add Product</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e(number_format($product->price, 2)); ?></td>
                <td><?php echo e($product->stock); ?></td>
                <td><?php echo e($product->category); ?></td>

                <td>
                    <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-warning btn-sm">View</a>

                    <a href="<?php echo e(route('products.edit',$product->id)); ?>">Edit</a>

                    <form action="<?php echo e(route('products.destroy',$product->id)); ?>"method="POST" style="display:inline">
                        <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    
                </td>
            </tr>
              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

</body>
</html>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nimantha\Desktop\Laravel\example-app\resources\views/products/index.blade.php ENDPATH**/ ?>