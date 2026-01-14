<?php
include '../config.php';
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: /Online-Shop-Project/login.php');
    exit;
}

$orders = mysqli_query(
    $conn,
    "SELECT o.*, u.name, u.email 
     FROM orders o 
     JOIN users u ON o.user_id=u.id
     ORDER BY o.id DESC"
);
?>
<!DOCTYPE html>
<html lang="mn">

<!-- Font Awesome CDN Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- Custom Admin CSS File Link -->
<link rel="stylesheet" href="/Online-Shop-Project/css/admin_style.css">

<head>
    <meta charset="UTF-8">
    <title>Admin | Orders</title>
    <style>
        body {
            font-family: Segoe UI;
            background: #f4f6fb;
            margin: 0
        }

        .box {
            max-width: 1200px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 14px
        }

        table {
            width: 100%;
            border-collapse: collapse
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            font-size: 14px
        }

        th {
            background: #f1f3f5
        }

        .badge {
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600
        }

        .paid {
            background: #dcfce7;
            color: #166534
        }

        .pending {
            background: #fef3c7;
            color: #92400e
        }

        .cancelled {
            background: #fee2e2;
            color: #991b1b
        }

        a {
            font-size: 13px
        }
    </style>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <?php include 'sidebar.php'; ?>

    <div class="box">
        <h2>Захиалгууд</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Хэрэглэгч</th>
                <th>Холбоо барих</th>
                <th>Нийт үнэ</th>
                <th>Төлөв</th>
                <th>Огноо</th>
            </tr>

            <?php while ($o = mysqli_fetch_assoc($orders)): ?>
                <tr>
                    <td>#<?= $o['id'] ?></td>
                    <td>
                        <?= $o['name'] ?><br>
                        <small><?= $o['email'] ?></small>
                    </td>
                    <td>
                        <?= $o['phone'] ?><br>
                        <?= $o['address'] ?>
                    </td>
                    <td><?= number_format($o['total_price'], 2) ?> ₮</td>
                    <td>
                        <span class="badge <?= $o['status'] ?>">
                            <?= $o['status'] == 'paid' ? 'Баталгаажсан' : ($o['status'] == 'cancelled' ? 'Цуцалсан' : 'Баталгаажаагүй') ?>
                        </span>
                    </td>
                    <td><?= $o['created_at'] ?></td>
                </tr>
            <?php endwhile; ?>

        </table>
    </div>
</body>

</html>