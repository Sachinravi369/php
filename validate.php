<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Username Validation
    if (strlen($username) < 5 || strlen($username) > 15) {
        echo "Invalid username: Must be between 5 and 15 characters.<br>";
    } else if (!ctype_alnum($username)) {
        echo "Invalid username: Only alphanumeric characters are allowed.<br>";
    } else {
        echo "Valid username.<br>";
    }

    // Password Validation
    if (strlen($password) < 8 || strlen($password) > 20) {
        echo "Invalid password: Must be between 8 and 20 characters.<br>";
    } else if (!preg_match('/[A-Z]/', $password)) {
        echo "Invalid password: Must contain at least one uppercase letter.<br>";
    } else if (!preg_match('/[a-z]/', $password)) {
        echo "Invalid password: Must contain at least one lowercase letter.<br>";
    } else if (!preg_match('/\d/', $password)) {
        echo "Invalid password: Must contain at least one digit.<br>";
    } else if (!preg_match('/[\W_]/', $password)) {
        echo "Invalid password: Must contain at least one special character.<br>";
    } else {
        echo "Valid password.<br>";
    }
} else {
    echo "Please submit the form through the login page.";
}
?>