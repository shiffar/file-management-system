<?php 
include('../../connection.php');

$company_id = $_POST['id'];
$sql = "DELETE FROM companies WHERE c_id='$company_id'";
$delQuery =mysqli_query($con,$sql);

$resetAutoIncrementQuery = "ALTER TABLE companies AUTO_INCREMENT = 1";
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