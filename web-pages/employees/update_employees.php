<?php
	
	// Database connection 
	
	require_once('../../connection.php');

	if (isset($_POST['ecompany_id'],$_POST['ecompany_name'])) {
		
		$company_id = $_POST['ecompany_id'];
		$company_name = $_POST['ecompany_name'];
	}
	

	$update = "UPDATE companies SET c_name = '$company_name' WHERE c_id = '$company_id'";
	mysqli_query($con, $update);
				
			
		
		
?>
 