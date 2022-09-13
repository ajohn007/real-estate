<?php

session_start();
include('dbconnection.php'); 
$v=$_POST["latti"];
$v2=$_POST["longi"];
$_SESSION["latti"]=$v;
$_SESSION["longi"]=$v2;

?>