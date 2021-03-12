<?php 
session_start();

$conn = mysqli_connect('localhost' , 'root' , '' , 'bampeaker');

if ($conn) {
	// echo "connected";
}
else{
	die('Failed'.mysqli_error());
}

?>