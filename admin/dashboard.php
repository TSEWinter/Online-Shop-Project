<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config.php';
session_start();

/* ADMIN ШАЛГАЛТ */
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<style>
body{
    margin:0;
    font-family:Segoe UI,system-ui,sans-serif;
    background:#f4f6f8;
}
.header{
    background:#111827;
    color:#fff;
    padding:18px 32px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.nav a{
    color:#fff;
    margin-left:20px;
    text-decoration:none;
    font-weight:600;
}
.container{
    padding:40px;
}
.card{
    background:#fff;
    padding:24px;
    border-radius:12px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
    gap:24px;
}
.stat{
    background:#f9fafb;
    padding:20px;
    border-radius:10px;
    text-align:center;
}
.stat h3{
    margin:0;
    font-size:28px;
}
.stat p{
    margin-top:6px;
    color:#555;
}
</style>
</head>

<body>

<div class="header">
    <div><b>Admin Dashboard</b></div>
    <div class="nav">
        <a href="products.php">Products</a>
        <a href="../home.php">View Site</a>
        <a href="../logout.php">Logout</a>
    </div>
</div>

<div class="container">

    <h2>Тавтай морил, Admin</h2>

    <?php
    // Simple stats
    $productCount = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM products"));
    $userCount    = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM users"));
    ?>

    <div class="grid">
        <div class="stat">
            <h3><?php echo $productCount; ?></h3>
            <p>Нийт бараа</p>
        </div>
        <div class="stat">
            <h3><?php echo $userCount; ?></h3>
            <p>Нийт хэрэглэгч</p>
        </div>
    </div>

    <div style="margin-top:40px" class="card">
        <h3>Админ боломжууд</h3>
        <ul>
            <li>Бараа нэмэх / засах / устгах</li>
            <li>Зураг солих</li>
            <li>Үнэ засах</li>
            <li>Category удирдах</li>
        </ul>
    </div>

</div>

</body>
</html>
