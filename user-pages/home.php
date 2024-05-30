<?php include "in-connection.php";?>
<!DOCTYPE HTML>
<html lang="en">
<head>

    <?php include '../user-layouts/head.php';?>

</head>
    
<body class="theme-light" data-background="none" data-highlight="red2">
        
<div id="page">
        
    <div id="page-preloader">
        <div class="loader-main"><div class="preload-spinner border-highlight"></div></div>
    </div>
    <?php include '../user-layouts/header.php';?>
    <?php include '../user-layouts/footer.php';?>
    
    
	
        
    <div class="page-content header-clear">   
        
        <div data-height="vh" class="caption">
        </div>  
        
        
        <?php
        // Assuming you have already established a database connection
        // $con = mysqli_connect("localhost", "username", "password", "database");

        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            // User is logged in, retrieve the user ID
            $user_id = $_SESSION['user_id'];

            // Fetch user data including company name and ID
            $query = "SELECT users.u_id AS user_id, users.username, companies.c_id AS company_id, companies.c_name AS company_name
                    FROM users
                    INNER JOIN companies ON users.u_id = companies.created_by
                    WHERE companies.created_by = '$user_id'";
            $result = mysqli_query($con, $query);

            // Check if any results were returned
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['companies'] = array(); // Initialize the companies array

                while ($row = mysqli_fetch_assoc($result)) {
                    $company_name = $row['company_name'];
                    $company_id = $row['company_id'];

                    $_SESSION['companies'][] = array(
                        'company_id' => $company_id,
                        'company_name' => $company_name
                    );

                    // Generate the HTML code for each company
                    echo '<a href="doc_type.php?user_id=' . $user_id . '&company_id=' . $company_id . '" class="content-boxed" style="background-color: #8a1739;">';
                    echo '    <div class="content bottom-0">';
                    echo '        <h1 class="bolder bottom-0 text-center uppercase" style="color:white;">' . $company_name . '</h1>';
                    echo '        <p class="under-heading color-highlight font-12 bottom-10"></p>';
                    echo '        <p> </p>';
                    echo '    </div>';
                    echo '</a>';
                }
            } else {
                //echo "No company found.";
            }
        } else {
            echo "Please log in.";
        }
    ?>


    </div>

    <div id="circle-button" class="fab fab-circle button button-round-huge shadow-large" style="background-color: #8a1739;">
        <a data-menu="menu-signup" href="#"><i class="fas fa-plus" style="color: white;"></i></a>
    </div>

            
    <div id="menu-signup" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="200" data-menu-effect="menu-over">
        <div class="content">
            <h1 class="uppercase ultrabold top-20">Add Company Name</h1>
            <p class="font-11 under-heading bottom-20"></p>
            <form id="home" action="../function/company/create.php" method="POST">
                <div class="input-style has-icon input-style-1 input-required">
                    <span>Company Name</span>
                    <input type="text" name="company_name" placeholder="Enter company name">
                </div>
                <div class="clear"></div>
                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('home').submit();">Add</a>
            </form>
        </div>
    </div>


    <!-- Page Content Class Ends Here-->

    <!--Menu Settings-->
    <div id="menu-settings" class="menu menu-box-bottom menu-box-detached round-large" data-menu-height="310" data-menu-effect="menu-over">
        <div class="content bottom-0">
            <div class="menu-title"><h1>Settings</h1><p class="color-highlight">Flexible and Easy to Use</p><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
            <div class="divider bottom-20"></div>
            <div class="toggle-with-icon">
                <i class="toggle-icon round-tiny fa fa-moon bg-red2-dark color-white"></i>
                <a href="#" class="toggle-switch toggle-ios toggle-off" 
                   data-toggle-theme
                   data-toggle-height="27"
                   data-toggle-width="50"
                   data-toggle-content="toggle-content-1"
                   data-toggle-checkbox="toggle-checkbox-1"
                   data-bg-on="bg-green1-dark" 
                   data-bg-off="">
                    <span class="color-theme regularbold font-13">Dark Mode</span>
                    <strong></strong>
                    <u></u>
                </a>    
            </div>     
            <div class="divider top-25 bottom-0"></div>
            <div class="link-list link-list-2 link-list-long-border">
                <a href="#" data-menu="menu-highlights">
                    <i class="fa fa-tint bg-green1-dark color-white round-tiny"></i>
                    <span>Page Highlight</span>
                    <strong>16 Color Highlights Included</strong>
                    <em class="bg-highlight">HOT</em>
                </a>    
                <a href="#" data-menu="menu-backgrounds" class="no-border">
                    <i class="fa fa-brush bg-blue2-dark color-white round-tiny"></i>
                    <span>Page Background</span>
                    <strong>10 Page Gradients Included</strong>
                    <em class="bg-highlight">NEW</em>
                </a>      
            </div>
        </div> 
        
    </div>    
    <!--Menu Settings Highlights-->
    <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached round-large" data-menu-height="380" data-menu-effect="menu-over">
    
        <?php include '../user-layouts/manu_setting_high.php';?>
    
    </div>    
    <!-- Menu Settings Backgrounds-->
    
    <div id="menu-backgrounds" class="menu menu-box-bottom menu-box-detached round-large" data-menu-height="310" data-menu-effect="menu-over">
         
        <?php include '../user-layouts/manu_back.php';?>
    
    </div>
    <!-- Menu Share-->
    
    <div class="menu-hider"></div>
</div>


<?php include '../user-layouts/script.php';?>

</body>
