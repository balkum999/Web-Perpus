<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit;
}
include 'config/koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];
$stok = $_POST['stok'];
$sampul_lama = $_POST['sampul_lama'];

// Cek apakah ada file baru yang diupload
if ($_FILES['sampul']['name'] != "") {
    $nama_file = $_FILES['sampul']['name'];
    $ukuran_file = $_FILES['sampul']['size'];
    $tmp_file = $_FILES['sampul']['tmp_name'];
    $ext_diizinkan = array('jpg','png','jpeg');
    $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

    if (in_array($ext, $ext_diizinkan) === true) {
        if ($ukuran_file < 2097152) { // Maksimal 2MB
            $nama_file_baru = time() . '_' . $nama_file;
            move_uploaded_file($tmp_file, 'uploads/'.$nama_file_baru);

            // Hapus gambar lama di folder fisik
            if (file_exists("uploads/".$sampul_lama)) {
                unlink("uploads/".$sampul_lama);
            }

            // Update database beserta nama file baru
            mysqli_query($koneksi, "UPDATE buku SET judul='$judul', kategori='$kategori', penulis='$penulis', tahun='$tahun', stok='$stok', sampul='$nama_file_baru' WHERE id='$id'");
            header("Location: dashboard.php");
        } else {
            echo "<script>alert('Ukuran file terlalu besar! Maksimal 2MB.'); window.location='edit_buku.php?id=$id';</script>";
        }
    } else {
        echo "<script>alert('Format file tidak didukung! Gunakan .jpg atau .png'); window.location='edit_buku.php?id=$id';</script>";
    }
} else {
    // Jika tidak ada gambar baru yang diupload, update data teks saja
    mysqli_query($koneksi, "UPDATE buku SET judul='$judul', kategori='$kategori', penulis='$penulis', tahun='$tahun', stok='$stok' WHERE id='$id'");
    header("Location: dashboard.php");
}
?>