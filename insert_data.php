<?php
include 'connect.php';

if(isset($_POST['submit'])){
   
 $name = $_POST['name'];
$age = $_POST['age'];
$phone_number = $_POST['phonenumber'];
$email = $_POST['email'];
    
    // SQL query
    $sql = "INSERT INTO users (name, age, phone_number, email) VALUES ('$name', '$age', '$phone_number', '$email')";
    $result=mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<br>New record inserted successfully";
        } else {
            echo "<br>No records were inserted";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);
}
else{
    echo "error in submittion";
}
?>
