<!DOCTYPE HTML>
<html lang="en">
<head>

    <?php include '../user-layouts/head.php';?>
    <style>
    .input-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .input-row .input-style {
        flex-basis: 48%;
    }
</style>

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

        <div class="content-boxed content-boxed-full">
            <div class="content bottom-20">
            
                <div class="contact-information last-column">
                    <div class="container top-20">
                        <h3 class="bolder">Employee details 
                            <?php
                                include "in-connection.php";
                                // Assuming you have a database connection established
                                $document_name_id = $_GET['document_name_id'];
                                // Perform the SELECT query
                                $query = "SELECT * FROM salary WHERE document_name_id_fk = '$document_name_id'";
                                $result = mysqli_query($con, $query);

                                // Check if any rows are returned
                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                        <span><a data-menu="menu-empdtedit" href="#" style="position: absolute;right: 30px; font-size:20px;"><i class="fas fa-edit" style="color: #8a1739;"></i></a></span>
                                    <?php
                                } else {
                                    
                            }
                            ?>
                            
                        </h3> 
                    
                        <div class="divider bottom-20"></div>
                        <?php
                            $document_name_id = $_GET['document_name_id'];
                            include "in-connection.php";

                            // Fetch data from the salary table
                            $query = "SELECT employee_name, passport_no, mobile, DATE_FORMAT(join_date, '%d/%m/%Y') AS formatted_join_date FROM salary WHERE document_name_id_fk = '$document_name_id'";
                            $result = mysqli_query($con, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            $employeeName = $row['employee_name'];
                            $passportNo = $row['passport_no'];
                            $mobile = $row['mobile'];
                            $joinDate = $row['formatted_join_date'];
                            $document_name_id = $_GET['document_name_id'];
                            
                            echo '<div class="link-list link-list-1">';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 512 512.002" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M210.352 246.633c33.882 0 63.222-12.153 87.195-36.13 23.973-23.972 36.125-53.304 36.125-87.19 0-33.876-12.152-63.211-36.129-87.192C273.566 12.152 244.23 0 210.352 0c-33.887 0-63.22 12.152-87.192 36.125s-36.129 53.309-36.129 87.188c0 33.886 12.156 63.222 36.133 87.195 23.977 23.969 53.313 36.125 87.188 36.125zM426.129 393.703c-.692-9.976-2.09-20.86-4.149-32.351-2.078-11.579-4.753-22.524-7.957-32.528-3.308-10.34-7.808-20.55-13.37-30.336-5.774-10.156-12.555-19-20.165-26.277-7.957-7.613-17.699-13.734-28.965-18.2-11.226-4.44-23.668-6.69-36.976-6.69-5.227 0-10.281 2.144-20.043 8.5a2711.03 2711.03 0 0 1-20.879 13.46c-6.707 4.274-15.793 8.278-27.016 11.903-10.949 3.543-22.066 5.34-33.039 5.34-10.972 0-22.086-1.797-33.047-5.34-11.21-3.622-20.296-7.625-26.996-11.899-7.77-4.965-14.8-9.496-20.898-13.469-9.75-6.355-14.809-8.5-20.035-8.5-13.313 0-25.75 2.254-36.973 6.7-11.258 4.457-21.004 10.578-28.969 18.199-7.605 7.281-14.39 16.12-20.156 26.273-5.558 9.785-10.058 19.992-13.371 30.34-3.2 10.004-5.875 20.945-7.953 32.524-2.059 11.476-3.457 22.363-4.149 32.363A438.821 438.821 0 0 0 0 423.949c0 26.727 8.496 48.363 25.25 64.32 16.547 15.747 38.441 23.735 65.066 23.735h246.532c26.625 0 48.511-7.984 65.062-23.734 16.758-15.946 25.254-37.586 25.254-64.325-.004-10.316-.351-20.492-1.035-30.242zm0 0" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                            echo '<span>Employee name : ' . $employeeName . '</span>';
                            echo '</a>';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M256 341.334c12.221 0 29.409-33.047 31.573-85.333h-63.146c2.164 52.286 19.352 85.333 31.573 85.333zM161.078 234.667h41.807c1.181-29.056 7.182-57.952 17.599-78.342-32.169 12.884-55.394 42.679-59.406 78.342zM291.516 156.325c10.417 20.391 16.418 49.286 17.599 78.342h41.807c-4.012-35.663-27.237-65.458-59.406-78.342zM256 149.334c-12.221 0-29.409 33.047-31.573 85.333h63.146c-2.164-52.286-19.351-85.333-31.573-85.333zM161.078 256.001c4.012 35.663 27.237 65.458 59.406 78.342-10.417-20.391-16.418-49.286-17.599-78.342h-41.807z" fill="#8a1739" data-original="#000000" class=""></path><path d="M405.334 64.001H384V41.932c0-26.637-25.125-47.461-52.198-40.617L104.233 64.247C81.853 65.538 64 83.969 64 106.667v362.667C64 492.865 83.136 512 106.667 512h298.667C428.865 512 448 492.865 448 469.334V106.667c0-23.531-19.135-42.666-42.666-42.666zM337.281 21.93c12.448-3.177 25.385 6.906 25.385 20.001V64H185.164l152.117-42.07zm-27.947 426.071H192a10.66 10.66 0 0 1-10.667-10.667A10.66 10.66 0 0 1 192 426.667h117.333A10.66 10.66 0 0 1 320 437.334a10.66 10.66 0 0 1-10.666 10.667zM352 405.344H149.334a10.66 10.66 0 0 1-10.667-10.667 10.66 10.66 0 0 1 10.667-10.667H352a10.66 10.66 0 0 1 10.667 10.667A10.66 10.66 0 0 1 352 405.344zm-96-42.677c-64.698 0-117.333-52.635-117.333-117.333S191.302 128.001 256 128.001s117.333 52.635 117.333 117.333S320.698 362.667 256 362.667z" fill="#8a1739" data-original="#000000" class=""></path><path d="M291.516 334.343c32.169-12.884 55.395-42.68 59.406-78.342h-41.807c-1.181 29.056-7.182 57.951-17.599 78.342z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                            echo '<span>Passport no : ' . $passportNo . '</span>';
                            echo '</a>';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 27.442 27.442" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M19.494 0H7.948a1.997 1.997 0 0 0-1.997 1.999v23.446c0 1.102.892 1.997 1.997 1.997h11.546a1.998 1.998 0 0 0 1.997-1.997V1.999A1.999 1.999 0 0 0 19.494 0zm-8.622 1.214h5.7c.144 0 .261.215.261.481s-.117.482-.261.482h-5.7c-.145 0-.26-.216-.26-.482s.115-.481.26-.481zm2.85 24.255a1.275 1.275 0 1 1 0-2.55 1.275 1.275 0 0 1 0 2.55zm6.273-4.369H7.448V3.373h12.547V21.1z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                            echo '<span>Mobile no : ' . $mobile . '</span>';
                            echo '</a>';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 34 34" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M29.6 2h-3v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-16v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-3C2.1 2 1 3.3 1 5v3.6h32V5c0-1.7-1.8-3-3.4-3zM1 10.7V29c0 1.8 1.1 3 2.7 3h26c1.6 0 3.4-1.3 3.4-3V10.7zm8.9 16.8H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm0-9H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                            echo '<span>Join date : ' . $joinDate . '</span>';
                            echo '</a>';
                            echo '</div>';
                            } else {
                            // No data found in the salary table
                            echo 'No data available.';
                            }

                            // Close the database connection
                            mysqli_close($con);
                            ?>

                    </div>
                </div>
            </div>
        </div>

        

        <div class="content-boxed">
            <div class="content accordion-style-1 accordion-round-medium">
                    <h3 class="bolder">Employee salary details 
                        <?php
                            include "in-connection.php";
                            // Assuming you have a database connection established
                            $document_name_id = $_GET['document_name_id'];
                            // Perform the SELECT query
                            $query = "SELECT * FROM salary WHERE document_name_id_fk = '$document_name_id'";
                            $result = mysqli_query($con, $query);

                            // Check if any rows are returned
                            if (mysqli_num_rows($result) > 0) {
                                ?>
                                    <span><a data-menu="menu-saldtedit" href="#" style="position: absolute;right: 10px; top:-10px; font-size:20px;"><i class="fas fa-edit" style="color: #8a1739;"></i></a></span>
                                <?php
                            } else {
                                
                        }
                        ?>
                        
                    </h3>
                <p>
                    
                </p>
                <a href="#" data-accordion="accordion-content-1" class="accordion-toggle-first" style="background-color: #8a1739;">
                    <i class="accordion-icon-left"></i>
                    Table 01
                    <i class="accordion-icon-right fa fa-angle-down"></i>
                </a>
                <div  id="accordion-content-1" class="accordion-content bottom-10">
                    <div class="table-scroll">	
                                        <?php
                                            $document_name_id = $_GET['document_name_id'];
                                            include "in-connection.php";

                                            // Fetch data from the salary table
                                            $query = "SELECT basic_salary, fixed_ot, basic_allowance FROM salary WHERE document_name_id_fk = '$document_name_id'";
                                            $result = mysqli_query($con, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $basicSalary = $row['basic_salary'];
                                            $fixedOt = $row['fixed_ot'];
                                            $basicAllowance = $row['basic_allowance'];

                                            echo '<div class="link-list link-list-1">';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Basic Salary : ' . $basicSalary . '</span>';
                                            echo '</a>';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Fixed OT : ' . $fixedOt . '</span>';
                                            echo '</a>';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Allownce : ' . $basicAllowance . '</span>';
                                            echo '</a>';
                                            echo '</div>';
                                            } else {
                                            // No data found in the salary table
                                            echo 'No data available.';
                                            }

                                            // Close the database connection
                                            mysqli_close($con);
                                        ?>
	
                    </div>
                </div> 

                <a data-accordion="accordion-content-2" href="#" style="background-color: #8a1739;">
                    <i class="accordion-icon-left"></i>
                    Table 02
                    <i class="accordion-icon-right fa fa-angle-down"></i>
                </a>
                <div id="accordion-content-2" class="accordion-content bottom-10">
                    <div class="table-scroll">			
                                        <?php
                                            $document_name_id = $_GET['document_name_id'];
                                            include "in-connection.php";include "in-connection.php";

                                            // Fetch data from the salary table
                                            $query = "SELECT leave_salary, gratuity, air_ticket, salary_deposit FROM salary WHERE document_name_id_fk = '$document_name_id'";
                                            $result = mysqli_query($con, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $leaveSalary = $row['leave_salary'];
                                            $gratuity = $row['gratuity'];
                                            $airTicket = $row['air_ticket'];
                                            $salaryDeposit = $row['salary_deposit'];

                                            echo '<div class="link-list link-list-1">';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Leave salary : ' . $leaveSalary . '</span>';
                                            echo '</a>';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Gratuity : ' . $gratuity . '</span>';
                                            echo '</a>';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Air ticket : ' . $airTicket . '</span>';
                                            echo '</a>';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Salary deposit : ' . $salaryDeposit . '</span>';
                                            echo '</a>';
                                            echo '</div>';
                                            } else {
                                            // No data found in the salary table
                                            echo 'No data available.';
                                            }

                                            // Close the database connection
                                            mysqli_close($con);
                                        ?>
	
                    </div>
                </div>     

                <a data-accordion="accordion-content-3" href="#" class="accordion-toggle-last" style="background-color: #8a1739;">
                    <i class="accordion-icon-left"></i>
                    Table 03
                    <i class="accordion-icon-right fa fa-angle-down"></i>
                </a>
                <div id="accordion-content-3" class="accordion-content bottom-10">
                    <div class="table-scroll">			
                                        <?php
                                            $document_name_id = $_GET['document_name_id'];
                                            include "in-connection.php";

                                            // Fetch data from the salary table
                                            $query = "SELECT salary_advance,telephone_expense, loan FROM salary WHERE document_name_id_fk = '$document_name_id'";
                                            $result = mysqli_query($con, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $salaryAdvance = $row['salary_advance'];
                                            $telephoneExpense = $row['telephone_expense'];
                                            $loan = $row['loan'];

                                            echo '<div class="link-list link-list-1">';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Salary advance : ' . $salaryAdvance . '</span>';
                                            echo '</a>';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Telephone expense : ' . $telephoneExpense . '</span>';
                                            echo '</a>';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Loan : ' . $loan . '</span>';
                                            echo '</a>';
                                            echo '</div>';
                                            } else {
                                            // No data found in the salary table
                                            echo 'No data available.';
                                            }

                                            // Close the database connection
                                            mysqli_close($con);
                                        ?>
                </div>               
            </div>      
                                        <?php
                                            $document_name_id = $_GET['document_name_id'];
                                            include "in-connection.php";

                                            // Fetch data from the salary table
                                            $query = "SELECT total_salary,DATE_FORMAT(updated_at, '%d/%m/%Y') AS formatted_updated_at FROM salary WHERE document_name_id_fk = '$document_name_id'";
                                            $result = mysqli_query($con, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $totalSalary = $row['total_salary'];
                                            $updatedAt = $row['formatted_updated_at'];

                                            echo '<div class="link-list link-list-1">';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M50.268 11.494H9.732a.878.878 0 0 0-.881.881v26.437c0 .485.396.881.88.881h5.288v7.932a.87.87 0 0 0 .547.81.86.86 0 0 0 .96-.194l8.548-8.548h25.194a.884.884 0 0 0 .881-.88V12.374a.878.878 0 0 0-.88-.88zM30 24.71a4.411 4.411 0 0 1 4.406 4.406 4.414 4.414 0 0 1-3.525 4.317v1.852a.881.881 0 0 1-1.762 0v-1.852a4.414 4.414 0 0 1-3.525-4.317.881.881 0 0 1 1.762 0c0 1.458 1.186 2.644 2.644 2.644s2.644-1.186 2.644-2.644-1.186-2.643-2.644-2.643a4.411 4.411 0 0 1-4.406-4.407 4.413 4.413 0 0 1 3.525-4.317v-1.851a.881.881 0 0 1 1.762 0v1.851a4.413 4.413 0 0 1 3.525 4.317.881.881 0 0 1-1.762 0c0-1.457-1.186-2.643-2.644-2.643s-2.644 1.186-2.644 2.643S28.542 24.71 30 24.71z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Total salary : ' . $totalSalary . '</span>';
                                            echo '</a>';
                                            echo '<a href="#">';
                                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 34 34" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M29.6 2h-3v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-16v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-3C2.1 2 1 3.3 1 5v3.6h32V5c0-1.7-1.8-3-3.4-3zM1 10.7V29c0 1.8 1.1 3 2.7 3h26c1.6 0 3.4-1.3 3.4-3V10.7zm8.9 16.8H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm0-9H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                                            echo '<span>Salary updated : ' . $updatedAt . '</span>';
                                            echo '</a>';
                                            echo '</div>';
                                            } else {
                                            // No data found in the salary table
                                            echo 'No data available.';
                                            }

                                            // Close the database connection
                                            mysqli_close($con);
                                        ?>  
        </div>
    
        
    </div>
    <?php
        include "in-connection.php";
        // Assuming you have a database connection established
        $document_name_id = $_GET['document_name_id'];
        // Perform the SELECT query
        $query = "SELECT * FROM salary WHERE document_name_id_fk = '$document_name_id'";
        $result = mysqli_query($con, $query);

        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            
        } else {
            ?>
                <div id="circle-button" class="fab fab-circle button button-round-huge shadow-large" style="background-color: #8a1739;">
                    <a data-menu="menu-signup" href="#"><i class="fas fa-plus" style="color: white;"></i></a>
                </div>
            <?php
    }
    ?>
    
            
    <div id="menu-signup" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="620" data-menu-effect="menu-over">
        <div class="content">
            <h2 class="uppercase ultrabold top-20">Add salary details</h2>
            <p class="font-11 under-heading bottom-40"></p>
            <form id="salary" action="../function/salary/create.php?document_name_id=<?php echo $_GET['document_name_id']; ?>" method="POST">
                <h4 class="bolder">Employee details</h4> 
                <div class="divider bottom-40"></div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Employee Name</span>
                        <input type="text" name="employee_name" placeholder="Enter employee name" required>
                    </div>
                    
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Passport No</span>
                        <input type="text" name="passport_no" placeholder="Enter passport no" required>
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Mobile</span>
                        <input type="text" name="mobile" placeholder="Enter mobile no" required>
                    </div>
                    
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Join Date</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <input type="date" name="join_date" placeholder="Enter join date" required>
                    </div>
                </div>
                <h4 class="bolder">Salary Structure & Total Salary / Month</h4> 
                <div class="divider bottom-40"></div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Basic salary</span>
                        <input type="text" class="salary-input" name="basic_salary" id="basicSalaryInput" placeholder="basic salary" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Basic allowance</span>
                        <input type="text" class="salary-input" name="basic_allowance" id="basicAllowanceInput" placeholder="allowance" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Fixed ot</span>
                        <input type="text" class="salary-input" name="fixed_ot" id="fixedOtInput" placeholder="fixed ot" required>
                    </div>
                </div>
                <h5 class="bolder">Salary</h5> 
                <div class="divider bottom-40"></div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Days</span>
                        <input type="text" class="salary-input" name="days_count" id="daysCountInput" placeholder="days" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Amount</span>
                        <input type="text" class="salary-input" name="days_amount" id="daysAmount" placeholder="amount" required>
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Over time</span>
                        <input type="text" class="salary-input" name="ot" id="otInput" placeholder="over time" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Amount</span>
                        <input type="text" class="salary-input" name="ot_amount" id="otAmount" placeholder="amount" required>
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Hours</span>
                        <input type="text" class="salary-input" name="hours" id="hoursInput" placeholder="hours" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Amount</span>
                        <input type="text" class="salary-input" name="hours_amount" id="hoursAmount" placeholder="amount" required>
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Bonus</span>
                        <input type="text" class="salary-input" name="bonus" id="bonusInput" placeholder="bonus" required>
                    </div>
                </div>
                <h4 class="bolder">Payments due from company to Employee</h4> 
                <div class="divider bottom-40"></div>
                <input type="checkbox" id="leaveSalaryCheckbox"> Include in total
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Leave salary</span>
                    <em>(required)</em>
                    <input type="text" class="salary-input" name="leave_salary" id="leaveSalaryInput" placeholder="Enter leave salary">
                </div>
                <input type="checkbox" id="gratuityCheckbox"> Include in total
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Gratuity</span>
                    <em>(required)</em>
                    <input type="text" class="salary-input" name="gratuity" id="gratuityInput" placeholder="Enter gratuity">
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Salary deposit</span>
                    <em>(required)</em>
                    <input type="text" class="salary-input" name="salary_deposit" id="salaryDepositInput" placeholder="Enter deposit amount" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Air ticket</span>
                    <em>(required)</em>
                    <input type="text" id="airTicketInput" name="air_ticket" class="salary-input" placeholder="Enter air ticket expense" required>
                </div>
                <h4 class="bolder">Payment Due from Employee to Company</h4> 
                <div class="divider bottom-40"></div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Salary advance</span>
                    <em>(required)</em>
                    <input type="text" class="salary-input" name="salary_advance" id="salaryAdvanceInput" placeholder="Enter salary advance" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Loan</span>
                    <em>(required)</em>
                    <input type="text" id="loanInput" name="loan" class="expense-input" placeholder="Enter loan amount" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Telephone expense</span>
                    <em>(required)</em>
                    <input type="text" id="telephoneExpenseInput" name="telephone_expense" class="expense-input" placeholder="Enter telephone expense" required>
                </div>
                <h4 class="bolder">NET AMOUNT PAYABLE/RECEIVABLE</h4> 
                <div class="divider bottom-40"></div>                                
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Total salary</span>
                    <em>(required)</em>
                    <input type="text" id="totalSalary" name="total_salary" placeholder="Enter total salary" required>
                </div>
                

                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('salary').submit();">Add</a>
            </form>
        </div>
    </div>

    <?php
        $document_name_id = $_GET['document_name_id'];
        include "in-connection.php";
        $query = "SELECT id,employee_name, passport_no, mobile, DATE_FORMAT(join_date, '%d/%m/%Y') AS formatted_join_date FROM salary WHERE document_name_id_fk = '$document_name_id'";
        $result = mysqli_query($con, $query); // Assuming you have a valid database connection

        // Fetch the data and populate the menu
        $data = mysqli_fetch_assoc($result);
    ?>

    <div id="menu-empdtedit" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="420" data-menu-effect="menu-over">
        <div class="content">
            <h2 class="uppercase ultrabold top-20">Edit employee details</h2>
            <p class="font-11 under-heading bottom-40"></p>
            <form id="salary_update" action="../function/salary/update.php?salary_id=<?php echo $data['id']; ?>" method="POST">
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Employee Name</span>
                    <em>(required)</em>
                    <input type="text" id="employeeNameInput" name="employee_name" placeholder="Enter employee name" value="<?php echo $data['employee_name']; ?>" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Passport No</span>
                    <em>(required)</em>
                    <input type="text" id="passportNoInput" name="passport_no" placeholder="Enter passport no" value="<?php echo $data['passport_no']; ?>" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Mobile</span>
                    <em>(required)</em>
                    <input type="text" id="mobileInput" name="mobile" placeholder="Enter mobile no" value="<?php echo $data['mobile']; ?>" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Join Date</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <input type="date" id="joinDateInput" name="join_date" placeholder="dd-mm-yyyy" value="<?php echo $data['formatted_join_date']; ?>" required>
                </div>
                
                <!-- Additional input fields for salary details -->
                <!-- ... -->
                
                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('salary_update').submit();">Update</a>
            </form>
        </div>
    </div>

    <?php
        include "in-connection.php";
        $document_name_id = $_GET['document_name_id'];
        $query = "SELECT * FROM salary WHERE document_name_id_fk = '$document_name_id'";
        $result = mysqli_query($con, $query); // Assuming you have a valid database connection

        // Fetch the data and populate the menu
        $data = mysqli_fetch_assoc($result);
    ?>
    <div id="menu-saldtedit" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="620" data-menu-effect="menu-over">
        <div class="content">
            <h2 class="uppercase ultrabold top-20">Edit salary details</h2>
            <p class="font-11 under-heading bottom-40"></p>
            <form id="salary_edit" action="../function/salary/salary-update.php?salary_id=<?php echo $data['id']; ?>" method="POST">
                
                <h4 class="bolder">Salary Structure & Total Salary / Month</h4> 
                <div class="divider bottom-40"></div>
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
                <input type="checkbox" id="eleaveSalaryCheckbox"> Include in total
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Leave salary</span>
                    <em>(required)</em>
                    <input type="text" class="esalary-input" name="eleave_salary" id="eleaveSalaryInput" placeholder="Enter leave salary" value="<?php echo $data['leave_salary']; ?>">
                </div>
                <input type="checkbox" id="egratuityCheckbox"> Include in total
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Gratuity</span>
                    <em>(required)</em>
                    <input type="text" class="einput" name="egratuity" id="egratuityInput" placeholder="Enter gratuity" value="<?php echo $data['gratuity']; ?>">
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
                

                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('salary_edit').submit();">Update</a>
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

