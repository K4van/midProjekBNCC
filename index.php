<?php 
session_start();
require 'connect.php';


$userid = $_SESSION['id'];
$result = $conn->query("SELECT * FROM userslist WHERE user_id = '$userid'");



if(!isset($_SESSION['user'])){
  header("location: login.php");
  exit();
}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Untuk icon yang direkomendasikan oleh bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>
  <body class="bg-secondary">
    <nav class="navbar bg-body-tertiary mb-5">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">To-do List</span>
        <h4 class="ms-auto me-3">Welcome, <?php echo $_SESSION['user']; ?></h4>
        <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>
    </nav>
    

    <div class="container bg-white rounded mx-auto p-4 shadow-lg">

      <form action="createTask.php" method="post" class="mb-4">
        <div class="row g-2">
          <div class="col-12">
            <input id="addlist" class="form-control" type="text" name ="createtask" placeholder="Add a new task...">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-plus">add</i>
            </button>
          </div>
        </div>
      </form>

      <?php if($result->num_rows === 0) {?>
        <div class="d-flex justify-content-center">
            <h1>There is no task yet</h1>
        </div>
      <?php }?>


      <div class="list-group">
    <?php while($list = $result->fetch_assoc()) { ?>
        <div class="list-group-item d-flex justify-content-between align-items-center">
            <div class="form-check">
                <input class="form-check-input task-checkbox" type="checkbox" id="task-<?php echo $list['id']; ?>">
                <label class="form-check-label task-label" for="task-<?php echo $list['id']; ?>">
                    <?php echo $list['todo']; ?>
                </label>
            </div>
            <div class="d-flex gap-2">
                <a href="edit.php?edit=<?php echo $list['id']; ?>" class="btn btn-success">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a onclick="deleteConfirm(<?php echo $list['id']; ?>)" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>
    <?php } ?>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll(".task-checkbox");

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            const label = this.nextElementSibling;
            if (this.checked) {
                label.style.textDecoration = "line-through";
                label.style.color = "gray";
            } else {
                label.style.textDecoration = "none";
                label.style.color = "black";
            }
        });
    });
});

function deleteConfirm(taskId){
          if(confirm('Are you sure?')){
            window.location.href = 'remove.php?taskId=' + taskId;
          }
          else{
            window.location.href = "index.php";
          }
      }
</script>


 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
