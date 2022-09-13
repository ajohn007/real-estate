<?php

require('dbconnection.php');
// sql to create table
$sql = "CREATE TABLE shortlist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
propertyid INT(6) NOT NULL,
email VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 