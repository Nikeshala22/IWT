<?php
require 'config.php';


    if (isset($_POST['send'])) {
        $name = $_POST['uname'];
        $email = $_POST['uemail'];
        $phone = $_POST['pnumber'];
        $subject = $_POST['sub'];
        $message = $_POST['message'];

        $request = "INSERT INTO contact (Name, Email, PhoneNumber, Subject, Message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";
        
        if (mysqli_query($con, $request)) {
            header('Location: mycontact.php');
            exit;
        } else {
            echo "Error: " . $request . "<br>" . mysqli_error($con);
        }
    }
else {
    echo 'Something went wrong, Try again';
}

mysqli_close($con);
?>
