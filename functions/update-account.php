<?php

session_start();

$password_regex_special = '/[!@#$%^&*]/';
$password_regex_letter = '/[A-Za-z]/';
$password_regex_number = '/\d/';
$password_regex_length = '/^.{8,}$/';

// Get the user ID from the hidden input field.
$user_id = $_POST['userid'];

// Connect to the database.
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

// Get the current password from the database.
$sql = "SELECT password FROM users WHERE id = :user_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$row = $stmt->fetch();
$current_password = $row['password'];

$errors = array(); // holds all errors in input
$validation = array(); //holds all validation errors

// Check if the current password is correct.
if (!password_verify($_POST['password'], $current_password)) {
    $errors[] = "The current password is incorrect.";
}

// Validate the new password
$new_password = $_POST['new_password'];

if (!preg_match($password_regex_letter, $new_password)) {
    $validation[] = "Password should have at least 1 letter!";
}

if (!preg_match($password_regex_special, $new_password)) {
    $validation[] = "Password should have at least 1 special character!";
}

if (!preg_match($password_regex_number, $new_password)) {
    $validation[] = "Password should have at least 1 number!";
}

if (!preg_match($password_regex_length, $new_password)) {
    $validation[] = "Password should have at least 8 characters!";
}

// Function to set multiple flash messages
function setFlashMessage($message) {
    if (!isset($_SESSION['flash_messages'])) {
        $_SESSION['flash_messages'] = [];
    }
    $_SESSION['flash_messages'][] = $message;
}

// Function to set multiple flash messages

// Check if encountered any error, if so set a flash message for each error
if (!empty($errors)) {
    foreach ($errors as $error) {
        setFlashMessage($error);
    }
    header("Location: ../users.php?userid=" . urlencode($user_id));
    exit();
}
else if (!empty($validation)) {
    foreach ($validation as $error) {
        setFlashMessage($error);
    }
    header("Location: ../users.php?userid=" . urlencode($user_id));
    exit();
}

// If no errors, proceed with password change
$new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

// Update the password in the database.
$sql = "UPDATE users SET password = :new_password WHERE ID = :user_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':new_password', $new_password_hash);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

// Redirect the user to the main page with success message.
header('Location: ../users.php?success=1');
exit();

?>