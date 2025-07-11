<?php

require 'config.php';
$message = ''; // Initialize the message variable
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['password']));

   $select = mysqli_query($con, "SELECT * FROM `user_from` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message .= 'Incorrect email or password! ';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/login.css">
  <style>
   .password-container {
    position: relative;
}

.password-input {
    padding-right: 30px; /* Space for the image */
}

.eye-icon {
    position: absolute;
    right: 5px; /* Adjust right position as needed */
    top: 50%; /* Center vertically */
    transform: translateY(-50%); /* Center vertically */
    cursor: pointer; /* Cursor style */
    width: 20px; /* Set width of the image */
    height: auto; /* Maintain aspect ratio */
}

  </style>

</head>
<body>
   
<!-- header section starts  -->

<header class="header">

   <nav class="navbar nav-1">
      <section class="flex">
         <a href="index.php" class="logo"><i class="fas fa-landmark"></i>Kindom of Lands</a>
      </section>
   </nav>

   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="menu">
            <ul>
               <li><a href="#">Buy<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="user_view.php">Lands</a></li>
                  </ul>
               </li>
               <li><a href="#">Headline<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="newsArticleList.php">News</a></li>
                  </ul>
               </li>
               <li><a href="index.php">Home</a></li>
               <li><a href="#">help<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="about.php">about us</a></i></li>
                     <li><a href="mycontact.php">contact us</a></i></li>
                  </ul>
               </li>
            </ul>
         </div>

         <ul>
         <li><a href="view_FAQ.php">FAQ</a></li>
            <li><a href="#">account <i class="fas fa-angle-down"></i></a>
               <ul>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="singup.php">Register</a></li>
                  <li><a href="user_profile.php">User Profile</a></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>
<!-- header section ends -->

   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>
      <?php
      if(!empty($message)){
         echo '<script>alert("'.$message.'");</script>';
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <div class="password-container">
    <input type="password" name="password" placeholder="Enter password" class="box password-input" required>
    <i class="eye-icon fas fa-eye" onclick="togglePasswordVisibility()"></i>
</div>
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="singup.php">regiser now</a></p>
   </form>

</div>
<!-- custom js file link  -->
<script src="js/index.js"></script>
<script src="js/login.js"></script>
</body>
</html>