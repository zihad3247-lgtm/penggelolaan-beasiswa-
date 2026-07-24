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

if (!$row) {
    echo "<script>alert('Data tidak ditemukan!');window.location='beasiswa.php';</script>";
    exit;
}

if (isset($_POST['update'])) {

    $nama       = mysqli_real_escape_string($conn, $_POST['nama_beasiswa']);
    $kuota      = mysqli_real_escape_string($conn, $_POST['kuota']);
    $tahun      = mysqli_real_escape_string($conn, $_POST['tahun']);
    $deskripsi  = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    $namaBaru = $row['gambar'];

    if ($_FILES['gambar']['name'] != "") {

        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];

        $namaBaru = time() . "_" . $gambar;

        if (move_uploaded_file($tmp, "../upload/" . $namaBaru)) {

            if ($row['gambar'] != "" && file_exists("../upload/" . $row['gambar'])) {
                unlink("../upload/" . $row['gambar']);
            }

        } else {

            echo "<script>alert('Upload gambar gagal!');</script>";
            $namaBaru = $row['gambar'];

        }
    }

    mysqli_query($conn,"UPDATE beasiswa SET
        nama_beasiswa='$nama',
        kuota='$kuota',
        tahun='$tahun',
        deskripsi='$deskripsi',
        gambar='$namaBaru'
        WHERE id_beasiswa='$id'
    ");

    echo "
    <script>
        alert('Data berhasil diupdate');
        window.location='beasiswa.php';
    </script>
    ";
}
?>

<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<div class="content">

    <nav class="navbar">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div>
                <h3 class="fw-bold mb-0">
                    <i class="fas fa-edit text-warning"></i>
                    Edit Data Beasiswa
                </h3>
            </div>

            <a href="beasiswa.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </nav>

    <div class="card">

        <div class="card-header bg-warning text-dark">
            Edit Data Beasiswa
        </div>

        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Nama Beasiswa</label>
                    <input
                        type="text"
                        name="nama_beasiswa"
                        class="form-control"
                        value="<?= $row['nama_beasiswa']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kuota</label>
                    <input
                        type="number"
                        name="kuota"
                        class="form-control"
                        value="<?= $row['kuota']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun</label>
                    <input
                        type="text"
                        name="tahun"
                        class="form-control"
                        value="<?= $row['tahun']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea
                        name="deskripsi"
                        rows="5"
                        class="form-control"
                        required><?= $row['deskripsi']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label>
                    <br>

                    <?php if($row['gambar']!=""){ ?>

                        <img src="../upload/<?= $row['gambar']; ?>"
                             width="180"
                             class="img-thumbnail">

                    <?php } else { ?>

                        <div class="text-muted">
                            Belum ada gambar
                        </div>

                    <?php } ?>

                </div>

                <div class="mb-3">
                    <label class="form-label">Ganti Gambar</label>
                    <input
                        type="file"
                        name="gambar"
                        class="form-control">
                </div>

                <button
                    type="submit"
                    name="update"
                    class="btn btn-warning">

                    <i class="fas fa-save"></i>
                    Update Data

                </button>

                <a href="beasiswa.php" class="btn btn-secondary">

                    <i class="fas fa-times"></i>
                    Batal

                </a>

            </form>

        </div>

    </div>

</div>

<?php include "template/footer.php"; ?>