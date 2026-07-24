<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location: ../auth/login.php");
    exit;
}

$jmlSiswa = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM siswa"));
$jmlBeasiswa = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM beasiswa"));
$jmlPendaftaran = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pendaftaran"));
$jmlDiterima = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pendaftaran WHERE status='Diterima'"));

include "template/header.php";
include "template/sidebar.php";
?>

<style>

.stat-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-8px);
}

.stat-icon{
    font-size:55px;
    opacity:.25;
}

.info-box{
    background:#fff;
    border-radius:18px;
    padding:25px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    height:100%;
}

.chart-box{
    background:#fff;
    border-radius:18px;
    padding:25px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

</style>

<div class="content">

<nav class="navbar">

<div class="d-flex justify-content-between w-100 align-items-center">

<div>

<h3 class="fw-bold mb-1">
Dashboard Admin
</h3>

<p class="text-muted mb-0">
Selamat Datang,
<b><?= $_SESSION['nama']; ?></b> 👋
</p>

</div>

<div class="text-end">

<h5 id="tanggal"></h5>

</div>

</div>

</nav>

<div class="row g-4">

<div class="col-md-3">

<div class="card bg-primary text-white stat-card">

<div class="card-body d-flex justify-content-between">

<div>

<h2><?= $jmlSiswa ?></h2>

<p>Jumlah Siswa</p>

</div>

<i class="fas fa-users stat-icon"></i>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-success text-white stat-card">

<div class="card-body d-flex justify-content-between">

<div>

<h2><?= $jmlBeasiswa ?></h2>

<p>Data Beasiswa</p>

</div>

<i class="fas fa-award stat-icon"></i>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-warning text-dark stat-card">

<div class="card-body d-flex justify-content-between">

<div>

<h2><?= $jmlPendaftaran ?></h2>

<p>Pendaftaran</p>

</div>

<i class="fas fa-file-alt stat-icon"></i>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-danger text-white stat-card">

<div class="card-body d-flex justify-content-between">

<div>

<h2><?= $jmlDiterima ?></h2>

<p>Diterima</p>

</div>

<i class="fas fa-check-circle stat-icon"></i>

</div>

</div>

</div>

</div>

<div class="row mt-4">

<div class="col-lg-8">

<div class="chart-box">

<h5 class="mb-4">
Grafik Statistik
</h5>

<canvas id="chartDashboard"></canvas>

</div>

</div>

<div class="col-lg-4">

<div class="info-box">

<h5>Informasi Sistem</h5>

<hr>

<p>
<b>👨‍🎓 Total Siswa :</b>
<?= $jmlSiswa ?>
</p>

<p>
<b>🎓 Total Beasiswa :</b>
<?= $jmlBeasiswa ?>
</p>

<p>
<b>📝 Total Pendaftaran :</b>
<?= $jmlPendaftaran ?>
</p>

<p>
<b>✅ Diterima :</b>
<?= $jmlDiterima ?>
</p>

<hr>

<p class="text-muted">

Gunakan menu di sebelah kiri untuk mengelola seluruh data pada Sistem Informasi Pengelolaan Beasiswa.

</p>

</div>

</div>

</div>

</div>

<script>

document.getElementById("tanggal").innerHTML =
new Date().toLocaleDateString('id-ID',{
weekday:'long',
day:'numeric',
month:'long',
year:'numeric'
});

new Chart(document.getElementById("chartDashboard"),{

type:'bar',

data:{

labels:['Siswa','Beasiswa','Pendaftaran','Diterima'],

datasets:[{

label:'Statistik',

data:[
<?= $jmlSiswa ?>,
<?= $jmlBeasiswa ?>,
<?= $jmlPendaftaran ?>,
<?= $jmlDiterima ?>
]

}]

},

options:{

responsive:true,

plugins:{
legend:{
display:false
}
}

}

});

</script>

<?php include "template/footer.php"; ?>