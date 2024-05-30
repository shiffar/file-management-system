<?php
include "../../connection.php";

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

    // Validate required form fields
    if (empty($registrationName) || empty($registrationNo) || empty($expireDate) || empty($documentFile)) {
        echo "Error: All fields are required.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Process and validate form data, perform necessary checks

    // Step 2: Create the required folders for company, document type, and document name
    // Retrieve company, document type, and document name details from the database based on the saved IDs
    // Replace with your actual database connection logic

    // Create the required folders if they don't exist
    $basePath = "file-management/";
    $documentNamePath = $basePath . "/";

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
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Step 4: Save the company registration details along with the folder paths and custom fields to the database

    // Retrieve and save custom fields
    $customFields = array();
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'custom_fields_') === 0) {
            $customFields[] = $value;
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
        exit;
    }
}

// Close the database connection
mysqli_close($con);

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
