<?php
include "../../connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $employeeId = $_GET['employee_id'];
    $employeeName = $_POST['employee_name'];
    $passportNo = $_POST['passport_no'];
    $mobile = $_POST['mobile'];
    $nationality = $_POST['nationality'];
    $qid = $_POST['qid'];
    $qid_exp_dte = $_POST['qid_exp_dte'];
    $basic_salary = $_POST['basic_salary'];
    $allowance = $_POST['allowance'];
    $fixed_ot = $_POST['fixed_ot'];
    $joinDate = $_POST['join_date'];
    $date_last_vacation = $_POST['date_last_vacation'];
    $rejoining_date = $_POST['rejoining_date'];

    // Perform the update query
    $updateQuery = "UPDATE employee_details
                    SET employee_name = '$employeeName', 
                        passport_no = '$passportNo',
                        mobile = '$mobile', 
                        nationality = '$nationality',
                        qid = '$qid',
                        qid_exp_dte = '$qid_exp_dte',
                        basic_salary = '$basic_salary',
                        allowance = '$allowance',
                        fixed_ot = '$fixed_ot',
                        join_date = '$joinDate',
                        date_last_vacation = '$date_last_vacation',
                        rejoining_date = '$rejoining_date'
                        WHERE emp_id = '$employeeId'";

    // Execute the update query
    $result = mysqli_query($con, $updateQuery);

    if ($result) {
        // Update successful, redirect to another page or display a success message
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // Update failed, display an error message or handle the error as per your requirements
        $errorMessage = "Failed to update employee details.";
    }
}
?>
