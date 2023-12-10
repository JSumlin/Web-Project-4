<?php

$host = "localhost";
$user = "tnguyen579";
$pass = "tnguyen579";
$dbname = "tnguyen579";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  echo "Could not connect to server \n";
  die("Connection failed: " . $conn->connect_error);
}
// sql to create table
$users = "CREATE TABLE IF NOT EXISTS users(
    user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    user_password VARCHAR(100) NOT NULL,
    user_email VARCHAR(100) NOT NULL)";

if ($conn->query($users) === TRUE) {
  echo "Table USERS created successfully \n";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();
?>