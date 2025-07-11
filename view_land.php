
<?php

require 'config.php';

// Check if the delete button is clicked
if (isset($_POST['delete'])) {
    $l_id = $_POST['land_id']; // Get the ID of the land record to delete

       
        $delete_land = "DELETE FROM `land` WHERE id = '$l_id'";// Construct the SQL query to delete the land record
        if($con->query($delete_land)) // Execute the delete query
        {
            $success_msg[]='Land Successfully Deleted!';
        }
        else
        {
            $error_message[]='failed to delete land';
        }
      
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>view_land</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/style.css">
   <link rel="stylesheet" href="form_style.css">

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
                            <img class="image" src="uploaded_img/<?= ($fetch_lands['image']); ?>" alt="image">
                        <?php } ?>

                        <div class="content">
                            <div class="shape"></div>
                            <!-- Display the land price -->
                            <div class="price"><?= ($fetch_lands['price']) . "/="; ?></div>
                            <!-- Display the location of the land -->
                            <div class="title"><?= ($fetch_lands['location']); ?></div>
                            <div class="flexx-btn">
                                <a href="edit_land.php?id=<?= $fetch_lands['id']; ?>" class="btn">Edit</a>
                                <button type="submit" name="delete" class="btn" onclick="return confirm('Delete this land?');">Delete</button>
                                <a href="read_land.php?post_id=<?= ($fetch_lands['id']); ?>" class="btn">Read</a>
                            </div>
                        </div>
                    </form>
            <?php
                }
            } else {
                
                echo '
                    <div class="empty">
                        <p>No lands added yet!<br><a href="add_land.php" class="btn" style="margin-top: 1.5rem;">Add Lands</a></p>
                    </div>
                ';
            }
            ?>
        </div>
    </section>
</div>
<script src="js/index.js"></script>
</body>
</html>