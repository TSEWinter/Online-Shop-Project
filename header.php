<?php
// Session ба мэссежийг удирдах хэсэг

// Сессион эхлүүлэх
// Хэрэв сессион идэвхгүй бол идэвхжүүлнэ
if (session_status() !== PHP_SESSION_ACTIVE) {
     session_start();
}

// мэссежийг харуулах хэсэг
if (isset($message)) {
     foreach ($message as $message) {
          echo '
          <div class="message">
               <span>' . $message . '</span>
               <!-- X товч дарвал мессеж устгагддаг -->
               <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
          </div>
          ';
     }
}
?>

<header class="header">
     <!-- цонх хэсэг эхлэл -->
     <div class="header-1">
          <div class="flex">
               <div class="share">
                    <!-- Бусад сошиал сувгууд: -->
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-instagram"></a>
               </div>
               <!-- Нэвтрэх эсвэл бүртгүүлэх холбоосууд: -->
               <p> Шинээр <a href="login.php">Нэвтрэх</a> | <a href="register.php">Бүртгүүлэх</a> </p>
          </div>
     </div>

     <!-- Үндсэн толгой хэсэг эхлэл -->
     <div class="header-2">
          <div class="flex">
               <a href="home.php" class="logo">Online Shop</a>

               <!-- Үндсэн хуудсын навигацийн цэс -->
               <nav class="navbar">
                    <a href="home.php">Нүүр</a>
                    <a href="shop.php">Дэлгүүр</a>
                    <a href="orders.php">Захиалга</a>
                    <a href="about.php">Бидний тухай</a>
               </nav>


               <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
                    <!-- Хайлтын товч -->
                    <a href="search_page.php" class="fas fa-search"></a>
                    <!-- Хэрэглэгчийн профиль товч -->
                    <div id="user-btn" class="fas fa-user"></div>

                    <!-- Сагс дээрх бүтээгдэхүүнийг харах хэсэг -->
                    <?php
                    // Сагсны тоог эхнээс 0 болгоно
                    $cart_rows_number = 0;

                    // Хэрэглэгч нэвтэрсэн ба датабаз холбогдсон эсэхийг шалгана
                    if (isset($_SESSION['user_id']) && isset($conn)) {
                         // SQL халдлагаас сэргийлэхийн тулд user_id-г хамгаалнаа
                         $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

                         // Уг хэрэглэгчийн сагсан дээрх бүтээгдэхүүнүүдийг хайна
                         $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'");

                         // Асуулт амжилттай боловсрүүлэгдсэн бол сагсны түүхүүг авна
                         if ($select_cart_number) {
                              $cart_rows_number = mysqli_num_rows($select_cart_number);
                         }
                    }
                    ?>

                    <!-- Сагсны товч: нэвтэрсэн бол cart.php, үгүй бол login.php уруу явна -->
                    <a href="<?php echo isset($_SESSION['user_id']) ? 'cart.php' : 'login.php'; ?>">
                         <i class="fas fa-shopping-cart"></i>
                         <span>(<?php echo $cart_rows_number; ?>)</span>
                    </a>
               </div>

               <!-- Хэрэглэгчийн мэдээллийн хайрцаг -->
               <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) { ?>
                    <!-- НЭВТЭРСЭН ХЭРЭГЛЭГЧ: Профиль мэдээлэл болон гарах товч -->
                    <div class="user-box">
                         <p>хэрэглэгчийн нэр : <span><?php echo $_SESSION['user_name']; ?></span></p>
                         <p>имэйл : <span><?php echo $_SESSION['user_email']; ?></span></p>
                         <!-- Нэвтэрсэн хэрэглэгч гарахын цэсийг нээнэ -->
                         <a href="logout.php" class="delete-btn">Гарах</a>
                    </div>
               <?php } else { ?>
                    <!-- НЭВТРЭЭГҮЙ ХЭРЭГЛЭГЧ: Нэвтрэх ба бүртгүүлэх холбоос -->
                    <div class="user-box">
                         <p><a href="login.php">Нэвтрэх</a></p>
                         <p><a href="register.php">Бүртгүүлэх</a></p>
                    </div>
               <?php } ?>
          </div>
     </div>
     <!-- Үндсэн толгой хэсэг төгсгөл -->
</header>