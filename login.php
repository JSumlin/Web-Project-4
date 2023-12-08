<?php
$loginError = ""; // Variable to store the login error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate credentials
    $validCredentials = false;
    $file = "credentials.txt";

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($storedUsername, $storedPassword) = explode(',', $line);
        if ($username === $storedUsername && $password === $storedPassword) {
            $validCredentials = true;
            // Redirect to the dashboard page upon successful login
            header("Location: dashboard.php?username=$username");
            exit();
        }
    }

    if (!$validCredentials) {
        $loginError = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="property_styles.css">
</head>
<body style="background-image: url('https://codd.cs.gsu.edu/~anguyen127/WP/PW/4/background.jpg');">
    <div class="company-name">Company Name</div>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <!-- Display the login error message -->
        <p style="color: <?php echo empty($loginError) ? 'black' : 'red'; ?>"><?php echo $loginError; ?></p>

        <!-- Signup button to redirect to the signup page -->
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>
