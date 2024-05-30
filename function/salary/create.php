<?php
include "../../connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $documentNameId = $_GET['document_name_id'];
    $create = $_GET['create'];

    // Get the corresponding form inputs based on the 'create' value
    if ($create == 1) {
        $basicSalary = $_POST['basic_salary'];
        $basicAllowance = $_POST['basic_allowance'];
        $fixedOt = $_POST['fixed_ot'];
        $leaveSalary = $_POST['leave_salary'];
        $gratuity = $_POST['gratuity'];
        $salaryDeposit = $_POST['salary_deposit'];
        $airTicket = $_POST['air_ticket'];
        $salaryAdvance = $_POST['salary_advance'];
        $loan = $_POST['loan'];
        $telephoneExpense = $_POST['telephone_expense'];
        $totalSalary = $_POST['total_salary'];
        $salaryStatus = isset($_POST['salary_status']) ? $_POST['salary_status'] : "unpaid";
        $createdDate = $_POST['created_date'];

        // Validate required fields
        if (empty($basicSalary) || empty($basicAllowance) || empty($fixedOt)) {
            echo "Error: Basic salary, basic allowance, and fixed OT are required.";
            exit;
        }

        // Insert query
        $insertQuery = "INSERT INTO salary (document_name_id_fk, basic_salary, basic_allowance, fixed_ot, leave_salary, gratuity, salary_deposit, air_ticket, salary_advance, loan, telephone_expense, total_salary, created_at, salary_status)
                        VALUES ('$documentNameId', '$basicSalary', '$basicAllowance', '$fixedOt', '$leaveSalary', '$gratuity', '$salaryDeposit', '$airTicket', '$salaryAdvance', '$loan', '$telephoneExpense', '$totalSalary', '$createdDate', '$salaryStatus')";
    } elseif ($create == 2) {
        $ebasicSalary = $_POST['ebasic_salary'];
        $ebasicAllowance = $_POST['ebasic_allowance'];
        $efixedOt = $_POST['efixed_ot'];
        $edaysCount = $_POST['edays_count'];
        $edaysAmount = $_POST['edays_amount'];
        $eot = $_POST['eot'];
        $eotAmount = $_POST['eot_amount'];
        $ehours = $_POST['ehours'];
        $ehoursAmount = $_POST['ehours_amount'];
        $ebonus = $_POST['ebonus'];
        $eleaveSalary = $_POST['eleave_salary'];
        $egratuity = $_POST['egratuity'];
        $esalaryDeposit = $_POST['esalary_deposit'];
        $eairTicket = $_POST['eair_ticket'];
        $esalaryAdvance = $_POST['esalary_advance'];
        $eloan = $_POST['eloan'];
        $etelephoneExpense = $_POST['etelephone_expense'];
        $etotalSalary = $_POST['etotal_salary'];
        $salaryStatus = isset($_POST['salary_status']) ? $_POST['salary_status'] : "unpaid";
        $createdDate = $_POST['created_date'];

        // Validate required fields
        if (empty($ebasicSalary) || empty($ebasicAllowance) || empty($efixedOt)) {
            echo "Error: Basic salary, basic allowance, and fixed OT are required.";
            exit;
        }

        // Insert query
        $insertQuery = "INSERT INTO salary (document_name_id_fk, basic_salary, basic_allowance, fixed_ot, days_count, days_amount, ot, ot_amount, hours, hours_amount, bonus, leave_salary, gratuity, salary_deposit, air_ticket, salary_advance, loan, telephone_expense, total_salary, created_at, salary_status)
                        VALUES ('$documentNameId', '$ebasicSalary', '$ebasicAllowance', '$efixedOt', '$edaysCount', '$edaysAmount', '$eot', '$eotAmount', '$ehours', '$ehoursAmount', '$ebonus', '$eleaveSalary', '$egratuity', '$esalaryDeposit', '$eairTicket', '$esalaryAdvance', '$eloan', '$etelephoneExpense', '$etotalSalary', '$createdDate', '$salaryStatus')";
    }

    // Execute the insert query
    if (mysqli_query($con, $insertQuery)) {
        echo "Data saved successfully.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
