<?php

include "../config/koneksi.php";
$id_ketegori = $_GET["id_ketegori"];
$sql = $con_object->query("SELECT * FROM kategori WHERE id_ketegori = $id_ketegori");

$data = array();

while ($ambil = $sql->fetch_assoc()) {
    $data[] = array(
        'id_ketegori' => $ambil['id_ketegori'],
        'kategori' => $ambil['kategori']
    );
}

echo json_encode($data);
exit;