<?php
// Include your database connection or any other necessary files
include_once("../config/config.php");

if (isset($_POST['login'])) {
    // Retrieve email and password from the POST request
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize input (optional but recommended)
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            echo "success";
        } else {
            echo "Invalidpassword";
        }
    } else {
        echo "Invalidemail";
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // If login parameter is not set, return an error message
    echo "Error: Invalid request.";
}
