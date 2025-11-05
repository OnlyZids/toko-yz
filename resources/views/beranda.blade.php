<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | Sistem Penjualan Toko Yz</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #ffffff; /* Latar belakang putih bersih */
            font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; /* Font konsisten */
        }

        /* Navbar Sticky (Konsisten) */
        .navbar {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        /* Hero Section Styling */
        .hero-section {
            padding: 4rem 0;
        }
        
        .hero-section .display-4 {
            font-weight: 700;
        }
        
        .hero-section .lead {
            font-size: 1.25rem;
            color: #495057;
        }

        .btn-login-hero {
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .btn-login-hero:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(52, 58, 64, 0.3);
        }

        .hero-image-placeholder {
            font-size: 12rem;
            color: #e9ecef; /* Warna placeholder yang sangat terang */
        }
        
        /* Features Section */
        .features-section {
            background-color: #f8f9fa; /* Latar belakang abu-abu */
        }

        .feature-card {
            background-color: #ffffff;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }
        
        .feature-icon {
            font-size: 3rem;
            color: #343a40; /* Warna ikon dark */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('beranda') }}">
                <i class="bi bi-shop-window me-2"></i>
                <strong>Toko</strong> Yz
            </a>
            <div class="d-flex">
                <a href="{{ route('login') }}" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-in-right me-1"></i>
                    Login
                </a>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5 py-5">
                <div class="col-lg-7">
                    <h1 class="display-4 fw-bold lh-1 mb-4">
                        Sistem Penjualan Toko Yz
                    </h1>
                    <p class="lead mb-4">
                        Ini adalah portal admin untuk mengelola produk, melihat detail, dan memproses pembelian.
                        Silakan login untuk melanjutkan.
                    </p>
                    <div class="d-grid gap-2 d-md-flex">
                        <a href="{{ route('login') }}" class="btn btn-dark btn-lg btn-login-hero">
                            <i class="bi bi-box-arrow-in-right me-1"></i>
                            Login Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <i class="bi bi-shield-lock hero-image-placeholder"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section py-5 border-top">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-light">Fitur Utama Sistem</h2>
            </div>
            <div class="row g-4 justify-content-center">
                
                <div class="col-md-4">
                    <div class="card feature-card h-100 p-4">
                        <div class="card-body text-center">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <h5 class="fw-bold">Manajemen Produk</h5>
                            <p class="text-muted">Kelola daftar produk, foto, harga, dan deskripsi dengan mudah.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card feature-card h-100 p-4">
                        <div class="card-body text-center">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-cart-check"></i>
                            </div>
                            <h5 class="fw-bold">Proses Pembelian</h5>
                            <p class="text-muted">Konfirmasi dan proses pembelian yang masuk dari pengguna.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card feature-card h-100 p-4">
                        <div class_card-body text-center">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-person-lock"></i>
                            </div>
                            <h5 class="fw-bold">Akses Aman</h5>
                            <p class="text-muted">Sistem dilindungi otentikasi admin yang aman.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <footer class="container text-center text-muted mt-5 py-4 border-top">
        <small>&copy; 2025 Toko Yz. All Rights Reserved.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>