<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us</title>
<link rel="stylesheet" type="text/css" href="contact.css">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/contact.css">

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

<!--Contact section starts-->
<section class="contact" id="contact">

<h1 class="heading">
    <span>C</span>
    <span>O</span>
    <span>N</span>
    <span>T</span>
    <span>A</span>
    <span>C</span>
    <span>T</span>

</h1>

<div class="row">

  <div class="image">
    <img src="images/conimg.jpg" alt="">
  </div>

  <form method="post" action = "contactus_form.php">
    <div class="inputBox">
      <input type="text" placeholder="Name" name = "uname" >
      <input type="email" placeholder="Email" name = "uemail" >
    </div>
    <div class="inputBox">
      <input type="number" placeholder="Number" name = "pnumber">
      <input type="text" placeholder="Subject" name = "sub">
    </div>
    <textarea placeholder="Message" name="message" id="" cols="30" rows="10"></textarea>
    <input type="submit" class="btn" value="send Message" name = "send">
  </form>


</div>

</section>
<!--scroll button-->
<a href="#" class="to-top">
    <i class="fas fa-chevron-up"></i>
</a>
<!-- custom js file link  -->
<script src="index.js"></script>
</body>
</html>



