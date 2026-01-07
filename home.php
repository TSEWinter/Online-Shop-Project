<?php
// =====================
// PUBLIC HOME PAGE
// =====================
include 'config.php';

// Бараа татах
$products = mysqli_query(
     $conn,
     "SELECT * FROM products WHERE status = 1 ORDER BY id DESC"
) or die('Бараа татахад алдаа гарлаа');
?>
<!DOCTYPE html>
<html lang="mn">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Online Shop</title>

     <!-- MINIMAL SHOP UI -->
     <style>
          * {
               box-sizing: border-box;
               font-family: "Segoe UI", system-ui, sans-serif;
          }

          body {
               margin: 0;
               background: #f6f7f9;
               color: #111;
          }

          /* HEADER */
          .header {
               background: #fff;
               padding: 16px 30px;
               display: flex;
               justify-content: space-between;
               align-items: center;
               box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
          }

          .logo {
               font-size: 20px;
               font-weight: 700;
          }

          .nav a {
               margin-left: 18px;
               text-decoration: none;
               color: #111;
               font-size: 14px;
               font-weight: 500;
          }

          .nav a:hover {
               text-decoration: underline;
          }

          /* PRODUCT GRID */
          .container {
               max-width: 1200px;
               margin: 0 auto;
               padding: 30px;
          }

          .grid {
               display: grid;
               grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
               gap: 24px;
          }

          .card {
               background: #fff;
               border-radius: 12px;
               overflow: hidden;
               transition: .2s;
               box-shadow: 0 10px 25px rgba(0, 0, 0, .06);
          }

          .card:hover {
               transform: translateY(-4px);
          }

          .card img {
               width: 100%;
               height: 220px;
               object-fit: cover;
               background: #eee;
          }

          .card-body {
               padding: 16px;
          }

          .card-body h4 {
               margin: 0 0 8px;
               font-size: 15px;
               font-weight: 600;
          }

          .price {
               font-size: 15px;
               font-weight: 700;
          }

          .footer {
               text-align: center;
               padding: 20px;
               font-size: 13px;
               color: #777;
          }
     </style>
</head>

<body>


     <!-- HEADER -->
     <?php include 'header.php'; ?>

     <!-- PRODUCT LIST -->
     <div class="container">
          <div class="grid">
               <?php if (mysqli_num_rows($products) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($products)): ?>
                         <div class="card">
                              <img src="uploaded_img/<?php echo $row['image']; ?>" alt="">
                              <div class="card-body">
                                   <h4><?php echo $row['name']; ?></h4>
                                   <div class="price"><?php echo number_format($row['price']); ?> ₮</div>
                              </div>
                         </div>
                    <?php endwhile; ?>
               <?php else: ?>
                    <p>Одоогоор бараа байхгүй байна.</p>
               <?php endif; ?>
          </div>
     </div>

     <div class="footer">
          © <?php echo date('Y'); ?> Online Shop
     </div>

</body>

</html>