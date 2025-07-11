<?php

require 'config.php';

if(isset($_POST['publish'])){
    $location = $_POST['location'];
    $extent = $_POST['extent'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];

    if($_FILES["image"]["error"] == 4){
        echo "<script> alert('Image Does Not Exist'); </script>";
    }
    else{
        // Retrieve the original name, size, and temporary filename of the uploaded image file
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];// Define an array containing valid image file extensions
        // Extract the extension of the uploaded file
        $imageExtension = pathinfo($fileName, PATHINFO_EXTENSION); // Get file extension
        // Convert the extension to lowercase for case-insensitive comparison
        $imageExtension = strtolower($imageExtension);
        
        // Check if the uploaded image extension is not in the list of valid image extensions
        if ( !in_array($imageExtension, $validImageExtension) ){
            $error_message[] = 'Invalid Image Extension';
        }
        else if($fileSize > 100000000){
            $error_message[] = 'Image Size Is Too Large';
        }
        else{
            $newImageName = uniqid() . '.' . $imageExtension;// Generate a unique filename using uniqid() function and concatenate it with the image extension
            move_uploaded_file($tmpName, 'uploaded_img/' . $newImageName);// Move the uploaded image file from temporary location to the 'uploaded_img' directory with the new unique name

            // Prepare an SQL query to insert data into the 'land' table in the database
            $query = "INSERT INTO land (location, extent, price, image, detail) VALUES (?, ?, ?, ?, ?)";
            // Prepare the SQL statement for execution and create a statement object
            $stmt = mysqli_prepare($con, $query);

            // Check if the SQL statement was successfully prepared
            if ($stmt) {
               // Bind the parameters to the prepared statement
                mysqli_stmt_bind_param($stmt, "sssss", $location, $extent, $price, $newImageName, $detail);
                // Execute the prepared statement
                mysqli_stmt_execute($stmt);
                $success_msg[] = 'Successfully Added!';
                mysqli_stmt_close($stmt);
            } else {
                $error_message[] = 'Failed to prepare statement';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>add_land</title>

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
               <li><a href="user_view.php">Buy<i class="fas fa-angle-down"></i></a>
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
   <header>
  </header>
<div class="form-container">
    <form action="" method="post"  enctype="multipart/form-data" class="add">
        <h3>Add land</h3>
        <?php
      if(isset($success_msg)){// Check if $success_msg is set and not empty
         foreach($success_msg as $success_msg){// Iterate over each element in $success_msg array
            echo '<div class="success_msg">'.$success_msg.'</div>';
         }
      }
      if(isset($error_message)){// Check if $error_message is set and not empty
         foreach($error_message as $error_message){// Iterate over each element in $error_message array
            echo '<div class="error_message">'.$error_message.'</div>';
         }
      }
      ?>
                <div class="input-field">
                    <p>land location<span>*</span></p>
                    <input type="text" name="location" placeholder="enter location" maxlength="100" required class="box">
                </div>
                <div class="input-field">
                    <p>land extent(in perches )<span>*</span></p>
                    <input type="text" name="extent" placeholder="enter extent(in perches )" maxlength="100" required class="box">
                </div>
                <div class="input-field">
                    <p>land price(per perch ) <span>*</span></p>
                    <input type="text" name="price" placeholder="enter pland price(per perch ) " maxlength="100" required class="box">
                </div>
                <div class="input-field">
                    <p>image<span>*</span></p>
                    <input type="file" name="image" accept=".jpg, .jpeg, .png" required class="box">
                </div>
        <div class="input-field">
            <p>land details<span>*</span></p>
            <textarea name="detail" placeholder="enter land details" maxlength="1000" required class="box"></textarea>
        </div>
        <input type="submit" name="publish" value="add land" class="btn"> 
        <a href="view_land.php"  class="btn">Update land details</a>
        <a href="user_view.php"  class="btn">View Lands</a>
    </form> 
</div>
</body>
</html>