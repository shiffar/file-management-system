<?php
include "../../connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $documentNameId = $_GET['document_name_id'];
    $employeeName = $_POST['employee_name'];
    $passportNo = $_POST['passport_no'];
    $mobile = $_POST['mobile'];
    $joinDate = $_POST['join_date'];

    // Check if employee with the same document_name_id_fk already exists
    $checkQuery = "SELECT * FROM employee_details WHERE document_name_id_fk = '$documentNameId'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION["showAlert"] = true;
        header("Location: ../../create_reg.php");
        exit;
    } else {
        // Insert query
        $insertQuery = "INSERT INTO employee_details (employee_name, passport_no, mobile, join_date, document_name_id_fk)
                        VALUES ('$employeeName', '$passportNo', '$mobile', '$joinDate', '$documentNameId')";

        // Execute the insert query
        $result = mysqli_query($con, $insertQuery);

        if ($result) {
            // Insert successful, redirect to another page or display a success message
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            // Insert failed, display an error message or handle the error as per your requirements
            $errorMessage = "Failed to create employee details.";
        }
    }
}
?>
