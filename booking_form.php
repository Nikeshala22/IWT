<?php
require 'config.php';

if (isset($_POST['send'])) {
    $fname = $_POST['fullname'];
    $email = $_POST['email'];
    $district = $_POST['district'];
    $phone = $_POST['phone'];
    $payment = $_POST['payment'];

    // Corrected column name and table name
    $request = "INSERT INTO bookingdetails (Name, Email, District, Phonenumber, PaymentMethod) VALUES ('$fname', '$email', '$district', '$phone','$payment')";

    if (mysqli_query($con, $request)) {
        header('Location: booking.php');
        exit;
    } else {
        echo "Error: " . $request . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo 'Something went wrong, Try again';
}
?>
