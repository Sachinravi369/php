<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $originalNumber = $number;
    $reversedNumber = 0;

    while ($number != 0) {
        $remainder = $number % 10;
        $reversedNumber = ($reversedNumber * 10) + $remainder;
        $number = (int)($number / 10);
    }

    if ($originalNumber == $reversedNumber) {
        echo "$originalNumber is a palindrome.";
    } else {
        echo "$originalNumber is not a palindrome.";
    }
} else {
    echo "Invalid request.";
}
?>