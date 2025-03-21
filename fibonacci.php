<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $limit = $_POST['limit']; // Get the limit from the user input

    if ($limit <= 0) {
        echo "Please enter a positive number!";
        exit();
    }
    
    

    $num1 = 0;
    $num2 = 1;
    $num3 = 1;

    echo "Fibonacci series: ";
   

    for ($i = 1; $i <= $limit; $i++) {
        echo $num1 . " ";
        $num1 = $num2;
        $num2 = $num3;
        $num3 = $num1 + $num2;
    }

    echo "\n";
}
?>