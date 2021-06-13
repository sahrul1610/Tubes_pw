<?php

include_once 'connection/koneksi.php';

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $id_buku = $_POST['id_buku'];
    $qty = $_POST['qty'];
    $sub_total = $_POST['sub_total'];
    
    $sql = $con_object->query("INSERT INTO checkout (checkout_id, user_id, produk_id, qty, sub_total) VALUES ('',$user_id,$id_buku,$qty,$sub_total)");
    if ($sql) {
        echo "<script>alert('Checkout Berhasil!')
        window.location.href = 'index.php'</script>";
        return;
    } else {
        echo "<script>alert('Checkout Gagal!')
        window.location.href = 'index.php'</script>";
        return;
    }
}
