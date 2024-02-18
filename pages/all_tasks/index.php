<?php
include_once "../../includes/header.php";
include_once "../../includes/topnav.php";

$userId = $_SESSION['userid'];
$sql = "SELECT * FROM tasks WHERE user_id = $userId";
$result = mysqli_query($conn, $sql);
$count = 1;
?>

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Due Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['status'] == 0 ? "Pending" : "Completed"; ?></td>
                        <td><?php echo $row['priority'] ?></td>
                        <td><?php echo $row['due_date'] ?></td>
                        <td>
                            <a href="#" class="btn btn-primary edit-btn" data-id="<?php echo $row['id'] ?>"
                                data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                            <?php if ($row['status'] == 0): ?>
                                <a href="complete.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Complete</a>
                            <?php else: ?>
                                <button class="btn btn-success" disabled>Completed</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Task Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTaskForm">
                    <input type="hidden" id="taskId">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter task title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3"
                            placeholder="Enter task description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="dueDate" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="dueDate">
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-select" id="priority">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.edit-btn').click(function (e) {
            e.preventDefault();
            var taskId = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: 'all_tasks_action.php?id=' + taskId,
                success: function (response) {
                    var task = JSON.parse(response);
                    $('#taskId').val(task.id);
                    $('#title').val(task.title);
                    $('#description').val(task.description);
                    $('#dueDate').val(task.due_date);
                    $('#priority').val(task.priority);
                }
            });
        });

        $('#editTaskForm').submit(function (e) {
            e.preventDefault();

            var taskId = $('#taskId').val();
            var title = $('#title').val();
            var description = $('#description').val();
            var dueDate = $('#dueDate').val();
            var priority = $('#priority').val();

            var data = {
                taskId: taskId,
                title: title,
                description: description,
                dueDate: dueDate,
                priority: priority
            };

            $.ajax({
                type: 'POST',
                url: 'all_tasks_action.php?taskId=' + taskId,
                data: data,
                success: function (response) {
                    if (response) {
                        $('#editModal').modal('hide');
                        location.reload();
                    } else {
                        alert('Error updating task');
                    }
                }
            });
        });
    });
</script>

<?php
include_once "../../includes/footer.php";
?>
