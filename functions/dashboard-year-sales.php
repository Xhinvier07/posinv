<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

// Get the current month
$current_year = new DateTime();
$current_year_string = $current_month->format('y');

// Get the sales for the current month
$sql = "SELECT SUM(discounted_sales) AS total_sales FROM transaction WHERE created >= :current_year";
$stmt = $db->prepare($sql);
$stmt->bindParam(':current_year', $current_year_string);
$stmt->execute();

// Get the total sales
$total_sales = $stmt->fetchColumn();

// if no sales set total sales to 0
if ($total_sales === null) {
    $total_sales = 0;
}

// Display the total sales, rounding up to two decimal places
echo number_format($total_sales, 2);

?>