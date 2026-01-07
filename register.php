<?php
// Бүртгэл үүсгэх код энд бичигдэх болно
// Database холболт үүсгэх линк
include 'config.php';

// Бүртгэл үүсгэх товч дарагдсан эсэхийг шалгах
if (isset($_POST['submit'])) {
     // Мэдээлэл авах, аюулгүй байдлыг хангах
     $name = mysqli_real_escape_string($conn, $_POST['name']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
     $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
     $user_type = $_POST['user_type'];

     // Хэрэгэлэгчийн мэдээллийг шалгах query
     $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

     // хэрэглэгч олдсон эсэхийг шалгах
     if (mysqli_num_rows($select_users) > 0) {
          // Хэрэглэгчийн мэдээллийг авах
          $message[] = 'Хэрэглэгч аль хэдийн бүртгэлтэй байна!';
     } else {
          if ($pass != $cpass) {
               $message[] = 'Нууц үг таарахгүй байна!';
          } else {
               mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
               $message[] = 'Амжилттай бүртгэгдлээ!';
               header('location:login.php');
          }
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Бүртгүүлэх</title>
</head>

<body>
     <?php

     ?>

     <div class="form-container">

          <form action="" method="post">
               <h3>Бүртгүүлэх</h3>
               <input type="text" name="name" placeholder="Хэрэглэгчийн нэр" required class="box">
               <input type="email" name="email" placeholder="Имэйл" required class="box">
               <input type="password" name="password" placeholder="Нууц үг" required class="box">
               <input type="password" name="cpassword" placeholder="Нууц үг давтан хийх" required class="box">
               <select name="user_type" class="box">
                    <option value="user">хэрэглэгчийн</option>
                    <option value="admin">admin</option>
               </select>
               <input type="submit" name="submit" value="Бүртгүүлэх" class="btn">
               <p>Бүртгэлтэй юу? <a href="login.php">Нэвтрэх</a></p>
          </form>

     </div>



</body>

</html>