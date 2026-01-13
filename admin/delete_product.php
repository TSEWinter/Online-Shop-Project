<?php
include '../config.php';
session_start();

/* ADMIN CHECK */
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit;
}

/* ID CHECK */
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: products.php');
    exit;
}

$id = (int)$_GET['id'];

/* ЗУРГИЙН НЭРИЙГ АВАХ */
$result = mysqli_query(
    $conn,
    "SELECT image FROM products WHERE id = $id"
);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    /* ЗУРАГ УСТГАХ */
    $image_path = "../uploaded_img/" . $row['image'];
    if (file_exists($image_path)) {
        unlink($image_path);
    }

    /* DATABASE-ЭЭС УСТГАХ */
    mysqli_query(
        $conn,
        "DELETE FROM products WHERE id = $id"
    );
}

/* BACK TO PRODUCTS */
header('Location: products.php?msg=deleted');
exit;
