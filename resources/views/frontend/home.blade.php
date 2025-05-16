@extends('frontend.index')
@section('content')

<!-- Hero Banner -->
<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
  <div class="swiper main-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="banner-content">
                <h1 class="display-4 fw-bold text-dark pb-4">Produk Berkualitas Tinggi.</h1>
                <a href="shop.html" class="btn btn-dark btn-lg rounded-pill">Shop Product</a>
              </div>
            </div>
              <div class="col-md-6 d-flex justify-content-center align-items-center" style="height: 100%;">
                <img src="{{ asset('frontend/images/banner-image.png') }}" alt="banner" class="img-fluid">
              </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="container" style="height: 100vh; display: flex; align-items: center;">
          <div class="row" style="width: 100%;">
            <div class="col-md-6 d-flex flex-column justify-content-center">
              <div class="banner-content">
                <h1 class="display-4 fw-bold text-dark pb-4">Tersedia Produk Terbaik.</h1>
                <a href="shop.html" class="btn btn-dark btn-lg rounded-pill">Shop Product</a>
              </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
              <img src="{{ asset('frontend/images/banner.png') }}" alt="banner" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Swiper Arrows -->
    <div class="swiper-icon swiper-arrow swiper-arrow-prev">
      <svg class="chevron-left"><use xlink:href="#chevron-left" /></svg>
    </div>
    <div class="swiper-icon swiper-arrow swiper-arrow-next">
      <svg class="chevron-right"><use xlink:href="#chevron-right" /></svg>
    </div>
  </div>
</section>
<section id="profil-istana-pusaka" class="padding-large bg-light text-dark">
  <div class="container">
    <div class="row mb-5 text-center">
      <div class="col-12">
        <h2 class="display-5 fw-bold">Selamat Datang di <span class="text-primary">Istana Pusaka</span></h2>
        <p class="lead">Website e-commerce terpercaya yang menyediakan berbagai jenis <strong>keris asli Sumenep</strong> berkualitas tinggi.</p>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="mb-3">
              <i class="fas fa-star fa-2x text-primary"></i>
            </div>
            <h5 class="card-title fw-bold">Produk Berkualitas Tinggi</h5>
            <p class="card-text">Setiap keris dibuat dengan ketelitian dan bahan terbaik oleh empu keris profesional dari Sumenep.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="mb-3">
              <i class="fas fa-certificate fa-2x text-primary"></i>
            </div>
            <h5 class="card-title fw-bold">Autentik & Bersertifikat</h5>
            <p class="card-text">Setiap keris memiliki sertifikat keaslian sebagai bukti pusaka warisan budaya asli.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="mb-3">
              <i class="fas fa-gem fa-2x text-primary"></i>
            </div>
            <h5 class="card-title fw-bold">Koleksi Eksklusif</h5>
            <p class="card-text">Tersedia berbagai jenis keris langka dan unik yang hanya ada di Istana Pusaka.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="mb-3">
              <i class="fab fa-whatsapp fa-2x text-success"></i>
            </div>
            <h5 class="card-title fw-bold">Pembelian Langsung via WhatsApp</h5>
            <p class="card-text">Klik tombol beli dan langsung terhubung ke WhatsApp admin kami untuk pemesanan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Produk Keris Kategori 1 -->
<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="h4 text-dark text-uppercase m-0">Produk Keris Kategori Lurus</h2>
      <a href="{{ route('shop.index', 1) }}" class="btn btn-outline-dark btn-sm text-uppercase">Lihat Semua</a>
    </div>
    <div class="swiper product-swiper">
      <div class="swiper-wrapper">
        @foreach ($produkKeris as $produk)
        <div class="swiper-slide">
          <div class="card h-100 shadow-sm border-0">
            <img src="{{ asset('backend/dist/assets/images/keris/' . $produk->gambar) }}" class="card-img-top object-fit-cover" style="height: 250px; object-fit: cover;" alt="{{ $produk->nama_produk }}">
            <div class="card-body d-flex flex-column justify-content-between">
              <h5 class="card-title text-uppercase">
                <a href="#" class="text-decoration-none text-dark">{{ $produk->nama_produk }}</a>
              </h5>
              <span class="text-primary fw-bold mt-auto">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination mt-3"></div>
    </div>
  </div>
</section>
<!-- Produk Keris Kategori 2 -->
<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="h4 text-dark text-uppercase m-0">Produk Keris Kategori LUK</h2>
      <a href="{{ route('shop.index', 2) }}" class="btn btn-outline-dark btn-sm text-uppercase">Lihat Semua</a>
    </div>
    <div class="swiper product-swiper">
      <div class="swiper-wrapper">
        @foreach ($produkKerisLain as $produk)
        <div class="swiper-slide">
          <div class="card h-100 shadow-sm border-0">
            <img src="{{ asset('backend/dist/assets/images/keris/' . $produk->gambar) }}" class="card-img-top object-fit-cover" style="height: 250px; object-fit: cover;" alt="{{ $produk->nama_produk }}">
            <div class="card-body d-flex flex-column justify-content-between">
              <h5 class="card-title text-uppercase">
                <a href="#" class="text-decoration-none text-dark">{{ $produk->nama_produk }}</a>
              </h5>
              <span class="text-primary fw-bold mt-auto">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination mt-3"></div>
    </div>
  </div>
</section>

<!-- Swiper CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Swiper Init -->
<script>
  const swipers = document.querySelectorAll('.product-swiper');
  swipers.forEach(swiperEl => {
    new Swiper(swiperEl, {
      slidesPerView: 3,
      spaceBetween: 24,
      pagination: {
        el: swiperEl.querySelector('.swiper-pagination'),
        clickable: true,
      },
      breakpoints: {
        640: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 }
      }
    });
  });
</script>
<script>
#billboard .container, 
#billboard .row {
  height: 100vh; /* penuh tinggi viewport, bisa disesuaikan */
  display: flex;
  align-items: center; /* center vertikal */
}
</script>

@endsection
