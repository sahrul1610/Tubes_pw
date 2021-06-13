<section width="150%">
    <a href="?page=tambah-produk">Tambah Data</a>
    <hr>

    <table border="1" cellpadding="10" cellspacing="0" width="115%" height="60%">
        <thead style="background-color:#5F9EA0">
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Pengarang</th>
                <th>Gambar</th>
                <th>Halaman</th>
                <th>Harga</th>
                <th>Stok</th>
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
                            <img src="pages/produk/gambar/<?php echo $row['gambar']; ?>" width="100" alt="">
                        </td>
                        <td><?php echo $row['halaman'] ?></td>
                        <td><?php echo $row['harga'] ?></td>
                        <td><?php echo $row['stok'] ?></td>
                        <td>
                            <a href="?page=edit-data&id_buku=<?php echo $row['id_buku']; ?>"><button style="background-color:yellow; border-radius:25px; color:black">Edit</button></a> &bull;
                            <form style="display: inline;" method="POST">
                                <input type="hidden" name="id_buku" value="<?php echo $row['id_buku']; ?>">
                                <button style="background-color:red; border-radius:25px; color:white" onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" type="submit" name="btn-hapus">
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
        </section>

<?php
if (isset($_POST['btn-hapus'])) {
    $id_buku = $_POST['id_buku'];

    $sql = "DELETE FROM buku WHERE id_buku = $id_buku";

    if ($con_object->query($sql) === TRUE) {
        echo "<script>alert('Data Berhasil di Hapus');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
        exit;
    } else {
        echo "<script>alert('Data Gagal di Hapus');</script>";
        echo "<script>window.location.replace('?page=produk');</script>";
        exit;
    }
}
?>