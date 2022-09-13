<?php
    include('dbconnection.php');
    session_start();
    $v1=$_POST["name"];
    $vu=strtoupper($v1);
    $v2=$_POST["email"];
    $v3=$_POST["phone"];
    $v4=$_POST["password"];

    $sql = "INSERT INTO LoginCredentials (name,email,phoneno,password)
    VALUES ('$v1','$v2','$v3','$v4')";
    if ($conn->query($sql) === TRUE) {
        

        $_SESSION["username"]=$v1;
        $_SESSION["email"]=$v2;
        $_SESSION["phoneno"]=$v3;
        echo $vu;
      } else {
        echo false;
      }


?>