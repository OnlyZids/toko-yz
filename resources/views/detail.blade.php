<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk | Toko Yz</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* [CSS ANDA DARI SEBELUMNYA SAYA BIARKAN DI SINI, TIDAK BERUBAH] */
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
        }
        .navbar {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        .product-image-container {
            background-color: #ffffff;
            border-radius: 1.5rem;
            padding: 1rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        .product-image-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 1rem;
        }
        .product-details {
            padding-left: 2rem;
        }
        .product-title {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        .product-price {
            font-size: 2.25rem;
            font-weight: 300;
            color: #343a40;
            margin-bottom: 1.5rem;
        }
        .product-description {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #555;
        }
        .quantity-selector {
            display: flex;
            align-items: center;
            max-width: 150px;
        }
        .quantity-selector .btn {
            background-color: #e9ecef;
            border: none;
            font-weight: bold;
        }
        .quantity-selector .btn:hover {
            background-color: #dee2e6;
        }
        .quantity-selector .form-control {
            text-align: center;
            font-weight: 600;
            border-left: none;
            border-right: none;
        }
        .quantity-selector .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }
        .btn-buy {
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }
        .btn-buy:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(52, 58, 64, 0.3);
        }
        .btn-back {
            border-radius: 0.75rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('produk') }}">
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
        
        <div class="row mb-3">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('produk') }}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('produk') }}" class="text-decoration-none">Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $detail['nama'] }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-5"> 
            <div class="col-lg-6">
                <div class="product-image-container">
                    <img src="{{ asset($detail['foto']) }}" alt="{{ $detail['nama'] }}" class="img-fluid rounded">
                </div>
            </div>
            
            <div class="col-lg-6 product-details">
                
                <h2 class="product-title">{{ $detail['nama'] }}</h2>
                <h3 class="product-price">{{ $detail['harga'] }}</h3>
                <p class="product-description">{{ $detail['deskripsi'] }}</p>
                <hr class="my-4">
                
                <div class="mb-3">
                    <label for="quantityInput" class="form-label fw-bold">Jumlah</label>
                    <div class="input-group quantity-selector">
                        <button class="btn btn-outline-secondary" type="button" id="qty-minus">-</button>
                        <input type="text" class="form-control" value="1" id="quantityInput" readonly>
                        <button class="btn btn-outline-secondary" type="button" id="qty-plus">+</button>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex mt-4">
                    
                    <button class="btn btn-dark btn-buy btn-lg flex-grow-1" id="buyButton" data-bs-toggle="modal" data-bs-target="#transaksiModal">
                        <i class="bi bi-cart-check-fill me-2"></i>
                        Konfirmasi Pembelian
                    </button>
                    
                    <a href="{{ route('produk') }}" class="btn btn-outline-secondary btn-back btn-lg">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div> 

    <footer class="container text-center text-muted mt-5 py-4 border-top">
        <small>&copy; 2025 Toko Yz. All Rights Reserved.</small>
    </footer>

    
    <div class="modal fade" id="transaksiModal" tabindex="-1" aria-labelledby="transaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transaksiModalLabel">Status Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-4">
                    
                    <div id="loadingState">
                        <div class="spinner-border text-dark" role="status" style="width: 3rem; height: 3rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3 fw-bold">Memproses transaksi Anda...</p>
                    </div>
                    
                    <div id="successState" style="display: none;">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                        <h4 class="mt-3">Transaksi Berhasil!</h4>
                        <p id="successMessage"></p> </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="{{ route('produk') }}" class="btn btn-dark">Kembali ke Produk</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Script untuk Quantity Selector (Sudah ada)
        document.addEventListener('DOMContentLoaded', function() {
            const qtyPlus = document.getElementById('qty-plus');
            const qtyMinus = document.getElementById('qty-minus');
            const qtyInput = document.getElementById('quantityInput');

            qtyPlus.addEventListener('click', function() {
                let currentVal = parseInt(qtyInput.value);
                qtyInput.value = currentVal + 1;
            });

            qtyMinus.addEventListener('click', function() {
                let currentVal = parseInt(qtyInput.value);
                if (currentVal > 1) { 
                    qtyInput.value = currentVal - 1;
                }
            });


            // ### PERUBAHAN 3: SCRIPT SIMULASI TRANSAKSI BARU ###
            
            // Ambil elemen-elemen yang dibutuhkan
            const modalElement = document.getElementById('transaksiModal');
            const loadingState = document.getElementById('loadingState');
            const successState = document.getElementById('successState');
            const successMessage = document.getElementById('successMessage');
            
            // Dapatkan nama produk dari H2
            const productTitle = document.querySelector('.product-title').textContent; 

            // Dengarkan event 'show.bs.modal' (saat modal akan tampil)
            modalElement.addEventListener('show.bs.modal', function() {
                
                // 1. Ambil jumlah kuantitas terbaru
                let quantity = qtyInput.value;
                
                // 2. SELALU RESET: Tampilkan loading & sembunyikan sukses
                loadingState.style.display = 'block';
                successState.style.display = 'none';
                
                // 3. SIMULASI DELAY 2 DETIK (2000 ms)
                setTimeout(() => {
                    // 4. Setelah 2 detik, ganti tampilan
                    loadingState.style.display = 'none';
                    successState.style.display = 'block';
                    
                    // 5. Isi pesan suksesnya
                    successMessage.innerHTML = `Anda telah berhasil membeli <strong>${productTitle}</strong> (x<strong>${quantity}</strong>).`;
                }, 2000); 
            });

        });
    </script>
</body>
</html>