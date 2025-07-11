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
  <link rel="stylesheet" href="Styles/newsArticle.css" />
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
                <li><a href="user_view.php">Lands</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Headline<i class="fas fa-angle-down"> </i></a>
              <ul>
                <li><a href="newsArticleList.php">News</a></li>
              </ul>
            </li>
            <li><a href="index.php">Home</a></li>
            <li>
              <a href="#">help<i class="fas fa-angle-down"> </i></a>
              <ul>
                <li><a href="about.php">about us</a></li>
                <li><a href="mycontact.php">contact us</a></li>
              </ul>
            </li>
          </ul>
        </div>

        <ul>
          <li>
          <li><a href="logout.php">Logout</a></li>
         <li><a href="view_FAQ.php">FAQ</a></li>
          </li>
          <li>
            <a href="#">account <i class="fas fa-angle-down"> </i></a>
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

  <div class="newsArticleContainer">
    <h1 class="mainTitle">News Articles</h1>

    <div class="mainDesc">Resize the browser window to see the effect.</div>

    <button class="addArticlesBtn" onclick="window.location.href='./addArticleForm.php'">
      <img class="btnIcon" src="./Images/plus.svg" alt="Icon" /> Create News
      Article
    </button>
    <div class="articlesListContainer">

      <?php
      require_once "config.php";

      $sql_query = "SELECT * FROM article";

      if ($result = $con->query($sql_query)) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="articleBox">';
          echo '<a target="_blank" href="img_5terre.jpg">';
          echo '<img src="' . $row["image"] . '" alt="Article Picture" />';
          echo '</a>';
          echo '<div class="detailsContainer">';
          echo '<div class="newsTitle">' . $row["title"] . '</div>';
          echo '<div class="desc">' . $row["description"] . '</div>';
          echo '</div>';
          echo '<div class="articleAtionBtn">';
          echo '<button class="removeArticlesBtn" onclick="showDeleteModal(' . $row["id"] . ')">Remove Article';
          echo '<img class="btnIcon" src="./Images/close.svg" alt="Icon" />';
          echo '</button>';
          echo '<button class="editArticlesBtn" onclick="editArticle(' . $row["id"] . ')">Edit Article';
          echo '<img class="btnIcon" src="./Images/edit.svg" alt="Icon" />';
          echo '</button>';
          echo '</div>';
          echo '</div>';
        }

        $result->free();
      } else {
        echo "Error: " . $sql_query . "<br>" . $conf->error;
      }

      // Close connection
      $con->close();
      ?>
    </div>
  </div>
  <!-- Conformation box  -->
  <div id="deleteModal" class="modal">
    <form class="modal-content" action="/action_page.php">
      <div class="container">
        <h1>Remove News Article</h1>
        <div class="mainDesc">
          Are you sure you want to remove this article?
        </div>

        <div class="deleteModalButtonContainer">
          <button type="button" onclick="cancelDelete()" class="cancelbtn">Cancel</button>
          <button type="button" onclick="confirmDelete()" class="deletebtn">Remove</button>
        </div>
      </div>
    </form>
  </div>
  <!-- ----------------- -->

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
        <a href="ourservice.php"><span>Our Services</span></a>
        <a href="terms&condition.php"><span>Terms & Conditions</span></a>
        <a href="privacypolicy.php"><span>Privacy Policy</span></a>
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
  <script src="js/newsArticle.js"></script>
</body>

</html>