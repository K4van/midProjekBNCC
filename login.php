<?php 
    require 'connect.php';
    session_start();
    if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
        echo "<script>alert('Logout successfully!');
        window.location.href = 'login.php';
        </script>";
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
      </div>
    </nav>
    

    <div class="container bg-white rounded mx-auto p-4 shadow-lg" style="width: 320px;">
    <h3>Login</h3>
    <form  method="post">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="ex: Admin">
        <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="ex: admin123">
        <label for="floatingPassword">Password</label>
    </div>
  <div class = "d-flex row g-2 justify-content-between">
    <div class = "col-auto">
        <button type="submit" class="btn btn-primary mt-3 ">Submit</button>
    </div>
    <div class = "d-flex col-auto align-items-end">
        <small>Dont have account? <a href="register.php">Register</a></small>
    </div>
    <?php 
     if(isset($_POST['username'])){
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $query = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
      $result = $query->fetch_assoc();
      if($query->num_rows > 0){
      $_SESSION['user'] = $username;
      $_SESSION['id'] = $result['id'];
      header("location: index.php");
      exit;
      }
      else if($username == "" || $password == ""){?>
    <small class = text-danger>*Username or password must not empty</small>
   <?php }
      else {?>
    <small class = text-danger>*Username or Password doesnt match</small>
   <?php } 
     }
   ?>
   
  </div>
 

</form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>