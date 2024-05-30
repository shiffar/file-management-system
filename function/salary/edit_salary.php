<!DOCTYPE HTML>
<html lang="en">
<head>

    <?php include '../../user-layouts/head.php';?>
    <style>
    .input-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .input-row .input-style {
        flex-basis: 48%;
    }
    #menu-saldtedit1 {
        overflow-y: auto;
        position: fixed;
    }
    #menu-saldtedit2 {
        overflow-y: auto;
        position: fixed;
    }
</style>

</head>
    
<body class="theme-light" data-background="none" data-highlight="red2">
        
<div id="page">
        
    <div id="page-preloader">
        <div class="loader-main"><div class="preload-spinner border-highlight"></div></div>
    </div>

    <?php include '../../user-layouts/header.php';?>
    <?php

        include "../../user-pages/in-connection.php";
        // Fetch user ID from session (replace 'user_id' with the session variable key)
        $userID = $_SESSION['user_id'];
        $profile_image = $_SESSION['profile_image'];

        // Determine if the current page is home.php
        $isHome = (basename($_SERVER['PHP_SELF']) == 'home.php');

        // Query to check if there are any notifications
        $notificationQuery = "
        SELECT 
            cr.expire_date
        FROM 
            company_registrations cr
        WHERE 
            cr.user_id = $userID
            AND (
                cr.expire_date <= DATE_ADD(CURRENT_DATE(), INTERVAL 5 DAY)
                OR cr.expire_date = CURRENT_DATE()
                OR cr.expire_date < CURRENT_DATE()
            )
        LIMIT 1;
        ";

        // Execute the query
        $notificationResult = mysqli_query($con, $notificationQuery);

        // Check if there are any notifications
        $hasNotification = (mysqli_num_rows($notificationResult) > 0);
        ?>


        <div id="footer-menu" class="footer-menu-4-icons footer-menu-style-2">
            <a href="<?php echo $url;?>user-pages/home.php" id="home-button"><i class="fa fa-home"></i><span class="font-13">HOME</span></a>
            <a href="<?php echo $url;?>user-pages/contact-us.php" id="contact-button"><i class="fas fa-address-book"></i><span class="font-13">CONTACT US</span></a>
            <a href="<?php echo $url;?>user-pages/about.php" id="about-button"><i class="fas fa-user"></i><span class="font-13">ABOUT</span></a>
            <?php if ($hasNotification) { ?>
                <a href="<?php echo $url;?>user-pages/notification.php" id="notification-button" style="color: #FF0000;"><i class="fas fa-bell"></i><span class="font-13">Notification</span></a>
            <?php } else { ?>
                <a href="<?php echo $url;?>user-pages/notification.php" id="notification-button"><i class="fas fa-bell"></i><span class="font-13">Notification</span></a>
            <?php } ?>
            <div class="clear"></div>
        </div>



    
	
        
    <div class="page-content header-clear">   
        
        <div data-height="vh" class="caption">
        </div>  

    
        <div class="content-boxed">
            <div class="content accordion-style-1 accordion-round-medium">
                    <h3 class="bolder">Edit Employee salary details <span><a data-menu="menu-confirm" href="#" style="position: absolute;right: 10px; top:-10px; font-size:20px;"><i class="fas fa-edit" style="color: #8a1739;"></i></a></span></h3>
                <p>
                    
                </p>
                          
            </div>      
                                        
        </div>
    
        
    </div>

    <div id="menu-confirm" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="200" data-menu-effect="menu-over">
        <h1 class="center-text uppercase ultrabold top-20">Select calculation type?</h1>
        <p class="boxed-text-large">
            <br>
        </p>
        <div class="content left-10 right-10">
            <div class="one-third">
                <a data-menu="menu-saldtedit1" href="#" class="button button-center-large button-s shadow-large button-round-small" style="left: 65%; width: 90%; background-color: #8a1739;">Basic</a>
            </div>
            <div class="one-third">
                <a data-menu="menu-saldtedit2" href="#" id="leaveSalaryButton" class="button button-center-large button-s shadow-large button-round-small" style="left: 65%; width: 90%; background-color: #8a1739;">Leave</a>
            </div>
            <div class="one-third last-column">
                <a data-menu="menu-saldtedit2" href="#" id="leaveShow" class="button button-center-large button-s shadow-large button-round-small" style="left: 65%; width: 90%; background-color: #8a1739;">Gratuity</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>  
    <?php
        include "../../user-pages/in-connection.php";
        $salary_id = $_GET['salary_id'];
        $query = "SELECT * FROM salary WHERE id = '$salary_id'";
        $result = mysqli_query($con, $query); // Assuming you have a valid database connection

        // Fetch the data and populate the menu
        $data = mysqli_fetch_assoc($result);
    ?>
    <div id="menu-saldtedit1" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="620" data-menu-effect="menu-over" style="position: fixed; max-height: 620px; overflow-y: auto;">
        <div class="content">
            <h2 class="uppercase ultrabold top-20">Edit salary details</h2>
            <p class="font-11 under-heading bottom-40"></p>
            <form id="salary_edit" action="salary-update.php?salary_id=<?php echo $data['id']; ?>&document_name_id=<?php echo $data['document_name_id_fk']; ?><?php if(isset($_GET['company_id'])) { echo '&company_id=' . $_GET['company_id']; } ?><?php if(isset($_GET['document_type_id'])) { echo '&document_type_id=' . $_GET['document_type_id']; } ?>&update=1" method="POST">
                
                <h4 class="bolder">Salary Structure & Total Salary / Month</h4> 
                <div class="divider bottom-40"></div>
                <?php
                    $document_name_id = $_GET['document_name_id'];
                    include "../../user-pages/in-connection.php";
                    $query2 = "SELECT * FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
                    $result2 = mysqli_query($con, $query2); // Assuming you have a valid database connection

                    // Fetch the data and populate the menu
                    $data2 = mysqli_fetch_assoc($result2);

                    // Determine the date for working period calculation
                    if (!empty($data2['rejoining_date'])) {
                        $workingDate = $data2['rejoining_date'];
                    } else {
                        $workingDate = $data2['join_date'];
                    }

                    // Calculate the working period
                    $joinDate = $data2['join_date'];
                    $currentDate = date('Y-m-d'); // Get the current date in 'Y-m-d' format
                    $workingPeriod = date_diff(date_create($workingDate), date_create($currentDate));
                    $years = $workingPeriod->y;
                    $months = $workingPeriod->m;
                    $days = $workingPeriod->d;
                ?>
                    <h4 class="bolder" style="display: inline;">Employee Working Period : </h4>
                    <h5 style="display: inline;"><span><?php echo ($data2['rejoining_date']) ? "Rejoining: $years, Months: $months, Days: $days" : "Years since Joining: $years, Months: $months, Days: $days"; ?></span></h5>
                    <div class="bottom-40"></div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Basic salary</span>
                        <input type="text" class="salary-input" name="basic_salary" id="basicSalaryInput" placeholder="basic salary" value="<?php echo $data['basic_salary']; ?>" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Basic allowance</span>
                        <input type="text" class="salary-input" name="basic_allowance" id="basicAllowanceInput" placeholder="allowance" value="<?php echo $data['basic_allowance']; ?>" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Fixed ot</span>
                        <input type="text" class="salary-input" name="fixed_ot" id="fixedOtInput" placeholder="fixed ot" value="<?php echo $data['fixed_ot']; ?>" required>
                    </div>
                </div>
                <h4 class="bolder">Payments due from company to Employee</h4> 
                <div class="divider bottom-40"></div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Salary deposit</span>
                    <em>(required)</em>
                    <input type="text" class="salary-input" name="salary_deposit" id="salaryDepositInput" placeholder="Enter deposit amount" value="<?php echo $data['salary_deposit']; ?>" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Air ticket</span>
                    <em>(required)</em>
                    <input type="text" id="airTicketInput" name="air_ticket" class="salary-input" placeholder="Enter air ticket expense" value="<?php echo $data['air_ticket']; ?>" required>
                </div>
                <h4 class="bolder">Payment Due from Employee to Company</h4> 
                <div class="divider bottom-40"></div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Salary advance</span>
                    <em>(required)</em>
                    <input type="text" class="salary-input" name="salary_advance" id="salaryAdvanceInput" placeholder="Enter salary advance" value="<?php echo $data['salary_advance']; ?>" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Loan</span>
                    <em>(required)</em>
                    <input type="text" id="loanInput" name="loan" class="expense-input" placeholder="Enter loan amount" value="<?php echo $data['loan']; ?>" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Telephone expense</span>
                    <em>(required)</em>
                    <input type="text" id="telephoneExpenseInput" name="telephone_expense" class="expense-input" placeholder="Enter telephone expense" value="<?php echo $data['telephone_expense']; ?>" required>
                </div>
                <h4 class="bolder">NET AMOUNT PAYABLE/RECEIVABLE</h4> 
                <div class="divider bottom-40"></div>                                
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Total salary</span>
                    <em>(required)</em>
                    <input type="text" id="totalSalary" name="total_salary" placeholder="Enter total salary" value="<?php echo $data['total_salary']; ?>" required>
                </div>
                <input type="checkbox" name="salary_status" value="paid" <?php echo ($data['salary_status'] === 'paid') ? 'checked' : ''; ?>> paid
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Created Date</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <input type="date" id="createdDateInput" name="created_date" placeholder="dd-mm-yyyy" value="<?php echo $data['created_at']; ?>" required>
                </div>
                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('salary_edit').submit();">Update</a>
            </form>
        </div>
    </div>

    <?php
        include "../../user-pages/in-connection.php";
        $salary_id = $_GET['salary_id'];
        $query = "SELECT * FROM salary WHERE id = '$salary_id'";
        $result = mysqli_query($con, $query); // Assuming you have a valid database connection

        // Fetch the data and populate the menu
        $data = mysqli_fetch_assoc($result);
    ?>
    <div id="menu-saldtedit2" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="620" data-menu-effect="menu-over" style="position: fixed; max-height: 620px; overflow-y: auto;">
        <div class="content">
            <h2 class="uppercase ultrabold top-20">Edit salary details</h2>
            <p class="font-11 under-heading bottom-40"></p>
            <form id="salary_edit2" action="salary-update.php?salary_id=<?php echo $data['id']; ?>&document_name_id=<?php echo $data['document_name_id_fk']; ?><?php if(isset($_GET['company_id'])) { echo '&company_id=' . $_GET['company_id']; } ?><?php if(isset($_GET['document_type_id'])) { echo '&document_type_id=' . $_GET['document_type_id']; } ?>&update=2" method="POST">
                
                <h4 class="bolder">Salary Structure & Total Salary / Month</h4> 
                <div class="divider bottom-40"></div>
                <?php
                    $document_name_id = $_GET['document_name_id'];
                    include "../../user-pages/in-connection.php";
                    $query2 = "SELECT * FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
                    $result2 = mysqli_query($con, $query2); // Assuming you have a valid database connection

                    // Fetch the data and populate the menu
                    $data2 = mysqli_fetch_assoc($result2);

                    // Determine the date for working period calculation
                    if (!empty($data2['rejoining_date'])) {
                        $workingDate = $data2['rejoining_date'];
                    } else {
                        $workingDate = $data2['join_date'];
                    }

                    // Calculate the working period
                    $joinDate = $data2['join_date'];
                    $currentDate = date('Y-m-d'); // Get the current date in 'Y-m-d' format
                    $workingPeriod = date_diff(date_create($workingDate), date_create($currentDate));
                    $years = $workingPeriod->y;
                    $months = $workingPeriod->m;
                    $days = $workingPeriod->d;
                ?>
                    <h4 class="bolder" style="display: inline;">Employee Working Period : </h4>
                    <h5 style="display: inline;"><span><?php echo ($data2['rejoining_date']) ? "Rejoining: $years, Months: $months, Days: $days" : "Years since Joining: $years, Months: $months, Days: $days"; ?></span></h5>
                    <div class="bottom-40"></div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Basic salary</span>
                        <input type="text" class="esalary-input" name="ebasic_salary" id="ebasicSalaryInput" placeholder="basic salary" value="<?php echo $data['basic_salary']; ?>" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Basic allowance</span>
                        <input type="text" class="esalary-input" name="ebasic_allowance" id="ebasicAllowanceInput" placeholder="allowance" value="<?php echo $data['basic_allowance']; ?>" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Fixed ot</span>
                        <input type="text" class="esalary-input" name="efixed_ot" id="efixedOtInput" placeholder="fixed ot" value="<?php echo $data['fixed_ot']; ?>" required>
                    </div>
                </div>
                <h5 class="bolder">Salary</h5> 
                <div class="divider bottom-40"></div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Days</span>
                        <input type="text" class="esalary-input" name="edays_count" id="edaysCountInput" placeholder="days" required value="<?php echo $data['days_count']; ?>">
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Amount</span>
                        <input type="text" class="esalary-input" name="edays_amount" id="edaysAmount" placeholder="amount" required value="<?php echo $data['days_amount']; ?>">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Over time</span>
                        <input type="text" class="esalary-input" name="eot" id="eotInput" placeholder="over time" required value="<?php echo $data['ot']; ?>">
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Amount</span>
                        <input type="text" class="esalary-input" name="eot_amount" id="eotAmount" placeholder="amount" required value="<?php echo $data['ot_amount']; ?>">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Hours</span>
                        <input type="text" class="esalary-input" name="ehours" id="ehoursInput" placeholder="hours" required value="<?php echo $data['hours']; ?>">
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Amount</span>
                        <input type="text" class="esalary-input" name="ehours_amount" id="ehoursAmount" placeholder="amount" required value="<?php echo $data['hours_amount']; ?>">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Bonus</span>
                        <input type="text" class="esalary-input" name="ebonus" id="ebonusInput" placeholder="bonus" required value="<?php echo $data['bonus']; ?>">
                    </div>
                </div>
                <h4 class="bolder">Payments due from company to Employee</h4> 
                <div class="divider bottom-40"></div>
                <?php
                $document_name_id = $_GET['document_name_id'];
                include "../../user-pages/in-connection.php";
                $query3 = "SELECT * FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
                $result3 = mysqli_query($con, $query3); // Assuming you have a valid database connection

                // Fetch the data and populate the menu
                $data3 = mysqli_fetch_assoc($result3);

                // Determine the date for leave salary calculation
                if (!empty($data3['rejoining_date'])) {
                    $leaveSalaryDate = $data3['rejoining_date'];
                } else {
                    $leaveSalaryDate = $data3['join_date'];
                }

                // Determine the date for gratuity calculation
                $gratuityDate = $data3['join_date'];

                // Calculate the working period for leave salary
                $joinDate = $data3['join_date'];
                $currentDate = date('Y-m-d'); // Get the current date in 'Y-m-d' format
                $leaveSalaryPeriod = date_diff(date_create($leaveSalaryDate), date_create($currentDate));
                $leaveSalaryYears = $leaveSalaryPeriod->y;
                $leaveSalaryMonths = $leaveSalaryPeriod->m;
                $leaveSalaryDays = $leaveSalaryPeriod->d;

                // Calculate the working period for gratuity
                $gratuityPeriod = date_diff(date_create($gratuityDate), date_create($currentDate));
                $gratuityYears = $gratuityPeriod->y;
                $gratuityMonths = $gratuityPeriod->m;
                $gratuityDays = $gratuityPeriod->d;

                // Function to display the red-colored text
                function showRedText($text)
                {
                    return "<span style='color: red;'>$text</span>";
                }
                ?>

                <div id="includeInTotalContainer2">
                    <input type="checkbox" id="eleaveSalaryCheckbox"> Include in total
                    <?php
                    if ($leaveSalaryYears < 1) {
                        echo showRedText(" (1 year not completed)") . "<br>" . "<span style='color: black;'>($leaveSalaryYears years, $leaveSalaryMonths months, and $leaveSalaryDays days)</span>";
                    } else {
                        echo "<span style='color: black;'>($leaveSalaryYears years, $leaveSalaryMonths months, and $leaveSalaryDays days)</span>";
                    }
                    ?>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Leave salary</span>
                    <em>(required)</em>
                    <input type="text" class="esalary-input" name="eleave_salary" id="eleaveSalaryInput" placeholder="Enter leave salary">
                </div>

                <div id="includeInTotalContainer">
                    <input type="checkbox" id="egratuityCheckbox"> <span>Include in total</span>
                    <?php
                    if ($gratuityYears < 1) {
                        echo showRedText(" (1 year not completed)") . "<br>" . "<span style='color: black;'>($gratuityYears years, $gratuityMonths months, and $gratuityDays days)</span>";
                    } else {
                        echo "<span style='color: black;'>($gratuityYears years, $gratuityMonths months, and $gratuityDays days)</span>";
                    }
                    ?>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Gratuity</span>
                    <em>(required)</em>
                    <input type="text" class="einput" name="egratuity" id="egratuityInput" placeholder="Enter gratuity">
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Salary deposit</span>
                    <em>(required)</em>
                    <input type="text" class="esalary-input" name="esalary_deposit" id="esalaryDepositInput" placeholder="Enter deposit amount" value="<?php echo $data['salary_deposit']; ?>" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Air ticket</span>
                    <em>(required)</em>
                    <input type="text" id="eairTicketInput" name="eair_ticket" class="esalary-input" placeholder="Enter air ticket expense" value="<?php echo $data['air_ticket']; ?>" required>
                </div>
                <h4 class="bolder">Payment Due from Employee to Company</h4> 
                <div class="divider bottom-40"></div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Salary advance</span>
                    <em>(required)</em>
                    <input type="text" class="esalary-input" name="esalary_advance" id="esalaryAdvanceInput" placeholder="Enter salary advance" value="<?php echo $data['salary_advance']; ?>" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Loan</span>
                    <em>(required)</em>
                    <input type="text" id="eloanInput" name="eloan" class="eexpense-input" placeholder="Enter loan amount" value="<?php echo $data['loan']; ?>" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Telephone expense</span>
                    <em>(required)</em>
                    <input type="text" id="etelephoneExpenseInput" name="etelephone_expense" class="eexpense-input" placeholder="Enter telephone expense" value="<?php echo $data['telephone_expense']; ?>" required>
                </div>
                <h4 class="bolder">NET AMOUNT PAYABLE/RECEIVABLE</h4> 
                <div class="divider bottom-40"></div>                                
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Total salary</span>
                    <em>(required)</em>
                    <input type="text" id="etotalSalary" name="etotal_salary" placeholder="Enter total salary" value="<?php echo $data['total_salary']; ?>" required>
                </div>
                <input type="checkbox" name="esalary_status" value="paid" <?php echo ($data['salary_status'] === 'paid') ? 'checked' : ''; ?>> paid
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Crated Date</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <input type="date" id="ecreatedDateInput" name="ecreated_date" placeholder="dd-mm-yyyy" value="<?php echo $data['created_at']; ?>" required>
                </div>
                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('salary_edit2').submit();">Update</a>
            </form>
        </div>
    </div>

    <!-- Page Content Class Ends Here-->

    <div class="menu-hider"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php include '../../user-layouts/script.php';?>
        <script>
            window.addEventListener('resize', function() {
                var menuSignup = document.getElementById('menu-empdtedit');
                menuSignup.style.height = window.innerHeight + 'px';
            });

            document.addEventListener('focusin', function(event) {
                var menuSignup = document.getElementById('menu-empdtedit');
                var inputField = event.target;
                var inputOffsetTop = inputField.offsetTop;
                var scrollPosition = inputOffsetTop - menuSignup.offsetTop;

                menuSignup.scrollTo({
                    top: scrollPosition,
                    behavior: 'smooth'
                });
            });
        </script>
        <script>
            window.addEventListener('resize', function() {
                var menuSignup = document.getElementById('menu-empadd');
                menuSignup.style.height = window.innerHeight + 'px';
            });

            document.addEventListener('focusin', function(event) {
                var menuSignup = document.getElementById('menu-empadd');
                var inputField = event.target;
                var inputOffsetTop = inputField.offsetTop;
                var scrollPosition = inputOffsetTop - menuSignup.offsetTop;

                menuSignup.scrollTo({
                    top: scrollPosition,
                    behavior: 'smooth'
                });
            });
        </script>
        <script>
            window.addEventListener('resize', function() {
                var menuSignup = document.getElementById('menu-saldtedit1');
                menuSignup.style.height = window.innerHeight + 'px';
            });

            document.addEventListener('focusin', function(event) {
                var menuSignup = document.getElementById('menu-saldtedit1');
                var inputField = event.target;
                var inputOffsetTop = inputField.offsetTop;
                var scrollPosition = inputOffsetTop - menuSignup.offsetTop;

                menuSignup.scrollTo({
                    top: scrollPosition,
                    behavior: 'smooth'
                });
            });
        </script>
        <script>
            window.addEventListener('resize', function() {
                var menuSignup = document.getElementById('menu-saldtedit2');
                menuSignup.style.height = window.innerHeight + 'px';
            });

            document.addEventListener('focusin', function(event) {
                var menuSignup = document.getElementById('menu-saldtedit2');
                var inputField = event.target;
                var inputOffsetTop = inputField.offsetTop;
                var scrollPosition = inputOffsetTop - menuSignup.offsetTop;

                menuSignup.scrollTo({
                    top: scrollPosition,
                    behavior: 'smooth'
                });
            });
        </script>
       <script>
            $(document).ready(function() {
            // When the "Leavy Salary" button is clicked
                $("#leaveSalaryButton").click(function(event) {
                    event.preventDefault(); // Prevent the default link behavior

                    // Hide the elements with IDs "includeInTotalContainer" and "egratuityInput"
                    $("#includeInTotalContainer").hide();
                    $("#egratuityInput").hide();
                });
            });
        </script>

        <script>
        $(document).ready(function() {
        // When the "Gratuity" button is clicked
        $("#leaveShow").click(function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Show the elements with IDs "includeInTotalContainer" and "egratuityInput"
            $("#includeInTotalContainer").show();
            $("#egratuityInput").show();
        });
        });
        </script>









