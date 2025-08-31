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
    <h2>Edit Customer</h2>
    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
        @csrf 
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}" required>
            @error('email') <div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}">
            @error('phone') <div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ old('address', $customer->address) }}</textarea>
            @error('address') <div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

</body>
</html>