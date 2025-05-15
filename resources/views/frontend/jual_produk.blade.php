@extends('frontend.index')

@section('content')
<div class="container py-5">
  <h2 class="mb-4">Form Jual Produk</h2>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="nama_produk" class="form-label">Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="kategori_id" class="form-label">Kategori</label>
      <select name="kategori_id" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($kategori as $kat)
          <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <textarea name="deskripsi" rows="4" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="gambar" class="form-label">Gambar Produk</label>
      <input type="file" name="gambar" class="form-control" accept="image/*" required>
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select name="status" class="form-control" required>
        <option value="Tersedia">Tersedia</option>
        <option value="Terjual">Terjual</option>
      </select>
    </div>

    {{-- Hidden field user_id dan no_wa tidak perlu diisi manual karena akan otomatis oleh controller --}}
    
    <button type="submit" class="btn btn-primary">Kirim Produk</button>
  </form>
</div>
@endsection
