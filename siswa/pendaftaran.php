<?php
session_start();
include '../koneksi.php';

$id_beasiswa = $_GET['id'];
$id_siswa = $_SESSION['id_user'];

mysqli_query($koneksi,"
INSERT INTO pendaftaran
(id_siswa,id_beasiswa,tanggal_daftar,status)
VALUES
('$id_siswa','$id_beasiswa',CURDATE(),'Menunggu')
");

header("Location: status.php");