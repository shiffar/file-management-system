<?php
	
	// Database connection 
	
	require_once('../../connection.php');

	if (isset($_POST['edoc_type_id'],$_POST['edocumenttype_name'])) {
		
		$edoc_type_id = $_POST['edoc_type_id'];
		$edocumenttype_name = $_POST['edocumenttype_name'];
	}
	

	$update = "UPDATE document_types SET dt_name = '$edocumenttype_name' WHERE dt_id = '$edoc_type_id'";
	mysqli_query($con, $update);
				
			
		
		
?>
 