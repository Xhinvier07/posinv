<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Connect to the database with error handling
    $db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Start the session at the beginning
session_start();

// Get the form data and validate inputs
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// Check if the user exists
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the password is correct
if ($user && password_verify($password, $user['password'])) {
    // Login the user
    $_SESSION['username'] = $username;
    $_SESSION['level'] = $user['level'];
    $_SESSION['id'] = $user['id'];

    if ($user['level'] == 0) {
        $type = 'Admin';
    } else if ($user['level'] == 1) {
        $type = 'Cashier';
    }

    $stmt = $db->prepare('INSERT INTO user_logs (username, type, sign_in, created) VALUES (:username, :type, NOW(), NOW())');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':type', $type);

    // Execute the statement
    $stmt->execute();

    // Check user level and redirect accordingly
    if ($user['level'] == 0) {
        header('Location: ../dashboard.php');
    } else if ($user['level'] == 1) {
        header('Location: ../point-of-sale.php');
    }
} else {
    // Show an error message
    $_SESSION['error'] = 'Invalid username or password';
    header('Location: ../index.php');
}
exit();
?>
