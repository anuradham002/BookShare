<?php
include('config.php');
if(!isset($_SESSION)){
session_start();
}
$user_type='';
if(isset($_SESSION['user_type'])){
   $user_type=$_SESSION['user_type'] ;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookReads - Home</title>
    <link rel="stylesheet" href="CSS/style1.css">
    <style>
        /* Header styles */
        /*header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav {
            text-align: right;
        }*/

        /* Slideshow styles */
        .slideshow-container {
            width: 100%;
            height: 500px;;
            position: relative;
            margin: auto;
            overflow: hidden;
        }

        .slides {
            display: flex;
            animation: slide 10s infinite alternate;
        }

        .slide {
            flex: 0 0 100%; /* Each slide takes up 100% of container width */
            height: 500px; /* Allow slides to adjust height based on content */
        }

        .slide img {
            width: 100%;
            height: 500px;
        }

        /* Define the sliding animation */
        @keyframes slide {
    0% {
        transform: translateX(0);
    }
    14.2857% {
        transform: translateX(0);
    }
    26.5714% {
        transform: translateX(-100%);
    }
    40.8571% {
        transform: translateX(-100%);
    }
    55.1429% {
        transform: translateX(-200%);
    }
    71.4286% {
        transform: translateX(-300%);
    }
    85.7143% {
        transform: translateX(-400%);
    }
    100% {
        transform: translateX(-500%);
    }
}
        

        /* Contact info styles 
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            text-decoration: underline;
        }*/
    </style>
</head>
<body>
<header class="header">

   <div class="flex">
     <div class="logo">
      <img src="home_images/logo.png" height="50px" width="50px">
        BOOKSHARE
    </div>
      <nav class="navbar">
         <?php
         if($user_type =='admin'){
           echo ' <a href="admin.php">ADD BOOKS</a>';}
          elseif($user_type =='user'){
            echo ' <a href="user.php">ADD BOOKS</a>';}
         ?>
         <a href="display.php">VIEW BOOKS</a>
         <a href="readmore.html">GIVE A READ</a>
         <a href="/Contact Form/contact.html">CONTACT US</a>
         <a href="logout.php">LOGOUT</a>
      </nav>
      <?php
      
      //$select_rows = mysqli_query($conn, "SELECT * FROM `books`") or die('query failed');
     // $row_count = mysqli_num_rows($select_rows);

      ?>

   </div>

</header>
<div class="slideshow-container">
    <div class="slides">
        <div class="slide">
            <img src="home_images/bg_1.jpg" alt="Book Image 1">
        </div>
    
        <div class="slide">
            <img src="home_images/bg_2.jpg"
             alt="Book Image 2">
        </div>
        <div class="slide">
            <img src="home_images/bg_3.jpg" alt="Book Image 3">
        </div>
        <div class="slide">
            <img src="https://wallpapercave.com/wp/wp2036905.jpg" alt="Book Image 4">
        </div>
        <div class="slide">
            <img src="home_images/bg_5.jpg" alt="Book Image 5">
        </div>
        <div class="slide">
            <img src="home_images/bg_6.jpg" alt="Book Image 6">
        </div>
       

        <!-- Add more slides as needed -->
    </div>
</div>
<div class="donate">
    <link rel="stylesheet" href="CSS/glow.css">
    <h2>DONATE AND SHARE ON BOOKSHARE</h2>
</div>
<div style="background-color: white; height:80px;"></div>
<section class="articles">
    <link rel="stylesheet" href="CSS/hover.css">
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
  <article>
    <div class="article-wrapper">
      <figure>
        <img src="https://wallpapercave.com/wp/wp2298004.jpg" alt="" />
      </figure>
      <div class="article-body">
        <div class="text">  "Books are vessels of enlightenment; sharing them fosters a community of learning and growth."</div>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="https://wallpapercave.com/wp/wp2297945.jpg" alt="" />
      </figure>
      <div class="article-body">
      <div class="text"> "Knowledge hidden within books is a gift waiting to be shared, illuminating minds and igniting curiosity.</div>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="https://cdn.lifehack.org/wp-content/uploads/2015/03/books-everyone-should-read.jpeg" alt="" />
      </figure>
      <div class="article-body">
      <div class="text"> "Books serve as bridges between minds, and through sharing, we build a network of interconnected learners, each contributing to the collective journey of growth."</div>
      </div>
    </div>
  </article>
</section>
<!--FONT AWESOME-->
<div class="footer">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="CSS/style2.css">
<div class="row">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="https://www.instagram.com/gunjan_gn_sharma/"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-youtube"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
</div>

<div class="row">
<ul style="color:white">
<li><i class="fa fa-phone"></i>    +91 9319765922</li>
<li><i class="fa fa-envelope"></i>  alpham26m@ gmail.com</li>
<li><i class="fa fa-map-marker"></i>   Krishna Hostel, IGDTUW</li>
</ul>
</div>

<div class="row">
BOOKSHARE Copyright © 2021 BookShare - All rights reserved || Designed By: AG
</div>
</div>
</body>
</html>