<?php
include_once "../../includes/header.php";
include_once "../../includes/topnav.php";
?>

<div class="container mt-4">
    <div class="col-md-4 m-auto">
        <h2>Add New Task</h2>
        <form id="addTaskForm">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter task title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Enter task description"></textarea>
            </div>
            <div class="mb-3">
                <label for="dueDate" class="form-label">Due Date</label>
                <input type="date" class="form-control" id="dueDate">
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <select class="form-select" id="priority">
                    <option value="Low">Low</option>
                    <option value="Medium" selected>Medium</option>
                    <option value="High">High</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
    </div>
</div>

<?php include_once "../../includes/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        $('#addTaskForm').submit(function(e) {
            e.preventDefault();
            var title = $('#title').val();
            var description = $('#description').val();
            var dueDate = $('#dueDate').val();
            var priority = $('#priority').val();
            $.ajax({
                type: 'POST',
                url: 'add_task_action.php',
                data: {
                    title: title,
                    description: description,
                    dueDate: dueDate,
                    priority: priority
                },
                success: function(response) {
                    if (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Task added successfully!'
                    }).then(function() {
                        setTimeout(function() {
                            window.location.href = 'index.php';
                        }, 1000); // 1 second timeout
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Task adding failed!'
                    });
                }
                }
            });
        });
    });
</script>
