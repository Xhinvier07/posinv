<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

// Get the form data
$username = sanitize_input($_POST['username']);
$password = sanitize_input($_POST['password']);
$password_repeat = sanitize_input($_POST['password_repeat']);

$password_regex_special = '/[!@#$%^&*]/';
$password_regex_letter = '/[A-Za-z]/';
$password_regex_number = '/\d/';
$password_regex_length = '/^.{8,}$/';
$username_regex = '/^[a-zA-Z0-9._]+$/';

$errors = array(); // holds all errors in input
$validation = array(); //holds all validation errors

// Check if the username length is more than 4 characters
if (strlen($username) < 4) {
    $errors[] = "Username must be at least 4 characters long.";
}

// Check if username passes regex
if (!preg_match($username_regex, $username)) {
  $errors[] = "Username cannot contain symbols except '.' and '_'.";
}

// Check if the username is already taken
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user) {
  $errors[] = "Username is already taken.";
}

// Check if the passwords match
if ($password != $password_repeat) {
    $errors[] = "Passwords do not match.";
}

// Check if all required fields are filled
if (empty($username) || empty($password) || empty($password_repeat)) {
    $errors[] = "All fields are required.";
}

// Validate password against regular expressions
if (!preg_match($password_regex_special, $password_repeat)) {
    $errors[] = "Password must contain at least one special character.";
}
if (!preg_match($password_regex_letter, $password_repeat)) {
    $errors[] = "Password must contain at least one letter.";
}
if (!preg_match($password_regex_number, $password_repeat)) {
    $errors[] = "Password must contain at least one number.";
}
if (!preg_match($password_regex_length, $password_repeat)) {
    $errors[] = "Password must be at least 8 characters long.";
}

// Check if encountered any error
if (!empty($errors)) {
    $get_str = "Location: ../register.php?username=" . $username;

    foreach ($errors as $i => $error) {
        $get_str .= '&error' . $i . '=' . $error;
    }

    header($get_str);
    exit();
}
else if (!empty($validation)){

    $get_str = "Location: ../register.php?username=" . $username;

    foreach ($validation as $i => $error) {
        $get_str .= '&error' . $i . '=' . $error;
    }

    header($get_str);
    exit();
}


// Hash the password
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the database
$sql = "INSERT INTO users (username, password, level, created) VALUES (?, ?, 0, NOW())";
$stmt = $db->prepare($sql);
$stmt->execute([$username, $hash]);

// Redirect the user to the login page with success code
header('Location: ../index.php?success=1');

//Saniize the data
function sanitize_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>
