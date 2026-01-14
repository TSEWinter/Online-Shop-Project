<?php
include '../config.php';
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: /Online-Shop-Project/login.php');
    exit;
}

$users = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Admin | Users</title>
<style>
body{font-family:Segoe UI;background:#f4f6fb;margin:0}
.box{max-width:1100px;margin:40px auto;background:#fff;padding:30px;border-radius:14px}
table{width:100%;border-collapse:collapse}
th,td{padding:14px;text-align:left}
th{background:#f1f3f5}
.badge{padding:6px 10px;border-radius:999px;font-size:12px}
.admin{background:#dbeafe;color:#1e40af}
.user{background:#dcfce7;color:#166534}
</style>
</head>
<body>

<div class="box">
<h2>Хэрэглэгчид</h2>

<table>
<tr>
    <th>ID</th>
    <th>Нэр</th>
    <th>Email</th>
    <th>Төрөл</th>
    <th>Огноо</th>
</tr>

<?php while($u=mysqli_fetch_assoc($users)): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['name'] ?></td>
    <td><?= $u['email'] ?></td>
    <td>
        <span class="badge <?= $u['user_type'] ?>">
            <?= $u['user_type'] ?>
        </span>
    </td>
    <td><?= $u['create_date'] ?></td>
</tr>
<?php endwhile; ?>

</table>
</div>
</body>
</html>
