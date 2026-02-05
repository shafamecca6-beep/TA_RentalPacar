<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Rental Pacar</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<nav class="navbar">
  <div class="logo">RentalPacar.id</div>
  <ul class="nav-menu">
    <li class="dropdown">
      <a href="#" class="dropbtn">Menu</a>
      <div class="dropdown-content">
        <a href="#hero">Home</a>
        <a href="#features">Katalog</a>
        <a href="#tentang">Tentang Kami</a>
        <a href="#aturan">Aturan</a>
        <a href="#kontak">Hubungi Kami</a>
      </div>
    </li>
    <li><a href="{{ route('login') }}">Login</a></li>
  </ul>
</nav>

<body>
    @if(session('success'))
    <div id="success-notification" style="background-color: #d4edda; color: #155724; padding: 15px; margin: 20px auto; width: 80%; border: 1px solid #c3e6cb; border-radius: 5px; text-align: center; font-weight: bold;">
        {{ session('success') }}
    </div>
    @endif

    <header id="hero">
        <div class="hero-content">
            <h1 id="typing-text"></h1>
            <h3>Kami hadir dengan jasa rental pacar profesional, sopan, dan terpercaya. Cocok untuk teman nongkrong, pendamping acara, atau sekadar ngobrol agar hari kamu lebih berwarna.</h3>
            <button id="cta-button">Pilih Pasanganmu</button>
        </div>
        <div class="hero-bg"></div>
    </header>

    <section id="features">
        <h2>Silahkan Dipilih</h2>
        <div class="features-container">
            <div class="feature-card">
              <a href="{{ route('jule') }}" target="_blank" class="card-link" style="text-decoration: none">
                <img src="https://i.pinimg.com/736x/93/fe/73/93fe73024d5a05b683b18af71456f05f.jpg" alt="female" style="width: 70%";>
            <h3>Jule</h3>
            <p>Harga: Rp 100.000 / Hari</p>
            <p>Ayo ngedate bareng aku.</p>
              </a>
            </div>
            <div class="feature-card">
                <a href="{{ route('lucinta') }}" target="_blank" class="card-link" style="text-decoration: none">
                <img src="https://i.pinimg.com/736x/74/5e/2d/745e2d56039c63d9d18f910122d44675.jpg" alt="female" style="width: 100%";>
            <h3>Lucinta Luna</h3>
            <p>Harga: Rp 600.000 / Hari</p>
            <p>Ayo rasakan pengalaman yang indah bersamaku.</p>
            </div>
            <div class="feature-card">
                <a href="{{ route('cecep') }}" target="_blank" class="card-link" style="text-decoration: none">
                <img src="https://i.pinimg.com/736x/3d/b8/dd/3db8dd9e5a160214f63dbf7f44084d8c.jpg" alt="male" style="width: 70%";>
            <h3>Cecep Alexander</h3>
            <p>Harga: Rp 600.000 / Hari</p>
            <p>Ayo jalan-jalan barengku.</p>
            </div>
        </div>
    </section>
    
    <section id="tentang" class="section">
  <h2>Tentang Kami</h2>
  <p>
    RentalPacar.id adalah platform jasa rental pacar profesional untuk kebutuhan
    teman nongkrong, pendamping acara, atau sekadar ngobrol biar ga sendirian.
    Aman, sopan, dan nyaman.
  </p>
   </section>

    <section id="aturan" class="section">
        <div class="aturan-card">
            <h2>Aturan</h2>
            <p>1. Batasan Fisik: Dilarang melakukan kontak fisik berlebihan dan dilarang keras melakukan tindakan asusila.</p>
            <p>2. Jangan menanyakan data pribadi: Dilarang membuntuti (Stalking) talent, Komunikasi hanya via Admin nomor telepon yang tertera pada website.</p>
            <P>3. Lokasi dan Keamanan: Pertemuan harus dilakukan di tempat umum (kafe, mal, taman, bioskop). Dilarang masuk ke ruang privat seperti membawa talent ke rumah pribadi, kosan, apartemen, atau kamar hotel. Beberapa agensi melarang klien membawa talent menggunakan kendaraan pribadi; disarankan menggunakan transportasi umum atau taksi online demi keamanan.</P>
            <P>4. Ketentuan Biaya: Biaya sewa biasanya hanya untuk "waktu" mereka. Biaya makan, tiket masuk wisata, atau transportasi talent selama kencan sepenuhnya ditanggung oleh klien.</P>
            <P>5. Etika dan Perilaku: Dilarang merendahkan: Perlakukan talent dengan sopan dan hormat. Dilarang memaksa yang membuat talent tidak nyaman.</P>
        </div>
    </section>

    <section id="kontak" class="section">
  <h2>Hubungi Kami</h2>
     <p>📧 Email: rentalpacar@gmail.com</p>
     <p>📱 WhatsApp: 0862886389283</p>
     <p>📍 Instagram: RentalPacar.id</p>
    </section>
  
    <script src="{{ asset('js/rental.js') }}"></script>
    
    </div>
</body>
</html>