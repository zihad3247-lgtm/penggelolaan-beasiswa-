<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistem Pengelolaan Beasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    min-height:100vh;
    background:linear-gradient(135deg,#0d6efd,#20c997);
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Segoe UI',sans-serif;
}

.main-card{
    background:white;
    border-radius:25px;
    padding:50px;
    max-width:900px;
    width:100%;
    box-shadow:0 20px 50px rgba(0,0,0,.2);
}

.logo{
    font-size:70px;
}

.title{
    font-size:40px;
    font-weight:700;
    color:#0d6efd;
}

.subtitle{
    color:#6c757d;
}

.feature-box{
    padding:20px;
    border-radius:15px;
    background:#f8f9fa;
    transition:.3s;
}

.feature-box:hover{
    transform:translateY(-5px);
}

.btn-login{
    padding:12px 30px;
    font-size:18px;
    border-radius:50px;
}

</style>

</head>
<body>

<div class="main-card">

<div class="row align-items-center">

<div class="col-md-6 text-center">

<div class="logo">
🎓
</div>

<h1 class="title">
Sistem Pengelolaan Beasiswa
</h1>

<p class="subtitle">
Platform pendaftaran dan pengelolaan beasiswa siswa secara online.
</p>

<div class="mt-4">

<a href="auth/login.php"
class="btn btn-primary btn-login">

Login

</a>

</div>

</div>

<div class="col-md-6">

<div class="feature-box mb-3">
<h5>📋 Pendaftaran Online</h5>
<p class="mb-0">
Siswa dapat mendaftar beasiswa secara online dengan mudah.
</p>
</div>

<div class="feature-box mb-3">
<h5>📊 Monitoring Status</h5>
<p class="mb-0">
Pantau status pengajuan beasiswa secara realtime.
</p>
</div>

<div class="feature-box">
<h5>🏆 Pengelolaan Beasiswa</h5>
<p class="mb-0">
Admin dapat mengelola data beasiswa dan pendaftar dengan cepat.
</p>
</div>

</div>

</div>

<hr>

<div class="text-center text-muted">

© <?= date('Y'); ?> Sistem Pengelolaan Beasiswa

</div>

</div>

</body>
</html>
```
