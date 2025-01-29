<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "todolist";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("Something went wrong");
}
?>