<script>
    // Get references to the input fields
    const basicSalaryInput = document.getElementById('basicSalaryInput');
    const basicAllowanceInput = document.getElementById('basicAllowanceInput');
    const fixedOtInput = document.getElementById('fixedOtInput');
    const salaryDepositInput = document.getElementById('salaryDepositInput');
    const salaryAdvanceInput = document.getElementById('salaryAdvanceInput');
    const loanInput = document.getElementById('loanInput');
    const airTicketInput = document.getElementById('airTicketInput');
    const telephoneExpenseInput = document.getElementById('telephoneExpenseInput');
    const totalSalaryInput = document.getElementById('totalSalary');

    // Function to calculate and update the total salary
    function calculateTotalSalary1() {
        // Parse the values of all input fields
        const basicSalary = parseFloat(basicSalaryInput.value) || 0;
        const basicAllowance = parseFloat(basicAllowanceInput.value) || 0;
        const fixedOt = parseFloat(fixedOtInput.value) || 0;


        // Parse the value of the salary deposit input field
        const salaryDeposit = parseFloat(salaryDepositInput.value) || 0;

        // Parse the values of the expense input fields
        const salaryAdvance = parseFloat(salaryAdvanceInput.value) || 0;
        const loan = parseFloat(loanInput.value) || 0;
        const airTicket = parseFloat(airTicketInput.value) || 0;
        const telephoneExpense = parseFloat(telephoneExpenseInput.value) || 0;

        // Calculate the total salary by subtracting the expenses
        const totalSalary = basicSalary + basicAllowance + fixedOt + salaryDeposit + airTicket - salaryAdvance - loan  - telephoneExpense;

        // Update the total salary input field with the calculated value
        totalSalaryInput.value = totalSalary.toFixed(2);
    }

    // Add event listeners to the salary and expense inputs and checkboxes to trigger the calculation
    basicSalaryInput.addEventListener('input', calculateTotalSalary1);
    basicAllowanceInput.addEventListener('input', calculateTotalSalary1);
    fixedOtInput.addEventListener('input', calculateTotalSalary1);
    salaryDepositInput.addEventListener('input', calculateTotalSalary1);
    salaryAdvanceInput.addEventListener('input', calculateTotalSalary1);
    loanInput.addEventListener('input', calculateTotalSalary1);
    airTicketInput.addEventListener('input', calculateTotalSalary1);
    telephoneExpenseInput.addEventListener('input', calculateTotalSalary1);
