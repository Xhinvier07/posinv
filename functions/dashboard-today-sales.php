<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

// Get today's date
$today = new DateTime();
$today_string = $today->format('Y-m-d');

// Get the sales for today
$sql = "SELECT SUM(discounted_sales) AS total_sales FROM transaction WHERE created >= :today";
$stmt = $db->prepare($sql);
$stmt->bindParam(':today', $today_string);
$stmt->execute();

// Get the total sales
$total_sales = $stmt->fetchColumn();

// if no sales set total sales to 0
if ($total_sales === null) {
    $total_sales = 0;
}

// Display the total sales
echo $total_sales;

?>
