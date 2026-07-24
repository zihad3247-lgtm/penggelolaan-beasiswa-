<?php
include "../config/koneksi.php";

$nis       = $_POST['nis'];
$nama      = $_POST['nama'];
$jk        = $_POST['jk'];
$kelas     = $_POST['kelas'];
$alamat    = $_POST['alamat'];
$email     = $_POST['email'];
$no_hp     = $_POST['no_hp'];
$username  = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = mysqli_query($conn,"INSERT INTO siswa
(
nis,
nama,
jk,
kelas,
alamat,
email,
no_hp,
username,
password
)

VALUES
(
'$nis',
'$nama',
'$jk',
'$kelas',
'$alamat',
'$email',
'$no_hp',
'$username',
'$password'
)");

if($sql){

    echo "

    <script>

    alert('Registrasi Berhasil');

    window.location='login.php';

    </script>

    ";

}else{

    echo "

    <script>

    alert('Registrasi Gagal');

    history.back();

    </script>

    ";

}

?>