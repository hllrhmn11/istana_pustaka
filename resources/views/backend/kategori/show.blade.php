@extends('backend.index')

@section('content')
<div class="container mt-4">
    <h4>Detail User</h4>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Kategori:</label>
                <p>{{ $kategori->nama_kategori}}</p>
            </div>
            <div class="mb-3">
                <label><strong>Dibuat Pada</strong></label>
                <div class="form-control-plaintext">
                    {{ $kategori->created_at ? $kategori->created_at->format('d M Y H:i') : 'Tanggal tidak tersedia' }}
                </div>
            </div>
            <div class="mb-3">
                <label><strong>Terakhir Diubah</strong></label>
                <div class="form-control-plaintext">
                    {{ $kategori->updated_at ? $kategori->updated_at->format('d M Y H:i') : 'Tanggal tidak tersedia' }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection