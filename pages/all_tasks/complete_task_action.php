<?php
session_start();
include "../../config/config.php";

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    echo "You are not logged in.";
    exit();
}

if(isset($_POST['taskId'])) {
    $taskId = $_POST['taskId'];

    // Update the task's completion status in the database
    $sql = "UPDATE tasks SET completed = 1 WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $taskId, $_SESSION['userid']);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error updating task completion status: " . $conn->error;
    }
} else {
    echo "Task ID not provided.";
}