<script>
    // Get references to the input fields
    const basicSalaryInput = document.getElementById('basicSalaryInput');
    const basicAllowanceInput = document.getElementById('basicAllowanceInput');
    const fixedOtInput = document.getElementById('fixedOtInput');
    const daysCountInput = document.getElementById('daysCountInput');
    const daysAmountInput = document.getElementById('daysAmount');
    const otInput = document.getElementById('otInput');
    const otAmountInput = document.getElementById('otAmount');
    const hoursInput = document.getElementById('hoursInput');
    const hoursAmountInput = document.getElementById('hoursAmount');
    const bonusInput = document.getElementById('bonusInput');
    const leaveSalaryCheckbox = document.getElementById('leaveSalaryCheckbox');
    const leaveSalaryInput = document.getElementById('leaveSalaryInput');
    const gratuityCheckbox = document.getElementById('gratuityCheckbox');
    const gratuityInput = document.getElementById('gratuityInput');
    const salaryDepositInput = document.getElementById('salaryDepositInput');
    const salaryAdvanceInput = document.getElementById('salaryAdvanceInput');
    const loanInput = document.getElementById('loanInput');
    const airTicketInput = document.getElementById('airTicketInput');
    const telephoneExpenseInput = document.getElementById('telephoneExpenseInput');
    const totalSalaryInput = document.getElementById('totalSalary');

    // Function to calculate and update the total salary
    function calculateTotalSalary() {
        // Parse the values of all input fields
        const basicSalary = parseFloat(basicSalaryInput.value) || 0;
        const basicAllowance = parseFloat(basicAllowanceInput.value) || 0;
        const fixedOt = parseFloat(fixedOtInput.value) || 0;

        const daysCount = parseFloat(daysCountInput.value) || 0;
        const ot = parseFloat(otInput.value) || 0;
        const hours = parseFloat(hoursInput.value) || 0;
        const bonus = parseFloat(bonusInput.value) || 0;

        let leaveSalary = 0;
        let gratuity = 0;

        // Calculate Leave salary if the checkbox is checked
        if (leaveSalaryCheckbox.checked) {
            leaveSalary = (basicSalary /30) * 21 * 1;
            leaveSalaryInput.value = leaveSalary.toFixed(2);
        } else {
            leaveSalaryInput.value = '';
        }

        // Calculate Gratuity if the checkbox is checked
        if (gratuityCheckbox.checked) {
            gratuity = (basicSalary /30) * 21 * 1;
            gratuityInput.value = gratuity.toFixed(2);
        } else {
            gratuityInput.value = '';
        }

        // Parse the value of the salary deposit input field
        const salaryDeposit = parseFloat(salaryDepositInput.value) || 0;

        // Parse the values of the expense input fields
        const salaryAdvance = parseFloat(salaryAdvanceInput.value) || 0;
        const loan = parseFloat(loanInput.value) || 0;
        const airTicket = parseFloat(airTicketInput.value) || 0;
        const telephoneExpense = parseFloat(telephoneExpenseInput.value) || 0;

        const daysAmount = parseFloat((basicSalary + basicAllowance + fixedOt) /30 * daysCount) || 0;
        const otAmount = parseFloat((basicSalary + basicAllowance + fixedOt) /30 * ot) || 0;
        const hoursAmount = parseFloat((basicSalary) /30  / daysCount * hours) || 0;

        // Calculate the total salary by subtracting the expenses
        const totalSalary = daysAmount + otAmount + hoursAmount + bonus + leaveSalary + gratuity + salaryDeposit + airTicket - salaryAdvance - loan  - telephoneExpense;

        // Update the total salary input field with the calculated value
        daysAmountInput.value = daysAmount.toFixed(2);
        otAmountInput.value = otAmount.toFixed(2);
        hoursAmountInput.value = hoursAmount.toFixed(2);
        totalSalaryInput.value = totalSalary.toFixed(2);
    }

    // Add event listeners to the salary and expense inputs and checkboxes to trigger the calculation
    basicSalaryInput.addEventListener('input', calculateTotalSalary);
    basicAllowanceInput.addEventListener('input', calculateTotalSalary);
    fixedOtInput.addEventListener('input', calculateTotalSalary);
    daysCountInput.addEventListener('input', calculateTotalSalary);
    otInput.addEventListener('input', calculateTotalSalary);
    hoursInput.addEventListener('input', calculateTotalSalary);
    bonusInput.addEventListener('input', calculateTotalSalary);
    leaveSalaryCheckbox.addEventListener('change', calculateTotalSalary);
    gratuityCheckbox.addEventListener('change', calculateTotalSalary);
    salaryDepositInput.addEventListener('input', calculateTotalSalary);
    salaryAdvanceInput.addEventListener('input', calculateTotalSalary);
    loanInput.addEventListener('input', calculateTotalSalary);
    airTicketInput.addEventListener('input', calculateTotalSalary);
    telephoneExpenseInput.addEventListener('input', calculateTotalSalary);