</script>
<?php
$document_name_id = $_GET['document_name_id'];
include "../../user-pages/in-connection.php";

$query = "SELECT * FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
$result = mysqli_query($con, $query);

// Fetch the data and populate the menu
$data = mysqli_fetch_assoc($result);

// Calculate working period
$join_date = $data['join_date'];
$rejoining_date = $data['rejoining_date'];
$current_date = date("Y-m-d");

// If rejoining_date is empty, calculate working period based on join_date with current date
// Else, calculate working period based on rejoining_date with current date
if (empty($rejoining_date)) {
    $working_period = date_diff(date_create($join_date), date_create($current_date));
} else {
    $working_period = date_diff(date_create($rejoining_date), date_create($current_date));
}

$join_date2= date_diff(date_create($join_date), date_create($current_date));
// Calculate years of working
$years_of_working = $working_period->y;
$years_of_working2 = $join_date2->y; 
?>

<script>
    // Get references to the input fields
    const ebasicSalaryInput = document.getElementById('ebasicSalaryInput');
    const ebasicAllowanceInput = document.getElementById('ebasicAllowanceInput');
    const efixedOtInput = document.getElementById('efixedOtInput');
    const edaysCountInput = document.getElementById('edaysCountInput');
    const edaysAmountInput = document.getElementById('edaysAmount');
    const eotInput = document.getElementById('eotInput');
    const eotAmountInput = document.getElementById('eotAmount');
    const ehoursInput = document.getElementById('ehoursInput');
    const ehoursAmountInput = document.getElementById('ehoursAmount');
    const ebonusInput = document.getElementById('ebonusInput');
    const eleaveSalaryCheckbox = document.getElementById('eleaveSalaryCheckbox');
    const eleaveSalaryInput = document.getElementById('eleaveSalaryInput');
    const egratuityCheckbox = document.getElementById('egratuityCheckbox');
    const egratuityInput = document.getElementById('egratuityInput');
    const esalaryDepositInput = document.getElementById('esalaryDepositInput');
    const esalaryAdvanceInput = document.getElementById('esalaryAdvanceInput');
    const eloanInput = document.getElementById('eloanInput');
    const eairTicketInput = document.getElementById('eairTicketInput');
    const etelephoneExpenseInput = document.getElementById('etelephoneExpenseInput');
    const etotalSalaryInput = document.getElementById('etotalSalary');

    // Function to calculate and update the total salary
    function ecalculateTotalSalary2() {
        // Parse the values of all input fields
        const ebasicSalary = parseFloat(ebasicSalaryInput.value) || 0;
        const ebasicAllowance = parseFloat(ebasicAllowanceInput.value) || 0;
        const efixedOt = parseFloat(efixedOtInput.value) || 0;

        const edaysCount = parseFloat(edaysCountInput.value) || 0;
        const eot = parseFloat(eotInput.value) || 0;
        const ehours = parseFloat(ehoursInput.value) || 0;
        const ebonus = parseFloat(ebonusInput.value) || 0;

        let eleaveSalary = 0;
        let egratuity = 0;

        // Calculate Leave salary if the checkbox is checked and working period is at least a year
        if (eleaveSalaryCheckbox.checked && <?php echo $years_of_working; ?> >= 1) {
            eleaveSalary = (ebasicSalary / 30) * 21 * <?php echo $years_of_working; ?>;
            eleaveSalaryInput.value = eleaveSalary.toFixed(2);
        } else if (!eleaveSalaryCheckbox.checked) {
            eleaveSalaryInput.value = '';
        } else {
            // Working period is less than a year
            eleaveSalaryInput.value = 'Year not completed';
        }

        // Calculate Gratuity if the checkbox is checked
        if (egratuityCheckbox.checked && <?php echo $years_of_working2; ?> >= 1) {
            // Calculate the number of years and months
            const years = Math.floor(<?php echo $years_of_working2; ?>);
            const months = Math.round((<?php echo $years_of_working2; ?> - years) * 12); // Round to the nearest whole number of months

            // Calculate the gratuity based on years and months
            const gratuityMultiplier = years + (months / 10); // Use division by 10 to get a decimal for months
            egratuity = (ebasicSalary / 30) * 21 * gratuityMultiplier;
            egratuityInput.value = egratuity.toFixed(2);
        } else if (!egratuityCheckbox.checked) {
            egratuityInput.value = '';
        }
         else {
            egratuityInput.value = 'Year not completed';
        }

        // Parse the value of the salary deposit input field
        const esalaryDeposit = parseFloat(esalaryDepositInput.value) || 0;

        // Parse the values of the expense input fields
        const esalaryAdvance = parseFloat(esalaryAdvanceInput.value) || 0;
        const eloan = parseFloat(eloanInput.value) || 0;
        const eairTicket = parseFloat(eairTicketInput.value) || 0;
        const etelephoneExpense = parseFloat(etelephoneExpenseInput.value) || 0;

        const edaysAmount = parseFloat((ebasicSalary + ebasicAllowance + efixedOt) /30 * edaysCount) || 0;
        const eotAmount = parseFloat((ebasicSalary + ebasicAllowance + efixedOt) /30 * eot) || 0;
        const ehoursAmount = parseFloat((ebasicSalary) /30  / edaysCount * ehours) || 0;

        // Calculate the total salary by subtracting the expenses
        const etotalSalary = edaysAmount + eotAmount + ehoursAmount + ebonus + eleaveSalary + egratuity + esalaryDeposit + eairTicket - esalaryAdvance - eloan  - etelephoneExpense;

        // Update the total salary input field with the calculated value
        edaysAmountInput.value = edaysAmount.toFixed(2);
        eotAmountInput.value = eotAmount.toFixed(2);
        ehoursAmountInput.value = ehoursAmount.toFixed(2);
        etotalSalaryInput.value = etotalSalary.toFixed(2);
    }

    // Add event listeners to the salary and expense inputs and checkboxes to trigger the calculation
    ebasicSalaryInput.addEventListener('input', ecalculateTotalSalary2);
    ebasicAllowanceInput.addEventListener('input', ecalculateTotalSalary2);
    efixedOtInput.addEventListener('input', ecalculateTotalSalary2);
    edaysCountInput.addEventListener('input', ecalculateTotalSalary2);
    eotInput.addEventListener('input', ecalculateTotalSalary2);
    ehoursInput.addEventListener('input', ecalculateTotalSalary2);
    ebonusInput.addEventListener('input', ecalculateTotalSalary2);
    eleaveSalaryCheckbox.addEventListener('change', ecalculateTotalSalary2);
    egratuityCheckbox.addEventListener('change', ecalculateTotalSalary2);
    esalaryDepositInput.addEventListener('input', ecalculateTotalSalary2);
    esalaryAdvanceInput.addEventListener('input', ecalculateTotalSalary2);
    eloanInput.addEventListener('input', ecalculateTotalSalary2);
    eairTicketInput.addEventListener('input', ecalculateTotalSalary2);
    etelephoneExpenseInput.addEventListener('input', ecalculateTotalSalary2);
</script>

<script>
    // Get the current page URL
    var currentPageUrl = window.location.href;

    // Get the footer menu buttons
    var footerButtons = document.querySelectorAll("#footer-menu a");

    // Loop through the footer buttons
    for (var i = 0; i < footerButtons.length; i++) {
        var button = footerButtons[i];
        var buttonUrl = button.getAttribute("href");

        // Check if the button URL matches the current page URL
        if (currentPageUrl.indexOf(buttonUrl) !== -1) {
            // Add the active class to the button
            button.classList.add("active-nav");
        }
    }
</script>
</body>
