<?php
session_start();
include "../config/koneksi.php";

$data = mysqli_query($conn,"
SELECT *
FROM beasiswa
ORDER BY id_beasiswa DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Beasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#f4f7fc;
}

.page-title{
    font-weight:bold;
    color:#0d6efd;
}

.card{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.table thead{
    background:#0d6efd;
    color:white;
}

.table th,
.table td{
    vertical-align:middle;
}

.table tbody tr:hover{
    background:#eef5ff;
    transition:.3s;
}

.btn{
    border-radius:8px;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="card">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h2 class="page-title">
<i class="fas fa-award"></i>
Daftar Beasiswa
</h2>

<p class="text-muted mb-0">
Silakan pilih beasiswa yang ingin didaftarkan.
</p>

</div>

</div>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead>

<tr>

<th width="60">No</th>

<th>Nama Beasiswa</th>

<th>Kuota</th>

<th>Tahun</th>

<th width="140">Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no=1;

while($b=mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++; ?></td>

<td>
<strong><?= $b['nama_beasiswa']; ?></strong>
</td>

<td>
<span class="badge bg-success">
<?= $b['kuota']; ?> Orang
</span>
</td>

<td><?= $b['tahun']; ?></td>

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

<div class="mt-4">

<a href="dashboard.php"
class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>
Kembali

</a>

</div>

</div>

</div>

</div>

</body>
</html>