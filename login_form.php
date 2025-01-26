<?php

@include 'config.php';

if(!isset($_SESSION)){
session_start();}
$user_type='';
if(isset($_POST['submit'])){

   if(isset($_POST['name'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']) ; 
 //  $_SESSION['user_name']=$name;
  // header('location:user.php');
}
   if(isset($_POST['email'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);}
   if(isset($_POST['password'])){
   $pass = md5($_POST['password']);}
   if(isset($_POST['cpassword'])){
   $cpass = md5($_POST['cpassword']);}
   if(isset($_POST['user_type'])){
   $user_type = $_POST['user_type'];
   $_SESSION['user_type']=$user_type;
   header('location:home.php');}

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
         $_SESSION['user_type']='admin';
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_type']='user';
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>LOGIN</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register now</a></p>
   </form>

</div>

</body>
</html>