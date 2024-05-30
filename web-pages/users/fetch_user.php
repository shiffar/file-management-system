<?php include('../../connection.php');


$output = array();
$sql = "SELECT * FROM users";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'profile_image',
    1 => 'username',
    2 => 'password',
    3 => 'user_status'
);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE u_id LIKE '%" . $search_value . "%'";
    $sql .= " OR profile_image LIKE '%" . $search_value . "%'";
    $sql .= " OR username LIKE '%" . $search_value . "%'";
    $sql .= " OR password LIKE '%" . $search_value . "%'";
    $sql .= " OR user_status LIKE '%" . $search_value . "%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . "";
} else {
    $sql .= " ORDER BY u_id DESC";
}

if ($_POST['length'] != -1) {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT " . $start . ", " . $length;
}

$query = mysqli_query($con, $sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = '<img src="../../function/user/uploads/' . $row['profile_image'] . '" alt="Profile Image" class="circle-image2 profile-image" data-user-id="' . $row['u_id'] . '" data-image-name="' . $row['profile_image'] . '">';
    $sub_array[] = $row['username'];
    $sub_array[] = $row['password'];

    // Check user status
    if ($row['user_status'] === 'in-active') {
        $sub_array[] = '<div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd" onchange="updateUserStatus(' . $row['u_id'] . ', this)">
                        </div>';
    } else {
        $sub_array[] = '<div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd" checked onchange="updateUserStatus(' . $row['u_id'] . ', this)">
                        </div>';
    }

    $sub_array[] = '<a id="edit_users" data-id="' . $row['u_id'] . '" class="btn btn-success waves-effect btn-label waves-light"><i class="mdi mdi-pencil label-icon"></i> Edit</a> 
                    <a href="javascript:void();" id="delete_users" data-id="' . $row['u_id'] . '" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>';
    $data[] = $sub_array;
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => $count_rows,
    'recordsFiltered' => $total_all_rows,
    'data' => $data,
);
echo json_encode($output);


?>