<<?php
require 'config.php';
$message = ''; // Initialize the message variable
session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $input_password = $_POST['password']; 
    if($input_password!=123){
      $message .= 'Incorrect admin password. '; 
   }else{
    $select = "SELECT `id`, `password` FROM `user_from` WHERE email = '$email'";
    $result = $con->query($select);
   
     // If $result is not null and there is at least one row in the result set
     if($result && $result->num_rows > 0) {
      // Fetch the first row of the result set as an associative array
     $row = $result->fetch_assoc();
     // Retrieve the hashed password from the fetched row
     $hashed_password_from_db = $row['password'];

     // If the input password matches the hashed password from the database
     if(password_verify($input_password, $hashed_password_from_db)) {
      $_SESSION['user_id'] = $row['id'];
      header('location: add_FAQ.php');
      exit;
}else{
   $message .= 'Incorrect email or password! ';
}
}
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin_login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/login.css">
  
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
      <h3>Admin login</h3>
      <?php
      if(!empty($message)){
         echo '<script>alert("'.$message.'");</script>';
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="admin_singup_faq.php">regiser now</a></p>
   </form>

</div>
<!-- custom js file link  -->
<script src="js/index.js"></script>
</body>
</html>