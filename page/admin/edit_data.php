<?php
    $id_buku = $_GET['id_buku'];
    $sql = "SELECT * FROM buku WHERE id_buku = $id_buku";
    $result = $con_object->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_buku = $row['id_buku'];
            $judul = $row['judul'];
            $penerbit = $row['penerbit'];
            $pengarang = $row['pengarang'];
            $halaman = $row['halaman'];
            $harga = $row['harga'];
            $stok = $row['stok'];
            $id_ketegori = $row['id_ketegori'];
            $gambar = $row['gambar'];
        }
    } else {
        echo "Data Tidak ada";
    }
?>
<fieldset>
    <legend>Ubah Data</legend>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="gambar_lama" value="<?php echo $gambar ?>">
        <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>">
                <table>
                    <thead>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>
                            <select name="kat">
                                <option value=""> - Pilih -</option>
                                <?php
                                    $query = $con_object->query("SELECT * FROM kategori");
                                ?>
                                <?php foreach ($query as $qr) : ?>
                                    <?php if ($id_ketegori == $qr['id_ketegori']) : ?>
                                        <option value="<?php echo $qr['id_ketegori'] ?>" selected>
                                            <?php echo $qr['kategori'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?php echo $qr['id_ketegori'] ?>">
                                            <?php echo $qr['kategori'] ?>
                                        </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>judul</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="judul" value="<?php echo $judul; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>penerbit</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="penerbit" value="<?php echo $penerbit; ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>pengarang</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="pengarang" value="<?php echo $pengarang; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td>:</td>
                        <td>
                            <img src="page/gambar/<?php echo $gambar ?>" width="300px" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>gambar</td>
                        <td>:</td>
                        <td>
                            <input type="file" name="gambar" value="<?php echo $gambar; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>halaman</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="halaman" value="<?php echo $halaman; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>harga</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="harga" value="<?php echo $harga; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>stok</td>
                        <td>:</td>
                        <td>
                            <input type="number" name="stok" value="<?php echo $stok; ?>">
                        </td>
                    </tr>
                    <tr>
                    <tr>
                    <tr>
                    <tr>
                        <td colspan="3">
                            <button name="btn-simpan">
                            ubah
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
</fieldset>

<?php
    
    if (isset($_POST['btn-simpan'])) {
        $id_buku = $_POST['id_buku'];

    $sql = $con_object->query("SELECT * FROM buku WHERE id_buku = $id_buku ");
    $data = $sql->fetch_array();
    $fotoBarang = $data['gambar'];

    $kat = $_POST['kat'];
    $judul = $_POST['judul'];
    $gambar_lama = $_POST['gambar_lama'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $halaman = $_POST['halaman'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar_lama;
    } else {
            
        if ($fotoBarang != NULL) {
            if (file_exists("page/gambar/$gambar_lama")) {
                unlink("page/gambar/$gambar_lama");
            }
        }

        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];

        if ($error == 4) { // 4 adalah jumlah dari error
            echo "<script>alert('Pilih Gambar Dahulu');</script>";
            echo "<script>window.location.replace('?page=barang');</script>";
            exit;
        }

        $ekstensiGambarValid = ['jpg','jpeg','png'];
        $ekstensiGambar = explode('.', $namafile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('Bukan Gambar');</script>";
        }
        if ($ukuranfile > 1000000) {
            echo "<script>alert('Ukuran Terlalu besar');</script>";
            echo "<script>window.location.replace('?page=buku');</script>";
            exit;
        }

        // gambar siap di upload
        // generate nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensiGambar;

        
    }

    if (!empty($tmpname)) {
        move_uploaded_file($tmpname, 'page/gambar/' . $namafilebaru);
        $query = $con_object->query("UPDATE buku SET id_ketegori = '$kat', judul = '$judul', gambar = '$namafilebaru', penerbit = '$penerbit', pengarang = '$pengarang', halaman = '$halaman', harga = '$harga', stok = '$stok' WHERE id_buku = '$id_buku' ");
    } else {
        $query = $con_object->query("UPDATE buku SET id_ketegori = '$kat', judul = '$judul', penerbit = '$penerbit', pengarang = '$pengarang', halaman = '$halaman', harga = '$harga', stok = '$stok' WHERE id_buku = '$id_buku' ");
    }

    
    if ($query != 0) {
        echo "<script>alert('Berhasil');</script>";
        echo "<script>window.location.replace('?page=buku');</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<script>window.location.replace('?page=buku');</script>";
    }
    
}

?>