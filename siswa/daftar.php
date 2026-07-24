<?php
session_start();
include "../config/koneksi.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

// ======================
// CEK LOGIN
// ======================
if (!isset($_SESSION['id_siswa'])) {
    header("Location: ../auth/login.php");
    exit;
}

// ======================
// CEK ID BEASISWA
// ======================
if (!isset($_GET['id'])) {
    die("ID Beasiswa tidak ditemukan!");
}

$id_siswa     = (int)$_SESSION['id_siswa'];
$id_beasiswa  = (int)$_GET['id'];

// ======================
// AMBIL DATA BEASISWA
// ======================
$query = mysqli_query($conn, "
SELECT * FROM beasiswa
WHERE id_beasiswa='$id_beasiswa'
");

if (!$query) {
    die(mysqli_error($conn));
}

if (mysqli_num_rows($query) == 0) {
    die("Data beasiswa tidak ditemukan!");
}

$dataBeasiswa = mysqli_fetch_assoc($query);

// ======================
// CEK KUOTA
// ======================
if ($dataBeasiswa['kuota'] <= 0) {

    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <script>

    Swal.fire({
        icon:'error',
        title:'Kuota Habis',
        text:'Maaf kuota sudah penuh.'
    }).then(function(){

        window.location='beasiswa.php';

    });

    </script>

    ";

    exit;
}

// ======================
// CEK SUDAH DAFTAR
// ======================
$cek = mysqli_query($conn,"
SELECT *
FROM pendaftaran
WHERE id_siswa='$id_siswa'
AND id_beasiswa='$id_beasiswa'
");

if(mysqli_num_rows($cek)>0){

    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <script>

    Swal.fire({
        icon:'warning',
        title:'Sudah Terdaftar',
        text:'Anda sudah pernah mendaftar beasiswa ini.'
    }).then(function(){

        window.location='status.php';

    });

    </script>

    ";

    exit;

}

// ======================
// PROSES DAFTAR
// ======================
if(isset($_POST['daftar'])){

    if($_FILES['berkas']['error']!=0){

        echo "<script>alert('Silakan pilih file PDF');</script>";

    }else{

        $namaFile = $_FILES['berkas']['name'];
        $tmpFile  = $_FILES['berkas']['tmp_name'];
        $ukuran   = $_FILES['berkas']['size'];

        $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        if($ext!="pdf"){

            echo "<script>alert('File harus PDF');</script>";

        }elseif($ukuran > 2097152){

            echo "<script>alert('Ukuran maksimal 2 MB');</script>";

        }else{

            $folder = "../upload/berkas/";

            if(!is_dir($folder)){
                mkdir($folder,0777,true);
            }

            $namaBaru = time()."_".preg_replace('/[^A-Za-z0-9._-]/','_',$namaFile);

            if(move_uploaded_file($tmpFile,$folder.$namaBaru)){

                $simpan = mysqli_query($conn,"
                INSERT INTO pendaftaran
                (
                    id_siswa,
                    id_beasiswa,
                    tanggal_daftar,
                    berkas,
                    status
                )
                VALUES
                (
                    '$id_siswa',
                    '$id_beasiswa',
                    CURDATE(),
                    '$namaBaru',
                    'Menunggu'
                )
                ");

                                if($simpan){

                    // Kurangi kuota
                    mysqli_query($conn,"
                    UPDATE beasiswa
                    SET kuota = kuota - 1
                    WHERE id_beasiswa='$id_beasiswa'
                    ");

                    ?>
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    </head>
                    <body>

                    <script>

                    Swal.fire({
                        icon:'success',
                        title:'Pendaftaran Berhasil',
                        text:'Pengajuan beasiswa berhasil dikirim.',
                        confirmButtonColor:'#0d6efd'
                    }).then(function(){

                        window.location='status.php';

                    });

                    </script>

                    </body>
                    </html>

                    <?php

                    exit;

                }else{

                    die("Gagal menyimpan data : ".mysqli_error($conn));

                }

            }else{

                die("Upload file gagal.");

            }

        }

    }

}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Pendaftaran Beasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#eef3f8;
}

.card{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.card-header{
    background:#0d6efd;
    color:#fff;
    font-weight:600;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-7">

<div class="card">

<div class="card-header">

<h4 class="mb-0">

<i class="fas fa-award"></i>

Pendaftaran Beasiswa

</h4>

</div>

<div class="card-body">

<div class="alert alert-info">

<strong>Nama Beasiswa :</strong>

<?= htmlspecialchars($dataBeasiswa['nama_beasiswa']); ?>

</div>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">

Upload Berkas Persyaratan (PDF)

</label>

<input
type="file"
name="berkas"
class="form-control"
accept=".pdf"
required>

<div class="form-text">

File harus PDF dan maksimal 2 MB.

</div>

</div>

<button
type="submit"
name="daftar"
class="btn btn-primary">

<i class="fas fa-paper-plane"></i>

Daftar Sekarang

</button>

<a
href="beasiswa.php"
class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>

Kembali

</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>