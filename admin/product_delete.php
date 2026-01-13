<?php
include '../config.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit;
}

$id = (int)$_GET['id'];

$q = mysqli_query($conn, "SELECT image FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($q);

if ($row) {
    $img = "../uploaded_img/".$row['image'];
    if (file_exists($img)) {
        unlink($img);
    }
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
}

header('Location: product.php?msg=deleted');
exit;
