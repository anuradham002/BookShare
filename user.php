<?php

@include 'config.php';
if(!isset($_SESSION)){
session_start();}
$user_name='';
$user_type='';
if(isset($_SESSION['user_type'])){
   $user_type=$_SESSION['user_type'] ;
}
if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');}
if(isset($_SESSION['user_type'])&& $_SESSION['user_type']!=='user'){
 header('location:login_form.php');
}
if(isset($_SESSION['user_name'])){
   $user_name=$_SESSION['user_name'];
}

if(isset($_POST['add_book'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $c_name = $_POST['c_name'];
   $p_contact = $_POST['p_contact'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `books`(user_name, book_name, b_price, category,contact, image) VALUES('$user_name','$p_name', '$p_price','$c_name','$p_contact', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $_SESSION['message'] = 'Book added succesfully';
   }else{
      $_SESSION['message'] = 'Could not add the book';
   }
};
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `books`  WHERE bid = $delete_id ") or die('query failed');
   if($delete_query){
      $_SESSION['message'] = 'Book has been deleted';
      
   }else{
      $_SESSION['message'] = 'Book could not be deleted';
   };
   header('location:user.php');
   exit();
};

if(isset($_POST['update_book'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_c_name = $_POST['update_c_name'];
   $update_p_contact = $_POST['update_p_contact'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `books`  SET book_name = '$update_p_name', b_price = '$update_p_price', category='$update_c_name', contact='$update_p_contact', image = '$update_p_image'  WHERE bid = '$update_p_id'") or die('query failed');

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $_SESSION['message'] = 'Book updated succesfully';
     
      
   }else{
      $_SESSION['message'] = 'Book could not be updated';
   }
   header('location:user.php');
}

 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style1.css">
</head>
<body>
<?php
if(isset($_SESSION['message'])){
   /*<foreach($message as $message){*/
      echo '<div class="message"><span>'.$_SESSION['message'].'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
};

?>

<header class="header">

   <div class="flex">

   <div class="logo">
      <img src="home_images/logo.png" height="50px" width="50px">
        BOOKSHARE
    </div>

      <nav class="navbar">
         <a href="home.php">HOME</a>
         <a href="display.php">VIEW BOOKS</a>
         <a href="readmore.html">GIVE A READ</a>
         <a href="contact.html">CONTACT US</a>
         <a href="logout.php">LOGOUT</a>
      </nav>
   </div>

</header>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Add a new book</h3>
   <input type="text" name="p_name" placeholder="enter the book name" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="enter the book price" class="box" required>
   <select id="cat_books" name="c_name" placeholder="choose category" class="box" required>
      <option value="SCIENCE">SCIENCE</option>
      <option value="ENGLISH">ENGLISH</option>
      <option value="MATHS">MATHS</option>
      <option value="CS">CS</option>
   </select>
   <input type="number" name="p_contact" min="0" placeholder="enter your contact no." class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add the book" name="add_book" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>book image</th>
         <th>book name</th>
         <th>book price</th>
         <th>category</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products=mysqli_query($conn, "SELECT * FROM `books` JOIN `user_form` ON `books`.`user_name`=`user_form`.`name` where `user_form`.`name`='$user_name'");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['book_name']; ?></td>
            <td>$<?php echo $row['b_price']; ?>/-</td>
            <td><?php echo $row['category']; ?></td>
            <td>
               <a href="user.php?delete=<?php echo $row['bid']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="user.php?edit=<?php echo $row['bid']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>

         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no book added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `books` WHERE bid = $edit_id and user_name = '$user_name' ");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['bid']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['book_name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['b_price']; ?>">
      <select id="cat_books"  class="box" required name="update_c_name">
      <option value="SCIENCE">SCIENCE</option>
      <option value="ENGLISH">ENGLISH</option>
      <option value="MATHS">MATHS</option>
      <option value="CS">CS</option>
      <select value="<?php echo $fetch_edit['category']; ?>"></select>
      
   
      <input type="number" min="0" class="box" required name="update_p_contact" value="<?php echo $fetch_edit['contact']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the book" name="update_book" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>
</body>
</html>