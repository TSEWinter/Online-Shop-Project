<?php
if(session_status()===PHP_SESSION_NONE){session_start();}
?>
<div style="background:#fff;padding:18px 40px;display:flex;justify-content:space-between">
<b>Online Shop</b>
<div>
<a href="home.php">Нүүр</a>

<?php if(isset($_SESSION['admin_id'])): ?>
<a href="admin/dashboard.php">Dashboard</a>
<a href="logout.php">Гарах</a>

<?php elseif(isset($_SESSION['user_id'])): ?>
<a href="logout.php">Гарах</a>

<?php else: ?>
<a href="login.php">Нэвтрэх</a>
<a href="register.php">Бүртгүүлэх</a>
<?php endif; ?>
</div>
</div>
