<?php
// edit_registration.php
include('../../connection.php');

if (isset($_POST["registration_id"])) {
    $output = array();
    $query = "SELECT * FROM company_registrations WHERE id = '".$_POST["registration_id"]."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
    $output['registration_name'] = $row["registration_name"];
    $output['registration_no'] = $row["registration_no"];
    $output['expire_date'] = $row["expire_date"];
    $output['custom_fields'] = $row["custom_fields"]; // Decode the custom_fields JSON

    echo json_encode($output);
}
?>
