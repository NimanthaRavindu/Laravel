@extends('layout')

@section('title', 'Edit Product')

@section('content')
<h1>Edit Product</h1>

<form method="POST" action="{{ route('products.update', $product->id) }}">
    @csrf
    @method('PUT')

     <div class="form-group">
        <label>ID</label>
        <input type="text" name="id" class="form-control" value="{{ old('id', $product->id) }}" required>
        @error('id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-2">
        <label>Price:</label>
        <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        @error('price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
  
      <div class="form-group mt-2">
        <label>Stock:</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
        @error('stock')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

      <div class="form-group mt-2">
        <label>Category:</label>
        <input type="text" name="category" class="form-control" value="{{ old('category', $product->category) }}" required>
        @error('category')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update details</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Cancel</a>
</form>
@endsection
