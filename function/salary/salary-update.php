<?php 
include "../../connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $salary_id = $_GET['salary_id'];
    $document_name_id = $_GET['document_name_id'];

    if ($_GET['update'] == 1) {
        $basic_salary = $_POST['basic_salary'];
        $basic_allowance = $_POST['basic_allowance'];
        $fixed_ot = $_POST['fixed_ot'];
        $days_count = 0;
        $days_amount = 0;
        $ot = 0;
        $ot_amount = 0;
        $hours = 0;
        $hours_amount = 0;
        $bonus = 0;
        $leave_salary = $_POST['leave_salary'];
        $gratuity = $_POST['gratuity'];
        $salary_deposit = $_POST['salary_deposit'];
        $salary_advance = $_POST['salary_advance'];
        $loan = $_POST['loan'];
        $air_ticket = $_POST['air_ticket'];
        $telephone_expense = $_POST['telephone_expense'];
        $total_salary = $_POST['total_salary'];
        $created_date = $_POST['created_date'];
        $salaryStatus = isset($_POST['salary_status']) ? $_POST['salary_status'] : "unpaid";   
        $company_id = $_GET['company_id'];
        $document_type_id = $_GET['document_type_id'];

        // Perform the update query
        $updateQuery = "UPDATE salary SET basic_salary = '$basic_salary', basic_allowance = '$basic_allowance', fixed_ot = '$fixed_ot', days_count = '$days_count', days_amount = '$days_amount', ot = '$ot', ot_amount = '$ot_amount', hours = '$hours', hours_amount = '$hours_amount', bonus = '$bonus', leave_salary = '$leave_salary', gratuity = '$gratuity', salary_deposit = '$salary_deposit', salary_advance = '$salary_advance', loan = '$loan', air_ticket = '$air_ticket', telephone_expense = '$telephone_expense', total_salary = '$total_salary', created_at ='$created_date', updated_at = NOW(), salary_status = '$salaryStatus' WHERE id = '$salary_id'";
        $result = mysqli_query($con, $updateQuery); // Execute the update query

        if ($result) {
            // Update successful, redirect to another page or display a success message
            header("Location: ../../user-pages/salary.php?document_name_id=$document_name_id&company_id=$company_id&document_type_id=$document_type_id");
            exit();
        } else {
            // Update failed, display an error message or handle the error as per your requirements
            $errorMessage = "Failed to update the employee details.";
        }
    } elseif ($_GET['update'] == 2) {
        $ebasic_salary = $_POST['ebasic_salary'];
        $ebasic_allowance = $_POST['ebasic_allowance'];
        $efixed_ot = $_POST['efixed_ot'];
        $edays_count = $_POST['edays_count'];
        $edays_amount = $_POST['edays_amount'];
        $eot = $_POST['eot'];
        $eot_amount = $_POST['eot_amount'];
        $ehours = $_POST['ehours'];
        $ehours_amount = $_POST['ehours_amount'];
        $ebonus = $_POST['ebonus'];
        $eleave_salary = $_POST['eleave_salary'];
        $egratuity = $_POST['egratuity'];
        $esalary_deposit = $_POST['esalary_deposit'];
        $esalary_advance = $_POST['esalary_advance'];
        $eloan = $_POST['eloan'];
        $eair_ticket = $_POST['eair_ticket'];
        $etelephone_expense = $_POST['etelephone_expense'];
        $etotal_salary = $_POST['etotal_salary'];
        $ecreated_date = $_POST['ecreated_date'];
        $esalaryStatus = isset($_POST['esalary_status']) ? $_POST['esalary_status'] : "unpaid";
        $company_id = $_GET['company_id'];
        $document_type_id = $_GET['document_type_id'];

        // Perform the update query
        $updateQuery = "UPDATE salary SET basic_salary = '$ebasic_salary', basic_allowance = '$ebasic_allowance', fixed_ot = '$efixed_ot', days_count = '$edays_count', days_amount = '$edays_amount', ot = '$eot', ot_amount = '$eot_amount', hours = '$ehours', hours_amount = '$ehours_amount', bonus = '$ebonus', leave_salary = '$eleave_salary', gratuity = '$egratuity', salary_deposit = '$esalary_deposit', salary_advance = '$esalary_advance', loan = '$eloan', air_ticket = '$eair_ticket', telephone_expense = '$etelephone_expense', total_salary = '$etotal_salary', created_at ='$ecreated_date', updated_at = NOW(), salary_status = '$esalaryStatus' WHERE id = '$salary_id'";
        $result = mysqli_query($con, $updateQuery); // Execute the update query

        if ($result) {
            // Update successful, redirect to another page or display a success message
            header("Location: ../../user-pages/salary.php?document_name_id=$document_name_id&company_id=$company_id&document_type_id=$document_type_id");
            exit();
        } else {
            // Update failed, display an error message or handle the error as per your requirements
            $errorMessage = "Failed to update the employee details.";
        }
    }
}


?>