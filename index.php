<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php include 'user-layouts/login-layout/login-head.php';?>
    <style>
        .logo {
            display: block;
            margin: 0 auto;
            width: 120px; /* Adjust the width as needed */
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
            width: 100%;
            display: block;
            background-color: white;
            color: #1b1d21;
        }
        
        .button {
            background-color: rgba(255, 255, 0, 0.5);
            border-color: transparent;
            color: white;
        }
        .content {
            margin-top: 100px; /* Increase the margin at the top for a bigger gap */
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
                    <div class="left-50 right-50">
                    <span class="content">
            <!-- Your HTML login form -->

                <?php

                // Check if the showAlert flag is set
                if (isset($_SESSION["showAlert"]) && $_SESSION["showAlert"]) {
                    echo '<div class="shadow-large alert alert-small alert-round-medium bg-yellow1-dark">';
                    echo '<i class="fa fa-exclamation-triangle"></i>';
                    echo '<span>Username or password error.</span>';
                    echo '<i class="fa fa-times"></i>';
                    echo '</div>';

                    // Reset the showAlert flag
                    $_SESSION["showAlert"] = false;
                }

                if (isset($_SESSION["showAlert2"]) && $_SESSION["showAlert2"]) {
                    echo '<div class="shadow-large alert alert-small alert-round-medium bg-yellow1-dark">';
                    echo '<i class="fa fa-exclamation-triangle"></i>';
                    echo '<span>Your account not activated.</span>';
                    echo '<i class="fa fa-times"></i>';
                    echo '</div>';

                    // Reset the showAlert flag
                    $_SESSION["showAlert2"] = false;
                }

                // Rest of your code in login.php
                // ...

                // Check if the showAlert flag is set
                if (isset($_SESSION["showAlert3"]) && $_SESSION["showAlert3"]) {
                    echo '<div class="shadow-large alert alert-small alert-round-medium bg-green1-dark">';
                    echo '<i class="fa fa-check"></i>';
                    echo '<span>Account create successfully.</span>';
                    echo '<i class="fa fa-times"></i>';
                    echo '</div>';

                    // Reset the showAlert flag
                    $_SESSION["showAlert3"] = false;
                }
                ?>

        </span>
                        <span class="center-text"><img src="user-assets/images/logo.png" alt="Logo" style="width:120px; height:auto;"></span>
                        <div class="divider top-50"></div> 
                        <div id="login-message"></div>
                        <form id="login" method="POST" action="function/user/login.php">
                            <div class="input-style input-style-2 has-icon input-required">
                                <i class="input-icon fa fa-user"></i>
                                <em>(required)</em>
                                <input type="text" name="username" id="username" placeholder="Username">
                            </div> 
                            <div class="input-style input-style-2 has-icon input-required">
                                <i class="input-icon fa fa-lock"></i>
                                <em>(required)</em>
                                <input type="password" name="password" id="password" placeholder="Password">
                            </div>  
                            <a href="#" class="button button-full button-m shadow-large button-round-small top-30 bottom-0" style="background-color: rgba(255, 255, 0, 0.5); border-color: transparent;" onclick="event.preventDefault(); document.getElementById('login').submit();">LOGIN</a>
                        </form>
                        <div class="divider top-10"></div>

                        <div class="divider top-10"></div> 
                        <div class="text-center">
                            <a href="create_reg.php" class="font-15 color-white opacity-100">Create Account</a>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="caption-overlay opacity-100"></div>
            <div class="caption-bg" style="background-image:url(user-assets/images/background.jpg)"></div>
        </div>
    </div>

    <div class="menu-hider"></div>
</div>

<?php include 'user-layouts/login-layout/login-script.php';?>
</body>
</html>



