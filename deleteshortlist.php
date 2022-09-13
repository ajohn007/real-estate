<?php

session_start();
require('dbconnection.php');


$id=$_POST["propertyid"];
$email=$_SESSION["email"];
$sql="DELETE FROM shortlist where propertyid='$id' and email='$email'";
$conn->query($sql);
echo "The property has been successfully deleted";
?>