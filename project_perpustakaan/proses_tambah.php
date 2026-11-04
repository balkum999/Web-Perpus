<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit;
}
include 'config/koneksi.php';

$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];
$stok = $_POST['stok'];

$nama_file = $_FILES['sampul']['name'];
$ukuran_file = $_FILES['sampul']['size'];
$tmp_file = $_FILES['sampul']['tmp_name'];
$ext_diizinkan = array('jpg','png','jpeg');
$ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

// Validasi array dan if-else
if (in_array($ext, $ext_diizinkan) === true) {
    if ($ukuran_file < 2097152) { // 2MB
        $nama_file_baru = time() . '_' . $nama_file;
        move_uploaded_file($tmp_file, 'uploads/'.$nama_file_baru);
        
        mysqli_query($koneksi, "INSERT INTO buku VALUES(NULL, '$judul', '$kategori', '$penulis', '$tahun', '$stok', '$nama_file_baru')");
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Ukuran file terlalu besar! Maksimal 2MB.'); window.location='tambah_buku.php';</script>";
    }
} else {
    echo "<script>alert('Format file tidak didukung! Gunakan .jpg atau .png'); window.location='tambah_buku.php';</script>";
}
?>