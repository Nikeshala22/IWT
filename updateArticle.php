<?php
require_once "config.php";

if (isset($_POST['id'])) {
    $aid = $_POST["id"];
    $artiName = $_POST["title"];
    $artiEmail = $_POST["email"];
    $artiDescription = $_POST["description"];
    $aimage = $_POST["image"];

    $sql = "UPDATE article SET title='$artiName', email='$artiEmail', description='$artiDescription', image='$aimage' WHERE id='$aid'";

    if ($con->query($sql)) {
        echo "<script>alert('Article updated successfully!'); window.location='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error: " . $conf->error . "');</script>";
    }

    $conf->close();
} else {
    echo "<script>alert('Error: Somthing went wrong');</script>";
}
?>