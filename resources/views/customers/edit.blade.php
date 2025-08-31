@extends('layout')

@section('title', 'Edit Customer')

@section('content')
<h1>Edit Customer</h1>

<form method="POST" action="{{ route('customers.update', $customer->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Customer Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group mt-2">
        <label for="contact">Contact</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}" required>
        @error('contact')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
  
    <button type="submit" class="btn btn-primary mt-3">Update details</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Cancel</a>
</form>
@endsection
