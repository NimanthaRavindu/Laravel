@extends('layout')

@section('content')
<div>
    <h2>Menu Items</h2>
    <a href="{{ route('menu-items.create') }}" class="btn btn-primary mb-3">Add Menu Item</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menuItems as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>₹{{ number_format($item->price, 2) }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <a href="{{ route('menu-items.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('menu-items.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No menu items found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
