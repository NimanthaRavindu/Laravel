<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php $__env->startSection('content'); ?>
<h2>Reports</h2>
<form method="GET" action="<?php echo e(route('reports.index')); ?>" class="mb-3">
    <label>From: <input type="date" name="from" ></label>
    <label>To: <input type="date" name="to" ></label>
    <button class="btn btn-primary">Apply</button>
</form>
<div class="row">
    <div class="col-md-6">
        <h5>Sales Report</h5>
        <img src="LineChart.jpeg" alt="LineChart" height="50px" width="35px"/>
        <canvas id="salesReport"></canvas>
    </div>
    <div class="col-md-6">
        <h5>Top Customers</h5>
       
    </div>
</div>
</body>
</html>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\nimantha\Desktop\Laravel\example-app\resources\views/reports/index.blade.php ENDPATH**/ ?>