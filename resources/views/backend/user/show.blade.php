@extends('backend.index')
@section('content')

<div class="container mt-4">
    <h4>Detail User</h4>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">

            <div class="mb-3">
                <label><strong>Nama</strong></label>
                <div class="form-control-plaintext">{{ $user->name }}</div>
            </div>

            <div class="mb-3">
                <label><strong>Email</strong></label>
                <div class="form-control-plaintext">{{ $user->email }}</div>
            </div>

            <div class="mb-3">
                <label><strong>Nomor WhatsApp</strong></label>
                <div class="form-control-plaintext">{{ $user->no_wa }}</div>
            </div>

            <div class="mb-3">
                <label><strong>Role</strong></label>
                <div class="form-control-plaintext text-capitalize">{{ $user->role }}</div>
            </div>

            <div class="mb-3">
                <label><strong>Dibuat Pada</strong></label>
                <div class="form-control-plaintext">
                    {{ $user->created_at ? $user->created_at->format('d M Y H:i') : 'Tanggal tidak tersedia' }}
                </div>
            </div>
            
            <div class="mb-3">
                <label><strong>Terakhir Diubah</strong></label>
                <div class="form-control-plaintext">
                    {{ $user->updated_at ? $user->updated_at->format('d M Y H:i') : 'Tanggal tidak tersedia' }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
