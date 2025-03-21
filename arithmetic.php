<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    $result = "Invalid operation";

    // Perform the chosen arithmetic operation
    switch ($operation) {
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":
            $result = $num2 != 0 ? $num1 / $num2 : "Undefined (division by zero)";
            break;
        case "modulus":
            $result = $num1 % $num2;
            break;
        case "exponent":
            $result = $num1 ** $num2;
            break;
    }

    // Display the result
    echo "<h3>Result:</h3>";
    echo "The result of $operation is: $result";
} else {
    echo "Please submit the form from the HTML file!";
}
?>