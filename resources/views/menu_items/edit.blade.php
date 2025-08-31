@extends('layout')

@section('content')
<div>
    <h2>Edit Menu Item</h2>
    <form action="{{ route('menu-items.update', $menuItem->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ old('name', $menuItem->name) }}" required>
            @error('name') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom: 15px;">
            <label>Price:</label><br>
            <input type="number" name="price" step="0.01" value="{{ old('price', $menuItem->price) }}" required>
            @error('price') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom: 15px;">
            <label>Description:</label><br>
            <textarea name="description">{{ old('description', $menuItem->description) }}</textarea>
            @error('description') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('menu-items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
