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
        date_default_timezone_set("Asia/Colombo");
// Get the current date
$currentDate = date('Y-m-d');

// Retrieve the user ID from the session or replace it with the desired user ID
$userID = $_SESSION['user_id'] ?? 0; // Replace 0 with the desired user ID

// Prepare and execute the SELECT queries with conditions for different notification highlights
$expireWarningsQuery = "SELECT * FROM company_registrations WHERE expire_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY) AND user_id = $userID";
$todayExpiresQuery = "SELECT * FROM company_registrations WHERE expire_date = '$currentDate' AND user_id = $userID";
$expiredItemsQuery = "SELECT * FROM company_registrations WHERE expire_date < '$currentDate' AND user_id = $userID";

$expireWarningsResult = mysqli_query($con, $expireWarningsQuery);
$todayExpiresResult = mysqli_query($con, $todayExpiresQuery);
$expiredItemsResult = mysqli_query($con, $expiredItemsQuery);

// Function to get the row count for a given result set
function getRowCount($result)
{
    return ($result) ? mysqli_num_rows($result) : 0;
}

?>

<div class="content-boxed">
    <div class="content accordion-style-1 accordion-round-medium">
        <h3 class="bolder text-center">Notification Alerts</h3>
        <p> </p>

        <a href="#" data-accordion="accordion-content-1" class="accordion-toggle-first" style="background-color: #8a1739;">
            <i class="accordion-icon-left fa fa-bell"></i>
            Expire date warnings : <?php echo getRowCount($expireWarningsResult);?>
            <i class="accordion-icon-right fa fa-angle-down"></i>
        </a>
        <div id="accordion-content-1" class="accordion-content bottom-10">
            <?php
            // Check if there are any expire date warnings=
                if (getRowCount($expireWarningsResult) > 0) {
                    // Start the table
                    echo '<div class="table-scroll">';
                    echo '<table class="table-borders-dark">';
                    echo '<tr>';
                    echo '<th>Registration Name</th>';
                    echo '<th>Registration No</th>';
                    echo '<th>Expire Date</th>';
                    echo '<th>Action</th>'; // New column for the button
                    echo '</tr>';

                    // Fetch rows from the result set
                    while ($row = mysqli_fetch_assoc($expireWarningsResult)) {
                        // Access individual columns using the column name
                        $id = $row['id'];
                        $registrationName = $row['registration_name'];
                        $registrationNo = $row['registration_no'];
                        $expireDate = $row['expire_date'];
                        $user_id = $row['user_id'];
                        $company_id = $row['company_id'];
                        $document_type_id = $row['document_type_id'];
                        $document_name_id = $row['document_name_id'];
                        // and so on...

                        // Output the row data
                        echo '<tr>';
                        echo '<td>' . $registrationName . '</td>';
                        echo '<td>' . $registrationNo . '</td>';
                        echo '<td>' . $expireDate . '</td>';
                        echo '<td><a href="comp_reg.php?user_id=' . $user_id . '&company_id=' . $company_id . '&document_type_id=' . $document_type_id . '&document_name_id=' . $document_name_id . '&expireDate=' . $expireDate . '"><button><i class="fa fa-eye"></i></button></a></td>'; // Button with eye icon and parameters
                        echo '</tr>';
                    }

                    // Close the table
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo 'No expire date warnings.';
                }

            ?>
        </div>

        <a data-accordion="accordion-content-2" href="#" style="background-color: #8a1739;">
            <i class="accordion-icon-left fa fa-bell"></i>
            Today expires : <?php echo getRowCount($todayExpiresResult);?>
            <i class="accordion-icon-right fa fa-angle-down"></i>
        </a>
        <div id="accordion-content-2" class="accordion-content bottom-10">
            <?php
            // Check if there are any today's expires
            if (getRowCount($todayExpiresResult) > 0) {
                // Start the table
                echo '<div class="table-scroll">';
                echo '<table class="table-borders-dark">';
                echo '<tr>';
                echo '<th>Registration Name</th>';
                echo '<th>Registration No</th>';
                echo '<th>Expire Date</th>';
                echo '<th>Action</th>';
                // Add more table headers for additional columns
                echo '</tr>';

                // Fetch rows from the result set
                while ($row = mysqli_fetch_assoc($todayExpiresResult)) {
                    // Access individual columns using the column name
                    $id = $row['id'];
                    $registrationName = $row['registration_name'];
                    $registrationNo = $row['registration_no'];
                    $expireDate = $row['expire_date'];
                    $user_id = $row['user_id'];
                    $company_id = $row['company_id'];
                    $document_type_id = $row['document_type_id'];
                    $document_name_id = $row['document_name_id'];
                    // and so on...

                    // Output the row data
                    echo '<tr>';
                    echo '<td>' . $registrationName . '</td>';
                    echo '<td>' . $registrationNo . '</td>';
                    echo '<td>' . $expireDate . '</td>';
                    echo '<td><a href="comp_reg.php?user_id=' . $user_id . '&company_id=' . $company_id . '&document_type_id=' . $document_type_id . '&document_name_id=' . $document_name_id . '&expireDate=' . $expireDate . '"><button><i class="fa fa-eye"></i></button></a></td>';
                    // Add more columns for additional data
                    echo '</tr>';
                }

                // Close the table
                echo '</table>';
                echo '</div>';
            } else {
                echo 'No today expires.';
            }
            ?>
        </div>

        <a data-accordion="accordion-content-3" href="#" class="accordion-toggle-last" style="background-color: #8a1739;">
            <i class="accordion-icon-left fa fa-bell"></i>
            Expired : <?php echo getRowCount($expiredItemsResult);?>
            <i class="accordion-icon-right fa fa-angle-down"></i>
        </a>
        <div id="accordion-content-3" class="accordion-content bottom-10">
            <?php
            // Check if there are any expired items
            if (getRowCount($expiredItemsResult) > 0) {
                // Start the table
                echo '<div class="table-scroll">';
                echo '<table class="table-borders-dark">';
                echo '<tr>';
                echo '<th>Registration Name</th>';
                echo '<th>Registration No</th>';
                echo '<th>Expire Date</th>';
                echo '<th>Action</th>';
                // Add more table headers for additional columns
                echo '</tr>';

                // Fetch rows from the result set
                while ($row = mysqli_fetch_assoc($expiredItemsResult)) {
                    // Access individual columns using the column name
                    $id = $row['id'];
                    $registrationName = $row['registration_name'];
                    $registrationNo = $row['registration_no'];
                    $expireDate = $row['expire_date'];
                    $user_id = $row['user_id'];
                    $company_id = $row['company_id'];
                    $document_type_id = $row['document_type_id'];
                    $document_name_id = $row['document_name_id'];
                    // and so on...

                    // Output the row data
                    echo '<tr>';
                    echo '<td>' . $registrationName . '</td>';
                    echo '<td>' . $registrationNo . '</td>';
                    echo '<td>' . $expireDate . '</td>';
                    echo '<td><a href="comp_reg.php?user_id=' . $user_id . '&company_id=' . $company_id . '&document_type_id=' . $document_type_id . '&document_name_id=' . $document_name_id . '&expireDate=' . $expireDate . '"><button><i class="fa fa-eye"></i></button></a></td>';
                    // Add more columns for additional data
                    echo '</tr>';
                }

                // Close the table
                echo '</table>';
                echo '</div>';
            } else {
                echo 'No expired items.';
            }
            ?>
        </div>
    </div>
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
