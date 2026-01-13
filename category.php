<?php
include 'config.php';

if (!isset($_GET['cat']) || !is_numeric($_GET['cat'])) {
    header('Location: home.php');
    exit;
}

$cat = (int)$_GET['cat'];

$category_names = [
    1 => 'Цамц',
    2 => 'Өмд',
    3 => 'Гутал',
    4 => 'Электрон',
    5 => 'Үнэт эдлэл'
];

if (!array_key_exists($cat, $category_names)) {
    header('Location: home.php');
    exit;
}

$products = mysqli_query(
    $conn,
    "SELECT * FROM products
     WHERE status='active' AND category=$cat
     ORDER BY id DESC"
);
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title><?= $category_names[$cat] ?></title>
<style>
body{
    margin:0;
    background:#f6f7fb;
    font-family:"Segoe UI",system-ui,sans-serif;
}
.container{
    max-width:1200px;
    margin:40px auto;
    padding:0 20px;
}
h2{
    margin-bottom:24px;
}
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(220px,1fr));
    gap:24px;
}
.card{
    background:#fff;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}
.card img{
    width:100%;
    height:220px;
    object-fit:cover;
}
.card-body{
    padding:16px;
}
.price{
    font-weight:700;
    margin-top:6px;
}
</style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <h2><?= $category_names[$cat] ?></h2>

    <div class="grid">  
        <?php if (mysqli_num_rows($products) > 0): ?>
            <?php while ($p = mysqli_fetch_assoc($products)): ?>
                <div class="card">
                    <img src="uploaded_img/<?= $p['image'] ?>">
                    <div class="card-body">
                        <strong><?= $p['name'] ?></strong>
                        <div class="price"><?= number_format($p['price']) ?> ₮</div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Энэ ангилалд бараа алга байна.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
