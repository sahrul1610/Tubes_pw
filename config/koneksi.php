<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_toko_sahrul";


// Create connection
$con_object = new mysqli($servername, $username, $password, $database);
$con_procedur = mysqli_connect($servername, $username, $password, $database);


// Check connection
if ($con_object->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!$con_procedur) {
    die("Connection failed: " . mysqli_connect_error());
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=db_toko_sahrul", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>