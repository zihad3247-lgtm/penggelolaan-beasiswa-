<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow mt-5 mb-5">

                <div class="card-header bg-success text-white text-center">

                    <h3>Registrasi Siswa</h3>

                </div>

                <div class="card-body">

                    <form action="proses_register.php" method="POST">

                        <div class="mb-3">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Jenis Kelamin</label>

                            <select name="jk" class="form-control" required>

                                <option value="">--Pilih--</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>

                            </select>

                        </div>

                        <div class="mb-3">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>No HP</label>
                            <input type="text" name="no_hp" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn btn-success w-100">

                            DAFTAR

                        </button>

                    </form>

                    <hr>

                    <center>

                        Sudah punya akun?

                        <a href="login.php">

                            Login

                        </a>

                    </center>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>