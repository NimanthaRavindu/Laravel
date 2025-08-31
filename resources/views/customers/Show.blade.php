<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Customer Details</h2>
    <div class="card">
        <div class="card-body">
            <h4>{{ $customer->name }}</h4>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
            <p><strong>Address:</strong> {{ $customer->address }}</p>
        </div>
    </div>
    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
</body>
</html>