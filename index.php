<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://4kwallpapers.com/images/walls/thumbs_3t/10724.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.8); /* Transparansi di card */
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }
        .login-header {
            background-color: #6B73FF;
            border-radius: 15px 15px 0 0;
            padding: 15px;
            text-align: center;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }
        .login-header i {
            font-size: 35px;
        }
        .form-control {
            border: 2px solid #6B73FF;
        }
        .btn-primary {
            background-color: #6B73FF;
            border-color: #6B73FF;
        }
        .btn-primary:hover {
            background-color: #5b64e0;
            border-color: #5b64e0;
        }
        .text-center small {
            color: #aaa;
        }
        .social-icons {
            margin-top: 20px;
            text-align: center;
        }
        .social-icons i {
            font-size: 25px;
            margin: 0 15px;
            color: #6B73FF;
            transition: color 0.3s;
        }
        .social-icons i:hover {
            color: #000DFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="login-container">
                    <div class="login-header">
                        <i class="fas fa-user-circle"></i>
                        <h3 class="mt-2">Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger">Username atau password salah!</div>
                        <?php endif; ?>
                        <form action="validasi.php" method="post">
                            <div class="form-group mb-4">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                        <div class="social-icons">
                            <p class="mt-3 mb-1">Hubungkan </p>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-google"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="card-footer text-center text-muted">
                        <small> 💝Sistem Informasi Buku Tamu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
