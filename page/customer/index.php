<?php include '../../config/koneksi.php';
?>
<html>
<head>
    <title>Website Toko Online</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    
    <div class='header'>
        <div class='logo'>
            <h1>Toko Online</h1>
        </div>
        
        <div class='navbar'>
            <ul>
                <li><a href=''>Home</a></li>
                <li><a href=''>keranjang</a></li>
                <li><a href=''>kategori</a></li>
                <li><a href=''>cara belanja</a></li>
                <li><a href=''>logout</a></li>
                
            </ul>
        </div>
    </div>
    
    <div class='gambar'>
        
        <?php
            $query = $con_object->query("SELECT * FROM buku");
        ?>
        <?php foreach ($query as $q) : ?>
        <div class='foto'>
            <img src="../gambar/<?php echo $q['gambar']?>">
            <h1><?php echo $q ['judul']?></h1>
            <p><?php echo $q ['harga']?></p>
            <a href=''>Beli Sekarang</a>
        </div>
        <?php endforeach ?>
    </div>
    
    <div class='footer'>
        <p>Copyright 2019 - <a href=''>Ahmad Ansori</a></p>
    </div>
    
    
</body>
</html>