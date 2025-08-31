<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layout')

@section('content')
<h2 class="mb-4">Dashboard</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Total Sales</h5>
                <h3>{{ $inputFlow ?? '0.00' }}</h3>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5>Total Customers</h5>
                <h3>{{ $totalCustomers ?? '0' }}</h3>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5>Total Products</h5>
                <h3>{{ $totalProducts ?? '0' }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <canvas id="categoryPie"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Example data, replace with your PHP variables
    const salesData = @json($salesByDay ?? []);
    const pieData = @json($categoryDistribution ?? []);

    // Sales Chart
    new Chart(document.getElementById('salesChart'), {
        type: 'line',
        data: {
            labels: salesData.map(d => d.date),
            datasets: [{
                label: 'Sales',
                data: salesData.map(d => d.total),
                backgroundColor: 'rgba(255,47,160,0.2)',
                borderColor: '#ff2fa0',
                fill: true,
            }]
        }
    });

    // Category Pie Chart
    new Chart(document.getElementById('categoryPie'), {
        type: 'pie',
        data: {
            labels: pieData.map(d => d.category),
            datasets: [{
                data: pieData.map(d => d.count),
                backgroundColor: ['#ff2fa0','#3edc81','#2e3192','#f0e6ff'],
            }]
        }
    });
</script>
@endsection

</body>
</html>