</script>

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
    function ecalculateTotalSalary() {
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

        // Calculate Leave salary if the checkbox is checked
        if (eleaveSalaryCheckbox.checked) {
            eleaveSalary = (ebasicSalary /30) * 21 * 1;
            eleaveSalaryInput.value = eleaveSalary.toFixed(2);
        } else {
            eleaveSalaryInput.value = '';
        }

        // Calculate Gratuity if the checkbox is checked
        if (egratuityCheckbox.checked) {
            egratuity = (ebasicSalary /30) * 21 * 1;
            egratuityInput.value = egratuity.toFixed(2);
        } else {
            egratuityInput.value = '';
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
    ebasicSalaryInput.addEventListener('input', ecalculateTotalSalary);
    ebasicAllowanceInput.addEventListener('input', ecalculateTotalSalary);
    efixedOtInput.addEventListener('input', ecalculateTotalSalary);
    edaysCountInput.addEventListener('input', ecalculateTotalSalary);
    eotInput.addEventListener('input', ecalculateTotalSalary);
    ehoursInput.addEventListener('input', ecalculateTotalSalary);
    ebonusInput.addEventListener('input', ecalculateTotalSalary);
    eleaveSalaryCheckbox.addEventListener('change', ecalculateTotalSalary);
    egratuityCheckbox.addEventListener('change', ecalculateTotalSalary);
    esalaryDepositInput.addEventListener('input', ecalculateTotalSalary);
    esalaryAdvanceInput.addEventListener('input', ecalculateTotalSalary);
    eloanInput.addEventListener('input', ecalculateTotalSalary);
    eairTicketInput.addEventListener('input', ecalculateTotalSalary);
    etelephoneExpenseInput.addEventListener('input', ecalculateTotalSalary);
</script>

</body>
