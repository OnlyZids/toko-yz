<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Toko Yz</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Mengatur background dengan gradient dan layout flex untuk center */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #ece9e6, #ffffff);
            font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
        }

        /* Kartu login utama */
        .login-card {
            border: none;
            border-radius: 1.5rem; /* Lebih bulat */
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Penting agar border-radius berfungsi */
            animation: fadeIn 0.8s ease-out; /* Animasi fade-in */
        }

        /* Animasi fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header kustom di dalam card-body */
        .login-header {
            background-color: #343a40; /* bg-dark */
            color: white;
            padding: 2rem;
            border-top-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
            margin: -1.5rem -1.5rem 1.5rem -1.5rem; /* Trik untuk "menempel" ke atas */
            text-align: center;
        }
        
        .login-header h2 {
            margin-bottom: 0;
            font-weight: 300; /* Font lebih tipis */
        }
        
        .login-header i {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Kustomisasi input group */
        .input-group-text {
            background-color: #f8f9fa; /* Latar belakang ikon */
            border-right: none;
            border-top-left-radius: 0.75rem; /* Samakan radius */
            border-bottom-left-radius: 0.75rem;
        }

        .form-control {
            height: 3rem; /* Input lebih tinggi */
            border-left: none;
            border-top-right-radius: 0.75rem;
            border-bottom-right-radius: 0.75rem;
        }

        /* Efek focus yang lebih modern */
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(52, 58, 64, 0.2); /* Shadow warna dark */
            border-color: #ced4da;
        }

        /* Tombol login */
        .btn-dark {
            padding: 0.75rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease; /* Transisi hover */
        }
        
        .btn-dark:hover {
            transform: translateY(-2px); /* Efek "mengambang" */
            box-shadow: 0 4px 15px rgba(52, 58, 64, 0.3);
        }

        /* Tombol show/hide password */
        #togglePassword {
            cursor: pointer;
            border-left: none;
            background-color: #f8f9fa;
            border-top-right-radius: 0.75rem;
            border-bottom-right-radius: 0.75rem;
        }
        
        /* Area hint/petunjuk */
        .hint-footer {
            background-color: #f8f9fa;
            padding: 1rem 1.5rem;
            margin: 1.5rem -1.5rem -1.5rem -1.5rem; /* Trik untuk "menempel" ke bawah */
            border-bottom-left-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
            text-align: center;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 col-11">
                <div class="card login-card shadow-lg"> 
                    <div class="card-body p-4"> <div class="text-center mb-4">
                            <i class="bi bi-shop-window" style="font-size: 3rem; color: #343a40;"></i>
                            <h2 class="h4 fw-light mt-2">Selamat Datang di <strong class="fw-bold">Toko Yz</strong></h2>
                            <p class="text-muted">Silakan login untuk melanjutkan</p>
                        </div>
                        
                        @if(session('error'))
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <div>
                                    {{ session('error') }}
                                </div>
                            </div>
                        @endif
    
                        <form action="{{ route('login.process') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Password" required>
                                <span class="input-group-text" id="togglePassword">
                                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                </span>
                            </div>
                            
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark">Login <i class="bi bi-box-arrow-in-right ms-1"></i></button>
                            </div>
                        </form>
                        
                        <hr class="my-4">

                        <div class="text-center">
                             <small class="text-muted">Gunakan username: <b>admin</b> & password: <b>12345</b></small>
                        </div>

                    </div> 
                </div> 
            </div> 
        </div> 
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('passwordInput');
            const toggleIcon = document.getElementById('toggleIcon');

            toggleButton.addEventListener('click', function() {
                // Toggle tipe input
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Toggle ikon
                if (type === 'password') {
                    toggleIcon.classList.remove('bi-eye');
                    toggleIcon.classList.add('bi-eye-slash');
                } else {
                    toggleIcon.classList.remove('bi-eye-slash');
                    toggleIcon.classList.add('bi-eye');
                }
            });
        });
    </script>
</body>
</html>