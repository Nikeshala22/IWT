<?php

$con=new mysqli("localhost","root","","landsale");

if($con->connect_error)
{
    die("Connection failed".$con->connect_error);
}


?>