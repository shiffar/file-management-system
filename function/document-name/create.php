<?php
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the company details from the form submission
    $document_name = $_POST["document_name"];
    $passport_no = $_POST["passport_no"];
    $mobile = $_POST["mobile"];
    $nationality = $_POST["nationality"];
    $qid = $_POST["qid"];
    $qid_exp_dte = $_POST["qid_exp_dte"];
    $basic_salary = $_POST["basic_salary"];
    $allowance = $_POST["allowance"];
    $fixed_ot = $_POST["fixed_ot"];
    $join_date = $_POST["join_date"];
    if (isset($_POST['date_last_vacation_not_set'])) {
        $date_last_vacation = $_POST['date_last_vacation'];
    } else {
        $date_last_vacation = null;
    }

    if (isset($_POST['rejoining_date_not_set'])) {
        $rejoining_date = $_POST['rejoining_date'];
    } else {
        $rejoining_date = null;
    }

    $dt_name = $_GET['dt_name'];

    // Retrieve the user ID and company ID from the session
    $user_id = $_SESSION['user_id'];
    $company_id = $_GET['company_id'];
    $document_type_id = $_GET['document_type_id'];

    // Validate and sanitize the input
    $document_name = mysqli_real_escape_string($con, $document_name);

    // Check if the document name already exists in the database for the specified company and document type
    $existingQuery = "SELECT COUNT(*) FROM document_names WHERE user_id = '$user_id' AND company_id = '$company_id' AND document_type_id = '$document_type_id' AND d_name = '$document_name'";
    $existingResult = mysqli_query($con, $existingQuery);
    $existingCount = mysqli_fetch_array($existingResult)[0];

    if ($existingCount > 0) {
        // Document name already exists
        echo "Document name already exists.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // If date values are empty, set them to NULL
    $date_last_vacation = empty($date_last_vacation) ? null : $date_last_vacation;
    $rejoining_date = empty($rejoining_date) ? null : $rejoining_date;

    // Insert the document name details into the database
    $query = "INSERT INTO document_names (user_id, company_id, document_type_id, d_name,created_at) VALUES ('$user_id', '$company_id', '$document_type_id', '$document_name',NOW())";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Document name creation successful
        echo "Document name created successfully.";

        // Check if 'dt_name' is equal to 'employee details' and insert data into the 'employee_details' table
        if ($dt_name === 'employee details') {
            $lastInsertedID = mysqli_insert_id($con); // Get the last inserted ID

            // Insert data into the 'employee_details' table using the last inserted ID
            $employeeQuery = "INSERT INTO employee_details (employee_name, passport_no, mobile, nationality, qid, qid_exp_dte, basic_salary, allowance, fixed_ot, join_date, date_last_vacation, rejoining_date, document_name_id_fk)
                VALUES ('$document_name', '$passport_no', '$mobile', '$nationality', '$qid', '$qid_exp_dte', '$basic_salary', '$allowance', '$fixed_ot', '$join_date', '$date_last_vacation', '$rejoining_date', '$lastInsertedID')";
            $employeeResult = mysqli_query($con, $employeeQuery);

            if ($employeeResult) {
                // Employee details creation successful
                echo "Employee details created successfully.";
            } else {
                // Employee details creation failed
                echo "Error creating employee details: " . mysqli_error($con);
            }
        }

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        // Document name creation failed
        echo "Error creating document name: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>
