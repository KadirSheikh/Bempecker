<?php

session_start();
// echo "session";
// print_r($_SESSION);

if (isset($_SESSION['admin_id'])) {
	//destroy session
	unset($_SESSION['admin_id']);

	header("location:index.php");
}


?>