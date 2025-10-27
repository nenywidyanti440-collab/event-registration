<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Event Kota Bukittinggi</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    body, html {
      margin: 0; padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      scroll-behavior: smooth;
      background-color: #f8fafc;
    }

    /* Navbar */
    .navbar {
      transition: background-color 0.4s ease, padding 0.3s ease;
      padding: 15px 0;
    }
    .navbar .nav-link { font-weight: 500; color: #fff; }
    .navbar .nav-link:hover { color: #ffc107; }
    .navbar .navbar-brand { color: #fff; }
    .navbar.scrolled {
      background-color: rgba(255,255,255,.95) !important;
      padding: 10px 0;
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }
    .navbar.scrolled .nav-link { color: #212529; }
    .navbar.scrolled .nav-link:hover { color: #ffc107; }
    .navbar.scrolled .navbar-brand { color: #212529; }

    /* Hero Section */
    .hero {
      height: 100vh;
      background: url('{{ asset("images/jamgadang.jpg") }}') no-repeat center center;
      background-size: cover;
      position: relative;
      display: flex; align-items: center; justify-content: center;
      text-align: center; color: #fff;
    }

    .overlay {
      position: absolute; inset: 0;
      background: linear-gradient(180deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.25) 60%, rgba(0,0,0,0.45) 100%);
      backdrop-filter: blur(1px);
    }

    .hero-content {
      position: relative; z-index: 2;
      max-width: 900px; padding: 28px 32px;
      background: rgba(0, 0, 0, 0.25);
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.25);
    }

    .hero h1 {
      font-size: clamp(1.8rem, 3.5vw + 0.9rem, 3.6rem);
      font-weight: 800;
      color: #fff;
      text-shadow: 0 4px 14px rgba(0,0,0,0.7);
    }

    .hero p {
      font-size: 1.1rem;
      margin: 14px 0 22px;
      color: #f8f8f8;
      text-shadow: 0 2px 8px rgba(0,0,0,0.7);
    }

    .btn-hero-primary {
      background: #ffc107; color: #212529;
      padding: 12px 28px; border-radius: 999px;
      font-weight: 700; text-decoration: none;
      margin: 6px; display: inline-block;
      transition: all 0.2s ease;
      box-shadow: 0 6px 16px rgba(0,0,0,.18);
      border: none;
    }
    .btn-hero-primary:hover {
      background: #e0a800; color: #fff; transform: translateY(-2px);
    }

    section { padding: 80px 0; }
    section h2 {
      font-weight: 700; margin-bottom: 40px;
      text-transform: uppercase; letter-spacing: 1px;
      position: relative; display: inline-block;
    }
    section h2::after {
      content: ''; display: block; width: 60%; height: 3px;
      background: #ffc107; margin: 12px auto 0; border-radius: 2px;
    }

    /* Tentang Platform */
    #event-info .info-box {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      padding: 32px 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
    }
    #event-info .info-box:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    #event-info i {
      font-size: 2.5rem;
      color: #ffc107;
      margin-bottom: 15px;
    }
    #event-info h4 {
      font-weight: 700;
      color: #212529;
      margin-bottom: 10px;
    }
    #event-info p {
      color: #555;
      font-size: 0.95rem;
    }

    .gallery img { border-radius: 10px; transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .gallery img:hover { transform: scale(1.07); box-shadow: 0px 8px 18px rgba(0,0,0,0.3); }

    footer {
      background: linear-gradient(135deg, #2b2f36, #1c1f24);
      color: #eaeaea;
    }
    footer h5 { color: #fff; font-weight: bold; margin-bottom: 18px; }
    footer a { color: #ffc107; text-decoration: none; transition: color 0.3s ease; }
    footer a:hover { color: #ffffff; }

    .highlight-yellow { color: #ffc107; font-weight: 600; text-shadow: 0 1px 4px rgba(0,0,0,0.8); }
    .social-icons a { font-size: 1.3rem; margin: 0 10px; color: #eaeaea; transition: all 0.3s ease; }
    .social-icons a:hover { color: #ffc107; transform: translateY(-2px); }

    .fade-in { opacity: 0; transform: translateY(30px); transition: opacity 1s ease, transform 1s ease; }
    .fade-in.visible { opacity: 1; transform: translateY(0); }
  </style>
</head>

<body>
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="#home">
        <img src="{{ asset('images/Bukititnggi.jpg') }}" alt="Bukittinggi" style="width:28px;height:28px;object-fit:cover;border-radius:4px;margin-right:8px;">
        <span>Bukittinggi Event</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#event">Event</a></li>
          <li class="nav-item"><a class="nav-link" href="#event-info">Tentang Platform</a></li>
          <li class="nav-item"><a class="nav-link" href="#gallery">Galeri</a></li>
          <li class="nav-item ms-3">
            @auth
              <div class="dropdown">
                <button class="btn btn-warning btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                  {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li class="dropdown-item-text">
                    <strong>{{ Auth::user()->name }}</strong><br>
                    <small class="text-muted">{{ Auth::user()->email }}</small>
                  </li>
                  @if(method_exists(Auth::user(), 'isAdmin') && Auth::user()->isAdmin())
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('admin.events.index') }}">Admin Panel</a></li>
                  @endif
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                  </li>
                </ul>
              </div>
            @else
              <a href="{{ route('login') }}" class="btn btn-warning btn-sm me-2">Login</a>
              <a href="{{ route('register') }}" class="btn btn-outline-warning btn-sm">Daftar</a>
            @endauth
          </li>
        </ul>
      </div>
    </div>
  </nav>

  {{-- Hero --}}
  <section id="home" class="hero">
    <div class="overlay"></div>
    <div class="hero-content fade-in">
      <h1>Selamat Datang di Web Event Kota Bukittinggi</h1>
      <p>Temukan event, promosikan budaya, dan daftar dengan mudah secara online!</p>
      <a href="{{ route('events.index') }}" class="btn-hero-primary">Lihat Event</a>
      <a href="{{ route('events.create') }}" class="btn-hero-primary">Daftar Event Baru</a>
    </div>
  </section>

  {{-- Tentang Platform --}}
  <section id="event-info" class="py-5 bg-light fade-in">
    <div class="container text-center">
      <h2 class="mb-4">Tentang Platform Bukittinggi Event</h2>
      <p class="text-secondary mb-5">Aplikasi ini mempermudah masyarakat untuk menemukan, mendaftar, dan mengikuti kegiatan resmi Kota Bukittinggi secara digital.</p>

      <div class="row g-4 justify-content-center">
        <div class="col-md-3 col-6">
          <div class="info-box">
            <i class="bi bi-mouse"></i>
            <h4>Mudah Digunakan</h4>
            <p>Daftar event cukup lewat HP atau komputer tanpa perlu datang langsung.</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="info-box">
            <i class="bi bi-calendar2-week"></i>
            <h4>Jadwal Terintegrasi</h4>
            <p>Semua event kota bisa dilihat dan diakses melalui satu sistem.</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="info-box">
            <i class="bi bi-broadcast"></i>
            <h4>Informasi Terbaru</h4>
            <p>Update jadwal dan pengumuman event resmi setiap saat.</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="info-box">
            <i class="bi bi-building-check"></i>
            <h4>Resmi & Aman</h4>
            <p>Data event dikelola langsung oleh Pemerintah Kota Bukittinggi.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Event List --}}
  <section id="event" class="event-list-section py-5">
    <div class="container">
      <h2 class="text-center mb-4">Daftar Event</h2>
      <div class="card p-4 shadow-lg">
        <h5>Contoh Event</h5>
        <div class="event-item mt-4">
          <h4>Festival Budaya Bukittinggi</h4>
          <p>Nikmati pertunjukan seni, kuliner, dan tradisi lokal yang penuh warna.</p>
          <a href="#" class="btn btn-warning btn-sm">Lihat Detail</a>
        </div>
      </div>
    </div>
  </section>

  {{-- Gallery --}}
  <section id="gallery" class="bg-light fade-in">
    <div class="container text-center">
      <h2>Galeri Event</h2>
      <div class="row gallery justify-content-center">
        <img src="{{ asset('images/gallery1.jpg') }}" class="img-fluid rounded shadow m-2" style="max-width: 300px;">
        <img src="{{ asset('images/gallery2.jpg') }}" class="img-fluid rounded shadow m-2" style="max-width: 300px;">
        <img src="{{ asset('images/gallery3.jpg') }}" class="img-fluid rounded shadow m-2" style="max-width: 300px;">
      </div>
    </div>
  </section>

  {{-- Footer --}}
  <footer class="pt-5 pb-3 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-5">
          <div class="d-flex align-items-center mb-3">
            <img src="{{ asset('images/Bukititnggi.jpg') }}" style="width:56px;height:56px;border-radius:6px;margin-right:12px;">
            <div>
              <h5 class="mb-0">Bukittinggi Event</h5>
              <small class="text-muted">Platform registrasi & informasi event kota</small>
            </div>
          </div>
          <p>Temukan event terbaru, lihat detail acara, dan daftar secara online dengan mudah.</p>
        </div>

        <div class="col-md-4 mb-5">
          <h5>Tautan Cepat</h5>
          <ul class="list-unstyled">
            <li><a href="{{ route('events.create') }}">Tambah Event Baru</a></li>
            <li><a href="#event-info">Tentang Platform</a></li>
            <li><a href="#">Kebijakan & Syarat</a></li>
          </ul>
        </div>

        <div class="col-md-4 mb-5">
          <h5>Kontak</h5>
          <p>Jl. Raya Bukittinggi No.123, Bukittinggi, Sumatera Barat</p>
          <p><a href="mailto:eventbukittinggi@pemkot.go.id">eventbukittinggi@pemkot.go.id</a></p>
          <p>(0752) 33369</p>
        </div>
      </div>
      <hr class="border-light">
      <div class="text-center social-icons">
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-youtube"></i></a>
      </div>
      <div class="text-center mt-3">
        <p class="highlight-yellow mb-0">&copy; 2025 Bukittinggi Event. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Navbar Scroll Effect
    window.addEventListener("scroll", function() {
      const navbar = document.querySelector(".navbar");
      navbar.classList.toggle("scrolled", window.scrollY > 50);
    });

    // Fade-in Animation
    const faders = document.querySelectorAll('.fade-in');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('visible');
      });
    }, { threshold: 0.15 });
    faders.forEach(f => observer.observe(f));
  </script>
</body>
</html>
