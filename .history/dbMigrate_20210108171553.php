<?php
include "./includes/config.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
// Create connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$dbName=DB_NAME;
$sql = "CREATE DATABASE $dbName";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
  $sql="CREATE TABLE $dbName.roles (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_role VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    $sql="CREATE TABLE $dbName.users (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name varchar(50),
        phone varchar(50),
        email varchar(50),
        role_id INT(10) UNSIGNED,
        password varchar(100),
        FOREIGN KEY (role_id) REFERENCES $dbName.roles(id)
    );";
    if ($conn->query($sql) === TRUE) {
        echo "table created successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }
    
    $sql = "INSERT INTO $dbName.roles (user_role)
    VALUES ('Admin'),('Editor')";
    
    $conn->query($sql);




} else {
  echo "Database already exists: " . $conn->error;
}



$conn->close();
?>