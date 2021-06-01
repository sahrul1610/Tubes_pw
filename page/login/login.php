<?php

session_start();

if (isset($_SESSION['login'])) {
	echo "<script>alert('Logout Dahulu');</script>";
	echo "<script>window.location.replace('index.php');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        .container label {
            text-align: left;
            color: black;
        }
        .container .form input {
            width: 100%;
            height: 40px;
            padding: 5px 0;
            border: none;
            background-color: #752bea;
            font-size: 18px;
            color: #fafafa;
            border-radius: 20px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <div class="form">
            <label>Username</label><br>
            <input type="text" id="username"><br>
            <label>Password</label><br>
            <input type="password" id="password"><br>
            <button id="btn">Login</button>
            <p>belum punya akun? <a href="register.php">register disini</a></p>
        </div>
    </div>
    
<script>
    document.getElementById("btn").addEventListener("click", login);
    function login() {

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if(username != '' && password !=''){

        var data = { username : username, password : password};
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "ajax.php", true);

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var response = this.responseText;
                if(response == 1){
                    alert("Berhasil Login");
                    
                    window.location.replace('../../?page=dashboard');
                } else {
                    alert("Gagal Login");
                }
            }
        };

    xhttp.setRequestHeader("Content-Type", "application/json");

    xhttp.send(JSON.stringify(data));
    }

    }
</script>

</body>
</html>