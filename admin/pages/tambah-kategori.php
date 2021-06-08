<form method="POST">
    Nama Kategori : <input type="text" name="nama_kategori">
    <input type="submit" name="btn-simpan" value="Tambah">

</form>

<?php
if (isset($_POST['btn-simpan'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $sql = "INSERT INTO kategori (kategori) VALUES ('$nama_kategori')";

    if ($con_object->query($sql) === TRUE) {
        echo "<script>alert('Berhasil');</script>";
        echo "<script>window.location.replace('?page=kategori');</script>";
        exit;
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<script>window.location.replace('?page=tambah-kategori');</script>";
        exit;
    }
}
?>