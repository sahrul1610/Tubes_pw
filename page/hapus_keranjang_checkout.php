<?php
	$id_buku = $_GET['id_buku'];
	unset($_SESSION["keranjang"][$id_buku]);

	echo "<script>alert('Produk Terhapus');</script>";
	echo "<script>location='?page=keranjang';</script>";
?>