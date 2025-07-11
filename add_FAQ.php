<?php
require 'config.php';
session_start();

// Check if user is logged in
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];


if (isset($_POST["submit"])) {
    $question = $_POST['question']; // Corrected variable name
    $answer = $_POST['answer'];

    $query = "INSERT INTO faqs (question, answer) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $question, $answer); // Use "ss" for two string parameters
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('Location: view_FAQ.php');
        exit(); // Always exit after header redirect
    } else {
        echo "Error inserting details: " . mysqli_error($con); // Use mysqli_error() to get error details
    }
}
}
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
                     <li><a href="mycontact.html">contact us</a></i></li>
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

<div class="container" >
            <h1 >Add FAQ</h1>
            <form method="POST" action="">
                <link rel="stylesheet" href="styles/FAQ.css">
                <div class="form-group">
                    <label>Enter Question</label>
                    <input type="text" name="question" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Enter Answer</label>
                    <textarea name="answer" class="form-control" required></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-info" value="Add FAQ" />
            </form>
        </div>
    </div>

    <div>
    
</div>
<?php
require 'config.php';

// Query to get all FAQs
$query = "SELECT * FROM faqs";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>All FAQs:</h2>";
    echo "<div class='table'>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Question</th>";
    echo "<th>Answer</th>";
    echo "<th>Action</th>"; // Header for the action column
    echo "</tr>";
    while ($faq = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($faq['question']) . "</td>"; // Use htmlspecialchars to escape special characters
        echo "<td>" . htmlspecialchars($faq['answer']) . "</td>"; // Use htmlspecialchars to escape special characters
        // Add Edit button within a form for each FAQ row
        echo "<td>";
        echo "<form method='GET' action='edit_FAQ.php'>";
        echo "<input type='hidden' name='id' value='" . $faq['id'] . "'>"; // Assuming 'id' is the FAQ ID column
        echo "<input type='submit' name='edit' class='btn btn-info' value='Edit'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "<p>No FAQs found.</p>";
}

// Close connection
mysqli_close($con);
?>



   

<!--scroll button-->
<a href="#" class="to-top">
    <i class="fas fa-chevron-up"></i>
</a>

<!-- footer section starts  -->

<footer class="footer">

  <section class="flex">

     <div class="box">
        <a href="tel:1234567890"><i class="fas fa-phone"></i><span>0112345679</span></a>
        <a href="tel:1112223333"><i class="fas fa-phone"></i><span>0765727000</span></a>
        <a href="mailto:kindomoflands@gmail.com"><i class="fas fa-envelope"></i><span>kindomoflands@gmail.com</span></a>
        <a href="#"><i class="fas fa-map-marker-alt"></i><span>No:750 Colombo 10, Sri Lanka</span></a>
     </div>

     <div class="box">
     <a href="ourservice.php"><span>Our Services</span></a>
        <a href="terms&condition.php"><span>Terms & Conditions</span></a>
        <a href="privacypolicy.php"><span>Privacy Policy</span></a>
     </div>

     <div class="box">
        <a href="#"><span>facebook</span><i class="fab fa-facebook-f"></i></a>
        <a href="#"><span>twitter</span><i class="fab fa-twitter"></i></a>
        <a href="#"><span>linkedin</span><i class="fab fa-linkedin"></i></a>
        <a href="#"><span>instagram</span><i class="fab fa-instagram"></i></a>

     </div>

  </section>

  <div class="credit">&copy; Created By <span>SLIIT Students</span> | All Rights Reserved!</div>

</footer>

<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/index.js"></script>
</body>
</html>