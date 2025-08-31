@extends('layout')

@section('content')
<div class="container" style="max-width: 400px; margin: 40px auto;">
    <h2>Welcome to Authentication</h2>
    <p>Please choose an action:</p>
    <div class="d-grid gap-2">
        <a href="{{ route('login') }}" class="btn btn-primary mb-2">Login</a>
        <a href="{{ route('signup') }}" class="btn btn-success mb-2">Sign Up</a>
    </div>
</div>
@endsection
