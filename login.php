<?php
// Нэвтрэх код энд бичигдэх болно
// Database холболт үүсгэх линк
include 'config.php';
session_start();

// Нэвтрэх товч дарагдсан эсэхийг шалгах
if (isset($_POST['submit'])) {
     // Мэдээлэл авах, аюулгүй байдлыг хангах
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

     // Хэрэгэлэгчийн мэдээллийг шалгах query
     $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('Нэвтрэхэд алдаа гарлаа');

     // хэрэглэгч олдсон эсэхийг шалгах
     if (mysqli_num_rows($select_users) > 0) {
          // Хэрэглэгчийн мэдээллийг авах
          $row = mysqli_fetch_assoc($select_users);

          // Хэрэглэгчийн төрөлийг шалгах
          if ($row['user_type'] == 'admin') {

               $_SESSION['admin_name'] = $row['name'];
               $_SESSION['admin_email'] = $row['email'];
               $_SESSION['admin_id'] = $row['id'];
               header('location:home.php');
          } elseif ($row['user_type'] == 'user') {

               $_SESSION['user_name'] = $row['name'];
               $_SESSION['user_email'] = $row['email'];
               $_SESSION['user_id'] = $row['id'];
               header('location:home.php');
          }
     } else {
          $message[] = 'Имэйл эсвэл нууц үг буруу байна!';
     }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Нэвтрэх</title>

</head>

<body>
     <!-- Алдааны мессежийг харуулах хэсэг -->
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

     <!-- нэвтрэх цонх -->
     <div class="form-dontainer">
          <form action="" method="post">
               <h3>Нэвтрэх</h3>
               <input type="email" name="email" required placeholder="Имэйл хаяг" class="box">
               <input type="password" name="password" required placeholder="Нууц үг" class="box">
               <input type="submit" name="submit" value="Нэвтрэх" class="btn">
               <p>Бүртгэлгүй юу? <a href="register.php">Бүртгүүлэх</a></p>
          </form>
     </div>



</body>

</html>