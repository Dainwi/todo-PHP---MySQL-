<?php
include "../../config/config.php";

// Start the session
session_start();

// Check if the user has a valid token cookie
if(isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    
    // Retrieve user from the database based on the token
    $sql = "SELECT * FROM users WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result && $result->num_rows > 0){
        // User found, log them in automatically
        $user = $result->fetch_assoc();
        $_SESSION['userid'] = $user['id'];
    }
}
?>

<?php
include "../../config/config.php";

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password securely
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    // Retrieve user from database based on email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result && $result->num_rows > 0){
        $user = $result->fetch_assoc();
        
        // Verify password
        if(password_verify($password, $user['password'])){
            // Start the session before accessing or setting session variables
            session_start();
            
            // Set session variable
            $_SESSION['userid'] = $user['id'];
            
            // Generate a random token
            $token = bin2hex(random_bytes(16));
            
            // Store the token in the database
            $sql = "UPDATE users SET token = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $token, $user['id']);
            $stmt->execute();
            
            // Set the token as a cookie
            setcookie('token', $token, time() + (86400 * 30), "/"); // Cookie expires in 30 days
            
            echo 'success';
        } else {
            echo "Error: Invalid email or password.";
        }
    } else {
        echo "Error: Invalid email or password.";
    }
} else {
    echo 'Error: All fields are required.';
}
?>
