<?php
include '../config.php';
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: /Online-Shop-Project/login.php');
    exit;
}

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $price = $_POST['price'];
    $category = (int)$_POST['category'];

    $check = mysqli_query($conn,
        "SELECT id FROM products WHERE name='$name' AND category=$category");

    if (mysqli_num_rows($check)>0) {
        header('Location: products.php?msg=exists');
        exit;
    }

    $image = time().'_'.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],
        "../uploaded_img/$image");

    mysqli_query($conn,
        "INSERT INTO products (name,price,image,status,category)
         VALUES ('$name','$price','$image','active',$category)");

    header('Location: product.php?msg=added');
    exit;
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Add Product</title>
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
    background:linear-gradient(135deg,#667eea,#764ba2);
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
<h2>➕ Шинэ бараа</h2>

<form method="post" enctype="multipart/form-data">
<input type="text" name="name" placeholder="Барааны нэр" required>
<input type="number" step="0.01" name="price" placeholder="Үнэ" required>

<select name="category" required>
<option value="">Ангилал сонгох</option>
<option value="1">Цамц</option>
<option value="2">Өмд</option>
<option value="3">Гутал</option>
<option value="4">Электрон</option>
<option value="5">Үнэт эдлэл</option>
</select>

<input type="file" name="image" required>

<button name="submit">Нэмэх</button>
<a href="product.php" class="back">← Буцах</a>
</form>
</div>

</body>
</html>
