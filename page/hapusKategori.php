<?php

include "../config/koneksi.php";
$id_ketegori = $_GET["id_ketegori"];
$sql = $con_object->query("DELETE FROM kategori WHERE id_ketegori = $id_ketegori");

if($sql){
    echo 1; 
}else{
    echo 0;
}

exit;