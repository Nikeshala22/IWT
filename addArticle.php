<?php
require_once "config.php";
if (isset($_POST['id'])) {
    // Assuming you're receiving the values through POST method
    $aid = $_POST["id"];
    $artiName = $_POST["title"];
    $artiEmail = $_POST["email"];
    $artiDescription = $_POST["description"];
    $aimage = $_POST["image"];

    $sql = "INSERT INTO article (id,title, email, description,image) VALUES ('$aid','$artiName','$artiEmail','$artiDescription','$aimage')";


    if ($con->query($sql)) {
        echo "<script> window.location='index.php'; alert('Article inserted successfully!');</script>";
        exit;
    } else {
        echo "<script>alert('Error: " . $conf->error . "');</script>";
    }


    $conf->close();
}

?>