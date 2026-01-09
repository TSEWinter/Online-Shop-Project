<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
.header{
    background:#fff;
    padding:18px 48px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    box-shadow:0 6px 20px rgba(0,0,0,.06);
    position:sticky;
    top:0;
    z-index:100;
}
.logo{
    font-size:22px;
    font-weight:800;
}
.logo a{
    text-decoration:none;
    color:#111;
}
.logo a:hover{color:#555}
.nav{
    display:flex;
    align-items:center;
    gap:26px;
}
.nav > a{
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    color:#111;
}
.category{
    position:relative;
}
.category > a{
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    color:#111;
    padding:8px 4px;
    display:inline-block;
}
.category > a:hover{
    color:#667eea;
}
.dropdown{
    position:absolute;
    top:100%;
    left:0;
    min-width:230px;
    background:#fff;
    border-radius:14px;
    box-shadow:0 20px 40px rgba(0,0,0,.15);
    padding:14px;
    opacity:0;
    transform:translateY(20px);
    pointer-events:none;
    transition:.25s ease;
}
.category:hover .dropdown{
    opacity:1;
    transform:translateY(0);
    pointer-events:auto;
}
.dropdown a{
    display:block;
    padding:10px 14px;
    border-radius:8px;
    font-size:13px;
    font-weight:600;
    color:#333;
    text-decoration:none;
    transition:.2s;
}
.dropdown a:hover{
    background:#f3f4f6;
    color:#667eea;
}
.auth{
    display:flex;
    align-items:center;
    gap:12px;
}
.btn{
    padding:10px 18px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
    text-decoration:none;
}
.btn-login{
    background:#f1f3f5;
    color:#111;
}
.btn-register{
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:#fff;
}
.btn-logout{
    background:#111;
    color:#fff;
}
.btn-dashboard{
    background:#667eea;
    color:#fff;
}
</style>

<div class="header">
    <div class="logo">
        <a href="home.php">Online Shop</a>
    </div>
    <div class="nav">

        <a href="home.php">Нүүр</a>
        <div class="category">
            <a href="category.php?cat=men">Цамц</a>
            
        </div>
        <div class="category">
            <a href="category.php?cat=women">Өмд</a>
           
        </div>
        <div class="category">
            <a href="category.php?cat=kids">Гутал</a>
           
        </div>
        <div class="category">
            <a href="category.php?cat=electronics">Электрон</a>
            
        </div>
        <div class="category">
            <a href="category.php?cat=jewelry">Үнэт эдлэл</a>
            
        </div>

    </div>
    <div class="auth">
        <?php if (isset($_SESSION['admin_id'])): ?>
            <a href="admin/dashboard.php" class="btn btn-dashboard">Dashboard</a>
            <a href="logout.php" class="btn btn-logout">Гарах</a>

        <?php elseif (isset($_SESSION['user_id'])): ?>
            <a href="logout.php" class="btn btn-logout">Гарах</a>

        <?php else: ?>
            <a href="login.php" class="btn btn-login">Нэвтрэх</a>
            <a href="register.php" class="btn btn-register">Бүртгүүлэх</a>
        <?php endif; ?>
    </div>

</div>
