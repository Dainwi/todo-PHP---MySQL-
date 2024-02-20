<?php include "../includes/header.php";
include "../includes/navbar.php";
?>

<div class="container-dashboard">
  <div class="todo__container">
    <div class="todo todo--emergency">
      <div class="todo__dropdown">
        <span>Today <i class="fas fa-caret-down"></i></span>
      </div>
      <h3 class="todo__header">Emergency</h3>
      <h2 class="todo__amount">15</h2>
      <p class="todo__link">View List</p>
    </div>

    <div class="todo todo--remaining">
      <div class="todo__dropdown">
        <span>Today <i class="fas fa-caret-down"></i></span>
      </div>
      <h3 class="todo__header">To Do</h3>
      <h2 class="todo__amount">32</h2>
      <p class="todo__link">View List</p>
    </div>

    <div class="todo todo--current">
      <div class="todo__dropdown">
        <span>Today <i class="fas fa-caret-down"></i></span>
      </div>
      <h3 class="todo__header">Doing</h3>
      <h2 class="todo__amount">20</h2>
      <p class="todo__link">View List</p>
    </div>

    <div class="todo todo--finished">
      <div class="todo__dropdown">
        <span>Today <i class="fas fa-caret-down"></i></span>
      </div>
      <h3 class="todo__header">Done</h3>
      <h2 class="todo__amount">16</h2>
      <p class="todo__link">View List</p>
    </div>
  </div>
  <div class="todo__container">

  </div>
</div>

<?php include "../includes/footer.php"; ?>