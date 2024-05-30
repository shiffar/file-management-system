<?php
$profile_image = $_SESSION['profile_image'];
$un = $_SESSION['un'];

// Determine if the current page is home.php
$isHome = (basename($_SERVER['PHP_SELF']) == 'home.php');

$company_name = '';
$selected_company_id = '';

if (isset($_GET['company_id'])) {
    // Get the selected company ID from the URL
    $selected_company_id = $_GET['company_id'];

    // Search for the selected company in the stored companies array
    foreach ($_SESSION['companies'] as $company) {
        if ($company['company_id'] == $selected_company_id) {
            $company_name = $company['company_name'];
            break;
        }
    }
}

// If the company name is not set, fallback to the first company in the array or use the company name from the session
if (empty($company_name)) {
    if (!empty($selected_company_id)) {
        // Company ID is present in the URL, but matching company not found in the session
        // Handle the error condition or fallback to default behavior
    } else if (!empty($_SESSION['companies'])) {
        // Use the company ID from the session
        $selected_company_id = $_SESSION['companies'][0]['company_id'];
        $company_name = $_SESSION['companies'][0]['company_name'];
    }
}

if ($isHome || basename($_SERVER['PHP_SELF']) == 'about.php' || basename($_SERVER['PHP_SELF']) == 'contact-us.php' || basename($_SERVER['PHP_SELF']) == 'notification.php') {
    ?>
    <div class="header header-fixed header-logo-center">
        <a href="about.php">
            <img src="<?php echo $url;?>function/user/uploads/<?php echo $profile_image; ?>" class="circle-image2 profile-image" style="margin-left: 10px;" onerror="this.onerror=null; this.src='<?php echo $url;?>user-assets/images/no-pi.png';">
        </a>
        <div class="header-title">Q-MANDOOP</div>
    </div>
    <?php
} else {
    ?>
    <div class="header header-fixed header-logo-center">
        <div class="header-left">
            <a href="<?php
            if (basename($_SERVER['PHP_SELF']) == 'doc_type.php') {
                echo 'home.php';
            } else if (basename($_SERVER['PHP_SELF']) == 'employee.php') {
                $company_id = $_GET['company_id'];
                echo 'doc_type.php?company_id=' . $company_id;
            }
            else if (basename($_SERVER['PHP_SELF']) == 'doc_name.php') {
                $company_id = $_GET['company_id'];
                echo 'doc_type.php?company_id=' . $company_id;
            } else if (basename($_SERVER['PHP_SELF']) == 'comp_reg.php') {
                $company_id = $_GET['company_id'];
                $document_type_id = $_GET['document_type_id'];
                echo 'doc_name.php?company_id=' . $company_id . '&document_type_id=' . $document_type_id;
            } else if (basename($_SERVER['PHP_SELF']) == 'view.php') {
                $company_id = $_GET['company_id'];
                $document_type_id = $_GET['document_type_id'];
                $document_name_id = $_GET['document_name_id'];
                echo 'comp_reg.php?company_id=' . $company_id . '&document_type_id=' . $document_type_id . '&document_name_id=' . $document_name_id;
            }
            else if (basename($_SERVER['PHP_SELF']) == 'salary.php') {
                $company_id = $_GET['company_id'];
                $document_type_id = $_GET['document_type_id'];
                $document_name_id = $_GET['document_name_id'];
                echo 'comp_reg.php?company_id=' . $company_id . '&document_type_id=' . $document_type_id . '&document_name_id=' . $document_name_id;
            }
            else if (basename($_SERVER['PHP_SELF']) == 'edit_salary.php') {
                $company_id = $_GET['company_id'];
                $document_type_id = $_GET['document_type_id'];
                $document_name_id = $_GET['document_name_id'];
                echo '../../user-pages/salary.php?company_id=' . $company_id . '&document_type_id=' . $document_type_id . '&document_name_id=' . $document_name_id;
            }
            ?>" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="header-title"><?php echo $company_name; ?></div>
        <div class="header-right">
            <a href="about.php">
                <img src="<?php echo $url;?>/function/user/uploads/<?php echo $profile_image; ?>" class="circle-image2 profile-image" style="margin-left: 10px;" onerror="this.onerror=null; this.src='<?php echo $url;?>user-assets/images/no-pi.png';">
            </a>
        </div>
    </div>
<?php } ?>




