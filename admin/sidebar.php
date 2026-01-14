<?php

?>

<aside class="sidebar">
     <div class="sidebar-header">
          
          <h2>Админ Панель</h2>
     </div>

     <nav class="sidebar-nav">
          
          <a href="dashboard.php" class="sidebar-link">
               <span>Dashboard</span>
          </a>

          
          <a href="product.php" class="sidebar-link">
               <span>Бараа</span>
          </a>

         
          <a href="admin_orders.php" class="sidebar-link">
               <span>Захиалга</span>
          </a>

          
          <a href="admin_users.php" class="sidebar-link">
               <span>Хэрэглэгч</span>
          </a>

         
          <a href="../admin.php" class="sidebar-link logout">
               <span>Гарах</span>
          </a>
     </nav>
</aside>

<style>.sidebar {
     width: 250px;
     background: #111827;
     height: 100vh;
     position: fixed;
     left: 0;
     top: 0;
     padding-top: 80px;
     box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
     overflow-y: auto;
}

.sidebar-header {
     padding: 20px;
     color: white;
     text-align: center;
     border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.sidebar-header h2 {
     margin: 0;
     font-size: 18px;
}

.sidebar-nav {
     display: flex;
     flex-direction: column;
     padding: 20px 0;
}

.sidebar-link {
     display: flex;
     align-items: center;
     padding: 15px 20px;
     color: rgba(255, 255, 255, 0.8);
     text-decoration: none;
     transition: all 0.3s ease;
     border-left: 3px solid transparent;
}

.sidebar-link:hover {
     background: rgba(255, 255, 255, 0.1);
     color: white;
     border-left-color: white;
}

.sidebar-link.active {
     background: rgba(255, 255, 255, 0.15);
     color: white;
     border-left-color: white;
}

.sidebar-link i {
     margin-right: 12px;
     width: 20px;
     text-align: center;
}

.sidebar-link.logout {
     margin-top: auto;
     color: #ffcccc;
}

.sidebar-link.logout:hover {
     background: rgba(255, 76, 76, 0.2);
     color: #ff4444;
}

/* Main container offset */
.container,
body>div:not(.sidebar) {
     margin-left: 250px;
}</style>