<?php
include_once "../../includes/header.php";
include_once "../../includes/topnav.php";
?>
<div class="container mt-4">
  <div class="row mt-4">

    <!-- All Tasks -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Upcoming Tasks</h5>
          <p class="card-text">Here you can view all your upcoming tasks.</p>
          <a href="#" class="btn btn-primary">View Tasks</a>
        </div>
      </div>
    </div>

    <!-- Add Tasks -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add New Task</h5>
          <p class="card-text">Add a new task to your to-do list.</p>
          <a href="../add_task/" class="btn btn-primary">Add Task</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once "../../includes/footer.php";
?>