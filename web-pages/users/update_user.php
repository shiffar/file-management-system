<?php
	
	// Database connection 
	
	require_once('../../connection.php');

	if (isset($_POST['euser_id'],$_POST['euser_name'])) {
		
		$user_id = $_POST['euser_id'];
		$user_name = $_POST['euser_name'];
		$user_password = $_POST['euser_password'];
	}
	

	$update = "UPDATE users SET username = '$user_name', password = '$user_password' WHERE id = '$user_id'";
	mysqli_query($con, $update);
				
			
		
		
?>
 