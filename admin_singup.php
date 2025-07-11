<?php
require 'config.php';

$message = ''; // Initialize the message variable

if(isset($_POST['submit'])){
   // Sanitize and escape form inputs
   $name = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $number = mysqli_real_escape_string($con, $_POST['number']);
   $address = mysqli_real_escape_string($con, $_POST['address']);
   $input1= mysqli_real_escape_string($con, $_POST['password']);
   if($input1!=123){
      $message .= 'Incorrect admin password. '; 
   }else{
   $hashedPwdInDb1=password_hash("$input1",PASSWORD_DEFAULT);
   
   
   $input2= mysqli_real_escape_string($con, $_POST['cpassword']);
   
   
   $hashedPwdInDb2=password_hash("$input2",PASSWORD_DEFAULT);
   


   // Check if the email already exists in the database
   $select = mysqli_query($con, "SELECT * FROM `user_from` WHERE email = '$email'") or die('Query failed: ' . mysqli_error($con));

   if(mysqli_num_rows($select) > 0){
      $message .= 'User already exists. '; 
   } else {
      // Check if passwords match
      if($input1 != $input2){
         $message .= 'Confirm password not matched. ';
      } else {
         // If no errors, proceed with registration
         $insert = mysqli_query($con, "INSERT INTO `user_from` (name, email, number, address, password) VALUES ('$name', '$email', '$number', '$address', '$hashedPwdInDb1')") or die('Query failed: ' . mysqli_error($con));

         if($insert){
            // Redirect to user profile page after successful registration
            header('location:admin_login.php');
            exit(); // Stop further execution
         } else {
            $message .= 'Registration failed. ';
         }
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
   <title>admin_singup</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/singup.css">

</head>
<body>
   
<!-- header section starts  -->

<header class="header">

   <nav class="navbar nav-1">
      <section class="flex">
         <a href="home.html" class="logo"><i class="fas fa-landmark"></i>Kindom of Lands</a>
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
                  <!-- Removed link to user profile page here -->
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>
<!-- header section ends -->
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data"onsubmit="return validateForm()">
      <h3>Admin Register</h3>
      <?php if(!empty($message)): ?>
         <script>alert("<?php echo $message; ?>");</script>
      <?php endif; ?>
      <input type="text" name="name" placeholder="enter username" class="box" required>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="number" name="number" placeholder="Enter contact number" class="box" required>
      <input type="address" name="address" placeholder="Enter your Address" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="admin_login.php">login now</a></p>
   </form>

</div>
<!-- custom js file link  -->

<script src="js/index.js"></script>
</body>
</html>
