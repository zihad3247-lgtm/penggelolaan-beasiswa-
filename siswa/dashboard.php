<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != "siswa"){
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";

// Statistik
$totalBeasiswa = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM beasiswa"));
$totalPengajuan = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pendaftaran WHERE id_siswa='".$_SESSION['id_siswa']."'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard Siswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#eef3f8;
    font-family:'Poppins',sans-serif;
}

.hero{

    background:linear-gradient(135deg,#0d6efd,#3b82f6);

    color:white;

    border-radius:20px;

    padding:35px;

    margin-bottom:30px;

    box-shadow:0 10px 25px rgba(0,0,0,.15);

}

.card-menu{

    border:none;

    border-radius:18px;

    box-shadow:0 5px 20px rgba(0,0,0,.08);

    transition:.3s;

}

.card-menu:hover{

    transform:translateY(-8px);

}

.icon{

    font-size:50px;

    margin-bottom:15px;

}

</style>

</head>

<body>

<div class="container py-4">

<div class="hero">

<h2>

<i class="fas fa-user-graduate"></i>

Dashboard Siswa

</h2>

<p class="mb-0">

Selamat datang,

<b><?= $_SESSION['nama']; ?></b>

Semoga sukses mendapatkan beasiswa.

</p>

</div>

<div class="row mb-4">

<div class="col-md-6">

<div class="card bg-primary text-white border-0">

<div class="card-body">

<h5>Total Beasiswa</h5>

<h2><?= $totalBeasiswa ?></h2>

</div>

</div>

</div>

<div class="col-md-6">

<div class="card bg-success text-white border-0">

<div class="card-body">

<h5>Pengajuan Saya</h5>

<h2><?= $totalPengajuan ?></h2>

</div>

</div>

</div>

</div>

<div class="row">

<div class="col-md-4 mb-4">

<div class="card card-menu">

<div class="card-body text-center">

<div class="icon text-primary">

<i class="fas fa-user"></i>

</div>

<h4>Profil</h4>

<p class="text-muted">

Lihat data pribadi Anda.

</p>

<a href="profil.php" class="btn btn-primary w-100">

Lihat Profil

</a>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card card-menu">

<div class="card-body text-center">

<div class="icon text-success">

<i class="fas fa-award"></i>

</div>

<h4>Beasiswa</h4>

<p class="text-muted">

Lihat daftar beasiswa yang tersedia.

</p>

<a href="beasiswa.php" class="btn btn-success w-100">

Lihat Beasiswa

</a>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card card-menu">

<div class="card-body text-center">

<div class="icon text-warning">

<i class="fas fa-file-alt"></i>

</div>

<h4>Status</h4>

<p class="text-muted">

Cek status pengajuan Anda.

</p>

<a href="status.php" class="btn btn-warning w-100">

Cek Status

</a>

</div>

</div>

</div>

</div>

<div class="text-center mt-4">

<a href="../auth/logout.php"
class="btn btn-danger btn-lg">

<i class="fas fa-sign-out-alt"></i>

Logout

</a>

</div>

<footer class="text-center mt-5 text-muted">

<hr>

<p>

© <?= date('Y'); ?> Sistem Informasi Pengelolaan Beasiswa

</p>

</footer>

</div>

</body>
</html>