<?php
include 'config.php';

if (isset($_POST['submit'])) {

     $name  = mysqli_real_escape_string($conn, $_POST['name']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $pass  = mysqli_real_escape_string($conn, md5($_POST['password']));
     $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

     $select = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

     if (mysqli_num_rows($select) > 0) {
          $message[] = 'Имэйл аль хэдийн бүртгэлтэй байна!';
     } elseif ($pass != $cpass) {
          $message[] = 'Нууц үг таарахгүй байна!';
     } else {
          mysqli_query(
               $conn,
               "INSERT INTO users(name,email,password,user_type)
             VALUES('$name','$email','$pass','user')"
          );
          $message[] = 'Амжилттай бүртгэгдлээ. Нэвтэрнэ үү.';
     }
}
?>
<!DOCTYPE html>
<html lang="mn">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Бүртгүүлэх</title>

     <!-- FONT AWESOME ICON -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

     <style>
          * {
               box-sizing: border-box;
               font-family: "Segoe UI", system-ui, sans-serif
          }

          body {
               margin: 0;
               height: 100vh;
               background: linear-gradient(135deg, #43cea2, #185a9d);
               display: flex;
               align-items: center;
               justify-content: center;
               position: relative;
          }

          .brand-tag {
               position: absolute;
               top: 24px;
               left: 28px;
               font-size: 14px;
               font-weight: 600;
               color: #fff;
               opacity: .95;
          }

          .brand-tag span {
               font-weight: 400;
               opacity: .85
          }

          .card {
               width: 400px;
               background: #fff;
               padding: 32px;
               border-radius: 14px;
               box-shadow: 0 20px 50px rgba(0, 0, 0, .25)
          }

          .card h3 {
               text-align: center;
               margin-bottom: 22px;
               font-size: 22px;
               font-weight: 600
          }

          .card h3 i {
               margin-right: 8px;
               color: #43cea2;
          }

          input {
               width: 100%;
               padding: 14px;
               margin-bottom: 14px;
               border-radius: 8px;
               border: 1px solid #ddd;
          }

          input:focus {
               outline: none;
               border-color: #43cea2
          }

          button {
               width: 100%;
               padding: 14px;
               border: none;
               border-radius: 8px;
               background: linear-gradient(135deg, #43cea2, #185a9d);
               color: #fff;
               font-size: 15px;
               font-weight: 600;
          }

          button i {
               margin-right: 6px
          }

          .link {
               text-align: center;
               margin-top: 16px;
               font-size: 14px
          }

          .link a {
               color: #185a9d;
               font-weight: 600;
               text-decoration: none
          }

          .alert {
               background: #e7f7ee;
               color: #0f5132;
               padding: 10px;
               border-radius: 6px;
               margin-bottom: 14px;
               text-align: center;
          }
     </style>
</head>

<body>

     <div class="brand-tag">
          Datacare ХХК · <span>Дадлага ажил</span>
     </div>

     <div class="card">

          <?php
          if (isset($message)) {
               foreach ($message as $msg) {
                    echo '<div class="alert">' . $msg . '</div>';
               }
          }
          ?>

          <form method="post">
               <h3><i class="fa-solid fa-user-plus"></i>Бүртгүүлэх</h3>

               <input type="text" name="name" placeholder="Нэр" required>
               <input type="email" name="email" placeholder="Имэйл хаяг" required>
               <input type="password" name="password" placeholder="Нууц үг" required>
               <input type="password" name="cpassword" placeholder="Нууц үг давтах" required>

               <button name="submit">
                    <i class="fa-solid fa-user-check"></i>Бүртгүүлэх
               </button>

               <div class="link">
                    Бүртгэлтэй юу? <a href="login.php">Нэвтрэх</a>
               </div>
          </form>

     </div>
</body>

</html>