<?php
$host = "localhost";
$user = "tnguyen579";
$password = "tnguyen579";
$dbname = "tnguyen579";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"].  "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

    </head>
    <body>
        <h1>Test</h1>
    </body>
</html>