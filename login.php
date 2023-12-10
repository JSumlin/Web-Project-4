<?php
session_start();
include("connectToDB.php");


if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM users WHERE user_name = '$username'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if ($user) {
    if (password_verify($password, $user["user_password"])) {
      if (isset($_POST["remember"])) {
        setcookie("user_name", $username, time() + 30);
        setcookie(("user_password"), $password, time() + 30);
      } else {
        if (isset($_COOKIE["user_name"])) {
          setcookie("user_name", "");
        }
        if (isset($_COOKIE["user_password"])) {
          setcookie("user_password", "");
        }
      }
      $_SESSION["username"] = $username;
      header("Location: dashboard.php");
      die();
    } else {
      $passwordErr = "<p>Please enter password correctly.</p>";
    }
  } else {
    $usernameErr = "<p> Please enter username correctly.</p>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut/icon" href="Property-Hub-logos_white.png" />
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css    "
    />
</head>

<body>
<nav>
        <input type="checkbox" id="check" />
        <label for="check" id="check-btn">
          <i class="fas fa-bars"></i>
        </label>
        <div class="nav-image">
        <a href="index.html"><img src="Property-Hub-logos_transparent.png"/></a>
      </div>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="signup.php">Sign Up</a></li>
        </ul>
      </nav>
  
  <div class="form-container">
    <div class="header">
      <h1>Log In</h1>
      <p>Please enter your username and password to log in</p>
    </div>
    <hr>
    <form action="" method="post">
      <div class="form-box">
        <small></small>
      </div>
      <div class="form-box">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="username" value="<?php if (isset($_COOKIE["user_name"])) {
                                                                                          echo $_COOKIE["user_name"];
                                                                                        } ?>" required>
        <small><?php if (isset($usernameErr)) {
                  echo $usernameErr;
                } ?></small>
      </div>
      <div class="form-box">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="password" value="<?php if (isset($_COOKIE["user_password"])) {
                                                                                              echo $_COOKIE["user_password"];
                                                                                            } ?>" required>
        <small><?php if (isset($passwordErr)) {
                  echo $passwordErr;
                } ?></small>
      </div>
      <div class="remember">
      <input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["user_name"])) { ?> checked <?php } ?> >
        <label for="remember">Remember Me</label>
      </div>
        <div class="form-box">
          <input type="submit" id="submit" name="login" value="Log in">
        </div>
        <div class="form-box">
          <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </div>
    </form>
  </div>
</body>

</html>