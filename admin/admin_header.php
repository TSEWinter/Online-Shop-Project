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

<div class="header">
     <div><b><a href="dashboard.php">Admin Dashboard</a></b></div>
     <div class="nav">
          <a href="product.php">Products</a>
          <a href="../home.php">View Site</a>
          <a href="../logout.php">Logout</a>
     </div>
</div>