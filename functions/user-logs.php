<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

// Get all data from the user_logs table and if $_GET['username'] is set, get all data from the user_logs table that matches the username

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $sql = 'SELECT * FROM user_logs WHERE username = :username ORDER BY created DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
} else {
    $sql = 'SELECT * FROM user_logs ORDER BY created DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

// Fetch all the results
$results = $stmt->fetchAll();

// Loop through the results and add them to the table
foreach ($results as $row) {
?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['sign_in']; ?></td>
        <td><?php echo $row['sign_out']; ?></td>
        <td><?php echo $row['created']; ?></td>
    </tr>
<?php
}

?>