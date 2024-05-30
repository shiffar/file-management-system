<?php
session_start();

// Step 1: Process form submission and save company registration details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $registrationName = $_POST['registration_name'];
    $registrationNo = $_POST['registration_no'];
    $expireDate = $_POST['expire_date'];
    $documentFile = $_FILES['document'];
    $user_id = $_SESSION['user_id'];
    $company_id = $_GET['company_id'];
    $document_type_id = $_GET['document_type_id'];
    $document_name_id = $_GET['document_name_id'];

    // Process and validate form data, perform necessary checks

    // Save company registration details to the database

    // Step 2: Create the required folders for company, document type, and document name
    // Retrieve company, document type, and document name details from the database based on the saved IDs
    // Replace with your actual database connection logic
    $con = mysqli_connect("localhost", "root", "", "fms");

    // Fetch company name
    $companyQuery = "SELECT name FROM companies WHERE id = '$company_id'";
    $companyResult = mysqli_query($con, $companyQuery);
    $companyRow = mysqli_fetch_assoc($companyResult);
    $companyName = $companyRow['name'];

    // Fetch document type name
    $documentTypeQuery = "SELECT name FROM document_types WHERE id = '$document_type_id'";
    $documentTypeResult = mysqli_query($con, $documentTypeQuery);
    $documentTypeRow = mysqli_fetch_assoc($documentTypeResult);
    $documentTypeName = $documentTypeRow['name'];

    // Fetch document name
    $documentNameQuery = "SELECT name FROM document_names WHERE id = '$document_name_id'";
    $documentNameResult = mysqli_query($con, $documentNameQuery);
    $documentNameRow = mysqli_fetch_assoc($documentNameResult);
    $documentName = $documentNameRow['name'];

    // Create folder names based on fetched names
    $companyFolder = cleanFolderName($companyName);
    $documentTypeFolder = cleanFolderName($documentTypeName);
    $documentNameFolder = cleanFolderName($documentName);

    // Create the required folders if they don't exist
    $basePath = "file-management/";
    $companyPath = $basePath . $companyFolder . "/";
    $documentTypePath = $companyPath . $documentTypeFolder . "/";
    $documentNamePath = $documentTypePath . $documentNameFolder . "/";

    // Create folders if they don't exist
    if (!file_exists($companyPath)) {
        mkdir($companyPath, 0777, true);
    }

    if (!file_exists($documentTypePath)) {
        mkdir($documentTypePath, 0777, true);
    }

    if (!file_exists($documentNamePath)) {
        mkdir($documentNamePath, 0777, true);
    }

    // Step 3: Move the uploaded document file to the appropriate folder

    // Generate a unique file name
    $extension = pathinfo($documentFile['name'], PATHINFO_EXTENSION);
    $customFileName = generateUniqueFileName($documentNamePath, $extension);

    $documentFilePath = $documentNamePath . $customFileName;

    if (move_uploaded_file($documentFile['tmp_name'], $documentFilePath)) {
        // File moved successfully
    } else {
        // Failed to move file
        echo "Error uploading document file.";
    }

    // Step 4: Save the company registration details along with the folder paths and custom fields to the database

    // Retrieve and save custom fields
    $customFields = array();
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'custom_fields_') === 0) {
            $customFields[$key] = $value;
        }
    }

    // Save the custom fields as JSON data in the `custom_fields` column
    $customFieldsJson = json_encode($customFields);

    $query = "INSERT INTO company_registrations (registration_name, registration_no, expire_date, user_id, company_id, document_type_id, document_name_id, file_name, custom_fields, created_at)
                VALUES ('$registrationName', '$registrationNo', '$expireDate', '$user_id', '$company_id', '$document_type_id', '$document_name_id', '$customFileName', '$customFieldsJson', NOW())";

    $result = mysqli_query($con, $query);

    // Redirect back to the referring page or a success page
    if ($result) {
        // Registration successful
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        // Registration failed
        echo "Error creating company registration: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}

/**
 * Clean a folder name by removing invalid characters and spaces
 *
 * @param string $name The original name to be cleaned
 * @return string The cleaned folder name
 */
function cleanFolderName($name) {
    $name = preg_replace('/[^a-zA-Z0-9]/', '', $name); // Remove non-alphanumeric characters
    $name = str_replace(' ', '_', $name); // Replace spaces with underscores
    return $name;
}

// Function to generate a unique file name
function generateUniqueFileName($folderPath, $extension) {
    $fileName = uniqid() . '.' . $extension;
    $filePath = $folderPath . $fileName;
    
    // Check if the generated file name already exists, generate a new one if it does
    while (file_exists($filePath)) {
        $fileName = uniqid() . '.' . $extension;
        $filePath = $folderPath . $fileName;
    }
    
    return $fileName;
}
?>
