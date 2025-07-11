<?php
require 'config.php';

if(isset($_POST['update'])){
    $land_id = $_POST['land_id'];
    $location = $_POST['location'];
    $extent = $_POST['extent'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];

    // Update land details 
    $update_land = "UPDATE `land` SET location=?, extent=?, price=?, detail=? WHERE id=?";
    $stmt = $con->prepare($update_land);
    $stmt->bind_param("ssssi", $location, $extent, $price, $detail, $land_id);

    if($stmt->execute()) {
        $success_msg[] = 'Land details updated!';
    } else {
        $error_message[] = 'Failed to update land details: ' . $stmt->error;
    }

    $stmt->close();

    // Handle image upload and update if provided
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $image_folder = 'uploaded_img/' . $fileName;

        if($fileSize > 100000000) {
            $error_message[] = 'Image size is too large.';
        } else {
            // Check if image already exists
            $select_image = "SELECT * FROM `land` WHERE image=?";
            $stmt = $con->prepare($select_image);
            $stmt->bind_param("s", $fileName);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0) {
                $error_message[] = 'Please rename your image.';
            } else {
                // Move uploaded image to destination folder
                move_uploaded_file($tmpName, $image_folder);

                // Update image filename in database
                $update_image = "UPDATE `land` SET image=? WHERE id=?";
                $stmt = $con->prepare($update_image);
                $stmt->bind_param("si", $fileName, $land_id);
                $stmt->execute();

                // Delete old image file if it exists and is different from new filename
                $old_image = $_POST['old_image'];
                if($old_image != $fileName && $old_image != '') {
                    unlink('uploaded_img/' . $old_image);
                }

                $success_msg[] = 'Image updated!';
            }
        }
    }
}

// Handle land deletion
if (isset($_POST['delete_post'])) {
    $l_id = $_POST['land_id'];

    $delete_land = "DELETE FROM `land` WHERE id=?";
    $stmt = $con->prepare($delete_land);
    $stmt->bind_param("i", $l_id);

    if($stmt->execute()) {
        $success_msg[] = 'Land successfully deleted!';
    } else {
        $error_message[] = 'Failed to delete land: ' . $stmt->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>edit_land</title>

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
    <section class="post-editor">
        <div class="heading">
            <h1>Edit Land</h1>
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
        </div>
        <div class="box-container">
            <?php
            $land_id = $_GET['id']; // Retrieve the value of the 'id' parameter from the URL query string
            $select_land = "SELECT * FROM `land` WHERE id='$land_id'";
            $result = $con->query($select_land);
            if($result->num_rows > 0) {
                $fetch_land = $result->fetch_assoc();
            ?>
            <div class="form-container">
                <form action="" method="post" enctype="multipart/form-data" class="edit">
                    <!-- Hidden input field to store the ID of the land -->
                    <input type="hidden" name="land_id" value="<?= $fetch_land['id']; ?>">
                     <!-- Hidden input field to store the original image filename -->
                    <input type="hidden" name="old_image" value="<?= $fetch_land['image']; ?>">
                    <div class="input-field">
                        <p>Land Location <span>*</span></p>
                        <input type="text" name="location" value="<?= $fetch_land['location']; ?>" class="box">
                    </div>
                    <div class="input-field">
                        <p>Land Extent <span>*</span></p>
                        <input type="text" name="extent" value="<?= $fetch_land['extent']; ?>" class="box">
                    </div>
                    <div class="input-field">
                        <p>Land Price <span>*</span></p>
                        <input type="text" name="price" value="<?= $fetch_land['price']; ?>" class="box">
                    </div>
                    <div class="input-field">
                        <p>Land Detail <span>*</span></p>
                        <textarea name="detail" class="box"><?= $fetch_land['detail']; ?></textarea>
                    </div>
                    <div class="input-field">
                        <p>Land Image</p>
                        <?php if ($fetch_land['image'] != '') { ?>
                            <img src="uploaded_img/<?= $fetch_land['image']; ?>" class="image">
                        <?php } ?>
                        <input type="file" name="image" accept=".jpg, .jpeg, .png" class="btn" value="update image">
                    </div>    
                        <div class="flexx-btn">
                        <input type="submit" name="update" value="Update Land" class="btn">
                        <input type="submit" name="delete_post" value="Delete Land" class="btn">
                    </div>
                    <div class="flexx-btn">
                        <a href="view_land.php" class="btn" >Go Back</a>
                    </div>
                </form>
            </div>
            <?php
            } 
            ?>
        </div>
    </section>
</div>
<script src="js/index.js"></script>
</body>
</html>