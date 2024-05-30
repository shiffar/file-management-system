<?php
    include('../../connection.php');

    $registration_id = $_POST['id'];

    // Retrieve the file name associated with the registration
    $fileQuery = "SELECT file_name FROM company_registrations WHERE id = '$registration_id'";
    $fileResult = mysqli_query($con, $fileQuery);
    $fileRow = mysqli_fetch_assoc($fileResult);
    $file_name = $fileRow['file_name'];

    // Delete the registration record from the database
    $deleteQuery = "DELETE FROM company_registrations WHERE id = '$registration_id'";
    $delQuery = mysqli_query($con, $deleteQuery);

    // Reset the auto-increment value of the table
    $resetAutoIncrementQuery = "ALTER TABLE company_registrations AUTO_INCREMENT = 1";
    mysqli_query($con, $resetAutoIncrementQuery);

    if ($delQuery) {
        // Delete the file from the directory
        $file_path = '../../function/company-registration/file-management/' . $file_name;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $data = array(
            'status' => 'success'
        );
        echo json_encode($data);
    } else {
        $data = array(
            'status' => 'failed'
        );
        echo json_encode($data);
    }
?>
