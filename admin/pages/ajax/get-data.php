<?php

include_once '../../../connection/koneksi.php';

$sql = $con_object->query("SELECT * FROM kategori");

$data = [];

while ($ambil = $sql->fetch_assoc()) {
    array_push($data, [
        'kategori_id' => $ambil['kategori_id'],
        'kategori' => $ambil['kategori']
    ]);
}

echo json_encode($data);
