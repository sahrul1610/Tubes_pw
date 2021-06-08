<?php
include_once 'connection/koneksi.php';

if (isset($_GET['produk'])) {
    // header("refresh:0;url=http://localhost/tubes_pw_new");
    $id = $_GET['produk'];
    $sql = $con_object->query("SELECT * FROM buku WHERE id_buku = $id");
    $data = mysqli_fetch_assoc($sql);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Detail</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<style>
    .produk-detail button {
        width: 100%;
        border: none;
        border-radius: 10px;
        padding: 5px;
        margin: 2px;
    }

    #cart_btn {
        background: rgb(72, 177, 72);
        color: blue;
        font-weight: bold;
        cursor: pointer;
    }

    #check_btn {
        background: white;
        color: blue;
        font-weight: bold;
        cursor: pointer;
    }

    #cart_btn:hover {
        background: darkgreen;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    #check_btn:hover {
        background: darkorange;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<body>
    <div class='header'>
        <h1 class="logo">toko Buku</h1>
        <ul class="navbar">
            <li><a href='index.php'>Home</a></li>
            <li><a href=''>Keranjang</a></li>
            <li><a href=''>Kategori</a></li>
            <li><a href=''>Cara belanja</a></li>
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

    <div class="produk-detail">
        <div class="foto" style="width: 50%;height: 200px;background-image: url('<?php echo 'admin/pages/produk/gambar/' . $data['gambar']; ?>'); background-repeat: no-repeat;background-attachment: contain;background-position: center;background-size: contain;">
        </div>
        <div class="detail">
            <h2>Detail Buku</h2>
            <table>
                <tr>
                    <td style="font-weight: bold;">Judul</td>
                    <td><?= $data['judul']; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">penerbit</td>
                    <td><?= $data['penerbit']; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">pengarang</td>
                    <td><?= $data['pengarang']; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Harga</td>
                    <td><?= $data['harga']; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Stok</td>
                    <td><?= $data['stok']; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Qty</td>
                    <td><input type="number" name="qty" value="1" id="qty"></td>
                </tr>
                <tr>
                    <!-- <td><button onclick="addCart(<?php // $data['produk_id']; 
                                                        ?>)" id="cart_btn">Tambah Keranjang</button></td> -->
                    <td><Button onclick="buy(<?= $data['id_buku']; ?>)" id="check_btn">Beli Sekarang</Button></td>
                </tr>
            </table>
        </div>
    </div>

</body>

<script>
    // function addCart(id) {
    //     var xhttp = new XMLHttpRequest()
    //     const qty = document.getElementById('qty')
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             console.log('added')
    //         }
    //     };
    //     xhttp.open("POST", "http://localhost/tubes_pw_new/ajax/add-cart.php", true);
    //     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //     xhttp.send(`id=${id}&qty=${qty.value}`);
    // }

    function buy(id) {
        const qty = document.getElementById('qty')
        window.location.href = 'checkout.php?produk=' + id + '&qty=' + qty.value
    }
</script>

</html>