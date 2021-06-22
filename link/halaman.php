<?php

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "home";
	}

	switch ($page) {
		case 'home':
			include 'page/home.php';
			break;

		case 'beli' :
			include 'page/beli.php';
			break;

		case 'keranjang' :
			include 'page/keranjang.php';
			break;

		case 'hapus_keranjang' :
			include 'page/hapus_keranjang.php';
			break;

		case 'checkout':
			include 'page/checkout.php';
			break;

		case 'login':
			include 'page/login.php';
			break;

		case 'daftar':
			include 'page/daftar.php';
			break;

		case 'hapus_keranjang_checkout':
			include 'page/hapus_keranjang_checkout.php';
			break;
		
		default:
			echo "404 Not Found";
			break;
	}

?>