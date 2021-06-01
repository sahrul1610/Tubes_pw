<?php include 'config/koneksi.php'; ?>
<?php
session_start();
if (!isset($_SESSION['login'])){
    
echo "<script>alert('logout dahulu');</script>";
echo "<script>window.location.replace('page/login/login.php');</script>";
}
$con = new mysqli("localhost", "root", "", "db_toko_sahrul");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard toko buku</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

    <input type="checkbox" id="check">
    <!-- header area start -->
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>Home <span>Toko buku</span></h3>
        </div>
        <div class="right_area">
            <a href="page/login/logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!-- header area end -->
    <!-- Sidebar start -->
    <div class="sidebar">
        <center>
            <img src="admin.png" class="profile_admin" alt="">
            <h4>Admin</h4>
        </center>
        <a href="?page=dashboard"><i class="fas fa-desktop"></i> <span>Home</span></a>
        <a href="?page=kategori"><i class="far fa-comment"></i> <span>Kategori</span></a>
        <a href="?page=buku"><i class="fas fa-newspaper"></i> <span>Buku</span></a>
        <a href="?page=customer"><i class="fas fa-sliders-h"></i> <span>Customer</span></a>
        <a href="#"><i class="fas fa-sliders-h"></i> <span>laporan</span></a>
        
    </div>
    <!-- Sidebar end -->
    <div class="content">
        <div class="isi">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-10">
                <?php require 'mod/halaman.php'; ?>

        </div>
        
    </div>
</body>
</html>