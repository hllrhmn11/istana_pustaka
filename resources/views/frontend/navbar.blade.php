<header id="header" class="site-header header-scrolled position-fixed text-black" style="background-color: #f5f5f5;">
  <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">
        <img src="{{ asset('frontend/images/main-logo.png') }}" class="logo">
      </a>
      <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="navbar-icon">
          <use xlink:href="#navbar-icon"></use>
        </svg>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel" style="background-color: #f5f5f5;">
        <div class="offcanvas-header px-4 pb-0">
          <a class="navbar-brand" href="/home">
            <img src="{{ asset('frontend/images/main-logo.png') }}" class="logo">
          </a>
          <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
        </div>
        <div class="offcanvas-body">
          <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link me-4 active" href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="{{ route('shop.index') }}">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="{{ route('tentang') }}">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="{{ route('kontak') }}">Kontak</a>
            </li>
            @auth
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger ms-3">Logout</button>
              </form>
            </li>
            @else
            <li class="nav-item">
              <a href="{{ route('login') }}" class="appointment-btn scrollto" style="background-color: #28a745; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none;">
                <span class="d-none d-md-inline">Login</span>
              </a>
            </li>
            @endauth

            {{-- SEARCH ICON --}}
            <li class="nav-item">
              <div class="user-items ps-4">
                <ul class="d-flex justify-content-end list-unstyled mb-0">
                  <li class="search-item">
                    <a href="#" class="search-button d-flex align-items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 
                        1.398h-.001l3.85 3.85a1 1 0 0 0 
                        1.415-1.414l-3.85-3.85zm-5.242.656a5.5 
                        5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z"/>
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            {{-- END SEARCH ICON --}}
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
