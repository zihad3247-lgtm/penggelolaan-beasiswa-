<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location: ../auth/login.php");
    exit;
}

$id = intval($_GET['id']);

$data = mysqli_query($conn, "SELECT * FROM beasiswa WHERE id_beasiswa='$id'");
$row = mysqli_fetch_assoc($data);

if ($row && $row['gambar'] != "") {
    if (file_exists("../upload/" . $row['gambar'])) {
        unlink("../upload/" . $row['gambar']);
    }
}

mysqli_query($conn, "DELETE FROM beasiswa WHERE id_beasiswa='$id'");

echo "
<script>
alert('Data berhasil dihapus');
window.location='beasiswa.php';
</script>
";
?>