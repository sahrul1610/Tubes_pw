<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				Data Login
			</div>
			<div class="card-body">
				<form method="POST">
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
						<button type="submit" name="login" class="btn btn-success">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = $con_object->query("SELECT * FROM users WHERE username = '$username' ");

		if (mysqli_num_rows($sql) === 1) {
			$query = mysqli_fetch_assoc($sql);

			if (password_verify($password, $query['password'])) {
				$_SESSION['login_user'] = true;
				$_SESSION['pelanggan'] = $query;

				echo "<script>alert('Anda Berhasil Login');</script>";
				echo "<script>window.location.replace('?page=checkout');</script>";
			} else {
				echo "<script>alert('Maaf , Data Gagal di inputkan');</script>";
				echo "<script>window.location.replace('?page=login');</script>";
			}
		} else {
			echo "<script>alert('Maaf , Data Gagal di inputkan');</script>";
			echo "<script>window.location.replace('?page=login');</script>";
		}

	}

?>