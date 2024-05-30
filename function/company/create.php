<?php
include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the company name from the form submission
    $company_name = $_POST["company_name"];

    // Check if the company name is empty
    if (!empty($company_name)) {
        // Retrieve the user ID from the session
        $user_id = $_SESSION['user_id'];

        // Insert the new company into the database
        $query = "INSERT INTO companies (c_name, created_by, created_at) VALUES ('$company_name', '$user_id', NOW())";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Company creation successful
            echo "Company created successfully.";

            // Get the ID of the newly inserted company
            $company_id = mysqli_insert_id($con);

            // Create document types for the company
            $document_types = array("legal details", "employee details", "vehicles");

            $document_type_ids = array(); // Array to store the document type IDs

            foreach ($document_types as $document_type) {
                $dt_query = "INSERT INTO document_types (user_id, company_id, dt_name, created_at) VALUES ('$user_id', '$company_id', '$document_type', NOW())";
                mysqli_query($con, $dt_query);
                $document_type_id = mysqli_insert_id($con);
                $document_type_ids[$document_type] = $document_type_id; // Store the document type ID in the array
            }

            // Create specific documents with legal details
            $documents = array("cr", "baladiya", "computer card", "civil defence", "fire contract", "gas contract");

            // Check if "legal details" document type exists in the array and get its ID
            if (isset($document_type_ids['legal details'])) {
                $legal_details_id = $document_type_ids['legal details'];

                foreach ($documents as $document) {
                    $document_query = "INSERT INTO document_names (user_id, company_id, document_type_id, d_name, created_at) VALUES ('$user_id', '$company_id', '$legal_details_id', '$document', NOW())";
                    mysqli_query($con, $document_query);
                }
            } else {
                echo "Error: 'Legal Details' document type not found.";
            }

            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            // Company creation failed
            echo "Error creating company: " . mysqli_error($con);
        }
    } else {
        // Company name is empty
        echo "Company name cannot be empty.";
    }
}

// Close the database connection
mysqli_close($con);
?>
