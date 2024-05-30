<?php include('../../connection.php');

$output= array();
$sql ="SELECT * FROM document_names
INNER JOIN users ON document_names.user_id = users.u_id
INNER JOIN companies ON document_names.company_id = companies.c_id
INNER JOIN document_types ON document_names.document_type_id = document_types.dt_id";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'd_name',
	1 => 'dt_name',
	2 => 'c_name',
	3 => 'username',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE dn_id like '%".$search_value."%'";
	$sql .= " OR d_name like '%".$search_value."%'";
	$sql .= " OR dt_name like '%".$search_value."%'";
	$sql .= " OR c_name like '%".$search_value."%'";
	$sql .= " OR username like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY dn_id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['d_name'];
	$sub_array[] = $row['dt_name'];
	$sub_array[] = $row['c_name'];
	$sub_array[] = $row['username'];
	$sub_array[] = '<a id="edit_document_name" data-id="'.$row['dn_id'].'" class="btn btn-success waves-effect btn-label waves-light" ><i class="mdi mdi-pencil label-icon"></i> Edit</a> <a href="javascript:void();" id="delete_document_name" data-id="'.$row['dn_id'].'" class="btn btn-danger waves-effect btn-label waves-light" ><i class="mdi mdi-trash-can label-icon"></i> Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

?>


