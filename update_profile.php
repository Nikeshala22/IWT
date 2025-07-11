<?php
require 'config.php'; // Include your database connection file

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Query to fetch user data
$query = "SELECT * FROM user_from WHERE id = '$user_id'";
$result = mysqli_query($con, $query);

// Check if query was successful and if user data exists
if ($result && mysqli_num_rows($result) > 0) {
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

// Update user profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['new_username'];
    $new_email = $_POST['new_email'];
    $new_number = $_POST['new_number'];
    $new_address = $_POST['new_address'];
    $new_password = $_POST['new_password'];

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    // Update query
    $update_query = "UPDATE user_from SET name='$new_username', email='$new_email', number='$new_number', address='$new_address', password='$hashed_password' WHERE id='$user_id'";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        // Redirect to profile page after successful update
        header('Location: user_profile.php');
        exit();
    } else {
        // Handle update error
        echo "Error updating profile: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update User Profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/update_profile.css">

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
    <h1>Update Profile</h1>
    <form action="" method="post">
        <!-- Existing fields -->
        <div class="field">
            <label for="new_username">New Username:</label>
            <input type="text" id="new_username" name="new_username" value="<?php echo $username; ?>">
        </div>
        <div class="field">
            <label for="new_email">New Email:</label>
            <input type="email" id="new_email" name="new_email" value="<?php echo $email; ?>">
        </div>
        <div class="field">
            <label for="new_number">New Number:</label>
            <input type="text" id="new_number" name="new_number" value="<?php echo $number; ?>">
        </div>
        <div class="field">
            <label for="new_address">New Address:</label>
            <input type="text" id="new_address" name="new_address" value="<?php echo $address; ?>">
        </div>
        <!-- New password field -->
        <div class="field">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
        </div>
        <!-- Add more fields as needed -->
        <button type="submit">Update Profile</button>
        <a href="index.php" class="button">Cancel</a>
    </form>
</div>
<!-- custom js file link  -->
<script src="js/index.js"></script>
</body>
</html>
