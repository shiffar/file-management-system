<?php
include "../../connection.php";
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $salaryId = $_GET['salary_id'];
    $employeeName = $_POST['employee_name'];
    $passportNo = $_POST['passport_no'];
    $mobile = $_POST['mobile'];
    $joinDate = $_POST['join_date'];

    // Perform the update query
    $updateQuery = "UPDATE salary SET employee_name = '$employeeName', passport_no = '$passportNo', mobile = '$mobile', join_date = '$joinDate' WHERE id = '$salaryId'";
    $result = mysqli_query($con, $updateQuery); // Execute the update query

    if ($result) {
        // Update successful, redirect to another page or display a success message
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // Update failed, display an error message or handle the error as per your requirements
        $errorMessage = "Failed to update the employee details.";
    }
}
?>