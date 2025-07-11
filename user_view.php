<?php

require 'config.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user_view</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/style.css">

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
   <link rel="stylesheet" href="form_style.css">
   <div class="main-container">
    <section class="show-post">
        <div class="heading">
            <h1>Lands</h1>
        </div>
        <?php
        if(isset($success_msg)){
            foreach($success_msg as $success_msg){
               echo '<div class="success_msg">'.$success_msg.'</div>';
            }
         }
         if(isset($error_message)){
            foreach($error_message as $error_message){
               echo '<div class="error_message">'.$error_message.'</div>';
            }
         }
        ?>


        <div class="box-container">
            <?php
            
            $select_lands = $con->query("SELECT * FROM `land`");// Execute a SQL query to select all records from the "land" table

            if ($select_lands->num_rows > 0) {// Check if there are any records returned by the query
                // Loop through each record fetched from the query result
                while ($fetch_lands = $select_lands->fetch_assoc()) {
            ?>
                    <form action="" method="post" class="box">
                        <!-- Hidden input field to store the land ID -->
                        <input type="hidden" name="land_id" value="<?= ($fetch_lands['id']); ?>">

                        <!-- Display the land image if it exists -->
                        <?php if (!empty($fetch_lands['image'])) { ?>
                            <img class="image" src="uploaded_img/<?= ($fetch_lands['image']);
                             ?>" alt="image">
                  
                        <?php } ?>
                        <div class="content">
                            <div class="shape"></div> 
                            <!-- Display the land price --> 
                            <div class="price"><?= ($fetch_lands['price']) . "/="; ?></div>
                            <!-- Display the location of the land -->
                            <div class="title"><?= ($fetch_lands['location']); ?></div>
                              <div class="flexx-btn">
                                <a href="read_more.php?post_id=<?= ($fetch_lands['id']); ?>" class="btn">Read More</a>
                                <a href="mycontact.php?post_id=<?= ($fetch_lands['id']); ?>" class="btn">Buy Now</a>
                                
                            </div>
                            <div class="flexx-btn">
                            <a href="booking.php?post_id=<?= ($fetch_lands['id']); ?>" class="btn">Book Now</a>
                        </div>

                        </div>
                    </form>
            <?php
                }
            } 
            ?>
        </div>
    </section>
</div>

         <div class="Button" >
            <a href="admin_login.php" name="add_land">Add land</a>
         </div>
         <script>
     // Wait for the DOM content to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
   // Select all <a> elements inside elements with the class "Button"
    const buttons = document.querySelectorAll('.Button a');
     // Iterate over each selected button
    buttons.forEach(btn => {
      // Add a click event listener to the button
        btn.addEventListener('click', function (e) {
            // Log a message to the console when the button is clicked
            console.log('Button clicked');
            // Calculate the coordinates of the click relative to the button
            let x = e.clientX - this.getBoundingClientRect().left;
            let y = e.clientY - this.getBoundingClientRect().top;

             // Create a new <span> element for the ripple effect
            let ripples = document.createElement('span');
            // Set the position of the ripple relative to the button
            ripples.style.left = x + 'px';
            ripples.style.top = y + 'px';
             // Append the ripple element to the button
            this.appendChild(ripples);

            // Remove the ripple element after a delay
            setTimeout(() => {[bv;BG]
                ripples.remove();
            }, 1000);
        });
    });
});
</script>
<script src="js/index.js"></script>
</body>
</html>