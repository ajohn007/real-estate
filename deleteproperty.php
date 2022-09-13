<?php

session_start();
require('dbconnection.php');


$id=$_POST["propertyid"];

$sql="DELETE FROM propertydetails where id='$id'";
$conn->query($sql);
echo "The property has been successfully deleted";
?>