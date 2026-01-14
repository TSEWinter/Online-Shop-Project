<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) == 1) {
        $_SESSION['reset_email'] = $email;
        header('Location: reset_password.php');
        exit;
    } else {
        $error = "⚠ Энэ имэйл бүртгэлгүй байна!";
    }
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Нууц үг сэргээх</title>
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
    background:#2563eb;
    color:#fff;
    border:none;
    font-weight:600;
}
.error{
    background:#fee2e2;
    color:#991b1b;
    padding:10px;
    border-radius:8px;
    margin-bottom:14px;
    text-align:center;
}
</style>
</head>
<body>

<div class="card">
<h2>Нууц үг сэргээх</h2>

<?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

<form method="post">
<input type="email" name="email" placeholder="Бүртгэлтэй имэйл" required>
<button name="submit">Үргэлжлүүлэх</button>
</form>

<p style="text-align:center;">
<a href="login.php">← Нэвтрэх</a>
</p>
</div>

</body>
</html>
