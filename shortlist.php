<?php 
    session_start();
    require('dbconnection.php');
    

    $propertyid=$_POST["propertyid"];
    $email=$_SESSION["email"];
    $flag=0;

    $sql="SELECT * FROM shortlist";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        if(($row["propertyid"]==$propertyid)&&($row["email"]==$email)){
            $flag=1;
        }
    }
    if($flag!=1){
        $sql2="INSERT INTO shortlist(propertyid,email)
        VALUES('$propertyid','$email')";
        $conn->query($sql2);
    }
?>
