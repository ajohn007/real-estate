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


$sql8 = "INSERT INTO propertydetails4(area,image,price,zip,house,state,city)
VALUES ('palisadeave','Bitmap7.jpg',7000000,10703,603,'NY','Yonkers')";

if ($conn->query($sql8) === TRUE) {
    echo  "record created successfully";
  } else {
    echo "Error: " . $sql8 . "<br>" . $conn->error;
  }
  
  $conn->close();
?>