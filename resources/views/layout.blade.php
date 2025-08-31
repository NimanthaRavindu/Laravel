<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#f8f9fa; }
        .navbar { background: #2e3192; }
        .sidebar { background: #3d3ebd; min-height: 100vh; color: #fff; }
        .sidebar .nav-link { color: #fff; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { background: #ff2fa0; color: #fff; }
        .btn-pink { background: #ff2fa0; color: #fff; }
        .btn-pink:hover { background: #e0268c; color: #fff; }

        /* Style for the entire sidebar */
.col-md-3 {
    background-color: #f8f9fa;
    padding: 20px;
    height: 100vh;
}

/* Style for the menu links */
a {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #333;
    font-weight: bold;
    margin-bottom: 5px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

/* Hover effect */
a:hover {
    background-color: #e2e6ea;
}

/* Active link */
a.active {
    background-color: #007bff;
    color: white;
}

/* Optional: Style for right content area */
.col-md-9 {
    padding: 20px;
}

    </style>
    @yield('styles')

    <title>Shop Mangement System</title>
</head>
<body>
    <nav class="navbar navbar-dark px-3">
        <span class="navbar-brand mb-0 h1">Shop Management System</span>
        @auth
            <form action="{{ route('logout') }}" method="POST" class="d-inline">@csrf
                <button class="btn btn-pink">Logout</button>
            </form>
        @endauth
    </nav>
    <div class="container-fluid">
        <div class="row">
            @auth
            <aside class="col-2 sidebar p-0">
                @include('layouts.sidebar')
            </aside>
            @endauth
            <main class="@auth col-10 @else col-12 @endauth p-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
     
    <!--sidebar-->
    <div class="row">
        <div class="col-md-3">
        <a class="active" href="products">Products</a>
        <a href="billing">Billing</a>
        <a href="menu-item">Menu_items</a>
        <a href="customers">Customers</a>
        <a href="reports">Reports</a>
        <a href="login">Log Out</a>
    </div>

    <div class="col-md-9">
        <div class="content">
              @yield('content')
        </div>
    </div>
 </div>   
</body>
</html>
   
