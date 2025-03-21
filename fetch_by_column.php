<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $column = $_POST['column']; // Column selected by the user
    $content = $_POST['content']; // Value entered by the user

    // Validate column input to prevent SQL injection
    $allowed_columns = ['name', 'age', 'phone_number', 'email'];
    if (!in_array($column, $allowed_columns)) {
        die("Error: Invalid column selected.");
    }

    // SQL query to fetch user data based on the column and content
    $sql = "SELECT * FROM users WHERE $column = '$content'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) { // Corrected syntax here
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
            echo "<br>No data found for '$content' in column '$column'.";
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