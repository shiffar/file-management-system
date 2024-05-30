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
        if (isset($_SESSION['user_id'])) {
            // User is logged in, retrieve the user ID
            $user_id = $_SESSION['user_id'];
            $company_id = $_GET['company_id'];
            $document_type_id = $_GET['document_type_id'];

            // Fetch document type names for the user's companies
            $query = "SELECT * FROM document_names WHERE user_id = '$user_id' AND company_id='$company_id' AND document_type_id='$document_type_id'";
            $result = mysqli_query($con, $query);

            // Check if any results were returned
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $document_name = $row['d_name'];
                    $document_name_id = $row['dn_id'];
                    // Generate the HTML code for each company
                    echo '<a href="comp_reg.php?user_id=' . $user_id . '&company_id=' . $company_id . '&document_type_id=' . $document_type_id .'&document_name_id=' . $document_name_id .'" class="content-boxed" style="background-color: #8a1739;">';
                    echo '    <div class="content bottom-0">';
                    echo '        <h1 class="bolder bottom-0 text-center uppercase" style="color:white;">' . $document_name . '</h1>';
                    echo '        <p class="under-heading color-highlight font-12 bottom-10"></p>';
                    echo '        <p> </p>';
                    echo '    </div>';
                    echo '</a>';
                }
            } else {
                //echo "No document name found for the user's companies.";
            }
        } else {
            echo "Please log in.";
        }
        ?>

        
        
    </div>

    <div id="circle-button" class="fab fab-circle button button-round-huge shadow-large" style="background-color: #8a1739;">
        <a data-menu="menu-signup" href="#"><i class="fas fa-plus" style="color: white;"></i></a>
    </div>
    <?php
            $document_type_id = $_GET['document_type_id'];
            include "in-connection.php";
            $query = "SELECT dt_name FROM document_types WHERE dt_id = '$document_type_id'";
            $result = mysqli_query($con, $query); // Assuming you have a valid database connection

            // Fetch the data and populate the menu
            $data = mysqli_fetch_assoc($result);
        ?>
        
    <div id="menu-signup" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="200" data-menu-effect="menu-over">
        <div class="content">
            <h1 class="uppercase ultrabold top-20">Add <?php echo $data['dt_name']; ?></h1>
            <p class="font-11 under-heading bottom-20"></p>
 
            <form id="document_name" action="../function/document-name/create.php?dt_name=<?php echo $data['dt_name']; ?>&company_id=<?php echo $_GET['company_id']; ?>&document_type_id=<?php echo $_GET['document_type_id']; ?>" method="POST">

                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span><?php echo ($data['dt_name'] === 'employee details') ? 'Enter Employee Name' : 'Enter Document Name'; ?></span>
                    <input type="text" name="document_name" placeholder="Enter <?php echo ($data['dt_name'] === 'employee details') ? 'Employee Name' : $data['dt_name']; ?>">
                </div>

                <?php if ($data['dt_name'] === 'employee details'): ?>
                    <!-- Additional fields for 'employee details' -->
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter Passport No</span>
                        <input type="text" name="passport_no" placeholder="Enter Passport_No">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter Mobile No</span>
                        <input type="text" name="mobile" placeholder="Enter Mobile No">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter Nationality</span>
                        <input type="text" name="nationality" placeholder="Enter Nationality">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter QID No</span>
                        <input type="text" name="qid" placeholder="Enter QID No">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter QID Expiry Date</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <input type="date" name="qid_exp_dte" placeholder="Enter QID Expiry Date">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter Basic Salary</span>
                        <input type="text" name="basic_salary" placeholder="Enter Basic Salary">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter Allowance</span>
                        <input type="text" name="allowance" placeholder="Enter Allowance">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter Fixed OT</span>
                        <input type="text" name="fixed_ot" placeholder="Enter Fixed OT">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter Date of First Joining</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <input type="date" name="join_date" placeholder="Enter Date of First Joining">
                    </div>
                    <input type="checkbox" name="date_last_vacation_not_set" class=" bottom-30"> Include last vaccation date
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter Date of Last Vacation</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <input type="date" name="date_last vacation" placeholder="Enter Date of Last Vacation">
                    </div>
                    <input type="checkbox" name="rejoining_date_not_set" class=" bottom-30"> Include re-joining date
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Enter Date of Re Joining</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <input type="date" name="rejoining_date" placeholder="Enter Date of Re Joining">
                    </div>
                    <!-- Add more fields for 'employee details' as needed -->
                <?php endif; ?>
                
                <div class="clear"></div>
                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('document_name').submit();">Add</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var dtName = "<?php echo $data['dt_name']; ?>";
        var menuHeight = (dtName === 'employee details') ? 500 : 200;
        $('#menu-signup').attr('data-menu-height', menuHeight);
    });
</script>
<?php include '../user-layouts/script.php';?>

</body>
