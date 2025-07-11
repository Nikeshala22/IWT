<?php
require 'config.php';

session_start();

// Check if user is logged in
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

// Initialize variables
$faq_id = null;
$fetch_faq = null;
$update_success = false;

// Check if FAQ ID is provided via GET parameter
if(isset($_GET['id'])) {
    $faq_id = $_GET['id'];

    // Fetch the FAQ record based on the provided ID
    $select_faq = "SELECT * FROM `faqs` WHERE id=?";
    $stmt = $con->prepare($select_faq);
    $stmt->bind_param("i", $faq_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if FAQ record exists
    if ($result->num_rows > 0) {
        $fetch_faq = $result->fetch_assoc();

        // Handle form submission for updating FAQ
        if(isset($_POST['update'])) {
            $question = $_POST['question'];
            $answer = $_POST['answer'];

            // Update FAQ details in the database
            $update_faq = "UPDATE `faqs` SET question=?, answer=? WHERE id=?";
            $stmt_update = $con->prepare($update_faq);
            $stmt_update->bind_param("ssi", $question, $answer, $faq_id);

            if($stmt_update->execute()) {
                $update_success = true;
                // Update fetched FAQ data after successful update
                $fetch_faq['question'] = $question;
                $fetch_faq['answer'] = $answer;
            } else {
                echo "Error updating FAQ: " . $stmt_update->error;
            }

            $stmt_update->close();
        }
    } else {
        // FAQ not found
        echo '<div class="empty"><p>No FAQ found!</p></div>';
    }

    $stmt->close();
} else {
    // FAQ ID not provided
    echo '<div class="empty"><p>FAQ ID not provided!</p></div>';
}
}else {
   // Redirect to login page if user is not logged in
   header('Location: singup.php');
   exit();
}

// Check if delete button is clicked
if(isset($_POST['delete'])) {
   // Query to delete user data
   $delete_query = "DELETE FROM faqs WHERE id = '$faq_id'";
   $delete_result = mysqli_query($con, $delete_query);

   if($delete_result) {
       // Redirect to login page after successful deletion
       header('Location: view_FAQ.php');
       exit();
   } else {
       // Handle deletion error
       echo "Error deleting user data: " . mysqli_error($con);
   }
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lands Booking Form</title>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>singup</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/style.css"> 
   <link rel="stylesheet" href="styles/FAQ.css"> 
   <script src="js/FAQ.js"></script>
    

</head>
<body>

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
                  <li><a href="user_profile.php">User Profile</a></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>
<!-- header section ends -->
<div class="container">
        <?php if ($fetch_faq && !$update_success): ?>
            <h1>Edit FAQ</h1>
            <form method="POST" action="edit_FAQ.php?id=<?= $faq_id; ?>">
                <div class="form-group">
                    <label>Enter Question</label>
                    <input type="text" name="question" value="<?= $fetch_faq['question']; ?>" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Enter Answer</label>
                    <textarea name="answer" class="form-control" required><?= $fetch_faq['answer']; ?></textarea>
                </div>
                <input type="submit" name="update" class="btn btn-info" value="Update FAQ" />
                <input type="submit" name="delete" class="btn btn-info" value="Delete FAQ" />
                <a href="add_FAQ.php" class="btn btn-primary">Go back</a>
            </form>
        <?php elseif ($update_success): ?>
            <div class="success-message">
                <p>FAQ updated successfully!</p>
                <a href="view_FAQ.php" class="btn btn-primary">Back to FAQs</a>
            </div>
        <?php endif; ?>

        <?php if (!$fetch_faq && !isset($_POST['update'])): ?>
            <div class="empty">
                <p>No FAQs added yet!</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="js/FAQ.js"></script>
</body>
</html>



<!-- custom js file link  -->
<script src="js/index.js"></script>
</body>
</html>