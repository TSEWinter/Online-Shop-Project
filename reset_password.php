<?php
include 'config.php';
session_start();

if (!isset($_SESSION['reset_email'])) {
    header('Location: forgot_password.php');
    exit;
}

$email = $_SESSION['reset_email'];

if (isset($_POST['submit'])) {
    $password = md5($_POST['password']);

    mysqli_query(
        $conn,
        "UPDATE users SET password='$password' WHERE email='$email'"
    );

    unset($_SESSION['reset_email']);

    header('Location: login.php?reset=success');
    exit;
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Шинэ нууц үг</title>
<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#f4f6fb;
    font-family:"Segoe UI",system-ui,sans-serif;
}
.card{
    width:360px;
    background:#fff;
    padding:30px;
    border-radius:14px;
    box-shadow:0 20px 40px rgba(0,0,0,.12);
}
h2{text-align:center;margin-bottom:20px}
input,button{
    width:100%;
    padding:14px;
    margin-bottom:14px;
    border-radius:10px;
    border:1px solid #ddd;
}
button{
    background:#16a34a;
    color:#fff;
    border:none;
    font-weight:600;
}
</style>
</head>
<body>

<div class="card">
<h2>Шинэ нууц үг</h2>

<form method="post">
<input type="password" name="password" placeholder="Шинэ нууц үг" required>
<button name="submit">Нууц үг солих</button>
</form>

</div>

</body>
</html>
