<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

// Get the form data
$username = sanitize_input($_POST['username']);
$password = sanitize_input($_POST['password']);
$password_repeat = sanitize_input($_POST['password_repeat']);

// Check if the passwords match
if ($password != $password_repeat) {
    header('Location: ../register.php?pw_error=Passwords do not match&username=' . $username);
    exit();
}

// Check if the username is already taken
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user) {
    header('Location: ../register.php?pw_error=Username is already taken');
    exit();
}

// Check if all required fields are filled
if (empty($username) || empty($password) || empty($password_repeat)) {
    header('Location: ../register.php?pw_error=All fields are required');
    exit();
}

// Check if the username length is more than 4 characters
if (strlen($username) < 4) {
    header('Location: ../register.php?pw_error=Username must be at least 4 characters long');
    exit();
}


// Hash the password
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the database
$sql = "INSERT INTO users (username, password, level, created) VALUES (?, ?, 0, NOW())";
$stmt = $db->prepare($sql);
$stmt->execute([$username, $hash]);

// Redirect the user to the login page
header('Location: ../index.php');

//Saniize the data
function sanitize_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>
