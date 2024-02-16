<?php
session_start();
include "../../config/config.php";

if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_email);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        echo 'Email already exists';
    } else {
        // Insert user data into the database
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $hashed_password);
        if ($stmt->execute()) {
            // Get the newly inserted user's ID
            $user_id = $conn->insert_id;
            $_SESSION['userid'] = $user_id;
            echo 'success';
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
    }
} else {
    echo 'Error: All fields are required.';
}
?>
