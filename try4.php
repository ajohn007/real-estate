<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>

<div style="padding-left:16px">
  <h2>Top Navigation Example</h2>
  <p>Some content..</p>
</div>


<span> hello &emsp; &emsp; &emsp; hey</span>

</body>
</html>


<?php 
    session_start();


    $va=($page-1)*4;
    $va2=$va+4;

    $la=0.0;
    $lo=0.0;
    $la=$_GET['lat'];
    $lo=$_GET['lon'];
echo $la;
echo $lo;
if(!isset($_SESSION["key"])){
  echo 7;
}else{
  echo $_SESSION["key"];
} 
$y=$_SESSION["latti"];
$y2=$_SESSION["longi"];
header("Location: https://www.google.com/maps/dir/?api=1&destination=$y,$y2"); 
  
exit; 
//window.location.href = 'https://www.google.com/maps/dir/?api=1&hel=$_SESSION["key"]&destination=43.12345,-76.12345'; 

    ?>