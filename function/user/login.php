<?php
session_start(); // Add this line to start the session

include "../../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate and sanitize the input
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    // Check if the username and password match
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['u_id'];
        $un = $row['username'];
        $profile_image = $row['profile_image'];
        $status = $row['user_status']; // Assuming the user status is stored in a column called 'status'

        if ($status == "active") {
            // Username and password are correct, proceed with login
            $_SESSION['user_id'] = $user_id;
            $_SESSION["un"] = $un;
            $_SESSION['profile_image'] = $profile_image;
            // Redirect to the desired page
            header("Location: ../../user-pages/home.php");
            exit();
        } else {
            // User is inactive, show the alert
            $_SESSION["showAlert2"] = true;
            // Redirect back to the login page
            header("Location: ../../index.php");
            exit();
        }
    } else {
        // Username or password error, show the alert
        $_SESSION["showAlert"] = true;
        // Redirect back to the login page
        header("Location: ../../index.php");
        exit();
    }
}

// Close the database connection
mysqli_close($con);
?>
