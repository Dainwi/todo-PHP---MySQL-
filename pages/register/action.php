<?php
include "../../config/config.php";

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);

    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($result) > 0) {
        echo 'already';
        exit();
    } else {


        $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            session_start(); // Start the session before accessing or setting session variables
            echo 'success';
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $query_result = mysqli_query($conn, $sql);
            if ($query_result) {
                $user_row = mysqli_fetch_assoc($query_result);
                $_SESSION['userid'] = $user_row['id'];
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
} else {
    echo 'Error: All fields are required.';
}
