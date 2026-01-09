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
    gap:26px;
}
.nav > a{
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    color:#111;
}

/* ===== CATEGORY ROOT ===== */
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

/* ===== DROPDOWN ===== */
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

/* ===== DROPDOWN ITEMS ===== */
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

    <!-- NAV -->
    <div class="nav">

        <a href="home.php">Нүүр</a>

        <!-- ER HUGJIL -->
        <div class="category">
            <a href="category.php?cat=men">👨 Эрэгтэй</a>
            <div class="dropdown">
                <a href="category.php?cat=men&sub=shoes">👟 Гутал</a>
                <a href="category.php?cat=men&sub=shirt">👕 Цамц</a>
                <a href="category.php?cat=men&sub=pants">👖 Өмд</a>
                <a href="category.php?cat=men&sub=tshirt">👚 Футболк</a>
            </div>
        </div>

        <!-- EMEGTEI -->
        <div class="category">
            <a href="category.php?cat=women">👩 Эмэгтэй</a>
            <div class="dropdown">
                <a href="category.php?cat=women&sub=shoes">👠 Гутал</a>
                <a href="category.php?cat=women&sub=dress">👗 Даашинз</a>
                <a href="category.php?cat=women&sub=top">👚 Цамц</a>
                <a href="category.php?cat=women&sub=accessories">👜 Аксессуар</a>
            </div>
        </div>

        <!-- HUUHED -->
        <div class="category">
            <a href="category.php?cat=kids">🧒 Хүүхэд</a>
            <div class="dropdown">
                <a href="category.php?cat=kids&sub=clothes">👕 Хувцас</a>
                <a href="category.php?cat=kids&sub=shoes">👟 Гутал</a>
                <a href="category.php?cat=kids&sub=toys">🧸 Тоглоом</a>
            </div>
        </div>

        <!-- ELECTRONICS -->
        <div class="category">
            <a href="category.php?cat=electronics">📱 Электрон</a>
            <div class="dropdown">
                <a href="category.php?cat=electronics&sub=phone">📱 Гар утас</a>
                <a href="category.php?cat=electronics&sub=laptop">💻 Зөөврийн компьютер</a>
                <a href="category.php?cat=electronics&sub=tablet">📟 Таблет</a>
                <a href="category.php?cat=electronics&sub=accessories">🎧 Дагалдах хэрэгсэл</a>
            </div>
        </div>

        <!-- JEWELRY -->
        <div class="category">
            <a href="category.php?cat=jewelry">💎 Үнэт эдлэл</a>
            <div class="dropdown">
                <a href="category.php?cat=jewelry&sub=ring">💍 Бөгж</a>
                <a href="category.php?cat=jewelry&sub=necklace">📿 Зүүлт</a>
                <a href="category.php?cat=jewelry&sub=bracelet">📿 Бугуйвч</a>
                <a href="category.php?cat=jewelry&sub=earring">✨ Ээмэг</a>
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
