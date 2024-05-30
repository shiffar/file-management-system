<?php
include('../../connection.php');

$emp_id = $_POST['emp_id'];

// Step 1: Retrieve the document_name_id_fk for the employee
$getDocumentQuery = "SELECT document_name_id_fk FROM employee_details WHERE emp_id='$emp_id'";
$result = mysqli_query($con, $getDocumentQuery);

if ($row = mysqli_fetch_assoc($result)) {
    $document_name_id_fk = $row['document_name_id_fk'];
    
    // Step 2: Delete data in the "salary" table where document_name_id_fk matches
    $deleteSalaryQuery = "DELETE FROM salary WHERE document_name_id_fk='$document_name_id_fk'";
    $delSalaryQuery = mysqli_query($con, $deleteSalaryQuery);

    // Step 3: Delete the employee record
    $deleteEmployeeQuery = "DELETE FROM employee_details WHERE emp_id='$emp_id'";
    $delEmployeeQuery = mysqli_query($con, $deleteEmployeeQuery);

    // Step 4: Reset the AUTO_INCREMENT value (if needed)
    $resetAutoIncrementQuery = "ALTER TABLE employee_details AUTO_INCREMENT = 1";
    mysqli_query($con, $resetAutoIncrementQuery);

    if ($delEmployeeQuery && $delSalaryQuery) {
        $data = array(
            'status' => 'success',
        );
        echo json_encode($data);
    } else {
        $data = array(
            'status' => 'failed',
        );
        echo json_encode($data);
    }
} else {
    $data = array(
        'status' => 'failed',
        'message' => 'Employee not found',
    );
    echo json_encode($data);
}
?>
