<?php
 require 'config.php';

 // Get the post ID from the query parameter in the URL

  $get_id=$_GET['post_id'];

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>read_more</title>

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
   

   <div class="main-container">
    <section class="read-post">
        <div class="heading">
            <h1>Land detail</h1>
        </div>
        <div class="box-container">
        <?php
        // Select all columns from the 'land' table where the 'id' column matches the value of $get_id
        $select_land="SELECT * FROM `land` WHERE id = '$get_id'";
        $result=$con->query($select_land);
        if($result->num_rows>0){
            while($fetch_land=$result->fetch_assoc()){
       ?>
       <form action="" method="post" class="box">
       <input type="hidden" name="land_id" value="<?=$fetch_land['id'];?>">
       <div >
        <?php if($fetch_land['image']!=''){?>
            <img src="uploaded_img/<?=$fetch_land['image'];?>"class="image">
            <?php }?>
      <div class="price"><?=$fetch_land['price'];?>/=</div>
      <div class="title"><?=$fetch_land['location'];?></div>
      <div class="content"><?=$fetch_land['detail'];?></div>
      <div class="flexx-btn">
       
        <a href="user_view.php?post_id=<?$fetch_land['id'];?>"class="btn">go back</a>
    </form>
    <?php
        }
    }else{
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