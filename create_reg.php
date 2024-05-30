<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php include 'user-layouts/login-layout/login-head.php';?>
    <style>
        .logo {
            display: block;
            margin: 0 auto;
            width: 120px; /* zsAdjust the width as needed */
            height: auto; /* Adjust the height as needed */
            margin-bottom: 50px; /* Increase the margin at the bottom for a bigger gap */
        }
        
        .content-boxed {
            background-color: transparent;
            color: white;
        }
        
        .content-boxed .input-icon {
            color: white;
        }
        
        .input-style-1 input[type="name"],
        .input-style-1 input[type="password"] {
            background-color: white;
            color: #1b1d21;
        }
        
        .button {
            background-color: rgba(255, 255, 0, 0.5);
            border-color: transparent;
            color: white;
        }
        .content {
            margin-top: 30px; /* Increase the margin at the top for a bigger gap */
            color: white;
        }
        .content a {
            color: white; /* Set the text color to white for all links within .content */
        }
        
    </style>
</head>

    
<body>
        
<div id="page">
        
    <div id="page-preloader">
        <div class="loader-main"><div class="preload-spinner border-highlight"></div></div>
    </div>

    <div class="page-content">   

        <div class="cover-wrapper cover-no-buttons">
            <div data-height="cover" class="caption bottom-0">
                <div class="caption-center">
                    <form id="create-user" action="function/user/create.php" method="POST" enctype="multipart/form-data">
                        <div class="left-50 right-50">
                            <span class="content">

                                <?php

                                    // Check if the showAlert flag is set
                                    if (isset($_SESSION["showAlert"]) && $_SESSION["showAlert"]) {
                                        echo '<div class="shadow-large alert alert-small alert-round-medium bg-yellow1-dark">';
                                        echo '<i class="fa fa-exclamation-triangle"></i>';
                                        echo '<span>Password dosent match.</span>';
                                        echo '<i class="fa fa-times"></i>';
                                        echo '</div>';

                                        // Reset the showAlert flag
                                        $_SESSION["showAlert"] = false;
                                    }

                                    // Check if the showAlert flag is set
                                    if (isset($_SESSION["showAlert2"]) && $_SESSION["showAlert2"]) {
                                        echo '<div class="shadow-large alert alert-small alert-round-medium bg-yellow1-dark">';
                                        echo '<i class="fa fa-exclamation-triangle"></i>';
                                        echo '<span>User name already created.</span>';
                                        echo '<i class="fa fa-times"></i>';
                                        echo '</div>';

                                        // Reset the showAlert flag
                                        $_SESSION["showAlert2"] = false;
                                    }

                                    if (isset($_SESSION["showAlert4"]) && $_SESSION["showAlert4"]) {
                                        echo '<div class="shadow-large alert alert-small alert-round-medium bg-yellow1-dark">';
                                        echo '<i class="fa fa-exclamation-triangle"></i>';
                                        echo '<span>File upload failed!</span>';
                                        echo '<i class="fa fa-times"></i>';
                                        echo '</div>';

                                        // Reset the showAlert flag
                                        $_SESSION["showAlert4"] = false;
                                    }
                                ?>

                            </span>
                            <span class="center-text"><img src="user-assets/images/logo.png" alt="Logo" style="width:120px; height:auto;"></span>
                            <div class="divider top-50"></div> 
                            <div id="registration-message"></div>
                            <div class="input-style has-icon input-style-2 input-required">
                                <i class="input-icon fa fa-user font-11"></i>
                                <em>(required)</em>
                                <input type="text" placeholder="Username" name="username" required>
                            </div>        
                            <div class="input-style has-icon input-style-2 input-required">
                                <i class="input-icon fa fa-lock font-11"></i>
                                <em>(required)</em>
                                <input type="password" placeholder="Choose a Password" name="password" required>
                            </div>          
                            <div class="input-style has-icon input-style-2 input-required">
                                <i class="input-icon fa fa-lock font-11"></i>
                                <em>(required)</em>
                                <input type="password" placeholder="Confirm your Password" name="confirm_password" required>
                            </div>
                            <div class="input-style has-icon input-style-2 input-required">
                                <i class="input-icon fa fa-image font-11"></i>
                                <em>(required)</em>
                                <input type="file" class="form-control-file" id="profile_image" name="profile_image" required>
                            </div>     
                            <a href="#" class="button button-full button-m shadow-large button-round-small top-30 bottom-0" style="background-color: rgba(255, 255, 0, 0.5); border-color: transparent;" onclick="event.preventDefault(); document.getElementById('create-user').submit();">CREATE ACCOUNT</a>
                            <p class="color-white opacity-100 text-center font-15 top-30">Already Registered? <a href="index.php" class="color-white opacity-100">Sign In here</a></p>
                        </div>
                    </form>
                </div>
            </div>   
            <div class="caption-overlay opacity-100"></div>
            <div class="caption-bg" style="background-image:url(user-assets/images/background.jpg)"></div>
        </div>


            
    </div>
</div>
                
    </div>
    <!-- Page Content Class Ends Here-->

</div>


<?php include 'user-layouts/login-layout/login-script.php';?>
</body>
