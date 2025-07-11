<?php
require 'config.php'; // Include your database connection file

session_start();

// Check if user is logged in
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Query to fetch user data
    $query = "SELECT * FROM user_from WHERE id = '$user_id'";
    $result = mysqli_query($con, $query);

    // Check if query was successful and if user data exists
    if($result && mysqli_num_rows($result) > 0) {
        // Fetch user data
        $user_data = mysqli_fetch_assoc($result);

        // Store user data in variables
        $username = $user_data['name'];
        $email = $user_data['email'];
        $number = $user_data['number'];
        $address = $user_data['address'];
        // Other fields as needed
    } else {
        // Handle case where user data is not found
        $username = "User Not Found";
        $email = "";
        $number = "";
        $address = "";
    }
} else {
    // Redirect to login page if user is not logged in
    header('Location: singup.php');
    exit();
}

// Check if delete button is clicked
if(isset($_POST['delete'])) {
    // Query to delete user data
    $delete_query = "DELETE FROM user_from WHERE id = '$user_id'";
    $delete_result = mysqli_query($con, $delete_query);

    if($delete_result) {
        // Redirect to login page after successful deletion
        header('Location: index.php');
        exit();
    } else {
        // Handle deletion error
        echo "Error deleting user data: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/user_profile.css">

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
         <li><a href="logout.php">Logout</a></li>
         <li><a href="add_FAQ.php">FAQ</a></li>
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

<div class="container">
    <h1 >User Profile</h1>
    <div class="profile-info">
        <div class="field">
            <label style = "font-size:16px;" for="username">Username:</label>
            <span style = "font-size:14px;"><?php echo $username; ?></span>
        </div>
        <div class="field">
            <label style = "font-size:16px;" for="email">Email:</label>
            <span style = "font-size:14px;"><?php echo $email; ?></span>
        </div>
        <div class="field">
            <label style = "font-size:16px;" for="number">Number:</label>
            <span style = "font-size:14px;"><?php echo $number; ?></span>
        </div>
        <div class="field">
            <label style = "font-size:16px;" for="address">Address:</label>
            <span style = "font-size:14px;"><?php echo $address; ?></span>
        </div>
    </div>
    <form action="" method="post">
        <button type="submit" name="delete">Delete Profile</button>
        <a href="update_profile.php" class="button">Update Profile</a>
    </form>
</div>
<!-- custom js file link  -->
<script src="js/index.js"></script>
</body>
</html>
