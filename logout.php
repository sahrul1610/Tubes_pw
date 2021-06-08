<?php
session_start();
if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href = 'login.php'</script>";
    return;
}
session_destroy();
echo "<script>alert('Berhasil Logout');</script>";
echo "<script>window.location.replace('login.php');</script>";
