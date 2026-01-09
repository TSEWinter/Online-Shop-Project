<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>

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
