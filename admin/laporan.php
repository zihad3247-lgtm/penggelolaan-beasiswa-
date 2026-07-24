<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['level'] != "admin") {
    header("Location: ../auth/login.php");
    exit;
}

$query = mysqli_query($conn,"
SELECT
    p.*,
    s.nis,
    s.nama,
    s.kelas,
    b.nama_beasiswa,
    b.tahun
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
            <h4 class="fw-bold mb-0">
                Laporan Pendaftaran Beasiswa
            </h4>

            <a href="cetak_laporan.php"
               target="_blank"
               class="btn btn-success">
                <i class="bi bi-printer-fill"></i>
                Cetak Laporan
            </a>
        </div>
    </nav>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th width="60">No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Beasiswa</th>
                            <th width="90">Tahun</th>
                            <th width="140">Tanggal Daftar</th>
                            <th width="120">Status</th>
                            <th width="120">Berkas</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    $no = 1;

                    while($row = mysqli_fetch_assoc($query)){
                    ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td><?= $row['nis']; ?></td>

                            <td><?= $row['nama']; ?></td>

                            <td><?= $row['kelas']; ?></td>

                            <td><?= $row['nama_beasiswa']; ?></td>

                            <td><?= $row['tahun']; ?></td>

                            <td><?= $row['tanggal_daftar']; ?></td>

                            <td>

                                <?php

                                if($row['status']=="Diterima"){

                                    echo "<span class='badge bg-success'>Diterima</span>";

                                }elseif($row['status']=="Ditolak"){

                                    echo "<span class='badge bg-danger'>Ditolak</span>";

                                }else{

                                    echo "<span class='badge bg-warning text-dark'>Menunggu</span>";

                                }

                                ?>

                            </td>

                            <td>

                                <?php

                                if($row['berkas']!=""){

                                    // Lokasi file PDF berada di upload/berkas/
                                    $file = "../upload/berkas/".$row['berkas'];

                                    if(file_exists($file)){
                                ?>

                                        <a href="<?= $file; ?>"
                                           target="_blank"
                                           class="btn btn-info btn-sm">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                            Lihat
                                        </a>

                                <?php

                                    }else{

                                        echo "<span class='badge bg-danger'>File Tidak Ada</span>";

                                    }

                                }else{

                                    echo "-";

                                }

                                ?>

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