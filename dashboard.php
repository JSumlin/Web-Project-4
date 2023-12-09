<?php
    // include("connectToDB.php");
    // $sql = "SELECT * FROM properties;";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    // // output data of each row
    // while($row = $result->fetch_assoc()) {
    //     echo "id: " . $row["property_id"]. " - Street Address: " . $row["street_address"].  "<br>";
    // }
    // } else {
    // echo "0 results";
    // }

    // function printProperties() {
    //     $sql = "SELECT * FROM properties;";
    //     $result = $conn->query($sql);
    //     print "<h2>Test</h2>";
    //     if ($result->num_rows > 0) {
    //         print "<h2>Has rows</h2>";
    //     // output data of each row
    //     while($row = $result->fetch_assoc()) {
    //         echo "<div class=\"container\">\n";
    //        // echo "<b>" . $row["street_address"]. ", " . $row["city"]. ", " . $row["property_state"] . ", " . $row["country"] .  "</b><br>\n";
    //         echo "<p>$" . $row["price"] . "</p>\n";
    //         echo "</div>";
    //     }
    //     } else {
    //     echo "0 results";
    //     }
    // }
?>

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

    <?php 
        include("connectToDB.php");
        $sql = "SELECT * FROM properties;";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $image = $row["floor_plan"];
            $image_style = "background-image: url('property_images/$image');";
            echo "<div class=\"container\">\n";
            echo "<div class=\"property-image-container\" style=\"$image_style\"></div>";
            echo "<b>" . $row["street_address"]. ", ". $row["city"]. ", " . $row["property_state"] . ", ". $row["country"]. "</b><br>\n";
            echo "<p>$" . $row["price"] . "</p>\n";
            echo "<p>" . $row["age"] . " year(s) old</p>\n";
            echo "<p>" . $row["number_of_bedrooms"] . " bedroom(s)\n";
            echo "<p>Additional facilities: " . $row["additional_facilities"] . "</p>\n";
            if($row["has_garden"] == 1) {
                echo "<p>Garden: Yes</p>\n";
            } else {
                echo "<p>Garden: No</p>\n";
            }
            echo "<p>Parking: " . $row["parking_availability"] . "</p>\n";
            echo "<p>Nearby facilities: " . $row["nearby_facilities"] . "</p>\n";
            echo "<p>Main roads: " . $row["main_roads"] . "</p>\n";
            echo "</div>\n";
        }
        } else {
        echo "0 results";
        }
    ?>
    <!-- Dashboard content -->
    <!-- <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div> -->
</body>
</html>
