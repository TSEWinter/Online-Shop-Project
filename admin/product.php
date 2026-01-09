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
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $status   = 1; // HOME дээр харагдуулах

    /* IMAGE */
    $image_name = $_FILES['image']['name'];
    $image_tmp  = $_FILES['image']['tmp_name'];

    $new_image_name = time() . "_" . basename($image_name);
    $upload_path = "../uploaded_img/" . $new_image_name;

    move_uploaded_file($image_tmp, $upload_path);

    /* INSERT */
    mysqli_query(
        $conn,
        "INSERT INTO products (name, price, image, status, category)
         VALUES ('$name', '$price', '$new_image_name', '$status', '$category')"
    );

    header('Location: products.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Add Product</title>
</head>

<body>

<h2>Шинэ бараа нэмэх</h2>

<form method="post" enctype="multipart/form-data">

    <p>
        Нэр:<br>
        <input type="text" name="name" required>
    </p>

    <p>
        Үнэ:<br>
        <input type="number" name="price" required>
    </p>

    <p>
        Ангилал:<br>
        <select name="category" required>
            <option value="">-- Сонгох --</option>
            <option value="1">Цамц</option>
            <option value="2">Гутал</option>
            <option value="3">Өмд</option>
            <option value="4">Электрон</option>
            <option value="5">Үнэт эдлэл</option>
        </select>
    </p>

    <p>
        Зураг:<br>
        <input type="file" name="image" accept="image/*" required>
    </p>

    <button type="submit" name="submit">Add Product</button>
</form>

</body>
</html>
