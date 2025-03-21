<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name']; // Get the name from the form input

    // SQL query to fetch user data by name
    $sql = "SELECT * FROM users WHERE name = '$name'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' style='margin:auto; width:80%; text-align:center; border-collapse:collapse;'>";
            echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Phone Number</th><th>Email</th></tr>";
            
            // Fetch rows one by one
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['phone_number'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "<br>No data found for the name '$name'.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Error: Form not submitted properly.";
}
?>