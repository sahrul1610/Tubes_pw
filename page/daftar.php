<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				Daftar Pelanggan
			</div>
			<div class="card-body">
				<form method="POST">
					<div class="form-group">
						<label> Nama </label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label> Username </label>
						<input type="text" class="form-control" name="username">
					</div>
					<div class="form-group">
						<label> Password </label>
						<input type="password" class="form-control" name="password">
					</div>
					<hr>
					<div class="form-group">
						<button type="submit" name="daftar" class="btn btn-success">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	if (isset($_POST['daftar'])) {
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$password = password_hash($password, PASSWORD_DEFAULT);

		$query = $con_object->query("INSERT INTO users (nama, username, password, role) VALUES ('$nama', '$username', '$password', 0) ");

		if ($query != 0) {
			echo "<script>alert('Berhasil');</script>";
			echo "<script>window.location.replace('?page=login');</script>";
		} else {
			echo "<script>alert('Gagal');</script>";
			echo "<script>window.location.replace('?page=daftar');</script>";
		}
	}
?>