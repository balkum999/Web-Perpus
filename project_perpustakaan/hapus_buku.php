<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit;
}
include 'config/koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT sampul FROM buku WHERE id='$id'");
$data = mysqli_fetch_array($query);
$file_path = "uploads/" . $data['sampul'];

if (file_exists($file_path)) {
    unlink($file_path);
}

mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");
header("Location: dashboard.php");
?>