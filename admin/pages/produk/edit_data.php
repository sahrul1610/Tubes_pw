<style> 
    body {
  margin: 0;
  padding: 0;
  /* background: #efef; */
  font-size: 16px;
  color: #777;
  font-family: sans-serif;
  font-weight: 300;
}
#form-box {
  /* position: ; */
  display: flex;
  margin: 5% auto;
  margin-left: 20px;
  height: 100%;
  width: 100%;
  background: #c0c0c0;
  /* box-shadow: 0 2px 4px rgba(0, 0, 0.6); */
}
 select, input[type="text"],input[type="number"] {
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 4px;
  
  border: none;
  outline: none;
  border-bottom: 1px solid #aaa;
  font-family: sans-serif;
  font-weight: 400;
  font-size: 15px;
  margin-left:20px;
}
</style>
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
<h3>Ubah Data</h3> 
<hr>
<section id="form-box">
    
    <form method="POST" enctype="multipart/form-data">
    

        <input type="hidden" name="gambar_lama" value="<?php echo $gambar ?>">
        <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>">
                <table>
                    <thead>
                    <tr>
                        <td>Kategori</td>
                    </tr>
                    <tr>
                    <td>
                            <select name="kat" style='width:100vh;'>
                                <option value=""> - Pilih -</option>
                                <?php
                                    $query = $con_object->query("SELECT * FROM kategori");
                                ?>
                                <?php foreach ($query as $qr) : ?>
                                    <?php if ($id_ketegori == $qr['kategori_id']) : ?>
                                        <option value="<?php echo $qr['kategori_id'] ?>" selected>
                                            <?php echo $qr['kategori'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?php echo $qr['kategori_id'] ?>">
                                            <?php echo $qr['kategori'] ?>
                                        </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="text" name="judul" value="<?php echo $judul; ?>" style='width:100vh;'>
                        </td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="text" name="penerbit" value="<?php echo $penerbit; ?>" style='width:100vh;'>
                        </td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="text" name="pengarang" value="<?php echo $pengarang; ?>" style='width:100vh;'>
                        </td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                    </tr>
                    <tr>
                    <td>
                            <img src="pages/produk/gambar/<?php echo $gambar ?>" width="300px" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="file" name="gambar" value="<?php echo $gambar; ?>" style='width:100vh;'>
                        </td>
                    </tr>
                    <tr>
                        <td>halaman</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="text" name="halaman" value="<?php echo $halaman; ?>" style='width:100vh;'>
                        </td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="text" name="harga" value="<?php echo $harga; ?>" style='width:100vh;'>
                        </td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="number" name="stok" value="<?php echo $stok; ?>" style='width:100vh;'>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                    <tr>
                    <tr>
                        <td colspan="3">
                            <button name="btn-simpan" style="background-color: blue; font-size:20px; margin-bottom: 20px; margin-left:20px; border-radius:5px; color: white; ">
                            Ubah
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
    </section>

<?php
    
    if (isset($_POST['btn-simpan'])) {
        $id_buku = $_POST['id_buku'];

    $sql = $con_object->query("SELECT * FROM buku WHERE id_buku = $id_buku ");
    $data = $sql->fetch_array();
    $fotoBarang = $data['gambar'];

    $kat = $_POST['kat'];
    $judul = $_POST['judul'];
    $gambar = $_POST['gambar'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $halaman = $_POST['halaman'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar_lama;
    } else {
            
        if ($fotoBarang != NULL) {
            if (file_exists("pages/produk/gambar/$gambar_lama")) {
                unlink("page/produk/gambar/$gambar_lama");
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
            echo "<script>window.location.replace('?page=produk');</script>";
            exit;
        }

        // gambar siap di upload
        // generate nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensiGambar;

        
    }

    if (!empty($tmpname)) {
        move_uploaded_file($tmpname, 'pages/produk/gambar/' . $namafilebaru);
        $query = $con_object->query("UPDATE buku SET id_ketegori = '$kat', judul = '$judul', gambar = '$namafilebaru', penerbit = '$penerbit', pengarang = '$pengarang', halaman = '$halaman', harga = '$harga', stok = '$stok' WHERE id_buku = '$id_buku' ");
    } else {
        $query = $con_object->query("UPDATE buku SET id_ketegori = '$kat', judul = '$judul', penerbit = '$penerbit', pengarang = '$pengarang', halaman = '$halaman', harga = '$harga', stok = '$stok' WHERE id_buku = '$id_buku' ");
    }

    
    if ($query != 0) {
        echo "<script>alert('Berhasil');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
    }
    
}

?>