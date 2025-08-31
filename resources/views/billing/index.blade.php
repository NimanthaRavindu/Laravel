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
<h2>Bills</h2>
<a href="{{ route('billing.create') }}" class="btn btn-primary mb-3">Create Bill</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bills as $bill)
        <tr>
            <td>{{ $bill->id }}</td>
            <td>{{ $bill->customer_name }}</td>
            <td>{{ number_format($bill->total,2) }}</td>
            <td>{{ \Carbon\Carbon::parse($bill->created_at)->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('billing.show', $bill->id) }}" class="btn btn-info btn-sm">View</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
  
</body>
</html>