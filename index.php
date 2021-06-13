<?php
session_start();
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

        <?php
        $sql = $con_object->query("SELECT * FROM buku");
        $rows = $sql->num_rows;
        if ($rows > 0) {
            while ($data = mysqli_fetch_assoc($sql)) { ?>

                <div class='foto'>
                    <div style="width: 100%;height: 200px;background-image: url('<?php echo 'admin/pages/produk/gambar/' . $data['gambar']; ?>'); background-repeat: no-repeat;background-attachment: contain;background-position: center;background-size: contain;"></div>
                    <h1><?php echo $data['judul']; ?></h1>
                    <p>Harga <?php echo $data['harga']; ?></p>
                    <a href='produk_detail.php?produk=<?= $data['id_buku']; ?>'>Detail</a>
                    <!-- <a href="beli.php?id_buku=<?= $data['id_buku']; ?>"> Beli </a> -->
                </div>

        <?php
            }
        }
        ?>

</div>
        
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