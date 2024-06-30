<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'db_hash');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the user exists
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Check if the password is correct
if ($user && password_verify($password, $user['password'])) {
    // Login the user
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['level'] = $user['level'];
    $_SESSION['id'] = $user['id'];

    if ($user['level'] == 0) {
        $type = 'Admin';
    } else if ($user['level'] == 1) {
        $type = 'Cashier';
    }

    $stmt = $db->prepare('INSERT INTO user_logs (username, type, sign_in, created) VALUES (?, ?, NOW(), NOW())');
    $stmt->bind_param('ss', $username, $type);

    // Execute the statement
    $stmt->execute();

    // Check user level
    if ($user['level'] == 0) {
        header('location: ../dashboard.php');
    } else if ($user['level'] == 1) {
        header('location: ../point-of-sale.php');
    }
} else {
    // Show an error message
    session_start();
    $_SESSION['error'] = 'Invalid username or password';
    header('location: ../index.php');
}

// Close the statement and connection
$stmt->close();
$db->close();
?>
