@extends('backend.index')
@section('content')

<div class="container mt-4">
    <h4>Detail Produk</h4>
    <hr>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control" value="{{ $produk->nama_produk }}">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
            <textarea readonly class="form-control" rows="4">{{ $produk->deskripsi }}</textarea>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control" value="Rp {{ number_format($produk->harga, 0, ',', '.') }}">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control" value="{{ $produk->kategori->nama_kategori ?? '-' }}">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control" value="{{ ucfirst($produk->status) }}">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label class="col-sm-2 col-form-label">Dibuat Oleh</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control" value="{{ $produk->user->name ?? '-' }}">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
            @if(!empty($produk->gambar))
                <img src="{{ asset('backend/dist/assets/images/keris/' . $produk->gambar) }}" width="200" class="img-thumbnail">
            @else
                <img src="{{ asset('backend/dist/img/info_obat/noimage.jpg') }}" width="200" class="img-thumbnail">
            @endif
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

@endsection
