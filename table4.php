<?php

require('dbconnection.php');
// sql to create table
$sql = "CREATE TABLE propertydetails4 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
area VARCHAR(50) ,
image VARCHAR(100) NOT NULL,
price INT(30) NOT NULL,
zip INT(30) ,
house INT(30) ,
state VARCHAR(50) NOT NULL,
city VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 