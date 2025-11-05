<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Produk Toko Yz</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f8f9fa; /* Latar belakang bg-light yang konsisten */
            font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
        }

        /* Navbar dibuat sticky dan diberi shadow */
        .navbar {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        /* Kustomisasi Kartu Produk */
        .product-card {
            border: none; /* Hilangkan border standar */
            border-radius: 1rem; /* Sudut lebih bulat */
            transition: all 0.3s ease-in-out;
            background-color: #ffffff; /* Pastikan kartu putih */
            overflow: hidden; /* Agar gambar tidak "bocor" */
        }

        /* EFEK INTERAKTIF: Mengangkat kartu saat di-hover */
        .product-card:hover {
            transform: translateY(-10px); /* Angkat kartu */
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15); /* Bayangan lebih jelas */
        }

        .product-card .card-img-top {
            /* Pastikan gambar responsif dan terpotong rapi */
            height: 220px; 
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 1.5rem;
        }
        
        .product-card .card-title {
            font-weight: 600;
            font-size: 1.1rem;
            /* Trik agar tinggi title sama (mencegah tombol "lompat") */
            min-height: 3.4rem; 
        }

        /* Styling harga agar lebih menonjol */
        .product-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #212529; /* Warna dark */
            margin-bottom: 1rem;
        }

        /* Styling tombol beli */
        .btn-buy {
            border-radius: 0.5rem;
            font-weight: 600;
            padding: 0.6rem 1rem;
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
                <a href="{{ route('logout') }}" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-right me-1"></i>
                    Logout
                </a>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        
        <div class="row mb-5 text-center">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-light">Daftar Produk</h2>
                <p class="lead text-muted">Temukan dan beli item favorit Anda di bawah ini.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach($produk as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-11 mb-4">
                    
                    <div class="card product-card shadow-sm">
                        <img src="{{ asset($item['foto']) }}" class="card-img-top" alt="{{ $item['nama'] }}">
                        <div class="card-body text-center">
                            
                            <h5 class="card-title">{{ $item['nama'] }}</h5>
                            
                            <p class="product-price">{{ $item['harga'] }}</p>
                            
                            <a href="{{ route('produk.detail', $item['id']) }}" class="btn btn-dark btn-buy w-100">
                                <i class="bi bi-cart-plus me-1"></i>
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div> <footer class="container text-center text-muted mt-5 py-4 border-top">
        <small>&copy; 2025 Toko Yz. All Rights Reserved.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>