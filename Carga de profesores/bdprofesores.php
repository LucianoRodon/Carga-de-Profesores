<?php
$servername = "18.229.159.97";
$username = "devs";
$password = "urqu1z4!";
$dbname = "terciario";
$port = 4548; 


$conn = new mysqli($servername, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>
