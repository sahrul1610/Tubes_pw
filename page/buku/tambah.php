
    <fieldset>
        <legend>
            <a href="tambah.php">+ tambah data</a>
        </legend>
            <form method="POST" enctype="multipart/form-data">
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
                                    <option value="<?php echo $qr['id_ketegori'] ?>">
                                        <?php echo $qr['kategori']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>judul</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="judul">
                        </td>
                    </tr>
                    <tr>
                        <td>penerbit</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="penerbit">
                        </td>
                    </tr>
                    <tr>
                        <td>pengarang</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="pengarang">
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>gambar</td>
                        <td>:</td>
                        <td>
                            <input type="file" name="gambar">
                        </td>
                    </tr>
                    <tr>
                        <td>halaman</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="halaman">
                        </td>
                    </tr>
                    <tr>
                        <td>harga</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="harga">
                        </td>
                    </tr>
                    <tr>
                        <td>stok</td>
                        <td>:</td>
                        <td>
                            <input type="number" name="stok">
                        </td>
                    </tr>
                    <tr>
                    
                    
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
            echo "<sript>window.location.replace('?page=tambah-buku');</script>";
            exit;
            }
        
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namafile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
        
            if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
                echo "<script>alert('Bukan Gambar');</script>";
                echo "<script>window.location.replace('?page=tambah-buku');</script>";
                exit;
            }
        
            if ($ukuranfile > 1000000) {
                echo "<script>alert('Ukuran Terlalu Besar');</script>";
                echo "<sript>window.location.replace('?page=tambah-buku');</script>";
            }
        
            // gambar siap di upload
            // generate nama gambar baru
            $namafilebaru = uniqid();
            $namafilebaru .= '.';
            $namafilebaru .= $ekstensiGambar;
            
            move_uploaded_file($tmpname, 'page/gambar/' . $namafilebaru);
        
            $sql = $con_object->query("INSERT INTO buku VALUES('',$kat, '$judul', '$namafilebaru', '$penerbit', '$pengarang', '$halaman', '$harga', '$stok')");
        
            if ($sql != 0) {
                echo "<script>alert('Berhasil Mendapatkannya');</script>";
                echo "<script>window.location.replace('?page=buku');</script>";
            } else {
                echo "<script>alert('Yu Mundu Yu');</script>";
                echo "<script>window.location.replace('?page=buku');</script>";
            }
    }
?>