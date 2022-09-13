<?php
    session_start();
    include('dbconnection.php'); 
    $v=$_POST["email"];
    $p=$_POST["password"];
    $sql = "SELECT * FROM LoginCredentials Where email='$v'";
    $v2="";
    

    $result = $conn->query($sql);


    $row = $result->fetch_assoc();

    
    if ($result->num_rows > 0){
        $pass=$row["password"];
        if($pass==$p)
            $v2=$row["name"];
        else
            $v2="";
    }


    if($v2==""){
        echo false;

    }else{
        $_SESSION["username"]=$v2;
        $_SESSION["email"]=$v;
        $_SESSION["phoneno"]=$row["phoneno"];
        $v2=strtoupper($v2);
        echo $v2;
       

    }

    $conn->close();
?> 