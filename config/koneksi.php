<?php
// ======================================
// Konfigurasi Database
// Sistem Pengelolaan Beasiswa
// ======================================

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_beasiswa";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("
    <div style='
        width:450px;
        margin:100px auto;
        padding:30px;
        font-family:Poppins,Arial,sans-serif;
        background:#fff;
        border-radius:15px;
        box-shadow:0 5px 20px rgba(0,0,0,.15);
        text-align:center;
    '>

        <h2 style='color:#dc3545;'>
            ❌ Koneksi Database Gagal
        </h2>

        <p>
            Tidak dapat terhubung ke database.
        </p>

        <hr>

        <small style='color:gray;'>
            ".mysqli_connect_error()."
        </small>

    </div>
    ");
}

// Mengatur zona waktu
date_default_timezone_set('Asia/Jakarta');

// Menggunakan karakter UTF-8
mysqli_set_charset($conn, "utf8");
?>