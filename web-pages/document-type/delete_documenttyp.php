<?php 
include('../../connection.php');

$documenttyp_id = $_POST['id'];
$sql = "DELETE FROM document_types WHERE dt_id='$documenttyp_id'";
$delQuery =mysqli_query($con,$sql);

$resetAutoIncrementQuery = "ALTER TABLE document_types AUTO_INCREMENT = 1";
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