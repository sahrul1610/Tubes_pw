<fieldset style="width: 115%;">
    <a href="?page=tambah-buku">Tambah Data</a>
    <hr>

    <table border="1" width="100%" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>judul</th>
                <th>penerbit</th>
                <th>pengarang</th>
                <th>gambar</rth>
                <th>Halaman</th>
                <th>harga</th>
                <th>stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nomor = 0;
                $sql = "SELECT * FROM buku ORDER BY id_buku ASC";
                $result = $con_object->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo ++$nomor; ?>.</td>
                            <td><?php echo $row['judul']; ?></td>
                            <td><?php echo $row['penerbit']; ?></td>
                            <td><?php echo $row['pengarang'] ?></td>
                            <td>
                                <img src="page/gambar/<?php echo $row['gambar']; ?>" width="100" alt="">
                            </td>
                            <td><?php echo $row['halaman'] ?></td>
                            <td><?php echo $row['harga'] ?></td>
                            <td><?php echo $row['stok'] ?></td>
                            <td>
                                <a href="?page=edit-data&id_buku=<?php echo $row['id_buku']; ?>"><button style="background-color: yellow; color:white;">Edit</button></a> &bull;
                                <form style="display: inline;" method="POST">
                                    <input type="hidden" name="id_buku" value="<?php echo $row['id_buku']; ?>">
                                    <button style="background-color:red; color:white;  " onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" type="submit" name="btn-hapus">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='6'><b><i>Note : Data Tidak Ada</i></b></td></tr>";
                }
            ?>
        </tbody>
    </table>
</fieldset>

<?php
    if (isset($_POST['btn-hapus'])) {
        $id_buku = $_POST['id_buku'];

        $sql = mysqli_query($con_object, "SELECT * FROM buku WHERE id_buku = $id_buku");
        $data = $sql->fetch_array();
        $foto = $data['gambar'];
        
        if (file_exists("page/gambar/$foto")) {
            unlink("page/gambar/$foto");
        }

        $query = $con_object->query("DELETE FROM buku WHERE id_buku = $id_buku ");

        if ($query != 0) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>window.location.replace('?page=buku');</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location.replace('?page=buku');</script>";
        }
    }
?>