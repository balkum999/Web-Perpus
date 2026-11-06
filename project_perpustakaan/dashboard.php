<?php
session_start();
include 'config/koneksi.php';
if (!isset($_SESSION['username'])) { header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <title>Dashboard - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CDN Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #121212; }
        .neon-text { 
            color: #fff; 
            text-shadow: 0 0 5px rgba(255,255,255,0.7), 0 0 15px rgba(255,255,255,0.5); 
            font-weight: bold;
        }
        .navbar-custom { border-bottom: 1px solid #333; background-color: #181818 !important; }
        .table-custom { background-color: #1c1c1c; border-color: #333; }
        .btn-neon { transition: 0.3s; }
        .btn-neon:hover { box-shadow: 0 0 10px rgba(255,255,255,0.5); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4 py-3">
        <!-- Tambahkan class 'position-relative' di sini agar animasi tidak lari dari container -->
        <div class="container position-relative">
            
            <!-- Bagian Kiri (Logo) -->
            <a class="navbar-brand neon-text fs-4" href="#"><i class="bi bi-journal-bookmark-fill text-primary"></i> E-Perpus</a>
            
            <!-- ===== ANIMASI TENGAH ===== -->
            <div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); width: 60px; z-index: 99;">
                <!-- Ganti isi atribut src dengan link yang kamu copy barusan -->
                <img src="https://media.tenor.com/kKzoMNDUQ3MAAAAj/arisu-aris.gif" alt="Arisu Dance" style="width: 100%; height: auto; object-fit: contain;">
            </div>
            
            <!-- Bagian Kanan (Profil & Logout) -->
            <div class="d-flex align-items-center">
                <span class="text-secondary me-3"><i class="bi bi-person-circle"></i> Halo, <strong class="text-light"><?php echo $_SESSION['username']; ?></strong></span>
                <a href="logout.php" class="btn btn-outline-light btn-sm btn-neon"><i class="bi bi-box-arrow-right"></i> Keluar</a>
            </div>
            
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0 text-light fw-semibold"><i class="bi bi-collection"></i> Koleksi Buku</h4>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <a href="tambah_buku.php" class="btn btn-outline-light btn-neon"><i class="bi bi-plus-circle"></i> Tambah Buku</a>
            <?php } ?>
        </div>
        
        <div class="card bg-dark border-secondary shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle mb-0 table-custom">
                        <thead>
                            <tr class="border-secondary">
                                <th class="ps-4"><i class="bi bi-image"></i> Sampul</th>
                                <th><i class="bi bi-book"></i> Judul Buku</th>
                                <th><i class="bi bi-tags"></i> Kategori</th>
                                <th><i class="bi bi-pen"></i> Penulis</th>
                                <th><i class="bi bi-box-seam"></i> Stok & Status</th>
                                <?php if ($_SESSION['role'] == 'admin') { ?>
                                <th class="text-center"><i class="bi bi-gear"></i> Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM buku");
                            while ($d = mysqli_fetch_array($data)) {
                                $status = ($d['stok'] > 0) ? "<span class='badge border border-light text-light'>Tersedia</span>" : "<span class='badge border border-danger text-danger'>Dipinjam</span>";
                            ?>
                            <tr class="border-secondary">
                                <td class="ps-4"><img src="uploads/<?php echo $d['sampul']; ?>" class="rounded border border-secondary" width="55" style="object-fit: cover;"></td>
                                <td class="fw-bold text-light"><?php echo $d['judul']; ?></td>
                                <td><span class="text-secondary"><?php echo $d['kategori']; ?></span></td>
                                <td><?php echo $d['penulis']; ?></td>
                                <!-- Posisi Stok dan Status disejajarkan menyamping -->
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span><?php echo $d['stok']; ?></span> 
                                        <?php echo $status; ?>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php if ($_SESSION['role'] == 'admin') { ?>
                                        <a href="edit_buku.php?id=<?php echo $d['id']; ?>" class="btn btn-outline-warning btn-sm btn-neon"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="hapus_buku.php?id=<?php echo $d['id']; ?>" class="btn btn-outline-danger btn-sm btn-neon" onclick="return confirm('Hapus data buku ini?')"><i class="bi bi-trash"></i> Hapus</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>