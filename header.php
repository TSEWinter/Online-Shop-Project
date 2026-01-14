<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
/* ===== RESET ===== */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", system-ui, sans-serif;
}

/* ===== HEADER ===== */
.header{
    width:100%;
    background:#fff;
    border-bottom:1px solid #e5e7eb;
}

.header-inner{
    max-width:1300px;
    margin:0 auto;
    padding:16px 32px;

    display:flex;
    align-items:center;
    justify-content:space-between;
}

/* ===== LOGO ===== */
.logo a{
    font-size:22px;
    font-weight:800;
    text-decoration:none;
    color:#111;
}

/* ===== NAV ===== */
.nav{
    display:flex;
    align-items:center;
    gap:24px;
}

.nav a{
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    color:#333;
    white-space:nowrap;
}

.nav a:hover{
    color:#667eea;
}

/* ===== AUTH ===== */
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
    <div class="header-inner">

        <!-- LOGO -->
        <div class="logo">
            <a href="home.php">Online Shop</a>
        </div>

        <!-- NAV -->
        <div class="nav">
            <a href="home.php">Нүүр</a>
            <a href="category.php?cat=1">Цамц</a>
            <a href="category.php?cat=2">Өмд</a>
            <a href="category.php?cat=3">Гутал</a>
            <a href="category.php?cat=4">Электрон</a>
            <a href="category.php?cat=5">Үнэт эдлэл</a>
        </div>

        <!-- AUTH -->
        <div class="auth">
            <?php if (isset($_SESSION['admin_id'])): ?>
                
                <a href="logout.php" class="btn btn-logout">Гарах</a>

            <?php elseif (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="btn btn-logout">Гарах</a>

            <?php else: ?>
                <a href="login.php" class="btn btn-login">Нэвтрэх</a>
                <a href="register.php" class="btn btn-register">Бүртгүүлэх</a>
            <?php endif; ?>
        </div>

    </div>
</div>
