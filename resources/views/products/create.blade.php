@extends('layout')

@section('content')
<h1>Create Product</h1>

<form method="POST" action="{{ route('products.store') }}">
    @csrf

     <div class="form-group">
        <label>ID</label>
        <input type="text" name="id" class="form-control" value="{{ old('id', $product->id) }}" required>
        @error('id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Price:</label>
        <input type="text" name="price" class="form-control" value="{{ old('price') }}" required>
        @error('price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-2">
        <label>Stock:</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required>
        @error('price')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group mt-2">
        <label>Category:</label>
        <input type="text" name="category" class="form-control" value="{{ old('category') }}" required>
        @error('category')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success mt-3">Save Product</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Cancel</a>
</form>
@endsection
