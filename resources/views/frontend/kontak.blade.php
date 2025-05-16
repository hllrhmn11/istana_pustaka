@extends('frontend.index')

@section('content')
<style>
  .contact-content {
    max-width: 800px;
    margin: 40px auto;
    padding: 0 20px;
  }
  .contact-content h2 {
    text-align: center;
    font-weight: bold;
    margin-bottom: 20px;
  }
  .contact-info {
    margin-bottom: 30px;
  }
  .contact-info p {
    font-size: 1.1rem;
    line-height: 1.6;
  }
  .contact-form input,
  .contact-form textarea {
    margin-bottom: 15px;
  }
  .alert {
  padding: 15px;
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
  border-radius: 5px;
  margin-bottom: 20px;
}
</style>

<main class="contact-content">
  <h2>Hubungi Kami</h2>

  <div class="contact-info">
    <p><strong>Alamat:</strong> Jl. Keris No. 123, Sumenep, Madura</p>
    <p><strong>Telepon:</strong> 0821-1234-5678</p>
    <p><strong>Email:</strong>info@istanapusaka.com</p>
  </div>

  <div class="contact-form">
    @if (session('success'))
       <div class="alert alert-success">
          {{ session('success') }}
       </div>
    @endif
    <form action="{{ route('kontak.kirim') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="nama">Nama Anda</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <div class="form-group">
        <label for="email">Alamat Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="pesan">Pesan</label>
        <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-success">Kirim</button>
    </form>
  </div>
</main>
@endsection
