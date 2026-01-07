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
    justify-content:space-between;
    align-items:center;
    box-shadow:0 6px 20px rgba(0,0,0,.06);
}
.logo{
    font-size:22px;
    font-weight:800;
}
.nav{
    display:flex;
    align-items:center;
    gap:14px;
}
.nav a{
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    padding:10px 18px;
    border-radius:999px;
    transition:.2s;
}

/* BUTTON STYLES */
.btn-login{
    color:#111;
    background:#f1f3f5;
}
.btn-login:hover{
    background:#e9ecef;
}
.btn-register{
    color:#fff;
    background:linear-gradient(135deg,#667eea,#764ba2);
}
.btn-register:hover{opacity:.9}
.btn-logout{
    color:#fff;
    background:#111;
}
.btn-logout:hover{opacity:.85}
.btn-dashboard{
    color:#fff;
    background:#667eea;
}
</style>

<div class="header">
    <div class="logo">Online Shop</div>

    <div class="nav">
        <a href="home.php">Нүүр</a>

        <?php if (isset($_SESSION['admin_id'])): ?>
            <a href="admin/dashboard.php" class="btn-dashboard">Dashboard</a>
            <a href="logout.php" class="btn-logout">Гарах</a>

        <?php elseif (isset($_SESSION['user_id'])): ?>
            <a href="logout.php" class="btn-logout">Гарах</a>

        <?php else: ?>
            <a href="login.php" class="btn-login">Нэвтрэх</a>
            <a href="register.php" class="btn-register">Бүртгүүлэх</a>
        <?php endif; ?>
    </div>
</div>
