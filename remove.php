<?php
require 'connect.php';

if(isset($_GET['taskId']) && $_GET['taskId'] != "") {
    $taskId = $_GET['taskId'];
    $query = $conn->query("DELETE FROM userslist WHERE id = '$taskId'");
    if($query){
        echo "<script>alert('Task removed successfully!');
        window.location.href = 'index.php';
        </script>";
    }
}  
?>