<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">

    <!-- Logo -->
    <div class="logo">
        <i class="fas fa-graduation-cap"></i>
        <h4>SIM Beasiswa</h4>
        <small>Sistem Pengelolaan Beasiswa</small>
    </div>

    <!-- Menu -->
    <div class="mt-4">

        <a href="dashboard.php"
           class="<?= ($current == 'dashboard.php') ? 'active' : ''; ?>">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>

        <a href="siswa.php"
           class="<?= in_array($current, ['siswa.php','tambah_siswa.php','edit_siswa.php']) ? 'active' : ''; ?>">
            <i class="bi bi-people-fill"></i>
            <span>Data Siswa</span>
        </a>

        <a href="beasiswa.php"
           class="<?= in_array($current, ['beasiswa.php','tambah_beasiswa.php','edit_beasiswa.php']) ? 'active' : ''; ?>">
            <i class="bi bi-award-fill"></i>
            <span>Data Beasiswa</span>
        </a>

        <a href="pendaftaran.php"
           class="<?= in_array($current, ['pendaftaran.php','detail_pendaftaran.php']) ? 'active' : ''; ?>">
            <i class="bi bi-file-earmark-text-fill"></i>
            <span>Data Pendaftaran</span>
        </a>

        <a href="laporan.php"
           class="<?= ($current == 'laporan.php') ? 'active' : ''; ?>">
            <i class="bi bi-printer-fill"></i>
            <span>Laporan</span>
        </a>

        <hr class="text-white opacity-50">

        <a href="../auth/logout.php"
           onclick="return confirm('Yakin ingin logout?')">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>

    </div>

</div>