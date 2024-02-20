<?php
include_once("../config/config.php");

if (isset($_POST['signup'])) {
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 

    // Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Escape input to prevent SQL injection (not as secure as prepared statements)
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    // Password is already hashed, so no need to escape it

    // Construct the SQL query with interpolated values
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    
    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Error: Invalid request.";
}

