<?php
    session_start();

	include '../../config/koneksi.php';

	$data = json_decode(file_get_contents("php://input"));

    //$nama = $data->nama;
	$username = $data->username;
	$password = $data->password;
	//$confirm_password = $data->confirm_password;

	$result = $con_object->query("SELECT * FROM admin WHERE username = '$username' ");
   // Insert record
    if (mysqli_num_rows($result) === 1) {
        $array = mysqli_fetch_assoc($result);

        if (password_verify($password, $array['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $array['username'];
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }

?>