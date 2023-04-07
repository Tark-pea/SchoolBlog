<?php
session_start();
if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true){
	header("location: /login/");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "npfhdatabase";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

$story_id = $_GET['id'];


header('Location: adminpage.php');
?>
