<?php
session_start();
include 'config/koneksi.php';

$user = mysqli_real_escape_string($koneksi, $_POST['username']);
$pass = md5($_POST['password']); 

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $data_user = mysqli_fetch_assoc($query); // Ambil data user
    $_SESSION['username'] = $user;
    $_SESSION['role'] = $data_user['role'];  // Simpan role ke session
    
    if (isset($_POST['remember'])) {
        setcookie('perpus_user', $user, time() + (86400 * 30), "/"); 
    }
    header("Location: dashboard.php");
} else {
    echo "<script>alert('Username atau Password salah!'); window.location='index.php';</script>";
}
?>