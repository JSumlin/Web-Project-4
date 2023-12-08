<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body style="background-image: url('https://codd.cs.gsu.edu/~anguyen127/WP/PW/4/background.jpg');">
    <?php
    // Get the username from the URL parameter
    $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
    ?>
    <div class="welcome-text">
        <h2>Welcome, <?php echo $username; ?>!</h2>
    </div>

    <!-- Logout button -->
    <form action="logout.php" method="post" class="logout-button">
        <button type="submit">Logout</button>
    </form>

    <!-- Dashboard content -->
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
</body>
</html>
