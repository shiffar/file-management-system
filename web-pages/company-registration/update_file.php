<?php
include('../../connection.php');

// Check if the AJAX request is received
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fileId']) && isset($_FILES['newFile'])) {
    // Get the file ID from the AJAX request
    $fileId = $_POST['fileId'];

    // Handle the file upload
    $newFile = $_FILES['newFile'];

    // Check for errors during the file upload
    if ($newFile['error'] === UPLOAD_ERR_OK) {
        // Get the uploaded file details
        $tempFilePath = $newFile['tmp_name'];
        $fileName = $newFile['name'];
        $fileSize = $newFile['size'];
        
        // Specify the directory to upload the file
        $uploadDirectory = '../../function/company-registration/file-management/'; // Replace 'upload_directory' with your desired directory
        
        // Generate a unique file name to avoid conflicts
        $newFileName = uniqid() . '_' . $fileName;
        
        // Move the uploaded file to the specified directory
        $newFilePath = $uploadDirectory . $newFileName;
        
        if (move_uploaded_file($tempFilePath, $newFilePath)) {
            // File uploaded successfully, update the file location and filename in the database
            $updateQuery = "UPDATE company_registrations SET file_name = '$newFileName' WHERE id = $fileId";
            $updateResult = mysqli_query($con, $updateQuery);
            
            if ($updateResult) {
                // File location and filename updated successfully in the database
                echo json_encode(['status' => 'success', 'message' => 'File updated successfully!']);
            } else {
                // Error occurred while updating the database
                echo json_encode(['status' => 'error', 'message' => 'An error occurred while updating the file.']);
            }
        } else {
            // Error occurred while moving the uploaded file
            echo json_encode(['status' => 'error', 'message' => 'An error occurred while updating the file.']);
        }
    } else {
        // Error occurred during file upload
        echo json_encode(['status' => 'error', 'message' => 'File upload error: ' . $newFile['error']]);
    }
} else {
    // Invalid request or missing parameters
    echo json_encode(['status' => 'error', 'message' => 'Invalid request or missing parameters.']);
}
?>
