<?php
if (isset($message)) {
     foreach ($message as $message) {
          echo '
        <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
     }
}
?>

<header class="header">

     <div class="header">

          <a href="dashboard.php">Admin Dashboard</a>

          <div class="nav">
               <a href="products.php">Бараа</a>
               <a href="../home.php">Сайт үзэх</a>
               <a href="../logout.php">Гарах</a>
          </div>

     </div>

</header>

<div class="header">
     <div><b>Admin Dashboard</b></div>
     <div class="nav">
          <a href="product.php">Products</a>
          <a href="../home.php">View Site</a>
          <a href="../logout.php">Logout</a>
     </div>
</div>