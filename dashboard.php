<?php
session_start();
if(empty($_SESSION['username'])){
  header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Welcome to Dashboard, <?php echo $_SESSION["username"]; ?></h1>

  <form action="logout.php">
    <input type="submit" value="Log out">
  </form>
</body>
</html>