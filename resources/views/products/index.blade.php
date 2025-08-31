<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
@extends('layout')

@section('content')
    <h1>Product List</h1>
    @if(session('sucess'))
     <div class="alert alert-success">{{ session('success') }}</div>
    @endif 

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

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
        @foreach($products as $product)
            <tr>
                
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->category }}</td>

                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm">View</a>

                    <a href="{{ route('products.edit',$product->id) }}">Edit</a>

                    <form action="{{ route('products.destroy',$product->id) }}"method="POST" style="display:inline">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    
                </td>
            </tr>
              
        @endforeach
        </tbody>
    </table>

@endsection

</body>
</html>