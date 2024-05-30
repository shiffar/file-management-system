<?php include('../../connection.php');

$output= array();

$sql ="SELECT * FROM employee_details
INNER JOIN document_names ON document_names.dn_id = employee_details.document_name_id_fk
INNER JOIN companies ON document_names.company_id = companies.c_id";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'employee_name',
	1 => 'passport_no',
	2 => 'mobile',
	3 => 'nationality',
	4 => 'qid',
	5 => 'qid_exp_dte',
	6 => 'basic_salary',
	7 => 'allowance',
	8 => 'fixed_ot',
	9 => 'join_date',
	10 => 'date_last_vacation',
	11 => 'rejoining_date',
	12 => 'c_name',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE emp_id like '%".$search_value."%'";
	$sql .= " OR employee_name like '%".$search_value."%'";
	$sql .= " OR passport_no like '%".$search_value."%'";
	$sql .= " OR mobile like '%".$search_value."%'";
	$sql .= " OR nationality like '%".$search_value."%'";
	$sql .= " OR qid like '%".$search_value."%'";
	$sql .= " OR qid_exp_dte like '%".$search_value."%'";
	$sql .= " OR basic_salary like '%".$search_value."%'";
	$sql .= " OR allowance like '%".$search_value."%'";
	$sql .= " OR fixed_ot like '%".$search_value."%'";
	$sql .= " OR join_date like '%".$search_value."%'";
	$sql .= " OR date_last_vacation like '%".$search_value."%'";
	$sql .= " OR rejoining_date like '%".$search_value."%'";
	$sql .= " OR c_name like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY emp_id desc";
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
	$sub_array[] = $row['employee_name'];
	$sub_array[] = $row['passport_no'];
	$sub_array[] = $row['mobile'];
	$sub_array[] = $row['nationality'];
	$sub_array[] = $row['qid'];
	$sub_array[] = $row['qid_exp_dte'];
	$sub_array[] = $row['basic_salary'];
	$sub_array[] = $row['allowance'];
	$sub_array[] = $row['fixed_ot'];
	$sub_array[] = $row['join_date'];
	$sub_array[] = $row['date_last_vacation'];
	$sub_array[] = $row['rejoining_date'];
	$sub_array[] = $row['c_name'];
	$sub_array[] = '<a href="javascript:void();" id="delete_employee" data-emp_id="'.$row['emp_id'].'" class="btn btn-danger waves-effect btn-label waves-light" ><i class="mdi mdi-trash-can label-icon"></i> Delete</a>';
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