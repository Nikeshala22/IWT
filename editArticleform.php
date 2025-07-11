<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>News Articles</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

  <!-- custom css file link  -->
  <link rel="stylesheet" href="Styles/singup.css" />
  <link rel="stylesheet" href="Styles/addArticleForm.css" />
  <link rel="stylesheet" href="Styles/editArticleForm.css" />
</head>

<body>
  <!-- header section starts  -->

  <header class="header">
    <nav class="navbar nav-1">
      <section class="flex">
        <a href="home.html" class="logo"><i class="fas fa-landmark"> </i>Kindom of Lands</a>
      </section>
    </nav>

    <nav class="navbar nav-2">
      <section class="flex">
        <div id="menu-btn" class="fas fa-bars"></div>

        <div class="menu">
          <ul>
            <li>
              <a href="#">Buy<i class="fas fa-angle-down"> </i></a>
              <ul>
                <li><a href="#">Lands</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Headline<i class="fas fa-angle-down"> </i></a>
              <ul>
                <li><a href="#">News</a></li>
              </ul>
            </li>
            <li><a href="home.html">Home</a></li>
            <li>
              <a href="#">help<i class="fas fa-angle-down"> </i></a>
              <ul>
                <li><a href="about.html">about us</a></li>
                <li><a href="contact.html">contact us</a></li>
              </ul>
            </li>
          </ul>
        </div>

        <ul>
          <li>
            <a href="wishlist.html">Wish List <i class="far fa-heart"> </i></a>
          </li>
          <li>
            <a href="#">account <i class="fas fa-angle-down"> </i></a>
            <ul>
              <li><a href="login.html">Login</a></li>
              <li><a href="register.html">Register</a></li>
              <li><a href="login.html">User Profile</a></li>
            </ul>
          </li>
        </ul>
      </section>
    </nav>
  </header>
  <!-- header section ends -->
  <?php
  require_once "config.php";

  // Check if the "id" parameter is set in the URL
  if (isset($_GET['id'])) {
    // Get the article ID from the URL
    $articleId = $_GET['id'];

    // Prepare the SQL query to select the article with the given ID
    $sql_query = "SELECT * FROM article WHERE id=$articleId";

    // Execute the SQL query
    if ($result = $con->query($sql_query)) {
      // Fetch the article data
      $row = $result->fetch_assoc();

      // Close the result set
      $result->close();
    } else {
      // Handle the case where the query fails
      echo "Error: " . $con->error;
    }
  }
  ?>
  <div class="editArticlesFormContainer">
    <form class="editArticlesForm" method="post" action="updateArticle.php">
      <div class="maTitle">Edit the form</div>
      <div class="inputLable">Article ID: </div>
      <!-- Hidden input field to pass the ID of the article being edited -->
      <input type="text" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>" readonly>

      <div class="inputLable">Article Title:</div>
      <!-- Populate the input field with the fetched article title -->
      <input type="text" name="title" value="<?php echo isset($row['title']) ? $row['title'] : ''; ?>"
        placeholder="write title" />

      <div class="inputLable">Email:</div>
      <!-- Populate the input field with the fetched article email -->
      <input type="text" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>"
        placeholder="write your email" />

      <div class="inputLable">Land Description:</div>
      <!-- Populate the textarea with the fetched article description -->
      <textarea name="description"
        placeholder="write a description"><?php echo isset($row['description']) ? $row['description'] : ''; ?></textarea>

      <div class="inputLable">Image:</div>
      <input type="text" name='image' placeholder="paste image url"
        value="<?php echo isset($row['id']) ? $row['image'] : ''; ?>" />

      <input type="submit" value="Save Changes" class="editBtn" />

      <input type="button" value="back" class="backBtn" onclick="window.location.href='./newsArticleList.php'" />
    </form>
  </div>
  <!-- footer section starts  -->

  <footer class="footer">
    <section class="flex">
      <div class="box">
        <a href="tel:1234567890"><i class="fas fa-phone"> </i><span>0112345679</span></a>
        <a href="tel:1112223333"><i class="fas fa-phone"> </i><span>0765727000</span></a>
        <a href="mailto:kindomoflands@gmail.com"><i class="fas fa-envelope">
          </i><span>kindomoflands@gmail.com</span></a>
        <a href="#"><i class="fas fa-map-marker-alt"> </i><span>No:750 Colombo 10, Sri Lanka</span></a>
      </div>

      <div class="box">
        <a href="home.html"><span>Legal Documents</span></a>
        <a href="about.html"><span>Terms & Conditions</span></a>
        <a href="contact.html"><span>Privacy Policy</span></a>
      </div>

      <div class="box">
        <a href="#"><span>facebook</span><i class="fab fa-facebook-f"> </i></a>
        <a href="#"><span>twitter</span><i class="fab fa-twitter"> </i></a>
        <a href="#"><span>linkedin</span><i class="fab fa-linkedin"> </i></a>
        <a href="#"><span>instagram</span><i class="fab fa-instagram"> </i></a>
      </div>
    </section>

    <div class="credit">
      &copy; Created By <span>SLIIT Students</span> | All Rights Reserved!
    </div>
  </footer>

  <!-- footer section ends -->

  <!-- custom js file link  -->
  <script src="js/singup.js"></script>
</body>

</html>