@extends('layout')

@section('title', 'Add New Customer')

@section('content')
<h1>Add New Customer</h1>

<form method="POST" action="{{ route('customers.store') }}">
    @csrf

    <div class="form-group">
        <label for="name">Customer Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group mt-2">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group mt-2">
        <label for="phone">Phone Number</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
        @error('phone')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-success mt-3">Save Customer</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Cancel</a>
</form>
@endsection
