<?php 
include('../../connection.php');

$document_name_id = $_POST['id'];
$sql = "DELETE FROM document_names WHERE dn_id='$document_name_id'";
$delQuery =mysqli_query($con,$sql);

$resetAutoIncrementQuery = "ALTER TABLE document_names AUTO_INCREMENT = 1";
mysqli_query($con, $resetAutoIncrementQuery);


if($delQuery==true)
{
	 $data = array(
        'status'=>'success',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
      
    );

    echo json_encode($data);
} 

?>