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

if ($conn->query($sql) === TRUE) {
    echo "table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

$sql="CREATE TABLE users (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(50),
    phone varchar(50),
    email varchar(50),
    role_id varchar(50),
    password varchar(100)
    FOREIGN KEY (role_id) REFERENCES roles(id)
);";
$conn->query($sql);

$sql = "INSERT INTO roles (user_role)
VALUES ('Admin'),('Editor')";

$conn->close();
?>