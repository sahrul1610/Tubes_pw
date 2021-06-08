<?php
    session_start();
	$id_buku = $_GET['id_buku'];
	unset($_SESSION["keranjang"][$id_buku]);

	echo "<script>alert('buku Terhapus');</script>";
	echo "<script>location='keranjang.php';</script>";
?>