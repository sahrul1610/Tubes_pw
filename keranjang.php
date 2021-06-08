<?php
require_once 'connection/koneksi.php';
?>
<html>

<head>
    <title>Toko buku</title>
    <link rel='stylesheet' href="css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>

    <div class='header'>
        <h1 class="logo">toko Buku</h1>
        <ul class="navbar">
            <li><a href='index.php'>Home</a></li>
            <li><a href=''>keranjang</a></li>
            <li><a href=''>Kategori</a></li>
            <li><a href=''>cara belanja</a></li>
            <li>
                <?php
                if (isset($_SESSION['login'])) { ?>
                    <a href="logout.php"><?= $_SESSION['nama']; ?></a>
                <?php
                } else {
                ?>
                    <a href="login.php">Login</a>
                <?php
                }
                ?>
            </li>
        </ul>
    </div>

    <div class="gambar">
    <table border="1" cellpadding="10" cellspacing="0" style="witdth:100%;">
    
    <thead style="background:#c0c0c0;">
        <tr>
            <th>No.</th>
            <th>Buku</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        <?php foreach ($_SESSION["keranjang"] as $id_buku => $jumlah): ?>
            <?php
				$ambil = $con_object->query("SELECT * FROM buku WHERE id_buku = '$id_buku'");
				$yoyo = $ambil->fetch_assoc();

				$subharga = $yoyo["harga"] * $jumlah;
			?>
            <tr>
                <td><?php echo ++$no; ?></td>
                <td><?php echo $yoyo['judul']; ?></td>
                <td>Rp. <?php echo number_format($yoyo['harga']); ?></td>
                <td><?php echo $jumlah; ?></td>
                <td>
                    <a href="hapusKeranjang.php?id_buku=<?php echo $id_buku ?>"> Hapus </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a href="index.php">Lanjutkan Belanja</a>
            </td>
            <td>
                <a href="checkout.php"> Checkout </a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
    <br>
    <footer class="footer-distributed">

      <div class="footer-left">

        <h3>Home Buku</h3>
        
      </div>

      <div class="footer-center">

        <div>
          
          <p><span>Jl. kujang jaya Blok dampyang Rt.06 Rw.02 Indramayu</p>
        </div>

        <div>
          
          <p>Telp. (0877) 123456</p>
        </div>

        <div>
          
          <p><a href="mailto:tokoBuku@gmail.com">TokoBuku@gmail.com</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the company</span>
          Toko buku adalah salah satu toko di Indramayu yang mewarkan Berbagai macam Buku dengan harga yang terjangkau.
        </p>

        <div class="footer-icons">

          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          

        </div>

      </div>

    </footer>
</body>

</html>