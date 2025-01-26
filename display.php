<?php
@include 'config.php';

$category='';
$select_products=null;

if(isset($_GET['category'])){
   $category=$_GET['category'];
}

if(!empty($category)){
   $select_products=mysqli_query($conn,"SELECT * FROM books WHERE category='$category'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="CSS/style1.css">
</head>
        <style>
            
        .navb {
            background-color: #333;
            padding: 10px 0;
            display: flex;
            
        }

        .navb ul {
            list-style: none;
            margin: 0px;
            padding:0px;
            
        }

        .navb ul li {
            display: inline;
            color: white;
            margin:120px;
            font-size: large;
        }

        .navb ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
        }

        .navb ul li a:hover {
            background-color: crimson;
        }
    </style>
</head>
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
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
      <a href="readmore.html">GIVE A READ</a>
      <a href="/Contact Form/contact.html">CONTACT US</a>
      <a href="logout.php">LOGOUT</a>
   </nav>
   <div id="menu-btn" class="fas fa-bars"></div>

   </div>
<div class="navb">
    <ul>
        <li><a href="?category=Science">SCIENCE</a></li>
        <li><a href="?category=English">ENGLISH</a></li>
        <li><a href="?category=Maths">MATHS</a></li>
        <li><a href="?category=CS">CS</a></li>
    </ul>
</div>
</header>
<div class="container">
    <section class="books">
        <h1 class="heading">LATEST BOOKS</h1>
        <div class="box-container">
            <?php
            if($select_products && mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>
            <form action="" method="post">
                <div class="box">
                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                    <h3><?php echo $fetch_product['book_name']; ?></h3>
                    <div class="price">Price: $<?php echo $fetch_product['b_price']; ?>/-</div>
                    <div class="price">Contact: <?php echo $fetch_product['contact']; ?></div>
                    <input type="hidden" name="book_name" value="<?php echo $fetch_product['book_name']; ?>">
                    <input type="hidden" name="b_price" value="<?php echo $fetch_product['b_price']; ?>">
                    <input type="hidden" name="contact" value="<?php echo $fetch_product['contact']; ?>">
                    <input type="hidden" name="p_image" value="<?php echo $fetch_product['image']; ?>">
                </div>
            </form>
            <?php
                }
            } else {
               echo '<h1>"NO BOOKS TO FOUND IN THIS CATEGORY"</h1>';
            }
            ?>
        </div>
    </section>
</div>

<!-- custom js file link -->
<script src="js/script.js"></script>
</body>
</html>