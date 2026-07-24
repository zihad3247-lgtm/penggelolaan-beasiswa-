<?php
include "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"
UPDATE pendaftaran
SET status='Diterima'
WHERE id_pendaftaran='$id'
");

echo "

<script>

alert('Pendaftaran diterima');

window.location='pendaftaran.php';

</script>

";
?>