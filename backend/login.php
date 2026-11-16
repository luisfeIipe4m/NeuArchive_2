<?php
session_start();
require_once 'conection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    header('location: ../index.php');
    exit();
}
$username = trim($_POST['username']);
$password = trim($_POST['password']);

if ($username == '' || $password == ''){
     header('location: ../index.php?error=empty_fields');
     exit();
}
$sql = "SELECT id, username, password FROM users WHERE username = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$username]);
$result = $stmt->get_result();
if ($result->num_rows > 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        session_regenerate_id();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('location: ../dashboard.php');
        exit();
    }
}
header('location: ../Login.html?error=login');
exit();
?>