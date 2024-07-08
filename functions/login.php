<?php
session_start();

try {
    // Connect to the database
    $db = new mysqli('localhost', 'root', '', 'db_hash');

    // Check connection
    if ($db->connect_error) {
        throw new Exception("Connection failed: " . $db->connect_error);
    }

    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->prepare($sql);
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $db->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

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

        $stmt = $db->prepare('INSERT INTO user_logs (username, type, sign_in, created) VALUES (?, ?, NOW(), NOW())');
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $db->error);
        }
        
        $stmt->bind_param('ss', $username, $type);

        // Execute the statement
        $stmt->execute();

        // Check user level
        if ($user['level'] == 0) {
            header('Location: ../dashboard.php');
        } else if ($user['level'] == 1) {
            header('Location: ../point-of-sale.php');
        }
    } else {
        // Show an error message
        $error = "Invalid username or password.";
        header('Location: ../index.php?error=' . $error);
    }

    // Close the statement and connection
    $stmt->close();
    $db->close();
} catch (Exception $e) {
    // Log the error or handle it as needed in index.php via GET
    $error = $e->getMessage();
    error_log($error);
    $error = "An error occurred. Please try again later. ($error)";
    header('Location: ../index.php?error=' . $error);

    //test
}
?>
