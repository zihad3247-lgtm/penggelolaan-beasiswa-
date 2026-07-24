<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location: ../auth/login.php");
    exit;
}

$query = mysqli_query($conn, "
SELECT
    p.id_pendaftaran,
    s.nis,
    s.nama,
    s.kelas,
    b.nama_beasiswa,
    p.tanggal_daftar,
    p.status
FROM pendaftaran p
JOIN siswa s ON p.id_siswa = s.id_siswa
JOIN beasiswa b ON p.id_beasiswa = b.id_beasiswa
ORDER BY p.id_pendaftaran DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Cetak Laporan</title>

<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<style>
body{
    margin:30px;
}
h3{
    text-align:center;
    margin-bottom:20px;
}
table{
    width:100%;
}
</style>

</head>

<body onload="window.print()">

<h3>LAPORAN PENDAFTARAN BEASISWA</h3>

<table class="table table-bordered">

<thead>
<tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Beasiswa</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>
</thead>

<tbody>

<?php
$no=1;

while($row=mysqli_fetch_assoc($query)){
?>

<tr>

<td><?= $no++; ?></td>
<td><?= $row['nis']; ?></td>
<td><?= $row['nama']; ?></td>
<td><?= $row['kelas']; ?></td>
<td><?= $row['nama_beasiswa']; ?></td>
<td><?= $row['tanggal_daftar']; ?></td>
<td><?= $row['status']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</body>
</html>