@extends('backend.index')

@section('content')
<div class="container">
  <h4>Hasil pencarian untuk: "{{ $query }}"</h4>

  <hr>
  <h5>Produk</h5>
  @if($produk->isEmpty())
    <p>Tidak ada produk ditemukan.</p>
  @else
    <ul>
      @foreach($produk as $p)
        <li>{{ $p->nama_produk }}</li>
      @endforeach
    </ul>
  @endif

  <hr>
  <h5>User</h5>
  @if($user->isEmpty())
    <p>Tidak ada user ditemukan.</p>
  @else
    <ul>
      @foreach($user as $u)
        <li>{{ $u->name }} ({{ $u->email }})</li>
      @endforeach
    </ul>
  @endif

  <hr>
  <h5>Kategori</h5>
  @if($kategori->isEmpty())
    <p>Tidak ada kategori ditemukan.</p>
  @else
    <ul>
      @foreach($kategori as $k)
        <li>{{ $k->nama_kategori }}</li>
      @endforeach
    </ul>
  @endif
</div>
@endsection
