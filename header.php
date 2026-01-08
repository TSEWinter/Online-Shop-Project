<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
/* ===== HEADER ===== */
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

/* ===== NAV ===== */
.nav{
    display:flex;
    align-items:center;
    gap:18px;
}
.nav a{
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    color:#111;
}
.nav a:hover{color:#667eea}

/* ===== CATEGORY DROPDOWN ===== */
.category{
    position:relative;
}
.category-btn{
    cursor:pointer;
    font-weight:600;
}
.dropdown{
    position:absolute;
    top:38px;
    left:0;
    background:#fff;
    border-radius:14px;
    box-shadow:0 20px 40px rgba(0,0,0,.12);
    padding:14px;
    min-width:220px;
    display:none;
}
.dropdown a{
    display:block;
    padding:10px 14px;
    border-radius:8px;
    color:#111;
}
.dropdown a:hover{
    background:#f3f4f6;
    color:#667eea;
}
.category:hover .dropdown{
    display:block;
}

/* ===== AUTH BUTTONS ===== */
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

    <!-- LOGO -->
    <div class="logo">Online Shop</div>

    <!-- NAV -->
    <div class="nav">

        <a href="home.php">Нүүр</a>

        <!-- CATEGORY -->
        <div class="category">
            <span class="category-btn">Ангилал ▾</span>
            <div class="dropdown">
                <a href="category.php?cat=shoes">👟 Гутал</a>
                <a href="category.php?cat=shirts">👕 Цамц</a>
                <a href="category.php?cat=pants">👖 Өмд</a>
                <a href="category.php?cat=tech">💻 Технологи</a>
                <a href="category.php?cat=electronics">📱 Электрон бараа</a>
                <a href="category.php?cat=jewelry">💎 Үнэт эдлэл</a>
            </div>
        </div>

    </div>

    <!-- AUTH -->
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
