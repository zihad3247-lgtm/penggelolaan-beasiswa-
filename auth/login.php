<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login | Sistem Pengelolaan Beasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    font-family:'Poppins',sans-serif;

    background:linear-gradient(135deg,#0d6efd,#4f8cff);

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

}

.login-card{

    width:420px;

    border:none;

    border-radius:20px;

    overflow:hidden;

    box-shadow:0 20px 45px rgba(0,0,0,.25);

    animation:fade .8s;

}

@keyframes fade{

from{

opacity:0;

transform:translateY(30px);

}

to{

opacity:1;

transform:translateY(0);

}

}

.card-header{

    background:#0d6efd;

    color:white;

    text-align:center;

    padding:35px;

    border:none;

}

.logo{

    width:90px;

    height:90px;

    background:white;

    border-radius:50%;

    display:flex;

    justify-content:center;

    align-items:center;

    margin:auto;

    margin-bottom:15px;

}

.logo i{

    font-size:45px;

    color:#0d6efd;

}

.card-header h3{

    font-weight:bold;

    margin-bottom:5px;

}

.card-header p{

    margin:0;

    color:#d9e8ff;

}

.card-body{

    padding:35px;

}

.form-label{

    font-weight:500;

}

.input-group-text{

    background:#0d6efd;

    color:white;

    border:none;

}

.form-control{

    height:48px;

}

.form-control:focus{

    box-shadow:none;

    border-color:#0d6efd;

}

.btn-login{

    height:48px;

    font-weight:600;

    border-radius:10px;

    transition:.3s;

}

.btn-login:hover{

    transform:translateY(-2px);

}

.footer-text{

    text-align:center;

    margin-top:20px;

}

.footer-text a{

    text-decoration:none;

    font-weight:600;

}

</style>

</head>

<body>

<div class="card login-card">

    <div class="card-header">

        <div class="logo">

            <i class="fas fa-graduation-cap"></i>

        </div>

        <h3>SIM BEASISWA</h3>

        <p>Sistem Pengelolaan Beasiswa</p>

    </div>

    <div class="card-body">

        <form action="proses_login.php" method="POST">

            <div class="mb-3">

                <label class="form-label">Username</label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>

                    <input
                    type="text"
                    name="username"
                    class="form-control"
                    placeholder="Masukkan Username"
                    required>

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label">Password</label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>

                    <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan Password"
                    required>

                </div>

            </div>

            <button class="btn btn-primary btn-login w-100">

                <i class="fas fa-sign-in-alt"></i>

                Login

            </button>

        </form>

        <div class="footer-text">

            Belum punya akun?

            <a href="register.php">

                Daftar Sekarang

            </a>

        </div>

    </div>

</div>

</body>

</html>