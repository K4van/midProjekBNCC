<?php 
session_start();
require 'connect.php';

if(isset($_GET['edit']) && $_GET['edit'] != "") {
    if(isset($_POST['editbtn']) && $_POST['editbtn'] != ""){
        $editId = $_GET['edit'];
        $editText = $_POST['editbtn'];
        $query = $conn->query("UPDATE userslist SET todo = '$editText' WHERE id = '$editId'");
        if($query){
            echo "<script>alert('Task edited successfully!');
            window.location.href = 'index.php';
            </script>";
        }
    }
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

      <form method="post" class="mb-2">
        <div class="row g-2">
          <div class="col-12">
            <input id="addlist" class="form-control" type="text" name ="editbtn" placeholder="Add a new task...">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-success w-100">
                <i class="fas fa-pencil"> edit</i>
            </button>
          </div>
        </div>
      </form>
      <a class="btn btn-primary w-100" href="index.php"> 
                <i class="fas "> back</i>
            </a>







 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
