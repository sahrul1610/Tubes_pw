<?php
require_once 'connection/koneksi.php';

if (isset($_SESSION['login'])) {
    if ($_SESSION['role'] == 1) {
        echo "<script>window.location.href = 'admin/index.php'</script>";
        return;
    }
    echo "<script>window.location.href = 'index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
    .container label {
        text-align: left;
        color: black;
    }
    .container form input {
        width: 100%;
        height: 40px;
        padding: 5px 0;
        border: none;
        background-color: #752bea;
        font-size: 18px;
        color: #fafafa;
        border-radius: 20px;
        text-align: left;
    }
</style>
</head>

<body>
    <div></div>
    <div class="container">
        <h1> Silahkan Registasi </h1>

        <form action="" method="POST">
            <label for="#nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" required><br>

            <label for="#username">Username</label>
            <input type="text" name="username" id="username" required><br>

            <label for="#password">Password</label>
            <input type="password" name="password" id="password" required><br>

            <label for="#confirm">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm" required><br>
            <button name="btn-register" value="REGISTER">register</button>
            <!-- <input type="submit" name="btn-register" class="tombol_login" value="REGISTER"> -->
            <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
        </form>
    </div>

    <?php

    if (isset($_POST['btn-register'])) {

        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = mysqli_real_escape_string($con_object, $_POST['password']);
        $confirm_password = $_POST['confirm_password'];

        $result = $con_object->query("SELECT * FROM users WHERE username = '$username' ");

        if (mysqli_fetch_assoc($result) > 0) {
            echo "<script>alert('Username Sudah Terdaftar');</script>";
            return;
        }

        if ($password !== $confirm_password) {
            echo "<script>alert('Konfirmasi Password Tidak Sesuai');</script>";
            return;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $con_object->query("INSERT INTO users (username,password,nama,role) VALUES('$username', '$password','$nama',0)");

        if ($query) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>window.location.replace('login.php');</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location.replace('register.php');</script>";
        }
    }

    ?>

</body>

</html>