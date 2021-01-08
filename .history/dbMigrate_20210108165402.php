<?php
include "./includes/config.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE registration";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$sql="CREATE TABLE roles (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_role VARCHAR(30) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$conn->close();
?>