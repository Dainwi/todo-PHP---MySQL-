<?php
include_once "../../includes/header.php";
include_once "../../includes/topnav.php";
?>


<div class="container mt-4">
    <div class="col-md-4 m-auto">
        <h2>Add New Task</h2>
        <form>
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
            <button type="submit" id="submit" class="btn btn-primary">Add Task</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#submit').click(function(e) {
            e.preventDefault();
            var title = $('#title').val();
            var description = $('#description').val();
            var dueDate = $('#dueDate').val();
            var priority = $('#priority').val();
            $.ajax({
                url: 'action.php',
                type: 'POST',
                data: {
                    title: title,
                    description: description,
                    dueDate: dueDate,
                    priority: priority
                },
                success: function(response) {
                    alert(response);
                    window.location.href = 'index.php';
                }
            });
        });
    });
</script>

<?php
include_once "../../includes/footer.php";
?>