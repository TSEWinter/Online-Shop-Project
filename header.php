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

/* ===== LOGO ===== */
.logo{
    font-size:22px;
    font-weight:800;
}
.logo a{
    text-decoration:none;
    color:#111;
}
.logo a:hover{color:#555}

/* ===== NAV ===== */
.nav{
    display:flex;
    align-items:center;
    gap:22px;
}
.nav a{
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    color:#111;
}
.nav a:hover{
    color:#667eea;
}

/* ===== CATEGORY INLINE ===== */
.categories{
    display:flex;
    align-items:center;
    gap:18px;
    margin-left:10px;
}
.categories a{
    font-size:13px;
    font-weight:600;
    text-decoration:none;
    color:#444;
    padding:6px 10px;
    border-radius:8px;
    transition:.2s;
}
.categories a:hover{
    background:#f3f4f6;
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

    <!-- LOGO -->
    <div class="logo">
        <a href="home.php">Online Shop</a>
    </div>

    <!-- NAV + CATEGORY -->
    <div class="nav">
        <a href="home.php">Нүүр</a>

        <!-- CATEGORY INLINE -->
        <div class="categories">
            <a href="category.php?cat=shoes">👟 Гутал</a>
            <a href="category.php?cat=shirts">👕 Цамц</a>
            <a href="category.php?cat=pants">👖 Өмд</a>
            <a href="category.php?cat=bag">👜 Цүнх</a>
            <a href="category.php?cat=electronics">📱 Электрон</a>
            <a href="category.php?cat=jewelry">💎 Үнэт эдлэл</a>
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
