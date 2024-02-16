<?php
session_start();
include_once "../../config/config.php";
// Check if the form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve task data from the form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dueDate = $_POST['dueDate'];
    $priority = $_POST['priority'];
    $userId = $_SESSION['userid']; // Assuming the user ID is stored in the session variable

    // Perform any necessary validation on the data (e.g., check for empty fields)

    // Assume you have already connected to your database

    // Prepare and execute the SQL query to insert the task into the database
    $sql = "INSERT INTO tasks (user_id, title, description, due_date, priority) VALUES ( '$userId', '$title', '$description', '$dueDate', '$priority')";

    if ($conn->query($sql) === TRUE) {
        echo "Task added successfully!";
    } else {
        echo "Error adding task: " . $conn->error;
    }
} else {
    // If the form was not submitted via POST method, redirect to index.php or display an error message
    echo "Invalid request!";
}
