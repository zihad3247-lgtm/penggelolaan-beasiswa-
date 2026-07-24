<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location: ../auth/login.php");
    exit;
}

$id = intval($_GET['id']);

$data = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa='$id'");
$siswa = mysqli_fetch_assoc($data);

if (!$siswa) {
    echo "<script>
        alert('Data siswa tidak ditemukan');
        window.location='siswa.php';
    </script>";
    exit;
}

if (isset($_POST['update'])) {

    $nis      = mysqli_real_escape_string($conn, $_POST['nis']);
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $jk       = mysqli_real_escape_string($conn, $_POST['jk']);
    $kelas    = mysqli_real_escape_string($conn, $_POST['kelas']);
    $alamat   = mysqli_real_escape_string($conn, $_POST['alamat']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $no_hp    = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    mysqli_query($conn, "UPDATE siswa SET
        nis='$nis',
        nama='$nama',
        jk='$jk',
        kelas='$kelas',
        alamat='$alamat',
        email='$email',
        no_hp='$no_hp',
        username='$username'
        WHERE id_siswa='$id'
    ");

    echo "<script>
        alert('Data berhasil diubah');
        window.location='siswa.php';
    </script>";
}
?>

<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<div class="content">

    <nav class="navbar">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h3 class="fw-bold mb-0">
                <i class="fas fa-user-edit text-warning"></i>
                Edit Data Siswa
            </h3>

            <a href="siswa.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </nav>

    <div class="card">

        <div class="card-header bg-warning text-dark">
            Edit Data Siswa
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control"
                           value="<?= $siswa['nis']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control"
                           value="<?= $siswa['nama']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-select">
                        <option value="Laki-laki" <?= ($siswa['jk']=="Laki-laki") ? "selected" : ""; ?>>
                            Laki-laki
                        </option>

                        <option value="Perempuan" <?= ($siswa['jk']=="Perempuan") ? "selected" : ""; ?>>
                            Perempuan
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control"
                           value="<?= $siswa['kelas']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="4"><?= $siswa['alamat']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="<?= $siswa['email']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control"
                           value="<?= $siswa['no_hp']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control"
                           value="<?= $siswa['username']; ?>">
                </div>

                <button type="submit" name="update" class="btn btn-warning">
                    <i class="fas fa-save"></i> Update
                </button>

                <a href="siswa.php" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>

            </form>

        </div>

    </div>

</div>

<?php include "template/footer.php"; ?>