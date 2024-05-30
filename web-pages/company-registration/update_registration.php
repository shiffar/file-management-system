<?php
// Database connection
require_once('../../connection.php');

if (isset($_POST['eregistration_id'], $_POST['eregistration_name'], $_POST['eregistration_no'], $_POST['eexpire_date'])) {
    $eregistration_id = $_POST['eregistration_id'];
    $eregistration_name = $_POST['eregistration_name'];
    $eregistration_no = $_POST['eregistration_no'];
    $eexpire_date = $_POST['eexpire_date'];

    // Prepare the custom fields as JSON
    $custom_fields = array();

    // Loop through the submitted form data to extract custom fields
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'ecustom_field_') !== false) {
            // Extract the custom field value
            $field_value = $_POST[$key];

            // Remove the 'ecustom_field_' prefix from the key to get the field name
            $field_name = str_replace('ecustom_field_', '', $key);

            // Add the custom field to the array
            $custom_fields[$field_name] = $field_value;
        }
    }

    // Convert the custom fields array to JSON
    $custom_fields_json = json_encode($custom_fields);

    // Update the registration record
    $update = "UPDATE company_registrations SET registration_name = '$eregistration_name', registration_no = '$eregistration_no', expire_date = '$eexpire_date', custom_fields = '$custom_fields_json' WHERE id = '$eregistration_id'";
    mysqli_query($con, $update);

    // Return success response
    $response = array('status' => 'success', 'message' => 'Registration updated successfully');
    echo json_encode($response);
} else {
    // Return error response
    $response = array('status' => 'error', 'message' => 'Invalid data provided');
    echo json_encode($response);
}
?>
