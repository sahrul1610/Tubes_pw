<?php
session_start();
if (!isset($_SESSION['login'])){
    
echo "<script>alert('logout dahulu');</script>";
echo "<script>window.location.replace('login.php');</script>";
}
$con = new mysqli("localhost", "root", "", "db_toko_sahrul");
?>
<h1>selamat datang</h1> <?php echo $_SESSION['username']; ?> <a href="logout.php">logout</a>