<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #121212; }
        .card-custom { background-color: #1c1c1c; border: 1px solid #333; }
        .neon-text { 
            text-shadow: 0 0 5px rgba(255,255,255,0.7), 0 0 15px rgba(255,255,255,0.5); 
        }
        .btn-neon:hover { box-shadow: 0 0 10px rgba(255,255,255,0.5); transition: 0.3s; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-custom shadow-lg">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="mb-4 text-white fw-bold neon-text text-center"><i class="bi bi-journal-plus"></i> Tambah Buku</h4>
                        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label text-light">Judul Buku</label>
                                <input type="text" name="judul" class="form-control bg-dark border-secondary text-white" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-light">Kategori</label>
                                <select name="kategori" class="form-select bg-dark border-secondary text-white">
                                    <option value="Fiksi">Fiksi</option>
                                    <option value="Non-Fiksi">Non-Fiksi</option>
                                    <option value="Sains & Teknologi">Sains & Teknologi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-light">Nama Penulis</label>
                                <input type="text" name="penulis" class="form-control bg-dark border-secondary text-white" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label class="form-label text-light">Tahun</label>
                                    <input type="number" name="tahun" class="form-control bg-dark border-secondary text-white" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label text-light">Stok</label>
                                    <input type="number" name="stok" class="form-control bg-dark border-secondary text-white" required>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="form-label text-light">Gambar Sampul</label>
                                <input type="file" name="sampul" class="form-control bg-dark border-secondary text-white" accept="image/png, image/jpeg" required>
                                <div class="form-text text-secondary">Maksimal 2MB (.jpg/.png).</div>
                            </div>
                            
                            <div class="d-grid gap-3">
                                <button type="submit" class="btn btn-outline-light fw-bold btn-neon"><i class="bi bi-floppy"></i> Simpan Data</button>
                                <a href="dashboard.php" class="btn btn-link text-secondary text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>