<?php
// update_image.php
include "../../connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required fields are set
    if (isset($_POST['user_id'], $_POST['image_name'], $_FILES['profile_image'])) {
        $user_id = $_POST['user_id'];
        $image_name = $_POST['image_name'];

        // Process the uploaded image
        $file = $_FILES['profile_image'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_error = $file['error'];

        // Check if there were any upload errors
        if ($file_error === UPLOAD_ERR_OK) {
            // Specify the directory to save the uploaded image
            $upload_dir = '../../function/user/uploads/';

            // Generate a unique file name
            $unique_file_name = uniqid() . '_' . $file_name;

            // Move the uploaded file to the upload directory
            if (move_uploaded_file($file_tmp, $upload_dir . $unique_file_name)) {
                // Get the old image name from the database
                $old_image_query = "SELECT profile_image FROM users WHERE u_id = $user_id";
                $old_image_result = $con->query($old_image_query);

                if ($old_image_result->num_rows > 0) {
                    $old_image_row = $old_image_result->fetch_assoc();
                    $old_image = $old_image_row['profile_image'];

                    // Delete the old image file
                    if ($old_image != null) {
                        $old_image_path = $upload_dir . $old_image;
                        if (file_exists($old_image_path)) {
                            unlink($old_image_path);
                        }
                    }
                }

                // Update the database with the new image name
                $update_query = "UPDATE users SET profile_image = '$unique_file_name' WHERE u_id = $user_id";
                // ... execute the update query using your database connection ...

                // Check if the update was successful
                if ($con->query($update_query) === true) {
                    // Send a success response
                    echo json_encode(['status' => 'success']);
                    exit;
                }
            }
        }
    }
}

// Send an error response if something went wrong
echo json_encode(['status' => 'error']);
exit;
?>
