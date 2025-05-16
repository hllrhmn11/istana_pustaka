@extends('frontend.index')

@section('content')
<br><br><br>
<style>
  body {
    background-color: #f5f5f5;
    color: #333;
  }
  .about-header {
    background-color: #ccc; /* abu-abu samar */
    padding: 60px 20px;
    text-align: center;
  }
  .about-header h1 {
    font-weight: 700;
    margin-bottom: 10px;
  }
  .about-content {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 20px;
  }
  .about-content p {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 20px;
  }
  .team-member {
    margin-top: 40px;
  }
  .team-member img {
    max-width: 150px;
    border-radius: 50%;
    margin-bottom: 15px;
  }
  .team-member h5 {
    font-weight: 600;
    margin-bottom: 5px;
  }
  .team-member p {
    font-style: italic;
    color: #666;
    font-size: 0.9rem;
  }
</style>

<header class="about-header">
  <h1>Tentang Kami</h1>
  <p>Istana Pusaka - Koleksi Keris Asli dan Warisan Budaya Sumenep</p>
</header>

<main class="about-content">
  <section>
    <h2>Visi Kami</h2>
    <p>
      Menjadi pusat koleksi keris asli dan barang pusaka yang terpercaya, 
      serta menjaga dan melestarikan budaya Madura melalui warisan leluhur.
    </p>
  </section>

  <section>
    <h2>Misi Kami</h2>
    <ul>
      <li>Menyediakan koleksi keris asli berkualitas tinggi dengan nilai budaya.</li>
      <li>Mengedukasi masyarakat tentang sejarah dan filosofi keris.</li>
      <li>Memberikan layanan terbaik dengan sentuhan klasik dan profesionalisme.</li>
    </ul>
  </section>

  <section>
    <h2>Sejarah Singkat</h2>
    <p>
      Istana Pusaka berdiri sejak tahun 2005 sebagai toko koleksi keris 
      asli di Sumenep. Kami berkomitmen menjaga keaslian dan kualitas setiap 
      produk dengan sentuhan budaya dan filosofi Madura yang kental.
    </p>
  </section>

  <section class="team-member text-center">
    <img src="{{ asset('frontend/images/yy.jpg') }}" alt="Foto Tim" />
    <h5>nama</h5>
    <p>Founder & Pengelola Istana Pusaka</p>
  </section>
</main>
@endsection
