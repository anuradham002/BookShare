<?php

@include 'config.php';
if(!isset($_SESSION)){
session_start();}

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
$_SESSION['user_type']='user';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user welcome</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>This is a user page</p>
      <!--<a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a>-->
      <a href="logout.php" class="btn">LOGOUT</a>
      <a href="home.php" class="btn">ENTER WEBSITE</a>
   </div>

</div>

</body>
</html>