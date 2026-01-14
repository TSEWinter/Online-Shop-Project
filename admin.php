<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass  = mysqli_real_escape_string($conn,md5($_POST['password']));

    $q = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$pass'");
    if(mysqli_num_rows($q)>0){
        $row=mysqli_fetch_assoc($q);

        if($row['user_type']=='admin'){
            $_SESSION['admin_id']=$row['id'];
            header('Location: admin/dashboard.php'); exit;
        }else{
            $_SESSION['user_id']=$row['id'];
            header('Location: home.php'); exit;
        }
    }else{
        $error="Имэйл эсвэл нууц үг буруу!";
    }
}
?>
<!DOCTYPE html>
<html lang="mn">
<head><link rel="stylesheet" href="/Online-Shop-Project/css/responsive.css"></head>
<meta charset="UTF-8">
<title>Нэвтрэх</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{box-sizing:border-box;font-family:"Segoe UI",system-ui,sans-serif}
body{margin:0;height:100vh;overflow:hidden}

.bg{
    position:fixed;inset:0;
    z-index:-2;
}
.bg div{
    position:absolute;inset:0;
    background-size:cover;
    background-position:center;
    opacity:0;
    animation:bgSlide 30s infinite;
}



@keyframes bgSlide{
    0%{opacity:0;transform:scale(1)}
    10%{opacity:1}
    30%{opacity:1}
    40%{opacity:0;transform:scale(1.08)}
    100%{opacity:0}
}
.overlay{
    position:fixed;inset:0;
    background:rgba(0,0,0,.55);
    z-index:-1;
}
.wrapper{
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}
.card{
    width:380px;
    background:rgba(255,255,255,.95);
    padding:34px;
    border-radius:18px;
    box-shadow:0 30px 60px rgba(0,0,0,.35);
}
.card h2{
    text-align:center;
    margin-bottom:24px;
    font-size:22px;
}
input{
    width:100%;
    padding:14px;
    margin-bottom:14px;
    border-radius:10px;
    border:1px solid #ddd;
}
button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:#fff;
    font-weight:700;
    cursor:pointer;
}
.msg{
    background:#ffe3e3;
    color:#b00000;
    padding:10px;
    border-radius:8px;
    margin-bottom:14px;
    text-align:center;
}
.link{
    text-align:center;
    margin-top:16px;
}
.link a{color:#667eea;font-weight:600;text-decoration:none}
</style>
</head>

<body>

<div class="bg">
    <div></div><div></div><div></div><div></div><div></div>
</div>
<div class="overlay"></div>

<div class="wrapper">
    <form class="card" method="post">
        <h2>Нэвтрэх</h2>

        <?php if(isset($error)) echo '<div class="msg">'.$error.'</div>'; ?>

        <input type="email" name="email" placeholder="Имэйл" required>
        <input type="password" name="password" placeholder="Нууц үг" required>

        <button name="submit">Нэвтрэх</button>

        <div class="link">
            
            
        </div>
    </form>
</div>

</body>
</html>
