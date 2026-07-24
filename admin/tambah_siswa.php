<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
}

if(isset($_POST['simpan'])){

$nis=$_POST['nis'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$kelas=$_POST['kelas'];
$alamat=$_POST['alamat'];
$email=$_POST['email'];
$no_hp=$_POST['no_hp'];
$username=$_POST['username'];

$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

mysqli_query($conn,"INSERT INTO siswa
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

echo"

<script>

alert('Data berhasil ditambahkan');

window.location='siswa.php';

</script>

";

}
include "template/header.php";
include "template/sidebar.php";
?>

<div class="content">

<div class="container mt-4">

<div class="card">

<div class="card-header bg-primary text-white">

Tambah Data Siswa

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>NIS</label>
<input type="text" name="nis" class="form-control" required>
</div>

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
<label>Jenis Kelamin</label>
<select name="jk" class="form-control">
<option>Laki-laki</option>
<option>Perempuan</option>
</select>
</div>

<div class="mb-3">
<label>Kelas</label>
<input type="text" name="kelas" class="form-control">
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat" class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>No HP</label>
<input type="text" name="no_hp" class="form-control">
</div>

<div class="mb-3">
<label>Username</label>
<input type="text" name="username" class="form-control">
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>

<button
name="simpan"
class="btn btn-primary">

Simpan

</button>

<a href="siswa.php" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</div>

<?php include "template/footer.php"; ?>