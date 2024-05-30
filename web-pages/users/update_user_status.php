<?php
include('../../connection.php');

if (isset($_POST['userId']) && isset($_POST['status'])) {
    $userId = $_POST['userId'];
    $status = $_POST['status'];

    // Update the user status in the database
    $updateQuery = mysqli_query($con, "UPDATE users SET user_status = '$status' WHERE u_id = '$userId'");
    
    if ($updateQuery) {
        // User status updated successfully
        $response = array(
            'status' => 'success',
            'message' => 'User status updated successfully.'
        );
        echo json_encode($response);
    } else {
        // Failed to update user status
        $response = array(
            'status' => 'error',
            'message' => 'Failed to update user status.'
        );
        echo json_encode($response);
    }
} else {
    // Invalid request
    $response = array(
        'status' => 'error',
        'message' => 'Invalid request.'
    );
    echo json_encode($response);
}
?>
