<?php
$servername = "localhost";
$username = "root";
$password = "Alphin007!";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set("America/New_York");
$w=date("Y-m-d");
$sql8 = "INSERT INTO try2(da)
VALUES ('$w')";
$conn->query($sql8);

$sql = "SELECT da FROM try2 ";
$result = $conn->query($sql);
$row1 = $result->fetch_assoc();

$v=$row1["da"];
$v2="select monthname(da),day(da),year(da) from try2";
$v3=$conn->query($v2);
$v4 = $v3->fetch_assoc();
$v5=$v4["monthname(da)"];
$v6=$v4["day(da)"];
$v7=$v4["year(da)"];



echo $v;
echo $v5."1<br>";
echo $v6."1<br>";
echo $v7."1<br>";


date_default_timezone_set("America/New_York");
$w=date("Y-m-d");
echo $w;

?>
