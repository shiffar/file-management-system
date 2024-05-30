<?php
include('../../connection.php');

$output = array();
$sql = "SELECT * FROM company_registrations
        INNER JOIN users ON company_registrations.user_id = users.u_id
        INNER JOIN companies ON company_registrations.company_id = companies.c_id
        INNER JOIN document_types ON company_registrations.document_type_id = document_types.dt_id
        INNER JOIN document_names ON company_registrations.document_name_id = document_names.dn_id";

$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'registration_name',
    1 => 'registration_no',
    2 => 'username',
    3 => 'c_name',
    4 => 'dt_name',
    5 => 'd_name',
    6 => 'file_name',
    7 => 'expire_date',
    8 => 'custom_fields',
);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE id LIKE '%" . $search_value . "%'";
    $sql .= " OR registration_name LIKE '%" . $search_value . "%'";
    $sql .= " OR registration_no LIKE '%" . $search_value . "%'";
    $sql .= " OR username LIKE '%" . $search_value . "%'";
    $sql .= " OR c_name LIKE '%" . $search_value . "%'";
    $sql .= " OR dt_name LIKE '%" . $search_value . "%'";
    $sql .= " OR d_name LIKE '%" . $search_value . "%'";
    $sql .= " OR file_name LIKE '%" . $search_value . "%'";
    $sql .= " OR expire_date LIKE '%" . $search_value . "%'";
    $sql .= " OR custom_fields LIKE '%" . $search_value . "%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . "";
} else {
    $sql .= " ORDER BY id DESC";
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
    $sub_array[] = $row['registration_name'];
    $sub_array[] = $row['registration_no'];
    $sub_array[] = $row['username'];
    $sub_array[] = $row['c_name'];
    $sub_array[] = $row['dt_name'];
    $sub_array[] = $row['d_name'];
    $sub_array[] = '<a href="#" class="file-link" data-id="' . $row['id'] . '" data-file="' . $row['file_name'] . '">' . $row['file_name'] . '</a>';
    $sub_array[] = $row['expire_date'];

    // Decode the JSON string for custom_fields
    $customFields = json_decode($row['custom_fields'], true);

    // Check if custom_fields is successfully decoded
    if (is_array($customFields)) {
        // Get the values of custom_fields
        $customFieldValues = array_values($customFields);

        // Join the values with a line break
        $extraInputs = implode('<br>', $customFieldValues);

        // Add the formatted value to the sub_array
        $sub_array[] = $extraInputs;
    } else {
        // Invalid JSON, assign the original value to the table cell
        $sub_array[] = $row['custom_fields'];
    }

    $sub_array[] = '<a id="edit_registration" data-id="' . $row['id'] . '" class="btn btn-success waves-effect btn-label waves-light"><i class="mdi mdi-pencil label-icon"></i> Edit</a> <a href="javascript:void();" id="delete_registration" data-id="' . $row['id'] . '" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>';
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
