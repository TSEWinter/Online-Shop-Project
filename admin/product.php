<?php
include '../config.php';
session_start();
if(!isset($_SESSION['admin_id'])){ header('Location: ../login.php'); exit; }

$products=mysqli_query($conn,"SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<body>

<h2>Products</h2>
<a href="product_add.php">+ Add Product</a>
<table border="1" cellpadding="10">
<tr>
<th>Зураг</th><th>Нэр</th><th>Үнэ</th><th>Action</th>
</tr>

<?php while($p=mysqli_fetch_assoc($products)): ?>
<tr>
<td><img src="../uploaded_img/<?= $p['image'] ?>" width="80"></td>
<td><?= $p['name'] ?></td>
<td><?= $p['price'] ?></td>
<td>
<a href="product_edit.php?id=<?= $p['id'] ?>">Edit</a> |
<a href="product_delete.php?id=<?= $p['id'] ?>" 
onclick="return confirm('Устгах уу?')">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>
