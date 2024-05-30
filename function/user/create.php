<?php
include "../../connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $userStatus = "in-active";
    
    // Perform additional validation as needed
    
    // Check if passwords match
    if ($password !== $confirmPassword) {
        // Passwords do not match, display an error message using JavaScript alert
        $_SESSION["showAlert"] = true;
        header("Location: ../../create_reg.php");
        exit;
    }
    
    // Check if the username already exists in the database
    $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkUsernameResult = mysqli_query($con, $checkUsernameQuery);
    
    if (mysqli_num_rows($checkUsernameResult) > 0) {
        // Username already exists, display an error message using JavaScript alert
        $_SESSION["showAlert2"] = true;
        header("Location: ../../create_reg.php");
        exit;
    }
    
    // Retrieve the profile image file
    $profileImage = $_FILES["profile_image"]["tmp_name"];
    
    // Process the profile image as needed (e.g., upload to a specific directory and save the file path in the database)
    // Example code to move the uploaded file to a directory named "uploads" and generate a unique file name
    $uploadDir = "uploads/";
    $fileName = uniqid() . "_" . $_FILES["profile_image"]["name"];
    $filePath = $uploadDir . $fileName;
    
    // Move the uploaded file to the desired directory
    if (move_uploaded_file($profileImage, $filePath)) {
        // File upload successful, continue with user registration
        
        // Insert user data into the database
        $insertQuery = "INSERT INTO users (username, password, profile_image, user_status, created_at) VALUES ('$username', '$password', '$fileName', '$userStatus', NOW())";
        $result = mysqli_query($con, $insertQuery);
        
        if ($result) {
            // User registration successful
            $_SESSION["showAlert3"] = true;
            // Redirect back to the login page
            header("Location: ../../index.php");
        } else {
            // Error occurred during user registration
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // File upload failed, handle the error (e.g., display an error message)
        $_SESSION["showAlert4"] = true;
        header("Location: ../../create_reg.php");
    }
}
?>
