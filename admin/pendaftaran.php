<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location: ../auth/login.php");
    exit;
}

$data = mysqli_query($conn, "
SELECT
    p.*,
    s.nis,
    s.nama,
    b.nama_beasiswa
FROM pendaftaran p
JOIN siswa s ON p.id_siswa = s.id_siswa
JOIN beasiswa b ON p.id_beasiswa = b.id_beasiswa
ORDER BY p.id_pendaftaran DESC
");

include "template/header.php";
include "template/sidebar.php";
?>

<div class="content">

    <nav class="navbar">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h4 class="fw-bold mb-0">Data Pendaftaran Beasiswa</h4>
        </div>
    </nav>

    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>
                            <th width="60">No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Beasiswa</th>
                            <th width="130">Tanggal</th>
                            <th width="120">Berkas</th>
                            <th width="130">Status</th>
                            <th width="180">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    $no = 1;

                    while($row = mysqli_fetch_assoc($data)){
                    ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td><?= $row['nis']; ?></td>

                            <td><?= $row['nama']; ?></td>

                            <td><?= $row['nama_beasiswa']; ?></td>

                            <td><?= $row['tanggal_daftar']; ?></td>

                            <td>

                                <?php if($row['berkas']!=""){ ?>

                                    <a href="../upload/berkas/<?= $row['berkas']; ?>"
                                       target="_blank"
                                       class="btn btn-info btn-sm">
                                        <i class="bi bi-file-earmark"></i> Lihat
                                    </a>

                                <?php }else{ ?>

                                    -

                                <?php } ?>

                            </td>

                            <td>

                                <?php

                                if($row['status']=="Menunggu"){

                                    echo "<span class='badge bg-warning text-dark'>Menunggu</span>";

                                }elseif($row['status']=="Diterima"){

                                    echo "<span class='badge bg-success'>Diterima</span>";

                                }else{

                                    echo "<span class='badge bg-danger'>Ditolak</span>";

                                }

                                ?>

                            </td>

                            <td>

                                <?php if($row['status']=="Menunggu"){ ?>

                                    <a href="terima.php?id=<?= $row['id_pendaftaran']; ?>"
                                       class="btn btn-success btn-sm">
                                        <i class="bi bi-check-circle"></i> Terima
                                    </a>

                                    <a href="tolak.php?id=<?= $row['id_pendaftaran']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin ingin menolak pendaftaran ini?')">
                                        <i class="bi bi-x-circle"></i> Tolak
                                    </a>

                                <?php }else{ ?>

                                    -

                                <?php } ?>

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