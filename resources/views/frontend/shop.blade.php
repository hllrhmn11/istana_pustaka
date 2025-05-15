@extends('frontend.index')

@section('content')
<style>
  .product-card {
    border: 1px solid #ddd;
    padding: 15px;
    box-sizing: border-box;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  .image-holder {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    height: 250px;
  }

  .image-holder img {
    max-height: 100%;
    width: auto;
  }

  .card-detail {
    flex: 1;
    display: flex;
    flex-direction: column;
    margin-top: 15px;
  }

  .card-title {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-bottom: 5px;
  }

  .item-price {
    font-weight: 600;
    white-space: nowrap;
    margin-bottom: 10px;
  }

  .product-description {
    font-size: 14px;
    color: #333;
    margin-bottom: 15px;
  }

  .product-description h4 {
    margin-bottom: 5px;
    font-size: 15px;
    font-weight: 600;
  }

  .whatsapp-contact {
    margin-top: auto;
  }

  .whatsapp-contact a {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background-color: #25D366;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    font-weight: 600;
    text-decoration: none;
    font-size: 14px;
  }

  .whatsapp-contact a svg {
    width: 18px;
    height: 18px;
    fill: white;
  }
</style>

<section class="product-store position-relative padding-large">
  <div class="container">
    <div class="row">
      <div class="display-header d-flex justify-content-between align-items-center pb-3">
        <h2 class="display-7 text-dark text-uppercase m-0">Semua Produk</h2>
          <a href="{{ url('/jual-produk') }}" style="padding: 8px 16px; background-color: #007bff; color: white; border-radius: 4px; text-decoration: none;">
            Upload Produk
          </a>
      </div>
      <div class="row">
        @forelse ($semuaProduk as $produk)
          <div class="col-md-4 mb-4 d-flex">
            <div class="product-card position-relative w-100">
              <div class="image-holder">
                <img src="{{ asset('backend/dist/assets/images/keris/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}">
              </div>

              <div class="card-detail pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#" class="text-decoration-none text-dark">{{ $produk->nama_produk }}</a>
                </h3>

                <span class="item-price text-primary">
                  Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </span>

                @if($produk->deskripsi)
                  <div class="product-description">
                    <h4>Deskripsi produk:</h4>
                    <p>{{ $produk->deskripsi }}</p>
                  </div>
                @endif

                @if($produk->user && $produk->user->no_wa)
                  <div class="whatsapp-contact">
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $produk->user->no_wa) }}" target="_blank" rel="noopener noreferrer" aria-label="Hubungi via WhatsApp">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20.52 3.48A11.81 11.81 0 0 0 12.1.07a11.83 11.83 0 0 0-8.42 20.27l-1.68 5.06 5.18-1.62A11.79 11.79 0 1 0 20.52 3.48Zm-8.16 17a8.38 8.38 0 0 1-4.27-1.2l-.3-.18-3.08.96 1.04-3.03-.19-.31a8.37 8.37 0 1 1 6.8 3.76Zm4.88-5.2c-.27-.14-1.59-.79-1.84-.88-.25-.09-.44-.14-.63.14s-.72.88-.88 1.06-.32.21-.6.07a5.58 5.58 0 0 1-1.64-1.01c-.3-.27-.56-.6-.79-.93-.07-.12 0-.22.06-.31.07-.07.16-.19.24-.28.08-.1.11-.18.17-.3.06-.12.03-.22 0-.31-.03-.09-.63-1.52-.87-2.08-.23-.54-.46-.47-.63-.48h-.54a1.16 1.16 0 0 0-.84.39 3.58 3.58 0 0 0-1.15 2.79c0 1.04.86 2.05.98 2.19s1.7 2.59 4.12 3.62a15.06 15.06 0 0 0 1.81.58c.76.15 1.46.13 2.01.08a3.23 3.23 0 0 0 2.37-1.58 3.31 3.31 0 0 0-.59-3.03 2.07 2.07 0 0 0-.78-.66Z"/>
                      </svg>
                      Hubungi via WhatsApp
                    </a>
                  </div>
                @endif
              </div>
            </div>
          </div>
        @empty
          <p class="text-muted">Tidak ada produk ditemukan.</p>
        @endforelse
      </div>
    </div>
  </div>
</section>
@endsection
