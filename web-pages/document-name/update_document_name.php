<?php
	
	// Database connection 
	
	require_once('../../connection.php');

	if (isset($_POST['edocument_name_id'],$_POST['edocument_name'])) {
		
		$edocument_name_id = $_POST['edocument_name_id'];
		$edocument_name = $_POST['edocument_name'];
	}
	

	$update = "UPDATE document_names SET d_name = '$edocument_name' WHERE dn_id = '$edocument_name_id'";
	mysqli_query($con, $update);
				
			
		
		
?>
 