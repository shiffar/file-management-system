<?php
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the document type name from the form submission
    $document_type = $_POST["document_type"];

    // Check if the document type name is empty
    if (!empty($document_type)) {
        // Retrieve the user ID and company ID from the session or wherever you store them
        $user_id = $_SESSION['user_id'];
        $company_id = $_GET['company_id'];

        // Check if "Legal Details" document type already exists in the document_types table
        $legal_details_query = "SELECT * FROM document_types WHERE company_id = '$company_id' AND dt_name = 'legal details'";
        $legal_details_result = mysqli_query($con, $legal_details_query);

        // Check if "Employee Details" document type already exists in the document_types table
        $employee_details_query = "SELECT * FROM document_types WHERE company_id = '$company_id' AND dt_name = 'employee details'";
        $employee_details_result = mysqli_query($con, $employee_details_query);

        // Check if "Vehicles" document type already exists in the document_types table
        $vehicles_query = "SELECT * FROM document_types WHERE company_id = '$company_id' AND dt_name = 'vehicles'";
        $vehicles_result = mysqli_query($con, $vehicles_query);

        $legal_details_exists = mysqli_num_rows($legal_details_result) > 0;
        $employee_details_exists = mysqli_num_rows($employee_details_result) > 0;
        $vehicles_exists = mysqli_num_rows($vehicles_result) > 0;

        if ($document_type === 'legal details' && $legal_details_exists) {
            // Legal Details document type already exists
            $_SESSION['showLegalAlert'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($document_type === 'employee details' && $employee_details_exists) {
            // Employee Details document type already exists
            $_SESSION['showEmployeeAlert'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } elseif ($document_type === 'vehicles' && $vehicles_exists) {
            // Vehicles document type already exists
            $_SESSION['showVehiclesAlert'] = true;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            // Insert the new document type into the database
            $insert_query = "INSERT INTO document_types (user_id, company_id, dt_name, created_at) VALUES ('$user_id', '$company_id', '$document_type', NOW())";
            $insert_result = mysqli_query($con, $insert_query);

            if ($insert_result) {
                // Document type creation successful
                echo "Document type created successfully.";
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                // Document type creation failed
                echo "Error creating document type: " . mysqli_error($con);
            }
        }
    } else {
        // Document type name is empty
        echo "Document type name cannot be empty.";
    }
}

// Close the database connection
mysqli_close($con);
?>
