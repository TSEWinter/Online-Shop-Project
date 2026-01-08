<?php
include '../config.php';
session_start();
if(!isset($_SESSION['admin_id'])) exit;

$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM products WHERE id=$id");
header('Location: products.php');
