<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Google Fonts & Custom CSS --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900" rel="stylesheet" />
    <style>
        /* Masukkan CSS kamu di sini (atau bisa dipisah di file CSS terpisah) */
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
            font-size: 15px;
            line-height: 1.7;
            color: #c4c3ca;
            background-color: #1f2029;
            overflow-x: hidden;
        }
        /* ... copy semua CSS yang kamu kasih tadi di sini ... */
        
        /* Contoh singkat supaya tidak terlalu panjang di sini,
           tapi kamu bisa pindahkan semua CSS di file .css terpisah */
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container d-flex justify-content-center">
        <h2 class="text-white m-0">@yield('title') - Istana Pusaka</h2>
    </div>
</nav>

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

{{-- Optional: Bootstrap JS (jika diperlukan) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- Custom JS untuk toggle card flip --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
  const checkbox = document.querySelector('input[type="checkbox"].checkbox');
  const cardWrapper = document.querySelector('.card-3d-wrapper');

  if (checkbox && cardWrapper) {
    checkbox.addEventListener('change', () => {
      if (checkbox.checked) {
        cardWrapper.style.transform = 'rotateY(180deg)';
      } else {
        cardWrapper.style.transform = 'rotateY(0deg)';
      }
    });
  }
});
</script>

</body>
</html>
