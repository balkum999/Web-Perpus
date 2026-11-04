<?php
session_start();
if (isset($_COOKIE['perpus_user'])) {
    $_SESSION['username'] = $_COOKIE['perpus_user'];
}
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <title>Login - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #121212; }
        .card-login { background-color: #1c1c1c; border: 1px solid #333; }
        .neon-text { 
            color: #fff; 
            text-shadow: 0 0 5px rgba(255,255,255,0.7), 0 0 15px rgba(255,255,255,0.5); 
            font-weight: 800;
        }
        .btn-neon { transition: 0.3s; }
        .btn-neon:hover { box-shadow: 0 0 12px rgba(255,255,255,0.6); }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card card-login shadow-lg" style="width: 25rem;">
        <div class="card-body p-4">
            <h3 class="text-center neon-text mb-4"><i class="bi bi-journal-bookmark-fill text-primary"></i> E-Perpus</h3>
            <form action="proses_login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label text-light">Username</label>
                    <input type="text" name="username" class="form-control bg-dark border-secondary text-white" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-light">Password</label>
                    <input type="password" name="password" class="form-control bg-dark border-secondary text-white" required>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input border-secondary" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label text-secondary" for="remember">Ingat Saya</label>
                </div>
                <button type="submit" class="btn btn-outline-light w-100 fw-bold btn-neon"><i class="bi bi-box-arrow-in-right"></i> Masuk</button>
            </form>
        </div>
    </div>
</body>
</html>