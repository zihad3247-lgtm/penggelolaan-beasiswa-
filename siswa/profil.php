<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['id_siswa'])){
    header("Location: ../auth/login.php");
    exit;
}

$id = $_SESSION['id_siswa'];

$data = mysqli_query($conn,"
SELECT *
FROM siswa
WHERE id_siswa='$id'
");

$siswa = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Profil Siswa</title>

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
    padding:35px;
    border-radius:20px;
    margin-bottom:30px;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
}

.profile-card{
    border:none;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.avatar{
    width:120px;
    height:120px;
    background:#0d6efd;
    color:white;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:60px;
    margin:auto;
}

.table th{
    width:180px;
    background:#f8f9fa;
}

.table td,
.table th{
    vertical-align:middle;
}

.badge{
    font-size:14px;
    padding:8px 12px;
}

</style>

</head>

<body>

<div class="container py-4">

<div class="hero">

<h2>

<i class="fas fa-user-graduate"></i>

Profil Siswa

</h2>

<p class="mb-0">

Informasi data pribadi siswa.

</p>

</div>

<div class="card profile-card">

<div class="card-body">

<div class="row">

<div class="col-md-4 text-center border-end">

<div class="avatar">

<i class="fas fa-user"></i>

</div>

<h4 class="mt-3">

<?= $siswa['nama']; ?>

</h4>

<p class="text-muted">

NIS : <?= $siswa['nis']; ?>

</p>

<?php if($siswa['jk']=="Laki-laki"){ ?>

<span class="badge bg-primary">

<i class="fas fa-mars"></i>

<?= $siswa['jk']; ?>

</span>

<?php }else{ ?>

<span class="badge bg-danger">

<i class="fas fa-venus"></i>

<?= $siswa['jk']; ?>

</span>

<?php } ?>

<br><br>

<span class="badge bg-success">

<?= $siswa['kelas']; ?>

</span>

</div>

<div class="col-md-8">

<h4 class="text-primary mb-3">

Detail Informasi

</h4>

<table class="table table-bordered">

<tr>

<th>NIS</th>

<td><?= $siswa['nis']; ?></td>

</tr>

<tr>

<th>Nama Lengkap</th>

<td><?= $siswa['nama']; ?></td>

</tr>

<tr>

<th>Jenis Kelamin</th>

<td><?= $siswa['jk']; ?></td>

</tr>

<tr>

<th>Kelas</th>

<td><?= $siswa['kelas']; ?></td>

</tr>

<tr>

<th>Alamat</th>

<td><?= $siswa['alamat']; ?></td>

</tr>

<tr>

<th>Email</th>

<td><?= $siswa['email']; ?></td>

</tr>

<tr>

<th>No. HP</th>

<td><?= $siswa['no_hp']; ?></td>

</tr>

</table>

<div class="mt-3">

<a href="dashboard.php" class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>

Kembali

</a>

</div>

</div>

</div>

</div>

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