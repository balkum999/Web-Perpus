<?php
session_start();
include 'config/koneksi.php';
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #121212; }
        .card-custom { background-color: #1c1c1c; border: 1px solid #333; }
        .neon-text { text-shadow: 0 0 5px rgba(255,255,255,0.7), 0 0 15px rgba(255,255,255,0.5); }
        .btn-neon:hover { box-shadow: 0 0 10px rgba(255,255,255,0.5); transition: 0.3s; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-custom shadow-lg">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="mb-4 text-white fw-bold neon-text text-center"><i class="bi bi-pencil-square"></i> Edit Buku</h4>
                        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                            <!-- Input hidden untuk ID dan Nama File Lama -->
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <input type="hidden" name="sampul_lama" value="<?php echo $data['sampul']; ?>">

                            <div class="mb-3">
                                <label class="form-label text-light">Judul Buku</label>
                                <input type="text" name="judul" class="form-control bg-dark text-white" value="<?php echo $data['judul']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-light">Kategori</label>
                                <select name="kategori" class="form-select bg-dark text-white">
                                    <option value="Fiksi" <?php if($data['kategori']=='Fiksi') echo 'selected'; ?>>Fiksi</option>
                                    <option value="Non-Fiksi" <?php if($data['kategori']=='Non-Fiksi') echo 'selected'; ?>>Non-Fiksi</option>
                                    <option value="Sains & Teknologi" <?php if($data['kategori']=='Sains & Teknologi') echo 'selected'; ?>>Sains & Teknologi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-light">Nama Penulis</label>
                                <input type="text" name="penulis" class="form-control bg-dark text-white" value="<?php echo $data['penulis']; ?>" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label class="form-label text-light">Tahun</label>
                                    <input type="number" name="tahun" class="form-control bg-dark text-white" value="<?php echo $data['tahun']; ?>" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label text-light">Stok</label>
                                    <input type="number" name="stok" class="form-control bg-dark text-white" value="<?php echo $data['stok']; ?>" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-light">Ganti Gambar Sampul (Opsional)</label>
                                <input type="file" name="sampul" class="form-control bg-dark text-white" accept="image/png, image/jpeg">
                                <div class="form-text text-secondary">Abaikan jika tidak ingin mengubah gambar. Maks 2MB.</div>
                            </div>
                            <div class="d-grid gap-3">
                                <button type="submit" class="btn btn-outline-warning fw-bold btn-neon"><i class="bi bi-floppy"></i> Update Data</button>
                                <a href="dashboard.php" class="btn btn-link text-secondary text-decoration-none"><i class="bi bi-arrow-left"></i> Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>