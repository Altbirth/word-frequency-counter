<?php
/**
 * Calculates the total price of items in a shopping cart.
 * @param array $cart An array of items in the shopping cart.
 * @return float The total price of items in the shopping cart.
 */
function calTotalPrice(array $cart): float {
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'];
    }
    return $total ;
}
// Sample shopping cart
$shoppingCart = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

// Calculate and display the total price
$totalPrice = calTotalPrice($shoppingCart);
echo "Total price: $" . $totalPrice . PHP_EOL . "<br>";


/**
 * Modifies a string by removing spaces and converting it to lowercase.
 * @param string $inputString The input string to be modified.
 * @return string The modified string with spaces removed and converted to lowercase.
 */
function modifyString(string $inputString): string {
    $modifiedString = str_replace(' ', '', $inputString);
    $modifiedString = strtolower($modifiedString);
    return $modifiedString;
}

// Sample string manipulation
$inputString = "This is a poorly written program with little structure and readability.";
$modifiedString = modifyString($inputString);
echo "Modified string: " . $modifiedString . PHP_EOL . "<br>";


/**
 * Checks if a number is even or odd.
 * @param int $number The number to be checked.
 * @return string A message indicating whether the number is even or odd.
 */
function checkEvenOrOdd(int $number): string {
    if ($number % 2 == 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}
// Check if a number is even or odd
$number = 42;
$result = checkEvenOrOdd($number);
echo $result . PHP_EOL;
?>