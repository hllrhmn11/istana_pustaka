<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - Istana Pusaka</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Istana Pusaka</a>
        <div>
            {{-- 
            @auth
                <span class="text-white me-3">Halo, {{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
            @endguest 
            --}}
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>
</body>
</html>
