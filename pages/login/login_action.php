<?php
session_start();
include "../../config/config.php";

if(isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user from database based on email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if(password_verify($password, $user['password'])) {
            // Set session variable
            $_SESSION['userid'] = $user['id'];
            
            echo 'success';
        } else {
            // Set error message
            $_SESSION['error'] = "Invalid password.";
            echo $_SESSION['error'];
        }
    } else {
        // Set error message
        $_SESSION['error'] = "Invalid email.";
        echo $_SESSION['error'];
    }
} else {
    // Set error message
    $_SESSION['error'] = "All fields are required.";
    echo $_SESSION['error'];
}

