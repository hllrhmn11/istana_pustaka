@extends('backend.index')
@section('content')

<style>
    html, body {
        height: 100%;
        margin: 0;
    }
</style>

<div class="min-vh-100 d-flex flex-column">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Produk Keris</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Produk</li>
                    </ol><br/>
            <a href="{{ route('produk.create')}}" class="btn btn-primary btn-sm" title="Tambah Data">
              <i class="bi bi-clipboard-plus"></i>Tambah
            </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content flex-grow-1">
        <div class="container-fluid">
            @if($produk->isEmpty())
                <div class="alert alert-warning">
                    Belum ada produk yang tersedia.
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    {{-- <th>Deskripsi</th> --}}
                                    <th>Harga</th>
                                    <th>Status</th>
                                    {{-- <th>No WhatsApp</th> --}}
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($produk as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    {{-- <td>{{ $item->deskripsi }}</td> --}}
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td><strong>{{ $item->status }}</strong></td>
                                    {{-- <td>{{ $item->user->no_wa }}</td> --}}
                                    <td>
                                        @if(!empty($item->gambar))
                                            <img src="{{ asset('backend/dist/assets/images/keris/' . $item->gambar) }}" width="100" onerror="this.src='{{ asset('backend/dist/img/info_obat/noimage.jpg') }}'">
                                        @else
                                            <img src="{{ asset('backend/dist/img/info_obat/noimage.jpg') }}" width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('produk.show', $item->id) }}" class="btn btn-info btn-sm" title="Lihat Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit Produk">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')" title="Hapus Produk">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </section>

</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
