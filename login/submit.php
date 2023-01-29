<?php
// Get the form data
$name = $_POST['name'];
$title = $_POST['password'];

$correctName = 'admin';
$correctPass = 1234

if(($name == $correctName) && ($title == $correctPass)){
	header( "Location: $url" );
}else {
    echo "Incorrect Username or Password";
}
?>
