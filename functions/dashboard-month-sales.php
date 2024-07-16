<?php
// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

// Get the current month and year
$current_month = new DateTime();
$current_month_start = $current_month->format('Y-m-01');
$current_month_end = $current_month->format('Y-m-t');

// Get the sales for the current month
$sql = "SELECT SUM(discounted_sales) AS total_sales FROM transaction WHERE created BETWEEN :current_month_start AND :current_month_end";
$stmt = $db->prepare($sql);
$stmt->bindParam(':current_month_start', $current_month_start);
$stmt->bindParam(':current_month_end', $current_month_end);
$stmt->execute();

// Get the total sales
$total_sales = $stmt->fetchColumn();

// If no sales, set total sales to 0
if ($total_sales === null) {
    $total_sales = 0;
}

// Display the total sales, rounding up to two decimal places
echo number_format($total_sales, 2);
?>