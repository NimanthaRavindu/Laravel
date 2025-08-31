<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#f8f9fa; }
        .navbar { background: #2e3192; }
        .sidebar { background: #3d3ebd; min-height: 100vh; color: #fff; }
        .sidebar .nav-link { color: #fff; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { background: #ff2fa0; color: #fff; }
        .btn-pink { background: #ff2fa0; color: #fff; }
        .btn-pink:hover { background: #e0268c; color: #fff; }

        /* Style for the entire sidebar */
.col-md-3 {
    background-color: #f8f9fa;
    padding: 20px;
    height: 100vh;
}

/* Style for the menu links */
a {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #333;
    font-weight: bold;
    margin-bottom: 5px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

/* Hover effect */
a:hover {
    background-color: #e2e6ea;
}

/* Active link */
a.active {
    background-color: #007bff;
    color: white;
}

/* Optional: Style for right content area */
.col-md-9 {
    padding: 20px;
}

    </style>
    <?php echo $__env->yieldContent('styles'); ?>

    <title>Shop Mangement System</title>
</head>
<body>
    <nav class="navbar navbar-dark px-3">
        <span class="navbar-brand mb-0 h1">Shop Management System</span>
        <?php if(auth()->guard()->check()): ?>
            <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline"><?php echo csrf_field(); ?>
                <button class="btn btn-pink">Logout</button>
            </form>
        <?php endif; ?>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <?php if(auth()->guard()->check()): ?>
            <aside class="col-2 sidebar p-0">
                <?php echo $__env->make('layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </aside>
            <?php endif; ?>
            <main class="<?php if(auth()->guard()->check()): ?> col-10 <?php else: ?> col-12 <?php endif; ?> p-4">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
     
    <!--sidebar-->
    <div class="row">
        <div class="col-md-3">
        <a class="active" href="products">Products</a>
        <a href="billing">Billing</a>
        <a href="menu-item">Menu_items</a>
        <a href="customers">Customers</a>
        <a href="reports">Reports</a>
        <a href="login">Log Out</a>
    </div>

    <div class="col-md-9">
        <div class="content">
              <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
 </div>   
</body>
</html>
   
<?php /**PATH C:\Users\nimantha\Desktop\Laravel\example-app\resources\views/layout.blade.php ENDPATH**/ ?>