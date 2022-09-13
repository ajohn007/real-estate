<?php 
    session_start();
    require('dbconnection.php');
    
    $id=$_POST["id"];
    $sql="SELECT * from propertydetails where id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(($row["phoneno"]==0)){
        echo false;
    }else{
        echo 'You can contact '.$row["name"].' in this phone number: ' .$row["phoneno"];
    }
    
     

?>