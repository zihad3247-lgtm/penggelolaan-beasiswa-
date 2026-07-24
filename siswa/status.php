<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config/koneksi.php";

if (!isset($_SESSION['id_siswa'])) {
    header("Location: ../auth/login.php");
    exit;
}

$id_siswa = (int)$_SESSION['id_siswa'];

$id_siswa = (int)$_SESSION['id_siswa'];

// Ambil data pengajuan
$sql = "
SELECT
    p.*,
    b.nama_beasiswa
FROM pendaftaran p
INNER JOIN beasiswa b
ON p.id_beasiswa = b.id_beasiswa
WHERE p.id_siswa = '$id_siswa'
ORDER BY p.tanggal_daftar DESC
";

$data = mysqli_query($conn, $sql);

if (!$data) {
    die("Query Error : " . mysqli_error($conn));
}

// Statistik
$total = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM pendaftaran WHERE id_siswa='$id_siswa'"));

$diterima = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM pendaftaran
WHERE id_siswa='$id_siswa'
AND status='Diterima'"));

$ditolak = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM pendaftaran
WHERE id_siswa='$id_siswa'
AND status='Ditolak'"));

$menunggu = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM pendaftaran
WHERE id_siswa='$id_siswa'
AND status='Menunggu'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Status Pengajuan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#eef3f8;
}

.hero{
    background:#0d6efd;
    color:white;
    padding:30px;
    border-radius:15px;
    margin-bottom:25px;
}

.card{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.table thead{
    background:#0d6efd;
    color:white;
}

</style>

</head>

<body>

<div class="container py-4">

<div class="hero">

<h2>
<i class="fas fa-file-alt"></i>
Status Pengajuan Beasiswa
</h2>

<p class="mb-0">
Pantau perkembangan pengajuan Anda.
</p>

</div>

<div class="row mb-4">

<div class="col-md-3">
<div class="card bg-primary text-white">
<div class="card-body text-center">
<h5>Total</h5>
<h2><?= $total ?></h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-success text-white">
<div class="card-body text-center">
<h5>Diterima</h5>
<h2><?= $diterima ?></h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-warning">
<div class="card-body text-center">
<h5>Menunggu</h5>
<h2><?= $menunggu ?></h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-danger text-white">
<div class="card-body text-center">
<h5>Ditolak</h5>
<h2><?= $ditolak ?></h2>
</div>
</div>
</div>

</div>

<div class="card">

<div class="card-header bg-primary text-white">
Riwayat Pengajuan
</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered table-hover">

<thead>

<tr>

<th width="60">No</th>
<th>Nama Beasiswa</th>
<th>Tanggal</th>
<th>Berkas</th>
<th>Status</th>

</tr>

</thead>

<tbody>

<?php

$no = 1;

if(mysqli_num_rows($data)>0){

while($d = mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= htmlspecialchars($d['nama_beasiswa']) ?></td>

<td><?= date('d-m-Y',strtotime($d['tanggal_daftar'])) ?></td>

<td>

<?php
if(!empty($d['berkas'])){
?>

<a
class="btn btn-sm btn-info"
target="_blank"
href="../upload/berkas/<?= $d['berkas'] ?>">

<i class="fas fa-file-pdf"></i>

Lihat PDF

</a>

<?php
}else{
echo "<span class='text-danger'>Tidak ada file</span>";
}
?>

</td>

<td>

<?php

if($d['status']=="Diterima"){
?>

<span class="badge bg-success">Diterima</span>

<?php
}
elseif($d['status']=="Ditolak"){
?>

<span class="badge bg-danger">Ditolak</span>

<?php
}
else{
?>

<span class="badge bg-warning text-dark">Menunggu</span>

<?php } ?>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="5" class="text-center">

Belum ada data pengajuan.

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

</div>

</div>

</body>
</html>