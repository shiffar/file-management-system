<?php
	session_start();
	unset($_SESSION['uname']);	
	if(session_destroy()) {
		header("Location: admin-login.php");
	}
?>