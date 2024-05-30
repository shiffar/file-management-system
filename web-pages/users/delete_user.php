<?php 
include('../../connection.php');

$user_id = $_POST['id'];

// Retrieve the profile image filename for the user being deleted
$profile_image_query = "SELECT profile_image FROM users WHERE u_id = '$user_id'";
$profile_image_result = mysqli_query($con, $profile_image_query);
$profile_image_row = mysqli_fetch_assoc($profile_image_result);
$profile_image = $profile_image_row['profile_image'];

// Delete the user data from the database
$sql = "DELETE FROM users WHERE u_id = '$user_id'";
$delQuery = mysqli_query($con, $sql);

// Reset the auto-increment value of the table
$resetAutoIncrementQuery = "ALTER TABLE users AUTO_INCREMENT = 1";
mysqli_query($con, $resetAutoIncrementQuery);

// Check if the deletion was successful
if ($delQuery == true) {
    // Remove the profile image file if it exists
    $upload_dir = '../../function/user/uploads/';
    $profile_image_path = $upload_dir . $profile_image;
    if (file_exists($profile_image_path)) {
        unlink($profile_image_path);
    }

    $data = array(
        'status' => 'success',
    );

    echo json_encode($data);
} else {
    $data = array(
        'status' => 'failed',
    );

    echo json_encode($data);
} 
?>
