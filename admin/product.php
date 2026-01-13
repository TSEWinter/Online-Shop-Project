<?php
include '../config.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: /Online-Shop-Project/login.php');
    exit;
}

$products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Admin | Products</title>
<style>
body{
    margin:0;
    background:#f4f6fb;
    font-family:"Segoe UI",system-ui,sans-serif;
}
.wrapper{
    max-width:1200px;
    margin:40px auto;
    background:#fff;
    padding:30px;
    border-radius:14px;
    box-shadow:0 20px 50px rgba(0,0,0,.08);
}
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:24px;
}
.header h2{
    margin:0;
    font-size:22px;
}
.add-btn{
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:#fff;
    padding:12px 18px;
    border-radius:10px;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
}
.msg{
    margin-bottom:16px;
    padding:12px;
    border-radius:8px;
    font-size:14px;
}
.success{background:#e6fffa;color:#047857}
.error{background:#fee2e2;color:#991b1b}

table{
    width:100%;
    border-collapse:collapse;
}
th,td{
    padding:14px;
    text-align:left;
    font-size:14px;
}
th{
    background:#f3f4f6;
}
tr:hover{
    background:#f9fafb;
}
img{
    width:60px;
    height:60px;
    object-fit:cover;
    border-radius:8px;
}
.action a{
    margin-right:10px;
    text-decoration:none;
    font-weight:600;
    font-size:13px;
}
.edit{color:#2563eb}
.delete{color:#dc2626}
.badge{
    padding:6px 10px;
    border-radius:999px;
    font-size:12px;
}
.active{background:#dcfce7;color:#166534}
.inactive{background:#fee2e2;color:#991b1b}
</style>
</head>
<body>

<div class="wrapper">

<div class="header">
    <h2>📦 Барааны жагсаалт</h2>
    <a href="product_add.php" class="add-btn">+ Шинэ бараа</a>
</div>

<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg']=='added') echo "<div class='msg success'>✔ Бараа амжилттай нэмэгдлээ</div>";
    if ($_GET['msg']=='updated') echo "<div class='msg success'>✔ Бараа амжилттай өөрчлөгдлөө</div>";
    if ($_GET['msg']=='deleted') echo "<div class='msg success'>✔ Бараа амжилттай устгагдлаа</div>";
    if ($_GET['msg']=='exists') echo "<div class='msg error'>⚠ Энэ бараа аль хэдийн нэмэгдсэн байна</div>";
}
?>

<table>
<tr>
    <th>Зураг</th>
    <th>Нэр</th>
    <th>Үнэ</th>
    <th>Ангилал</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($p=mysqli_fetch_assoc($products)): ?>
<tr>
    <td><img src="../uploaded_img/<?= $p['image'] ?>"></td>
    <td><?= $p['name'] ?></td>
    <td><?= number_format($p['price'],2) ?> ₮</td>
    <td><?= $p['category'] ?></td>
    <td>
        <span class="badge <?= $p['status']=='active'?'active':'inactive' ?>">
            <?= $p['status'] ?>
        </span>
    </td>
    <td class="action">
        <a href="product_edit.php?id=<?= $p['id'] ?>" class="edit">Edit</a>
        <a href="product_delete.php?id=<?= $p['id'] ?>"
           class="delete"
           onclick="return confirm('Устгах уу?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

</div>
</body>
</html>
