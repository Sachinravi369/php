<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name']; // Get the name from the form input

    // SQL query to delete the specific user by name
    $sql = "DELETE FROM users WHERE name = '$name'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<br>Record(s) with the name '$name' have been deleted successfully.";
        } else {
            echo "<br>No record found with the name '$name'.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Error: Form not submitted properly.";
}
?>