<?php

require('dbconnection.php');
// sql to create table
$sql = "CREATE TABLE propertydetails3 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
image VARCHAR(100) NOT NULL,
price INT(30) NOT NULL,
bedrooms INT(30) NOT NULL,
bathrooms INT(30) NOT NULL,
location VARCHAR(50) NOT NULL,
city VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 