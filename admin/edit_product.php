<?php
include '../config.php';
session_start();
if(!isset($_SESSION['admin_id'])) exit;

$id=$_GET['id'];
$p=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id=$id"));

if(isset($_POST['save'])){
    $name=$_POST['name'];
    $price=$_POST['price'];

    if($_FILES['image']['name']){
        $img=$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],
            "../uploaded_img/$img");
        mysqli_query($conn,
            "UPDATE products SET name='$name',price='$price',image='$img' WHERE id=$id");
    }else{
        mysqli_query($conn,
            "UPDATE products SET name='$name',price='$price' WHERE id=$id");
    }
    header('Location: products.php');
}
?>
<form method="post" enctype="multipart/form-data">
<input name="name" value="<?= $p['name'] ?>">
<input name="price" value="<?= $p['price'] ?>">
<input type="file" name="image">
<button name="save">Save</button>
</form>
