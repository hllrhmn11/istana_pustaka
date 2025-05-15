@extends('backend.index')
@section('content')

<!-- CSS agar halaman penuh dan rapi -->
<style>
    html, body {
        height: 100%;
        margin: 0;
    }
</style>

<div class="min-vh-100 d-flex flex-column">

    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data User</li>
                    </ol><br/>
            <a href="{{ route('user.create')}}" class="btn btn-primary btn-sm" title="Tambah Data">
              <i class="bi bi-clipboard-plus"></i>Tambah
            </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Utama -->
    <section class="content flex-grow-1">
        <div class="container-fluid">
            @if($users->isEmpty())
                <div class="alert alert-warning">
                    Belum ada user yang terdaftar.
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No WhatsApp</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->no_wa ?? '-' }}</td>
                                    <td><strong>{{ $user->role }}</strong></td>
                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('user.show', $user->id) }}" title="Detail User">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus user ini?')">
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
