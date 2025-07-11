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
                  <li><a href="user_profile.php">User Profile</a></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>
<!-- header section ends -->

  <div class="sec">
  <form action="" method="post">
    <h2 class="title">FAQs</h2>
  <?php
  require 'config.php';
            
            $select_faq = $con->query("SELECT * FROM `faqs`");

            if ($select_faq->num_rows > 0) {
                
                while ($fetch_faq= $select_faq->fetch_assoc()) {
            ?>

    <div class="faq">
        <div class="question">
            <h3><?= ($fetch_faq['question']); ?></h3>
            <svg width="15" height="10" viewBox="0 0 42 25">
                <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linescap="round">
           </svg>
       </div>
       <div class="answer">
        <p><h3><?= ($fetch_faq['answer']); ?></p>
        </div>
        </div>
    </form>
    <?php
                }
            } else {
                
                echo '
                    
                        <p>No FAQs added yet!</p>
                    
                ';
            }
            ?>
            <div class="custom-button">
            <a href="admin_faq.php" name="add_faq"class="btn" >Add FAQs</a>
         </div>
 </div class="sec">

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