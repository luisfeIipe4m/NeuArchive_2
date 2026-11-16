<?php
$host = "localhost";
$user = "root";
$pass = "";
$bd = "BD-Nome";

$conn = new mysqli($host, $user, $pass, $bd);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>