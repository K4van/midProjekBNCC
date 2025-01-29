<?php 
require 'connect.php'; 
session_start(); 

if (isset($_POST['createtask']) && $_POST['createtask'] != ""){
    $userid = $_SESSION['id'];
    $task = $_POST['createtask'];
    $query = $conn->query("INSERT INTO userslist (user_id, todo) VALUES ('$userid', '$task')");
    if($query){
        echo "<script>alert('Task added successfully!');
        window.location.href = 'index.php';
        </script>";
    }
}
else{
    header("location: index.php");
}
?>