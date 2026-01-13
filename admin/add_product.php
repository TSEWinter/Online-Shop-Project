<?php
include '../config.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit;
}

if (isset($_POST['submit'])) {

    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $price    = mysqli_real_escape_string($conn, $_POST['price']);
    $category = (int)$_POST['category'];
    $status   = 'active';

    // Давхардал шалгах (name + category)
    $check = mysqli_query(
        $conn,
        "SELECT id FROM products 
         WHERE name='$name' AND category=$category"
    );

    if (mysqli_num_rows($check) > 0) {
        header('Location: products.php?msg=exists');
        exit;
    }

    // IMAGE
    $image = time().'_'.$_FILES['image']['name'];
    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "../uploaded_img/$image"
    );

    mysqli_query(
        $conn,
        "INSERT INTO products (name, price, image, status, category)
         VALUES ('$name','$price','$image','$status',$category)"
    );

    header('Location: products.php?msg=added');
    exit;
}
?>
<!DOCTYPE html>
<html lang="mn">
<head><meta charset="UTF-8"><title>Add Product</title></head>
<body>

<h2>Шинэ бараа нэмэх</h2>

<form method="post" enctype="multipart/form-data">
<p>Нэр:<br><input type="text" name="name" required></p>
<p>Үнэ:<br><input type="number" step="0.01" name="price" required></p>

<p>Ангилал:<br>
<select name="category" required>
    <option value="1">Эрэгтэй</option>
    <option value="2">Эмэгтэй</option>
    <option value="3">Хүүхэд</option>
    <option value="4">Электрон</option>
    <option value="5">Үнэт эдлэл</option>
</select>
</p>

<p>Зураг:<br><input type="file" name="image" required></p>

<button name="submit">Add Product</button>
</form>

</body>
</html>
