<?php
include '../config.php';
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: /Online-Shop-Project/login.php');
    exit;
}

$id = (int)$_GET['id'];
$product = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM products WHERE id=$id")
);

if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    $status=$_POST['status'];

    mysqli_query($conn,
        "UPDATE products SET
         name='$name',price='$price',
         category=$category,status='$status'
         WHERE id=$id");

    header('Location: product.php?msg=updated');
    exit;
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Edit Product</title>
<style>
body{margin:0;background:#f4f6fb;font-family:"Segoe UI",system-ui}
.card{
    max-width:500px;
    margin:60px auto;
    background:#fff;
    padding:32px;
    border-radius:16px;
    box-shadow:0 20px 50px rgba(0,0,0,.1);
}
h2{text-align:center;margin-bottom:24px}
input,select{
    width:100%;
    padding:14px;
    margin-bottom:16px;
    border-radius:10px;
    border:1px solid #ddd;
}
button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#2563eb;
    color:#fff;
    font-size:15px;
    font-weight:600;
}
.back{
    display:block;
    text-align:center;
    margin-top:14px;
    text-decoration:none;
    color:#555;
}
</style>
</head>
<body>

<div class="card">
<h2>✏️ Бараа засах</h2>

<form method="post">
<input type="text" name="name" value="<?= $product['name'] ?>">
<input type="number" step="0.01" name="price" value="<?= $product['price'] ?>">

<select name="category">
<option value="1" <?= $product['category']==1?'selected':'' ?>>Цамц</option>
<option value="2" <?= $product['category']==2?'selected':'' ?>>Өмд</option>
<option value="3" <?= $product['category']==3?'selected':'' ?>>Гутал</option>
<option value="4" <?= $product['category']==4?'selected':'' ?>>Электрон</option>
<option value="5" <?= $product['category']==5?'selected':'' ?>>Үнэт эдлэл</option>
</select>

<select name="status">
<option value="active" <?= $product['status']=='active'?'selected':'' ?>>Active</option>
<option value="inactive" <?= $product['status']=='inactive'?'selected':'' ?>>Inactive</option>
</select>

<button name="submit">Хадгалах</button>
<a href="product.php" class="back">← Буцах</a>
</form>
</div>

</body>
</html>
