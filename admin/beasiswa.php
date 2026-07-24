<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location: ../auth/login.php");
    exit;
}

$cari = "";

if (isset($_GET['cari'])) {
    $cari = mysqli_real_escape_string($conn, $_GET['cari']);

    $data = mysqli_query($conn, "SELECT * FROM beasiswa
        WHERE nama_beasiswa LIKE '%$cari%'
        ORDER BY id_beasiswa DESC");
} else {

    $data = mysqli_query($conn, "SELECT * FROM beasiswa
        ORDER BY id_beasiswa DESC");
}

include "template/header.php";
include "template/sidebar.php";
?>

<div class="content">

    <nav class="navbar">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h4 class="fw-bold mb-0">Data Beasiswa</h4>

            <a href="tambah_beasiswa.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Beasiswa
            </a>
        </div>
    </nav>

    <div class="card">

        <div class="card-body">

            <form method="GET" class="mb-3">

                <div class="input-group">

                    <input
                        type="text"
                        name="cari"
                        class="form-control"
                        placeholder="Cari Beasiswa..."
                        value="<?= $cari; ?>">

                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i> Cari
                    </button>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>
                            <th width="60">No</th>
                            <th width="120">Gambar</th>
                            <th>Nama Beasiswa</th>
                            <th width="100">Kuota</th>
                            <th width="100">Tahun</th>
                            <th width="170">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    $no = 1;

                    while($row = mysqli_fetch_assoc($data)){
                    ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td class="text-center">

                                <?php if(empty($row['gambar'])){ ?>

                                    -

                                <?php }else{ ?>

                                    <img src="../upload/<?= $row['gambar']; ?>"
                                         class="img-table">

                                <?php } ?>

                            </td>

                            <td><?= $row['nama_beasiswa']; ?></td>

                            <td><?= $row['kuota']; ?></td>

                            <td><?= $row['tahun']; ?></td>

                            <td>

                                <a href="edit_beasiswa.php?id=<?= $row['id_beasiswa']; ?>"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <a href="hapus_beasiswa.php?id=<?= $row['id_beasiswa']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    <i class="bi bi-trash"></i> Hapus

                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php include "template/footer.php"; ?>