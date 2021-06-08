<!-- <a href="?page=tambah-kategori"> Tambah Data</a> -->
<hr>
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>username</th>
            <th>password</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        $sql = "SELECT * FROM users WHERE role = 0 ORDER BY nama ASC ";
        $result = $con_object->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo ++$no; ?>.</td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <button type="submit" name="btn-hapus">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='3'>Data Tidak Ada</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php

if (isset($_POST['btn-hapus'])) {
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM users WHERE user_id = $user_id";

    if ($con_object->query($sql) === TRUE) {
        echo "<script>alert('Data Berhasil di Hapus');</script>";
        echo "<script>window.location.replace('?page=customer');</script>";
        exit;
    } else {
        echo "<script>alert('Data Gagal di Hapus');</script>";
        echo "<script>window.location.replace('?page=customer');</script>";
        exit;
    }
}

?>