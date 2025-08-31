<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="d-flex flex-column align-items-center justify-content-center" style="height:80vh;">
    <div class="card p-4" style="min-width:350px; background: #f0e6ff;">
        <h3 class="mb-4 text-center" style="color:#2e3192;">Signup</h3>
        <form method="POST" action="{{ route('signup') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            </div>
            <button class="btn w-100 mb-2" style="background:#ff2fa0; color:white;">Signup</button>
        </form>
        <a href="{{ route('login') }}" class="btn w-100" style="background:#2e3192; color:white;">Back to Login</a>
    </div>
</div>
@endsection

</body>
</html>