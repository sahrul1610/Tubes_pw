<?php
include_once 'connection/koneksi.php';

if (isset($_GET['buku']) && isset($_GET['qty'])) {
    $id = $_GET['buku'];
    $username = $_SESSION['username'];
    $sql = $con_object->query("SELECT * FROM buku WHERE id_buku = $id");
    $data = mysqli_fetch_assoc($sql);
    $sql_u = $con_object->query("SELECT user_id FROM users WHERE username = '$username'");
    $user_id = mysqli_fetch_assoc($sql_u);
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<style>
    .checkout-detail {
        width: 75%;
        margin: 10px auto;
    }

    .checkout-detail form {
        display: flex;
        flex-direction: column;
        border: 1px solid black;
        border-radius: 10px;
        padding: 10px;
    }

    .checkout-detail h2 {
        margin: 0;
    }

    .checkout-detail input[type='submit'] {
        border-style: none;
        border-radius: 10px;
        padding: 10px;
        font-weight: bold;
        color: white;
        background: rgb(255, 181, 167);
    }

    .checkout-detail table {
        margin: 10px 0;
    }

    .checkout-detail input[type='text'],
    .checkout-detail input[type='number'] {
        border-style: none;
        background: none;
    }
</style>

<body>
    <div class='header'>
        <h1 class="logo">Toko buku</h1>
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

    <div class="checkout-detail">
        <form action="transaksi.php" method="post">
            <input type="hidden" name="id_buku" value="<?= $data['id_buku']; ?>">
            <input type="hidden" name="user_id" value="<?= $user_id['user_id']; ?>">
            <h2>Checkout Detail</h2>
            <table>
                <tr>
                    <td style="font-weight: bold;">Nama Pengguna</td>
                    <td><input type="text" readonly name="nama" value="<?= $_SESSION['nama']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Nama Produk</td>
                    <td><input type="text" readonly name="judul" value="<?= $data['judul']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Harga</td>
                    <td><input type="number" readonly name="harga" value="<?= $data['harga']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Qty</td>
                    <td><input type="number" readonly name="qty" value="<?= $_GET['qty']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Total</td>
                    <td><input type="number" readonly name="sub_total" value="<?= $data['harga'] * $_GET['qty']; ?>"></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Checkout">
        </form>
    </div>
</body>

</html>