<?php

include_once '../../../connection/koneksi.php';

if ($_POST['id'] == '' || $_POST['kategori'] == '') {
    echo '';
}

$kat = $_POST['kategori'];
$id = $_POST['id'];

$update = $con_object->query("UPDATE kategori SET kategori = '$kat' WHERE kategori_id = $id");

if ($update) {
    echo true;
    return;
}
echo false;
