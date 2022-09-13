<?php 
    session_start();
    require('dbconnection.php');
    
    $id=$_POST["id"];
    $sql="SELECT * from propertydetails where id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row["email"];

?>