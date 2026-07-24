<?php
session_start();
include "../config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

/* ==========================
   LOGIN ADMIN
========================== */

$queryAdmin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");

if(mysqli_num_rows($queryAdmin) > 0){

    $admin = mysqli_fetch_assoc($queryAdmin);

    if(password_verify($password, $admin['password'])){

        $_SESSION['login'] = true;
        $_SESSION['level'] = "admin";
        $_SESSION['id_admin'] = $admin['id_admin'];
        $_SESSION['nama'] = $admin['nama'];

        header("Location: ../admin/dashboard.php");
        exit;

    }

}

/* ==========================
   LOGIN SISWA
========================== */

$querySiswa = mysqli_query($conn, "SELECT * FROM siswa WHERE username='$username'");

if(mysqli_num_rows($querySiswa) > 0){

    $siswa = mysqli_fetch_assoc($querySiswa);

    if(password_verify($password, $siswa['password'])){

        $_SESSION['login'] = true;
        $_SESSION['level'] = "siswa";
        $_SESSION['id_siswa'] = $siswa['id_siswa'];
        $_SESSION['nama'] = $siswa['nama'];

        header("Location: ../siswa/dashboard.php");
        exit;

    }

}

echo "
<script>
alert('Username atau Password Salah');
window.location='login.php';
</script>
";
?>