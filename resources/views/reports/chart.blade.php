@extends('layout')

@section('content')
<div class="container">
    <h2>Monthly Sales Chart</h2>

    <canvas id="salesChart" width="400" height="200"></canvas>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesData = @json($salesData);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: salesData.map(item => item.label),
            datasets: [{
                label: 'Total Sales',
                data: salesData.map(item => item.value),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
