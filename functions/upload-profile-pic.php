<?php
session_start();

// Database connection
try {
    $db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to set flash message
function setFlashMessage($message) {
    $_SESSION['flash_message'] = $message;
}

// Check if a file was uploaded
if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
    $file_name = $_FILES['profile_pic']['name'];
    $file_tmp = $_FILES['profile_pic']['tmp_name'];
    $file_size = $_FILES['profile_pic']['size'];
    $file_error = $_FILES['profile_pic']['error'];
    
    // Get file extension
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    // Allowed file extensions
    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
    
    if (in_array($file_ext, $allowed_ext)) {
        if ($file_error === 0) {
            if ($file_size <= 5242880) { // 5MB max file size
                // Generate a unique file name
                $new_file_name = uniqid('profile_', true) . '.' . $file_ext;
                $upload_path = '../assets/img/profile-pictures/' . $new_file_name; // Note the change in path
                
                if (move_uploaded_file($file_tmp, $upload_path)) {
                    // File uploaded successfully, now update the database
                    if (!isset($_SESSION['id'])) {
                        setFlashMessage("Error: User ID not set in session.");
                        header("HTTP/1.1 400 Bad Request");
                        echo "Error: User ID not set in session.";
                        exit();
                    }
                    
                    $id = $_SESSION['id'];
                    
                    try {
                        $upload_path = '.' . ltrim($upload_path, '.');

                        $stmt = $db->prepare("UPDATE users SET profile_picture = :profile_picture WHERE id = :id");
                        $stmt->bindParam(':profile_picture', $upload_path);
                        $stmt->bindParam(':id', $id);
                        
                        if ($stmt->execute()) {
                            echo "Profile picture uploaded successfully.";
                            $_SESSION['profile_picture'] = $upload_path;
                        } else {
                            setFlashMessage("Error updating database: " . implode(", ", $stmt->errorInfo()));
                            header("HTTP/1.1 500 Internal Server Error");
                            echo "Error updating database: " . implode(", ", $stmt->errorInfo());
                        }
                    } catch (PDOException $e) {
                        setFlashMessage("Database error: " . $e->getMessage());
                        header("HTTP/1.1 500 Internal Server Error");
                        echo "Database error: " . $e->getMessage();
                    }
                } else {
                    setFlashMessage("Error moving uploaded file.");
                    header("HTTP/1.1 500 Internal Server Error");
                    echo "Error moving uploaded file.";
                }
            } else {
                setFlashMessage("File is too large. Maximum size is 5MB.");
                header("HTTP/1.1 400 Bad Request");
                echo "File is too large. Maximum size is 5MB.";
            }
        } else {
            setFlashMessage("Error uploading file: " . $file_error);
            header("HTTP/1.1 400 Bad Request");
            echo "Error uploading file: " . $file_error;
        }
    } else {
        setFlashMessage("Invalid file type. Allowed types: jpg, jpeg, png, gif");
        header("HTTP/1.1 400 Bad Request");
        echo "Invalid file type. Allowed types: jpg, jpeg, png, gif";
    }
} else {
    setFlashMessage("No file was uploaded or an error occurred.");
    header("HTTP/1.1 400 Bad Request");
    echo "No file was uploaded or an error occurred.";
}

exit();