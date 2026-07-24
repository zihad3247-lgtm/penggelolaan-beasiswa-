<?php
session_start();
include "../config/koneksi.php";

// Pencarian
$cari = "";
$sql = "SELECT * FROM beasiswa";

if(isset($_GET['cari']) && $_GET['cari']!=""){
    $cari = mysqli_real_escape_string($conn,$_GET['cari']);
    $sql .= " WHERE nama_beasiswa LIKE '%$cari%'";
}

$sql .= " ORDER BY id_beasiswa DESC";

$data = mysqli_query($conn,$sql);

// Statistik
$totalBeasiswa = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM beasiswa"));

$kuota = mysqli_query($conn,"SELECT SUM(kuota) AS total FROM beasiswa");
$totalKuota = mysqli_fetch_assoc($kuota)['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Daftar Beasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#eef2f7;
    font-family:'Segoe UI',sans-serif;
}

.header{
    background:linear-gradient(135deg,#0d6efd,#4f8cff);
    color:white;
    padding:40px;
    border-radius:20px;
    margin-bottom:30px;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
}

.card-info{
    border:none;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
    transition:.3s;
}

.card-info:hover{
    transform:translateY(-5px);
}

.card-info i{
    font-size:40px;
    opacity:.8;
}

.table-card{
    background:white;
    border-radius:20px;
    padding:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.table thead{
    background:#0d6efd;
    color:white;
}

.table tbody tr:hover{
    background:#eef6ff;
}

.btn{
    border-radius:30px;
}

footer{
    text-align:center;
    margin-top:40px;
    color:#777;
}

</style>

</head>

<body>

<div class="container py-4">

<div class="header">

<h2><i class="fas fa-award"></i> Daftar Beasiswa</h2>

<p class="mb-0">
Pilih program beasiswa yang sesuai dengan kebutuhan Anda.
</p>

</div>

<div class="row mb-4">

<div class="col-md-6 mb-3">

<div class="card card-info bg-primary text-white">

<div class="card-body d-flex justify-content-between align-items-center">

<div>

<h5>Total Beasiswa</h5>

<h2><?= $totalBeasiswa ?></h2>

</div>

<i class="fas fa-graduation-cap"></i>

</div>

</div>

</div>

<div class="col-md-6 mb-3">

<div class="card card-info bg-success text-white">

<div class="card-body d-flex justify-content-between align-items-center">

<div>

<h5>Total Kuota</h5>

<h2><?= $totalKuota ?></h2>

</div>

<i class="fas fa-users"></i>

</div>

</div>

</div>

</div>

<div class="table-card">

<div class="row mb-3">

<div class="col-md-8">

<h4 class="text-primary">
Daftar Program Beasiswa
</h4>

</div>

<div class="col-md-4">

<form method="GET">

<div class="input-group">

<input
type="text"
name="cari"
class="form-control"
placeholder="Cari beasiswa..."
value="<?= $cari ?>">

<button class="btn btn-primary">

<i class="fas fa-search"></i>

</button>

</div>

</form>

</div>

</div>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead>

<tr>

<th>No</th>

<th>Nama Beasiswa</th>

<th>Kuota</th>

<th>Tahun</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no=1;

while($b=mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++ ?></td>

<td>

<strong><?= $b['nama_beasiswa']; ?></strong>

</td>

<td>

<span class="badge bg-success">

<?= $b['kuota']; ?> Orang

</span>

</td>

<td>

<span class="badge bg-info">

<?= $b['tahun']; ?>

</span>

</td>

<td>

<a href="daftar.php?id=<?= $b['id_beasiswa']; ?>"
class="btn btn-primary btn-sm">

<i class="fas fa-user-plus"></i>

Daftar

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<div class="mt-3">

<a href="dashboard.php" class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>

Kembali

</a>

</div>

</div>

<footer>

<hr>

© <?= date('Y') ?> Sistem Informasi Beasiswa

</footer>

</div>

</body>
</html>