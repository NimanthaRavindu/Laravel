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
<h1>Product Details</h1>

<table class="table table-bordered">


    <tr>
        <th>Name</th>
        <td>{{ $product->name }}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>${{ number_format($product->price, 2) }}</td>
    </tr>
    <tr>
        <th>Stock</th>
        <td>{{ $product->stock }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{{ $product->description ?? 'N/A' }}</td>
    </tr>
</table>

<a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
@endsection
</body>
</html>