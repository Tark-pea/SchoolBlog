<?php
// Get the form data
$name = $_POST['name'];
$title = $_POST['title'];
$story = $_POST['story'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "npfhdatabase";
$url = '/home/';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the form data into the database
$sql = "INSERT INTO storys (name, title, story) VALUES ('$name', '$title', '$story')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	header( "Location: $url" );
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
