<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistem Pengelolaan Beasiswa</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

html,body{
    height:100%;
}

body{
    font-family:'Poppins',sans-serif;
    background:#eef3f8;
    overflow-x:hidden;
}

/* ==========================
SIDEBAR
========================== */

.sidebar{
    position:fixed;
    top:0;
    left:0;
    width:260px;
    height:100vh;
    background:linear-gradient(180deg,#0d6efd,#084298);
    color:#fff;
    box-shadow:5px 0 20px rgba(0,0,0,.15);
    overflow-y:auto;
    z-index:1000;
}

.sidebar .logo{
    text-align:center;
    padding:25px 15px;
    border-bottom:1px solid rgba(255,255,255,.15);
}

.sidebar .logo i{
    font-size:48px;
    margin-bottom:10px;
}

.sidebar .logo h4{
    font-weight:700;
    margin-bottom:5px;
}

.sidebar .logo small{
    color:#dbe7ff;
}

.sidebar .mt-4{
    display:flex;
    flex-direction:column;
}

.sidebar a{
    display:flex;
    align-items:center;
    gap:12px;
    padding:15px 25px;
    color:#fff;
    text-decoration:none;
    transition:.3s;
}

.sidebar a i{
    width:22px;
    text-align:center;
    font-size:18px;
}

.sidebar a:hover{
    background:rgba(255,255,255,.15);
    padding-left:32px;
}

.sidebar a.active{
    background:#fff;
    color:#0d6efd;
    font-weight:600;
}

.sidebar hr{
    margin:15px 20px;
    border-color:rgba(255,255,255,.3);
}

/* ==========================
CONTENT
========================== */

.content{
    margin-left:260px;
    padding:30px;
    min-height:calc(100vh - 80px);
}

/* ==========================
NAVBAR
========================== */

.navbar{
    background:#fff;
    border-radius:15px;
    padding:15px 25px;
    margin-bottom:25px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

/* ==========================
CARD
========================== */

.card{
    border:none;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.card-header{
    background:#0d6efd;
    color:#fff;
    font-weight:600;
}

/* ==========================
TABLE
========================== */

.table{
    margin-bottom:0;
}

.table thead{
    background:#0d6efd;
    color:#fff;
}

.table th,
.table td{
    vertical-align:middle;
}

.table tbody tr:hover{
    background:#eef6ff;
}

/* ==========================
FORM
========================== */

.form-control,
.form-select{
    border-radius:10px;
}

.form-control:focus,
.form-select:focus{
    border-color:#0d6efd;
    box-shadow:none;
}

/* ==========================
BUTTON
========================== */

.btn{
    border-radius:10px;
}

/* ==========================
IMAGE
========================== */

.img-table{
    width:70px;
    height:70px;
    object-fit:cover;
    border-radius:8px;
    border:1px solid #ddd;
}

/* ==========================
FOOTER
========================== */

footer{
    margin-left:260px;
    background:#fff;
    border-top:1px solid #ddd;
    padding:15px 25px;
}

/* ==========================
RESPONSIVE
========================== */

@media(max-width:768px){

.sidebar{
    position:relative;
    width:100%;
    height:auto;
}

.content{
    margin-left:0;
    padding:15px;
}

footer{
    margin-left:0;
}

}

</style>

</head>

<body>