<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/index.css">

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
<!--home section starts-->

<section class="home" id="home">
  <div class="content">
    <h3>Land is the Canvas of opportunity</h3>
    <p>Discover your Dream Land With Kindom Of Lands!</p>
    <a href="user_view.php">Discover More</a>
  </div>

  <div class="controls">
    <span class="vid-btn active" data-src="images/VD1.mp4"></span>

    <span class="vid-btn" data-src="images/VD2.mp4"></span>

    <span class="vid-btn" data-src="images/VD3.mp4"></span>

    <span class="vid-btn" data-src="images/VD4.mp4"></span>

    <span class="vid-btn" data-src="images/VD5.mp4"></span>
    
  </div>

  <div class="video-container">
    <video src="images/VD1.mp4" id="video-slider" loop autoplay muted></video>
  </div>

</section>
<!--home section ends-->
<!--service section Starts-->

<section class="services" id="services">

  <h1 class="heading">
    <span>S</span>
    <span>E</span>
    <span>R</span>
    <span>V</span>
    <span>I</span>
    <span>C</span>
    <span>E</span>
    <span>S</span>
  </h1>

  <div class="box-container">

    <div class="box">
      <i class="fas fa-landmark"></i>
      <h3>Sale Lands</h3>
      <p>Experience seamless land transactions with our expert sale land service. Whether you're selling, we provide a hassle-free experience tailored to your needs. Our dedicated team offers comprehensive assistance, from property valuation to legal documentation, ensuring a smooth and transparent process. Trust us to help you find the perfect plot of land or sell your property swiftly and efficiently!</p>
    </div>

    <div class="box">
      <i class="fas fa-tools"></i>
      <h3>Land Improvement Services</h3>
      <p>Partnering with contractors and specialists to offer land improvement services such as clearing, grading, landscaping, and infrastructure development!</p>
    </div>

    <div class="box">
      <i class="fas fa-balance-scale"></i>
      <h3>Legal Assistance</h3>
      <p>Providing legal assistance and guidance throughout the land purchase process, including contract drafting, title searches, and ensuring compliance with local regulations!</p>
    </div>

    <div class="box">
      <i class="fas fa-globe-asia"></i>
      <h3>Around the World</h3>
      <p>Explore a vast selection of lands available around the globe with our comprehensive service. Whether you're seeking picturesque countryside retreats, bustling urban developments, or pristine coastal properties, we provide access to diverse land offerings in every corner of the world. With our user-friendly platform and expert assistance, finding your dream land investment has never been easier. Discover opportunities beyond borders and secure your piece of paradise today!</p>
    </div>

    <div class="box">
      <i class="fas fa-clock"></i>
      <h3>24/7 Service</h3>
      <p>Access our dedicated 24/7 service for uninterrupted support and assistance. Whether it's day or night, our team is here to address your needs promptly and efficiently. Enjoy peace of mind knowing that help is always just a click or call away, ensuring convenience and reliability whenever you need it!</p>
    </div>

    <div class="box">
      <i class="fas fa-users"></i>
      <h3>Community Development</h3>
      <p>Supporting community development initiatives by identifying opportunities for land redevelopment, revitalization, and urban renewal projects to enhance local neighborhoods and economies.!</p>
    </div>

  </div>

</section>

<!--service section end-->


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
