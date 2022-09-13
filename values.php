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

$sql1 = "INSERT INTO propertydetails3 (name,image,price,bedrooms,bathrooms,location,city)
VALUES ('Puravankara','Bitmap.png',5000000,3,3,'Marinedrive','Kochi')";
$sql2 = "INSERT INTO propertydetails3(name,image,price,bedrooms,bathrooms,location,city)
VALUES ('Trinity Homes','Bitmap1.png',5500000,4,3,'Thrikkakara','Kakkanad')";
$sql3 = "INSERT INTO propertydetails3(name,image,price,bedrooms,bathrooms,location,city)
VALUES ('Skyline Builders','Bitmap2.png',6000000,2,2,'Vytila','Ernakulam')";
$sql4 = "INSERT INTO propertydetails3(name,image,price,bedrooms,bathrooms,location,city)
VALUES ('DD Milestones','Bitmap3.png',4000000,3,3,'CSEZ','Kakkanad')";
$sql5 = "INSERT INTO propertydetails3(name,image,price,bedrooms,bathrooms,location,city)
VALUES ('DLF','Bitmap4.png',6500000,4,3,'Kakkanad','Kochi')";
$sql6 = "INSERT INTO propertydetails3(name,image,price,bedrooms,bathrooms,location,city)
VALUES ('Happy Villas','Bitmap5.png',4500000,2,2,'Thaikoodam','Vytila')";
$sql7 = "INSERT INTO propertydetails3(name,image,price,bedrooms,bathrooms,location,city)
VALUES ('Koithuruthil','Bitmap6.png',5200000,5,4,'Kidangoor','Kottayam')";
$sql8 = "INSERT INTO propertydetails3(name,image,price,bedrooms,bathrooms,location,city)
VALUES ('Nellikkattil','Bitmap7.jpg',7000000,4,4,'Uzhavoor','Kottayam')";

if ($conn->query($sql1) === TRUE) {
  echo  "record created successfully";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}
if ($conn->query($sql2) === TRUE) {
  echo  "record created successfully";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}
if ($conn->query($sql3) === TRUE) {
  echo  "record created successfully";
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}
if ($conn->query($sql4) === TRUE) {
  echo  "record created successfully";
} else {
  echo "Error: " . $sql4 . "<br>" . $conn->error;
}
if ($conn->query($sql5) === TRUE) {
  echo  "record created successfully";
} else {
  echo "Error: " . $sql5 . "<br>" . $conn->error;
}
if ($conn->query($sql6) === TRUE) {
  echo  "record created successfully";
} else {
  echo "Error: " . $sql6 . "<br>" . $conn->error;
}
if ($conn->query($sql7) === TRUE) {
  echo  "record created successfully";
} else {
  echo "Error: " . $sql7 . "<br>" . $conn->error;
}
if ($conn->query($sql8) === TRUE) {
  echo  "record created successfully";
} else {
  echo "Error: " . $sql8 . "<br>" . $conn->error;
}

$conn->close();
?>