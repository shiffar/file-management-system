<?php
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the company details from the form submission
    $document_type = $_POST["document_type"];
    $document_type_select = $_POST["document_type_select"];

    // Retrieve the user ID and company ID from the session
    $user_id = $_SESSION['user_id'];
    $company_id = $_GET['company_id'];

    // Sanitize the inputs
    $document_type = mysqli_real_escape_string($con, $document_type);
    $document_type_select = mysqli_real_escape_string($con, $document_type_select);

    if ($document_type_select === "employee") {
        // Check if the employee name already exists in the database
        $existingQuery = "SELECT COUNT(*) FROM document_types WHERE user_id = '$user_id' AND company_id = '$company_id' AND dt_name = '$document_type_select'";
        $existingResult = mysqli_query($con, $existingQuery);
        $existingCount = mysqli_fetch_array($existingResult)[0];

        if ($existingCount > 0) {
            // Employee name already exists, store a flag in session to display the alert in doc_type.php
            $_SESSION['showAlert'] = true;
        } elseif (!empty($document_type_select)) {
            // Insert the document type details into the database
            $query = "INSERT INTO document_types (user_id, company_id, dt_name) VALUES ('$user_id', '$company_id', '$document_type_select')";
            $result = mysqli_query($con, $query);

            if ($result) {
                // Document type creation successful
                echo "Document type created successfully.";
            } else {
                // Document type creation failed
                echo "Error creating document type: " . mysqli_error($con);
            }
        }
    } elseif (!empty($document_type)) {
        // Insert the document type details into the database without document details
        $query = "INSERT INTO document_types (user_id, company_id, dt_name) VALUES ('$user_id', '$company_id', '$document_type')";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Document type creation successful
            echo "Document type created successfully.";
        } else {
            // Document type creation failed
            echo "Error creating document type: " . mysqli_error($con);
        }
    }
}

// Close the database connection
mysqli_close($con);

// Redirect to doc_type.php
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>
