<?php 
    include "in-connection.php";
    $company_id = $_GET['company_id'];
?>
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
        
        <div data-height="vh" class="caption"></div>  
        <div class="content">
        <?php
            // Check if the showLegalAlert flag is set
            if (isset($_SESSION['showLegalAlert']) && $_SESSION['showLegalAlert']) {
                echo '<div class="shadow-large alert alert-small alert-round-medium bg-yellow1-dark">';
                echo '<i class="fa fa-exclamation-triangle"></i>';
                echo '<span>Document type Legal Details already exists.</span>';
                echo '<i class="fa fa-times"></i>';
                echo '</div>';

                // Reset the showLegalAlert flag
                $_SESSION['showLegalAlert'] = false;
            }

            // Check if the showEmployeeAlert flag is set
            if (isset($_SESSION['showEmployeeAlert']) && $_SESSION['showEmployeeAlert']) {
                echo '<div class="shadow-large alert alert-small alert-round-medium bg-yellow1-dark">';
                echo '<i class="fa fa-exclamation-triangle"></i>';
                echo '<span>Document type Employee Details already exists.</span>';
                echo '<i class="fa fa-times"></i>';
                echo '</div>';

                // Reset the showEmployeeAlert flag
                $_SESSION['showEmployeeAlert'] = false;
            }

            // Check if the showVehiclesAlert flag is set
            if (isset($_SESSION['showVehiclesAlert']) && $_SESSION['showVehiclesAlert']) {
                echo '<div class="shadow-large alert alert-small alert-round-medium bg-yellow1-dark">';
                echo '<i class="fa fa-exclamation-triangle"></i>';
                echo '<span>Document type Vehicles already exists.</span>';
                echo '<i class="fa fa-times"></i>';
                echo '</div>';

                // Reset the showVehiclesAlert flag
                $_SESSION['showVehiclesAlert'] = false;
            }

            // Rest of your code in doc_type.php
            // ...
            ?>

        </div>
        
       
        <?php
        if (isset($_SESSION['user_id'])) {
            // User is logged in, retrieve the user ID
            $user_id = $_SESSION['user_id'];
            $company_id = $_GET['company_id'];

            // Fetch document type names for the user's companies
            $query = "SELECT * FROM document_types WHERE user_id = '$user_id' AND company_id='$company_id'";
            $result = mysqli_query($con, $query);

            // Check if any results were returned
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $document_type_name = $row['dt_name'];
                    $document_type_id = $row['dt_id'];
                    // Generate the HTML code for each company
                    echo '<a href="doc_name.php?user_id=' . $user_id . '&company_id=' . $company_id . '&document_type_id=' . $document_type_id .'" class="content-boxed" style="background-color: #8a1739;">';
                    echo '    <div class="content bottom-0">';
                    echo '        <h1 class="bolder bottom-0 text-center uppercase" style="color:white;">' . $document_type_name . '</h1>';
                    echo '        <p class="under-heading color-highlight font-12 bottom-10"></p>';
                    echo '        <p> </p>';
                    echo '    </div>';
                    echo '</a>';
                }
            } else {
                //echo "No document types found for the user's companies.";
            }
        } else {
            echo "Please log in.";
        }
        ?>
        
        <a href="employee.php?company_id=<?php echo $company_id; ?>" class="content-boxed" style="background-color: #8a1739;">
            <div class="content bottom-0">
                <h1 class="bolder bottom-0 text-center uppercase" style="color:white;">Employee & salary details</h1>
                <p class="under-heading color-highlight font-12 bottom-10"></p>
                <p> </p>
            </div>
        </a>
    </div>
    
        
        
        
</div>
    
    <div id="circle-button" class="fab fab-circle button button-round-huge shadow-large" style="background-color: #8a1739;">
        <a data-menu="menu-signup" href="#"><i class="fas fa-plus" style="color: white;"></i></a>
    </div>

    <div id="menu-signup" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="200" data-menu-effect="menu-over">
    <div class="content">
        <h1 class="uppercase ultrabold top-20">Add Document Type</h1>
        <p class="font-11 under-heading bottom-20"></p>
        <form id="document_type" action="../function/document-type/create.php?company_id=<?php echo $_GET['company_id']; ?>" method="POST">
            <!--<div class="input-style input-style-1 input-required">
                <span>Select a Value</span>
                <em><i class="fa fa-angle-down"></i></em>
                <select id="document-type-select" name="document_type_select">
                    <option value="default" disabled selected>Select Document Type</option>
                    <option value="employee">Employee</option>
                    <option value="other">Other</option>
                </select>
            </div>-->
            <div class="input-style has-icon input-style-1 input-required" id="document-details">
                <span>Enter Document Type</span>
                <input type="text" name="document_type" placeholder="Enter document type">
            </div>
            <div class="clear"></div>
            <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('document_type').submit();">Add</a>
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
<!--<script>
    // Get the necessary elements
    var selectElement = document.getElementById('document-type-select');
    var textBoxElement = document.getElementById('document-details');

    // Hide the text box initially
    textBoxElement.style.display = 'none';

    // Add an event listener to the select element
    selectElement.addEventListener('change', function() {
        if (selectElement.value === 'other') {
            // Show the text box if 'other' option is selected
            textBoxElement.style.display = 'block';
        } else {
            // Hide the text box for other options
            textBoxElement.style.display = 'none';
        }
    });
</script>-->

</body>
