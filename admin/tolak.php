<?php
include "../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"
UPDATE pendaftaran
SET status='Ditolak'
WHERE id_pendaftaran='$id'
");

echo "

<script>

alert('Pendaftaran ditolak');

window.location='pendaftaran.php';

</script>

";
?>