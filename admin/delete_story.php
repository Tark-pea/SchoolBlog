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

$delete_query = "DELETE FROM storys WHERE id = $story_id";
mysqli_query($conn, $delete_query);
header('Location: adminpage.php');
?>
