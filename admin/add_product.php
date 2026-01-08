<?php
include '../config.php';
session_start();
if(!isset($_SESSION['admin_id'])) exit;

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $img=$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],
        "../uploaded_img/$img");

    mysqli_query($conn,
        "INSERT INTO products(name,price,image,status)
         VALUES('$name','$price','$img',1)");
    header('Location: products.php');
}
?>
<form method="post" enctype="multipart/form-data">
<input name="name" placeholder="Name">
<input name="price" placeholder="Price">
<input type="file" name="image">
<button name="add">Add</button>
</form>
