<?php

session_start(); 

// Function to set multiple flash messages
function setFlashMessage($message) {
    if (!isset($_SESSION['flash_messages'])) {
        $_SESSION['flash_messages'] = [];
    }
    $_SESSION['flash_messages'][] = $message;
}

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

// Initialize an array to store potential error messages
$errors = [];

// Get the form data
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Password validation regular expressions
$password_regex_special = '/[!@#$%^&*]/';
$password_regex_letter = '/[A-Za-z]/';
$password_regex_number = '/\d/';
$password_regex_length = '/^.{8,}$/';
$username_regex = '/^[a-zA-Z0-9._]+$/';

// Basic validation
if (empty($username)) {
    $errors[] = "Username is required.";
} else {
  if (!preg_match($username_regex, $username)) {
    $errors[] = "Username cannot contain symbols except '.' and '_'.";
  }
}

if (empty($password)) {
    $errors[] = "Password is required.";
} else {
    // Validate password against regular expressions
    if (!preg_match($password_regex_special, $password)) {
        $errors[] = "Password must contain at least one special character (!@#$%^&*).";
    }
    if (!preg_match($password_regex_letter, $password)) {
        $errors[] = "Password must contain at least one letter.";
    }
    if (!preg_match($password_regex_number, $password)) {
        $errors[] = "Password must contain at least one number.";
    }
    if (!preg_match($password_regex_length, $password)) {
        $errors[] = "Password must be at least 8 characters long.";
    }
}

// Check if username already exists
if (!empty($username)) {
    $checkSql = "SELECT COUNT(*) FROM users WHERE username = ?";
    $stmt = $db->prepare($checkSql);
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        $errors[] = "Username already exists.";
    }
}

// Proceed if there are no errors
if (empty($errors)) {
    // Hash the password
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $sql = "INSERT INTO users (username, password, level, created) VALUES (?, ?, 1, NOW())";
    $stmt = $db->prepare($sql);
    $stmt->execute([$username, $hash]);

    // Redirect the user to the user management page
    header('Location: ../users.php');
    exit();
} else {
    // Set flash messages for each error
    foreach ($errors as $error) {
        setFlashMessage($error); // Assuming setFlashMessage function is defined and works as previously described
    }

    header('Location: ../users.php');
    exit();
}

?>