<?php
// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

// Get today's date
$today = new DateTime();
$today_start = $today->format('Y-m-d 00:00:00');
$today_end = $today->format('Y-m-d 23:59:59');

// Get the sales for today
$sql = "SELECT SUM(discounted_sales) AS total_sales FROM transaction WHERE created BETWEEN :today_start AND :today_end";
$stmt = $db->prepare($sql);
$stmt->bindParam(':today_start', $today_start);
$stmt->bindParam(':today_end', $today_end);
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