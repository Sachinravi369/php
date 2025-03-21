<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name']; // Current user name
    $column = $_POST['column']; // Column to update
    $new_data = $_POST['new_data']; // New data for the column

    // Validate column input to prevent SQL injection
    $allowed_columns = ['name', 'age', 'phone_number', 'email'];
    if (!in_array($column, $allowed_columns)) {
        die("Error: Invalid column selected.");
    }

    // SQL query to update user details
    $sql = "UPDATE users SET $column = '$new_data' WHERE name = '$name'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<br>User details updated successfully.";
        } else {
            echo "<br>No user found with the name '$name'.";
        }
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Error: Form not submitted properly.";
}
?>