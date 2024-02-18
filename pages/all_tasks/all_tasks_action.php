<?php
include_once("../../config/config.php");

// Function to update task
function updateTask($conn, $id, $title, $description, $status, $priority, $dueDate) {
    $sql = "UPDATE tasks SET title='$title', description='$description', status='$status', priority='$priority', due_date='$dueDate' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Update task
if (isset($_POST['taskId'])) {
    $id = $_POST['taskId'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $dueDate = $_POST['dueDate'];

    // Call the updateTask function
    if(updateTask($conn, $id, $title, $description, $status, $priority, $dueDate)) {
        echo "success";
    } else {
        echo "Error updating task";
    }
}

// Fetch task details
if(isset($_GET['id'])) {
    $taskId = $_GET['id'];

    $sql = "SELECT * FROM tasks WHERE id = $taskId";
    $result = mysqli_query($conn, $sql);

    if($result) {
        // Fetch the task details
        $task = mysqli_fetch_assoc($result);

        echo json_encode($task);
    } else {
        // Error handling if query fails
        echo "Error fetching task details: " . mysqli_error($conn);
    }
}

