<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $pass=md5($_POST['password']);

    $q=mysqli_query($conn,
        "SELECT * FROM users 
         WHERE email='$email' AND password='$pass'"
    );

    if(mysqli_num_rows($q)){
        $u=mysqli_fetch_assoc($q);

        if($u['user_type']=='admin'){
            $_SESSION['admin_id']=$u['id'];
            header('Location: admin/dashboard.php');
            exit;
        }else{
            $_SESSION['user_id']=$u['id'];
            header('Location: home.php');
            exit;
        }
    }
}
?>
