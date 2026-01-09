<?php
include 'config.php';

if(isset($_POST['submit'])){
    $name  = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass  = mysqli_real_escape_string($conn,md5($_POST['password']));

    mysqli_query(
        $conn,
        "INSERT INTO users(name,email,password,user_type)
         VALUES('$name','$email','$pass','user')"
    );

    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Бүртгүүлэх</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{box-sizing:border-box;font-family:"Segoe UI",system-ui,sans-serif}
body{margin:0;height:100vh;overflow:hidden}
.bg{
    position:fixed;
    inset:0;
    z-index:-2;
}
.bg div{
    position:absolute;
    inset:0;
    background-size:cover;
    background-position:center;
    opacity:0;
    animation:bgSlide 30s infinite;
}
.bg div:nth-child(1){
    background-image:url('https://preview.thenewsmarket.com/Previews/ADID/StillAssets/1920x1080/645630_v4.jpg');
}
.bg div:nth-child(2){
    background-image:url('https://www.citybeach.com/dw/image/v2/BFZL_PRD/on/demandware.static/-/Sites-fewstoneMaster/default/dwdbb1eb36/images/20338962/20338962-01-FT-XL.jpg?sw=800&sh=1000&q=70');
    animation-delay:6s;
}
.bg div:nth-child(3){
    background-image:url('https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1600');
    animation-delay:12s;
}
.bg div:nth-child(4){
    background-image:url('https://png.pngtree.com/background/20230527/original/pngtree-silver-chain-bracelet-on-a-white-surface-picture-image_2766450.jpg');
    animation-delay:18s;
}
.bg div:nth-child(5){
    background-image:url('https://static.nike.com/a/images/w_2880,h_1410,c_fill,f_auto/eb3564b9-f6a0-4b89-9a93-32fe9263ef59/image.jpg');
    animation-delay:24s;
}

@keyframes bgSlide{
    0%{opacity:0;transform:scale(1)}
    10%{opacity:1}
    30%{opacity:1}
    40%{opacity:0;transform:scale(1.08)}
    100%{opacity:0}
}
.overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.55);
    z-index:-1;
}
.brand{
    position:absolute;
    top:24px;
    left:32px;
    color:#fff;
    font-size:14px;
    font-weight:600;
    opacity:.95;
}
.wrapper{
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}
.card{
    width:400px;
    background:rgba(255,255,255,.96);
    padding:36px;
    border-radius:20px;
    box-shadow:0 30px 60px rgba(0,0,0,.35);
}
.card h2{
    text-align:center;
    margin-bottom:26px;
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
.link{
    text-align:center;
    margin-top:18px;
}
.link a{
    color:#667eea;
    font-weight:600;
    text-decoration:none;
}
</style>
</head>

<body>
<div class="brand">
    Datacare ХХК · Дадлага ажил
</div>
<div class="bg">
    <div></div><div></div><div></div><div></div><div></div>
</div>
<div class="overlay"></div>
<div class="wrapper">
    <form class="card" method="post">
        <h2>Бүртгүүлэх</h2>

        <input type="text" name="name" placeholder="Нэр" required>
        <input type="email" name="email" placeholder="Имэйл" required>
        <input type="password" name="password" placeholder="Нууц үг" required>

        <button name="submit">Бүртгүүлэх</button>

        <div class="link">
            Аль хэдийн бүртгэлтэй юу? <a href="login.php">Нэвтрэх</a>
        </div>
    </form>
</div>

</body>
</html>
