<?php

include_once '../../../connection/koneksi.php';

if ($_POST['id'] == '') {
    echo '';
}

$id = $_POST['id'];
$update = $con_object->query("DELETE FROM kategori WHERE kategori_id = $id");

if ($update) {
    echo true;
    return;
}
echo false;
