<?php

include "../config/koneksi.php";

$data = json_decode(file_get_contents("php://input"));

$id_ketegori = $data->id_ketegori;
$kategori = $data->kategori;

$sql = $con_object->query("UPDATE kategori SET kategori = '$kategori' WHERE id_ketegori = $id_ketegori");

if($sql){
    echo 1; 
}else{
    echo 0;
}

exit;