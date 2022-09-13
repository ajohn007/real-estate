<?php

require('dbconnection.php');
// sql to create table
$sql = "CREATE TABLE propertydetails (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
phoneno BIGINT NOT NULL,
purpose VARCHAR(50) NOT NULL,
propertytype VARCHAR(50) NOT NULL,
imagename VARCHAR(50) NOT NULL,
address VARCHAR(100) NOT NULL,
house VARCHAR(50),
location VARCHAR(50),
city VARCHAR(50) NOT NULL,
state VARCHAR(50) NOT NULL,
zipcode INT NOT NULL,
country VARCHAR(50) NOT NULL,
askingprice INT NOT NULL,
bedrooms INT,
bathrooms INT,
builtuparea INT,
carpetarea INT,
builtupareaunit VARCHAR(50),
carpetareaunit VARCHAR(50),
transactiontype VARCHAR(50),
propertyfloor INT,
ownership VARCHAR(50) NOT NULL,
totalfloors INT,
availability VARCHAR(50),
addedon TIMESTAMP NOT NULL,
description TEXT,
lattitude DECIMAL(20,10) NOT NULL,
longitude DECIMAL(20,10) NOT NULL

)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>