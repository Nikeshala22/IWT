<?php
require 'config.php';

if (isset($_GET["id"])) {
    
    $id = $_GET["id"];

    
    $sql = "DELETE FROM article WHERE id = $id";

    
    if ($con->query($sql) === TRUE) {
        echo "<script> window.location='index.php'; alert('Article removed successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $con->error . "');</script>";
    }

    // Close the connection
    $con->close();
} else {
    // Handle the case where the ID parameter is not set
    echo "<script>alert('Error: No ID provided');</script>";
}

  ?>
