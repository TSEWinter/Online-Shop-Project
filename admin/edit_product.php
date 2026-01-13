<?php
include '../config.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit;
}

$id = (int)$_GET['id'];

$product = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM products WHERE id=$id")
);

if (isset($_POST['submit'])) {

    $name     = $_POST['name'];
    $price    = $_POST['price'];
    $category = (int)$_POST['category'];
    $status   = $_POST['status'];

    mysqli_query(
        $conn,
        "UPDATE products SET
         name='$name',
         price='$price',
         category=$category,
         status='$status'
         WHERE id=$id"
    );

    header('Location: products.php?msg=updated');
    exit;
}
?>
<!DOCTYPE html>
<html lang="mn">
<head><meta charset="UTF-8"><title>Edit Product</title></head>
<body>

<h2>Бараа засах</h2>

<form method="post">
<p>Нэр:<br><input type="text" name="name" value="<?= $product['name'] ?>"></p>
<p>Үнэ:<br><input type="number" step="0.01" name="price" value="<?= $product['price'] ?>"></p>

<p>Ангилал:<br>
<select name="category">
    <option value="1" <?= $product['category']==1?'selected':'' ?>>Эрэгтэй</option>
    <option value="2" <?= $product['category']==2?'selected':'' ?>>Эмэгтэй</option>
    <option value="3" <?= $product['category']==3?'selected':'' ?>>Хүүхэд</option>
    <option value="4" <?= $product['category']==4?'selected':'' ?>>Электрон</option>
    <option value="5" <?= $product['category']==5?'selected':'' ?>>Үнэт эдлэл</option>
</select>
</p>

<p>Status:<br>
<select name="status">
    <option value="active" <?= $product['status']=='active'?'selected':'' ?>>Active</option>
    <option value="inactive" <?= $product['status']=='inactive'?'selected':'' ?>>Inactive</option>
</select>
</p>

<button name="submit">Save</button>
</form>

</body>
</html>
