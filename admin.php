<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select_users = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE email='$email' AND password='$pass'"
    ) or die('Нэвтрэхэд алдаа гарлаа');

    if (mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);

        $_SESSION['user_id'] = $row['id'];
        header('location:home.php');
        exit;
    } else {
        $message[] = 'Имэйл эсвэл нууц үг буруу байна!';
    }
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Нэвтрэх</title>

<!-- FONT AWESOME ICON -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{box-sizing:border-box;font-family:"Segoe UI",system-ui,sans-serif}
body{
    margin:0;height:100vh;
    background:linear-gradient(135deg,#667eea,#764ba2);
    display:flex;align-items:center;justify-content:center;
    position:relative;
}
.brand-tag{
    position:absolute;
    top:24px;left:28px;
    font-size:14px;font-weight:600;
    color:#fff;opacity:.95;
}
.brand-tag span{font-weight:400;opacity:.85}
.card{
    width:380px;background:#fff;
    padding:32px;border-radius:14px;
    box-shadow:0 20px 50px rgba(0,0,0,.25)
}
.card h3{
    text-align:center;margin-bottom:22px;
    font-size:22px;font-weight:600
}
.card h3 i{
    margin-right:8px;
    color:#667eea;
}
input{
    width:100%;padding:14px;margin-bottom:14px;
    border-radius:8px;border:1px solid #ddd;
}
input:focus{outline:none;border-color:#667eea}
button{
    width:100%;padding:14px;border:none;
    border-radius:8px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:#fff;font-size:15px;font-weight:600;
    cursor:pointer;
}
button i{margin-right:6px}
.link{text-align:center;margin-top:16px;font-size:14px}
.link a{color:#667eea;font-weight:600;text-decoration:none}
.alert{
    background:#ffe3e3;color:#b30000;
    padding:10px;border-radius:6px;
    margin-bottom:14px;text-align:center;
}
</style>
</head>

<body>

<div class="brand-tag">
    Datacare ХХК · <span>Дадлага ажил</span>
</div>

<div class="card">

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<div class="alert">'.$msg.'</div>';
    }
}
?>

<form method="post">
    <h3><i class="fa-solid fa-right-to-bracket"></i>Нэвтрэх</h3>

    <input type="email" name="email" placeholder="Имэйл хаяг" required>
    <input type="password" name="password" placeholder="Нууц үг" required>

    <button name="submit">
        <i class="fa-solid fa-lock"></i>Нэвтрэх
    </button>

    <div class="link">
        Бүртгэлгүй юу? <a href="register.php">Бүртгүүлэх</a>
    </div>
</form>

</div>
</body>
</html>
