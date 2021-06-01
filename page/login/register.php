<?php
$con = new mysqli("localhost", "root", "", "db_toko_sahrul");
?>
<?php
session_start();

if (isset($_SESSION['login'])){
    echo "<script>alert('logout dahulu');</script>";
    echo "<script>window.location.replace('../?page=dashboard');</script>";
}
include '../../config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<link rel="stylesheet" href="../../css/style.css">
<style>
    .container label {
        text-align: left;
        color: black;
    }
    .container div input {
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
<h1>Register</h1>
<div>
<label> Nama </label>
    <input type="text" id="nama"><br>
<label>Username</label><br>
<input type="text" id="username"><br>
<label>password</label><br>
<input type="password" id="password"><br>
<label>confirmasi password</label><br>
<input type="password" id="confirm_password"><br>
<button id="btn-register">Register</button>
<p>Sudah punya akun? <a href="login.php">Login disini</a></p>
</div>

</div>

<script>
    document.getElementById("btn-register").addEventListener("click", insertRegister);
    function insertRegister() {

        let nama = document.getElementById('nama').value;
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        let confirm_password = document.getElementById('confirm_password').value;
        
        if(nama != '' && username != '' && password !='' && confirm_password != ''){
            
            if (confirm_password != password) {
                alert('Konfirmasi Tidak Sesuai');
                
                document.getElementById("nama").value = '';
                document.getElementById("username").value = '';
                document.getElementById("password").value = '';
                document.getElementById("confirm_password").value = '';
                
                window.location.replace("register.php");
                
            }
            
            let data = { nama : nama, username : username, password : password, confirm_password : confirm_password};
            let xhttp = new XMLHttpRequest();
            
            xhttp.open("POST", "ajaxFile.php", true);
            
            
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                    let response = this.responseText;
                    if(response == 1){
                        alert("Data Berhasil di Tambahkan.");
                        
                        document.getElementById("nama").value = "";
                        document.getElementById("username").value = '';
                        document.getElementById("password").value = '';
                        document.getElementById('confirm_password').value = '';
                        window.location.replace("login.php");
                    }
                }
            };
            
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.send(JSON.stringify(data));
        } else {
            alert('Tidak Boleh Kosong');
        }
    }
</script>
</body>
</html>