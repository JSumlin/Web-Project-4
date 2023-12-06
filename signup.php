<?php
$message = "";  // Variable to store the signup status message
$usernameError = "";  // Variable to store the username error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST["new_username"];
    $newPassword = $_POST["new_password"];
    $userType = isset($_POST["user_type"]) ? $_POST["user_type"] : "";

    // Validate the new username and password
    if (empty($newUsername) || empty($newPassword)) {
        $message = "Please enter both username and password.";
    } else {
        // Check if the new credentials already exist in credentials.txt
        $file = "credentials.txt";
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            list($storedUsername, $storedPassword, $storedUserType) = explode(',', $line);
            if ($newUsername === $storedUsername) {
                $usernameError = "Username already exists. Please choose a different one.";
                break;
            }
        }

        // If username is unique, append new credentials to the credentials.txt file
        if (empty($usernameError)) {
            $newCredentials = "$newUsername,$newPassword,$userType" . PHP_EOL;

            if (file_put_contents($file, $newCredentials, FILE_APPEND | LOCK_EX)) {
                $message = "Sign up successful!";
                // Redirect to the login page
                header("Location: property.html");
                exit();
            } else {
                $message = "Error writing to credentials file.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="property_styles.css">
    <style>
        /* Style to outline the text field in red */
        .error-outline {
            border: 1px solid red;
        }

        /* Style to display the error message in red */
        .error-message {
            color: red;
            font-size: 14px; /* Adjust the font size */
            margin-top: 4px; /* Decrease the padding between the message and the text field */
        }
    </style>
</head>
<body style="background-image: url('https://codd.cs.gsu.edu/~anguyen127/WP/PW/4/background.jpg');">
    <div class="company-name">Company Name</div>
    <div class="signup-container">
        <h2>Sign Up</h2>

        <!-- Display the signup status message -->
        <p class="<?php echo empty($usernameError) ? '' : 'error-message'; ?>"><?php echo $message; ?></p>

        <!-- Signup form -->
        <form action="signup.php" method="post">
            <label for="new_username">New Username:</label>
            <input type="text" id="new_username" name="new_username" class="<?php echo empty($usernameError) ? '' : 'error-outline'; ?>" required>
            <p class="error-message"><?php echo $usernameError; ?></p>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>

            <label>Are you a:</label>
            <label for="buyer"><input type="radio" id="buyer" name="user_type" value="buyer" required> Buyer</label>
            <label for="seller"><input type="radio" id="seller" name="user_type" value="seller" required> Seller</label>
            <label for="admin"><input type="radio" id="admin" name="user_type" value="admin" required> Admin</label>

            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
