<?php
// Database connection parameters
$servername = "localhost";
$username = "root";  // Default MySQL username
$password = "";      // Default MySQL password (empty for root on localhost)
$dbname = "sachin";  // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
    die("connection failed".mysqli_connection_error());
}
echo "connection scucessfully connected";

$db_found = mysqli_select_db($conn, $dbname);

if ($db_found) {
    echo "<br>Database selected successfully";
} else {
    echo "<br>Error selecting database: " . mysqli_error($conn);
}
?>