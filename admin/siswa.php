<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login']) || $_SESSION['level'] != "admin"){
    header("Location: ../auth/login.php");
    exit;
}

include "template/header.php";
include "template/sidebar.php";

$cari = "";

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $query = mysqli_query($conn,"SELECT * FROM siswa
    WHERE nama LIKE '%$cari%'
    OR nis LIKE '%$cari%'
    ORDER BY id_siswa DESC");
}else{
    $query = mysqli_query($conn,"SELECT * FROM siswa ORDER BY id_siswa DESC");
}
?>

<style>
.content{
    margin-left:250px;
    padding:25px;
    background:#f4f7fc;
    min-height:100vh;
}

.page-title{
    font-size:30px;
    font-weight:bold;
    color:#0d6efd;
}

.page-subtitle{
    color:#6c757d;
    margin-bottom:25px;
}

.card-custom{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.table thead{
    background:#0d6efd;
    color:white;
}

.table th{
    vertical-align:middle;
}

.table td{
    vertical-align:middle;
}

.table tbody tr:hover{
    background:#f8f9ff;
    transition:.3s;
}

.btn{
    border-radius:8px;
}

.search-box{
    max-width:420px;
}
</style>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<div class="page-title">
Data Siswa
</div>

<div class="page-subtitle">
Kelola seluruh data siswa yang terdaftar
</div>

</div>

<a href="tambah_siswa.php" class="btn btn-primary">
<i class="fas fa-plus"></i>
Tambah Siswa
</a>

</div>

<div class="card card-custom">

<div class="card-body">

<div class="d-flex justify-content-between mb-4">

<form method="GET" class="search-box w-100">

<div class="input-group">

<input
type="text"
name="cari"
class="form-control"
placeholder="Cari Nama atau NIS..."
value="<?= $cari ?>">

<button class="btn btn-primary">
<i class="fas fa-search"></i>
Cari
</button>

</div>

</form>

</div>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead>

<tr>

<th width="60">No</th>

<th>NIS</th>

<th>Nama</th>

<th>Jenis Kelamin</th>

<th>Kelas</th>

<th>Email</th>

<th width="170">Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no=1;
while($d=mysqli_fetch_assoc($query)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nis'] ?></td>

<td><b><?= $d['nama'] ?></b></td>

<td><?= $d['jk'] ?></td>

<td><?= $d['kelas'] ?></td>

<td><?= $d['email'] ?></td>

<td>

<a href="edit_siswa.php?id=<?= $d['id_siswa'] ?>"
class="btn btn-warning btn-sm">

<i class="fas fa-edit"></i>
Edit

</a>

<a
href="hapus_siswa.php?id=<?= $d['id_siswa'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data?')">

<i class="fas fa-trash"></i>
Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

<?php include "template/footer.php"; ?>