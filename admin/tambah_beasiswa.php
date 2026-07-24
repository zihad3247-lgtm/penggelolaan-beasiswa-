<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location: ../auth/login.php");
    exit;
}

if (isset($_POST['simpan'])) {

    $nama = mysqli_real_escape_string($conn, $_POST['nama_beasiswa']);
    $kuota = mysqli_real_escape_string($conn, $_POST['kuota']);
    $tahun = mysqli_real_escape_string($conn, $_POST['tahun']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    $namaBaru = "";

    if (!empty($_FILES['gambar']['name'])) {

        $folder = "../upload/";

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $ekstensi = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $ekstensi)) {

            echo "<script>
                    alert('Format gambar harus JPG, JPEG, PNG atau WEBP');
                  </script>";

        } else {

            $namaBaru = time() . "_" . basename($_FILES['gambar']['name']);

            move_uploaded_file(
                $_FILES['gambar']['tmp_name'],
                $folder . $namaBaru
            );
        }
    }

    mysqli_query($conn, "
        INSERT INTO beasiswa
        (
            nama_beasiswa,
            kuota,
            tahun,
            deskripsi,
            gambar
        )
        VALUES
        (
            '$nama',
            '$kuota',
            '$tahun',
            '$deskripsi',
            '$namaBaru'
        )
    ");

    echo "
    <script>
        alert('Data berhasil disimpan');
        window.location='beasiswa.php';
    </script>";
}

include "template/header.php";
include "template/sidebar.php";
?>

<div class="content">

<div class="container-fluid">

<div class="card shadow border-0 rounded-4">

    <div class="card-header bg-primary text-white py-3">

        <h4 class="mb-0">
            <i class="fas fa-award me-2"></i>
            Tambah Data Beasiswa
        </h4>

    </div>

    <div class="card-body p-4">

        <form method="POST" enctype="multipart/form-data">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Nama Beasiswa
                    </label>

                    <input
                        type="text"
                        name="nama_beasiswa"
                        class="form-control form-control-lg"
                        placeholder="Masukkan nama beasiswa"
                        required>

                </div>

                <div class="col-md-3 mb-3">

                    <label class="form-label fw-semibold">
                        Kuota
                    </label>

                    <input
                        type="number"
                        name="kuota"
                        class="form-control form-control-lg"
                        required>

                </div>

                <div class="col-md-3 mb-3">

                    <label class="form-label fw-semibold">
                        Tahun
                    </label>

                    <input
                        type="text"
                        name="tahun"
                        class="form-control form-control-lg"
                        placeholder="2026"
                        required>

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="6"
                    class="form-control"
                    placeholder="Masukkan deskripsi beasiswa"></textarea>

            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Upload Gambar
                </label>

                <input
                    type="file"
                    name="gambar"
                    class="form-control">

                <small class="text-muted">
                    Format yang diperbolehkan :
                    JPG, JPEG, PNG, WEBP
                </small>

            </div>

            <hr>

            <button
                type="submit"
                name="simpan"
                class="btn btn-primary">

                <i class="fas fa-save me-1"></i>
                Simpan

            </button>

            <a
                href="beasiswa.php"
                class="btn btn-secondary">

                <i class="fas fa-arrow-left me-1"></i>
                Kembali

            </a>

        </form>

    </div>

</div>

</div>

</div>

<?php include "template/footer.php"; ?>