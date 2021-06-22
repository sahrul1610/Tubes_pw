<?php
	$id_buku = $_GET['id_buku'];

	if (isset($_SESSION['keranjang'][$id_buku])) {
		$_SESSION['keranjang'][$id_buku]+=1;
	}
	else{
		$_SESSION['keranjang'][$id_buku] = 1;
	}

	echo "<script>alert('Produk Sudah Masuk ke Keranjang');</script>";
	echo "<script>location='?page=keranjang';</script>";
?>