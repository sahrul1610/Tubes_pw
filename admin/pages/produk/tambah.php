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
  position: relative;
  margin: 5% auto;
  height: 550px;
  width: 600px;
  background: #c0c0c0;
  /* box-shadow: 0 2px 4px rgba(0, 0, 0.6); */
}
input[type="text"],input[type="number"] {
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 4px;
  width: 220px;
  border: none;
  outline: none;
  border-bottom: 1px solid #aaa;
  font-family: sans-serif;
  font-weight: 400;
  font-size: 15px;
}


</style>
    <fieldset id="form-box">
        <legend>
             Tambah Data
        </legend>
            <form method="POST" enctype="multipart/form-data">
                <table>
                    <thead>
                    <tr>
                        <td>Kategori</td>
                    </tr>
                    <tr>
                        <td>
                            <select name="kat" style="width:140vh">
                                <option value=""> - Pilih -</option>
                                <?php
                                    $query = $con_object->query("SELECT * FROM kategori");
                                ?>
                                <?php foreach ($query as $qr) : ?>
                                    <option value="<?php echo $qr['kategori_id'] ?>">
                                        <?php echo $qr['kategori']; ?>
                                    </option>
                                 <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="judul" style="width:140vh">
                        </td>   
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="text" name="penerbit" style="width:140vh">
                        </td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="text" name="pengarang" style="width:140vh">
                        </td>
                    <tr>
                        <td>Gambar</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="file" name="gambar">
                        </td>
                    </tr>       
                    <tr>
                        <td>Halaman</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="text" name="halaman" style="width:140vh">
                        </td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="text" name="harga" style="width:140vh">
                        </td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="number" name="stok" style="width:140vh">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button name="btn-tambah">
                            Tambah Data
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
    </fieldset>
    <?php
    if (isset($_POST["btn-tambah"])){
        $kat = $_POST['kat'];
        $judul = $_POST["judul"];
        $penerbit = $_POST["penerbit"];
        $pengarang = $_POST["pengarang"];
        $halaman = $_POST["halaman"];
        $harga = $_POST["harga"];
        $stok = $_POST["stok"];


        $namafile = $_FILES["gambar"]["name"];
        $ukuranfile = $_FILES["gambar"]["size"];
        $error = $_FILES["gambar"]["error"];
        $tmpname = $_FILES["gambar"]["tmp_name"];

        if($error ==4) { //4 adalah jumlah dari error
            echo "<script>alert('pilih gambar dahulu');</script>";
            echo "<sript>window.location.replace('?page=tambah-produk');</script>";
            exit;
            }
        
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namafile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
        
            if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
                echo "<script>alert('Bukan Gambar');</script>";
                echo "<script>window.location.replace('?page=tambah-produk');</script>";
                exit;
            }
        
            if ($ukuranfile > 1000000) {
                echo "<script>alert('Ukuran Terlalu Besar');</script>";
                echo "<sript>window.location.replace('?page=tambah-produk');</script>";
            }
        
            // gambar siap di upload
            // generate nama gambar baru
            $namafilebaru = uniqid();
            $namafilebaru .= '.';
            $namafilebaru .= $ekstensiGambar;
            
            move_uploaded_file($tmpname, 'pages/produk/gambar/' . $namafilebaru);
        
            $sql = $con_object->query("INSERT INTO buku VALUES('',$kat, '$judul', '$namafilebaru', '$penerbit', '$pengarang', '$halaman', '$harga', '$stok')");
        
            if ($sql != 0) {
                echo "<script>alert('Berhasil Mendapatkannya');</script>";
                echo "<script>window.location.replace('?page=produk');</script>";
            } else {
                echo "<script>alert('Yu Mundu Yu');</script>";
                echo "<script>window.location.replace('?page=produk');</script>";
            }
    }
?>