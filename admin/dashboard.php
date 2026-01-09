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

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Custom Admin CSS File Link -->
    <link rel="stylesheet" href="/Online-Shop-Project/css/admin_style.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <div class="container">

        <h2>Тавтай морил, Admin</h2>

        <?php
        // Simple stats
        $productCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM products"));
        $userCount    = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM users"));
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