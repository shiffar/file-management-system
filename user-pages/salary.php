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
    #menu-saldtedit1 {
        overflow-y: auto;
        position: fixed;
    }
    #menu-saldtedit2 {
        overflow-y: auto;
        position: fixed;
    }
    #menu-empadd {
        overflow-y: auto;
        position: fixed;
    }
    #menu-empdtedit {
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
                            
                        <!--<span><a data-menu="menu-empdtedit" href="#" style="position: absolute;right: 30px; font-size:20px;"><i class="fas fa-edit" style="color: #8a1739;"></i></a></span>-->
                                    
                            
                        </h3> 
                    
                        <div class="divider bottom-20"></div>
                        <?php
                            $document_name_id = $_GET['document_name_id'];
                            include "in-connection.php";

                            // Fetch data from the salary table
                            $query = "SELECT employee_name,qid, DATE_FORMAT(qid_exp_dte, '%d/%m/%Y') AS formatted_qid_exp_dte FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
                            $result = mysqli_query($con, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            $employeeName = $row['employee_name'];
                            $qid = $row['qid'];
                            $qidExpDate = $row['formatted_qid_exp_dte'];
                            $document_name_id = $_GET['document_name_id'];
                            
                            echo '<div class="link-list link-list-1">';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 512 512.002" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M210.352 246.633c33.882 0 63.222-12.153 87.195-36.13 23.973-23.972 36.125-53.304 36.125-87.19 0-33.876-12.152-63.211-36.129-87.192C273.566 12.152 244.23 0 210.352 0c-33.887 0-63.22 12.152-87.192 36.125s-36.129 53.309-36.129 87.188c0 33.886 12.156 63.222 36.133 87.195 23.977 23.969 53.313 36.125 87.188 36.125zM426.129 393.703c-.692-9.976-2.09-20.86-4.149-32.351-2.078-11.579-4.753-22.524-7.957-32.528-3.308-10.34-7.808-20.55-13.37-30.336-5.774-10.156-12.555-19-20.165-26.277-7.957-7.613-17.699-13.734-28.965-18.2-11.226-4.44-23.668-6.69-36.976-6.69-5.227 0-10.281 2.144-20.043 8.5a2711.03 2711.03 0 0 1-20.879 13.46c-6.707 4.274-15.793 8.278-27.016 11.903-10.949 3.543-22.066 5.34-33.039 5.34-10.972 0-22.086-1.797-33.047-5.34-11.21-3.622-20.296-7.625-26.996-11.899-7.77-4.965-14.8-9.496-20.898-13.469-9.75-6.355-14.809-8.5-20.035-8.5-13.313 0-25.75 2.254-36.973 6.7-11.258 4.457-21.004 10.578-28.969 18.199-7.605 7.281-14.39 16.12-20.156 26.273-5.558 9.785-10.058 19.992-13.371 30.34-3.2 10.004-5.875 20.945-7.953 32.524-2.059 11.476-3.457 22.363-4.149 32.363A438.821 438.821 0 0 0 0 423.949c0 26.727 8.496 48.363 25.25 64.32 16.547 15.747 38.441 23.735 65.066 23.735h246.532c26.625 0 48.511-7.984 65.062-23.734 16.758-15.946 25.254-37.586 25.254-64.325-.004-10.316-.351-20.492-1.035-30.242zm0 0" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                            echo '<span>Employee name : ' . $employeeName . '</span>';
                            echo '</a>';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M453.332 0H58.668C26.305 0 0 26.305 0 58.668v266.664C0 357.695 26.305 384 58.668 384h394.664C485.695 384 512 357.695 512 325.332V58.668C512 26.305 485.695 0 453.332 0zM160 85.332c29.398 0 53.332 23.938 53.332 53.336C213.332 168.062 189.398 192 160 192s-53.332-23.938-53.332-53.332c0-29.398 23.934-53.336 53.332-53.336zm96 197.336c0 8.832-7.168 16-16 16H80c-8.832 0-16-7.168-16-16V272c0-32.363 26.305-58.668 58.668-58.668h74.664C229.695 213.332 256 239.637 256 272zm176 16H314.668c-8.832 0-16-7.168-16-16s7.168-16 16-16H432c8.832 0 16 7.168 16 16s-7.168 16-16 16zm0-85.336H314.668c-8.832 0-16-7.168-16-16s7.168-16 16-16H432c8.832 0 16 7.168 16 16s-7.168 16-16 16zM432 128H314.668c-8.832 0-16-7.168-16-16s7.168-16 16-16H432c8.832 0 16 7.168 16 16s-7.168 16-16 16zm0 0" fill="#8a1739" data-original="#000000" class="" opacity="1"></path></g></svg></i>';
                            echo '<span>QID no : ' . $qid . '</span>';
                            echo '</a>';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 34 34" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M29.6 2h-3v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-16v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-3C2.1 2 1 3.3 1 5v3.6h32V5c0-1.7-1.8-3-3.4-3zM1 10.7V29c0 1.8 1.1 3 2.7 3h26c1.6 0 3.4-1.3 3.4-3V10.7zm8.9 16.8H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm0-9H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                            echo '<span> QID expire date : ' . $qidExpDate . '</span>';
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
        <div class="content-boxed content-boxed-full">
            <div class="content bottom-20">
                
                <div class="contact-information last-column">
                    <div class="container top-20">
                        <h3 class="bolder">Employee Joining Details 
                            
                        <!--<span><a data-menu="menu-empdtedit" href="#" style="position: absolute;right: 30px; font-size:20px;"><i class="fas fa-edit" style="color: #8a1739;"></i></a></span>-->
                                    
                            
                        </h3> 
                    
                        <div class="divider bottom-20"></div>
                        <?php
                            $document_name_id = $_GET['document_name_id'];
                            include "in-connection.php";

                            // Fetch data from the salary table
                            $query = "SELECT DATE_FORMAT(join_date, '%d/%m/%Y') AS formatted_join_date, DATE_FORMAT(date_last_vacation, '%d/%m/%Y') AS formatted_date_last_vacation, DATE_FORMAT(rejoining_date, '%d/%m/%Y') AS formatted_rejoining_date FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
                            $result = mysqli_query($con, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            $formatted_join_date = $row['formatted_join_date'];
                            $formatted_date_last_vacation = $row['formatted_date_last_vacation'];
                            $formatted_rejoining_date = $row['formatted_rejoining_date'];
                            
                            echo '<div class="link-list link-list-1">';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 34 34" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M29.6 2h-3v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-16v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-3C2.1 2 1 3.3 1 5v3.6h32V5c0-1.7-1.8-3-3.4-3zM1 10.7V29c0 1.8 1.1 3 2.7 3h26c1.6 0 3.4-1.3 3.4-3V10.7zm8.9 16.8H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm0-9H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                            echo '<span>Employee join date : ' . $formatted_join_date . '</span>';
                            echo '</a>';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 34 34" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M29.6 2h-3v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-16v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-3C2.1 2 1 3.3 1 5v3.6h32V5c0-1.7-1.8-3-3.4-3zM1 10.7V29c0 1.8 1.1 3 2.7 3h26c1.6 0 3.4-1.3 3.4-3V10.7zm8.9 16.8H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm0-9H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                            echo '<span>Employee last vacation date : ' . $formatted_date_last_vacation . '</span>';
                            echo '</a>';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 34 34" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M29.6 2h-3v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-16v3c0 .6-.5 1-1 1s-1-.4-1-1V2h-3C2.1 2 1 3.3 1 5v3.6h32V5c0-1.7-1.8-3-3.4-3zM1 10.7V29c0 1.8 1.1 3 2.7 3h26c1.6 0 3.4-1.3 3.4-3V10.7zm8.9 16.8H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm0-9H7.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8H10c.4 0 .8.3.8.8v2.5c-.1.5-.4.8-.9.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm8 9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8zm0-9h-2.5c-.4 0-.8-.3-.8-.8v-2.5c0-.4.3-.8.8-.8h2.5c.4 0 .8.3.8.8v2.5c0 .5-.3.8-.8.8z" fill="#8a1739" data-original="#000000" class=""></path></g></svg></i>';
                            echo '<span>Employee re-joining date : ' . $formatted_rejoining_date . '</span>';
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

        <div class="content-boxed content-boxed-full">
            <div class="content bottom-20">
                
                <div class="contact-information last-column">
                    <div class="container top-20">
                        <h3 class="bolder">Employee Basic Salary Details 
                            
                        <!--<span><a data-menu="menu-empdtedit" href="#" style="position: absolute;right: 30px; font-size:20px;"><i class="fas fa-edit" style="color: #8a1739;"></i></a></span>-->
                                    
                            
                        </h3> 
                    
                        <div class="divider bottom-20"></div>
                        <?php
                            $document_name_id = $_GET['document_name_id'];
                            include "in-connection.php";

                            // Fetch data from the salary table
                            $query = "SELECT basic_salary, allowance, fixed_ot FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
                            $result = mysqli_query($con, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            $basicSalary = $row['basic_salary'];
                            $allowance = $row['allowance'];
                            $fixed_ot = $row['fixed_ot'];
                            
                            echo '<div class="link-list link-list-1">';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="30" height="30" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M13.503 18.16a.999.999 0 0 0-1.188.767 3.727 3.727 0 0 0-.084.796c0 1.73 1.178 3.175 2.769 3.616v.614a1 1 0 1 0 2 0v-.614c1.591-.44 2.769-1.887 2.769-3.616 0-.274-.027-.534-.084-.796A3.789 3.789 0 0 0 16 15.954a1.779 1.779 0 0 1-1.73-1.396A1.77 1.77 0 0 1 16 12.415a1.77 1.77 0 0 1 1.73 2.143 1 1 0 1 0 1.955.422c.057-.262.084-.522.084-.795 0-1.73-1.178-3.176-2.769-3.618v-.613a1 1 0 0 0-2 0v.613c-1.591.442-2.769 1.888-2.769 3.618 0 .273.027.533.084.794a3.788 3.788 0 0 0 3.676 2.973l.009.002c.828 0 1.556.586 1.73 1.395A1.77 1.77 0 0 1 16 21.492a1.77 1.77 0 0 1-1.73-2.143 1 1 0 0 0-.767-1.189z" fill="#8a1739" data-original="#000000" class="" opacity="1"></path></g></svg></i>';
                            echo '<span>Employee basic salary : ' . $basicSalary . '</span>';
                            echo '</a>';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="30" height="30" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M13.503 18.16a.999.999 0 0 0-1.188.767 3.727 3.727 0 0 0-.084.796c0 1.73 1.178 3.175 2.769 3.616v.614a1 1 0 1 0 2 0v-.614c1.591-.44 2.769-1.887 2.769-3.616 0-.274-.027-.534-.084-.796A3.789 3.789 0 0 0 16 15.954a1.779 1.779 0 0 1-1.73-1.396A1.77 1.77 0 0 1 16 12.415a1.77 1.77 0 0 1 1.73 2.143 1 1 0 1 0 1.955.422c.057-.262.084-.522.084-.795 0-1.73-1.178-3.176-2.769-3.618v-.613a1 1 0 0 0-2 0v.613c-1.591.442-2.769 1.888-2.769 3.618 0 .273.027.533.084.794a3.788 3.788 0 0 0 3.676 2.973l.009.002c.828 0 1.556.586 1.73 1.395A1.77 1.77 0 0 1 16 21.492a1.77 1.77 0 0 1-1.73-2.143 1 1 0 0 0-.767-1.189z" fill="#8a1739" data-original="#000000" class="" opacity="1"></path></g></svg></i>';
                            echo '<span>Employee allowance : ' . $allowance . '</span>';
                            echo '</a>';
                            echo '<a href="#">';
                            echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="30" height="30" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M13.503 18.16a.999.999 0 0 0-1.188.767 3.727 3.727 0 0 0-.084.796c0 1.73 1.178 3.175 2.769 3.616v.614a1 1 0 1 0 2 0v-.614c1.591-.44 2.769-1.887 2.769-3.616 0-.274-.027-.534-.084-.796A3.789 3.789 0 0 0 16 15.954a1.779 1.779 0 0 1-1.73-1.396A1.77 1.77 0 0 1 16 12.415a1.77 1.77 0 0 1 1.73 2.143 1 1 0 1 0 1.955.422c.057-.262.084-.522.084-.795 0-1.73-1.178-3.176-2.769-3.618v-.613a1 1 0 0 0-2 0v.613c-1.591.442-2.769 1.888-2.769 3.618 0 .273.027.533.084.794a3.788 3.788 0 0 0 3.676 2.973l.009.002c.828 0 1.556.586 1.73 1.395A1.77 1.77 0 0 1 16 21.492a1.77 1.77 0 0 1-1.73-2.143 1 1 0 0 0-.767-1.189z" fill="#8a1739" data-original="#000000" class="" opacity="1"></path></g></svg></i>';
                            echo '<span>Employee fixed ot : ' . $fixed_ot . '</span>';
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
            <div class="content bottom-0">
                <h3 class="bolder">Employee Salary Details</h3>
                <p class="bottom-25">
                </p>
            </div>
        </div>
        <div class="table-scroll">
            <table class="table-borders-dark">
                <tr>
                    <th>Basic Salary</th>
                    <th>Basic Allowance</th>
                    <th>Fixed OT</th>
                    <th>Days Count</th>
                    <th>Days Amount</th>
                    <th>OT</th>
                    <th>OT Amount</th>
                    <th>Hours</th>
                    <th>Hours Amount</th>
                    <th>Bonus</th>
                    <th>Leave Salary</th>
                    <th>Gratuity</th>
                    <th>Salary Deposit</th>
                    <th>Salary Advance</th>
                    <th>Loan</th>
                    <th>Air Ticket</th>
                    <th>Telephone Expense</th>
                    <th>Total Salary</th>
                    <th>Created At</th>
                    <th>Salary status</th>
                    <th>Edit</th> <!-- Add the "Edit" column header -->
                </tr>
                <?php
                $document_type_id = $_GET['document_type_id'];
                $document_name_id = $_GET['document_name_id'];
                $company_id = $_GET['company_id'];
                // Assuming you have established a database connection
                include "in-connection.php";
                // Query to fetch salary details
                $sql = "SELECT * FROM salary WHERE document_name_id_fk = '$document_name_id';";
                $result = mysqli_query($con, $sql);

                // Check if the query was successful
                if ($result) {
                    // Check if there are any rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row of the result
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>'.$row['basic_salary'].'</td>';
                            echo '<td>'.$row['basic_allowance'].'</td>';
                            echo '<td>'.$row['fixed_ot'].'</td>';
                            echo '<td>'.$row['days_count'].'</td>';
                            echo '<td>'.$row['days_amount'].'</td>';
                            echo '<td>'.$row['ot'].'</td>';
                            echo '<td>'.$row['ot_amount'].'</td>';
                            echo '<td>'.$row['hours'].'</td>';
                            echo '<td>'.$row['hours_amount'].'</td>';
                            echo '<td>'.$row['bonus'].'</td>';
                            echo '<td>'.$row['leave_salary'].'</td>';
                            echo '<td>'.$row['gratuity'].'</td>';
                            echo '<td>'.$row['salary_deposit'].'</td>';
                            echo '<td>'.$row['salary_advance'].'</td>';
                            echo '<td>'.$row['loan'].'</td>';
                            echo '<td>'.$row['air_ticket'].'</td>';
                            echo '<td>'.$row['telephone_expense'].'</td>';
                            echo '<td>'.$row['total_salary'].'</td>';
                            echo '<td>'.$row['created_at'].'</td>';
                            echo '<td>'.$row['salary_status'].'</td>';
                            echo '<td><a href="../function/salary/edit_salary.php?salary_id='.$row['id'].'&company_id=' . $company_id . '&document_type_id=' . $document_type_id . '&document_name_id=' . $document_name_id . '" class="edit-button"><i class="fas fa-edit"></i></a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="19">No rows found.</td></tr>';
                    }

                    // Free the result set
                    mysqli_free_result($result);
                } else {
                    echo '<tr><td colspan="19">Error executing the query: '.mysqli_error($con).'</td></tr>';
                }

                // Close the database connection
                mysqli_close($con);
                ?>
            </table>
        </div>


        
    </div>
    
    <div id="circle-button" class="fab fab-circle button button-round-huge shadow-large" style="background-color: #8a1739;">
        <a data-menu="menu-confirm" href="#"><i class="fas fa-plus" style="color: white;"></i></a>
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
        $document_name_id = $_GET['document_name_id'];
        include "in-connection.php";
        $query = "SELECT * FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
        $result = mysqli_query($con, $query); // Assuming you have a valid database connection

        // Fetch the data and populate the menu
        $data = mysqli_fetch_assoc($result);
    ?>
    <div id="menu-saldtedit1" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="620" data-menu-effect="menu-over" style="position: fixed; max-height: 620px; overflow-y: auto;">
        <div class="content">
            <h2 class="uppercase ultrabold top-20">Add salary details</h2>
            <p class="font-11 under-heading bottom-40"></p>
            <form id="salary_edit" action="../function/salary/create.php?document_name_id=<?php echo $_GET['document_name_id']; ?>&create=1" method="POST">
                
                <h4 class="bolder">Salary Structure & Total Salary / Month</h4> 
                <div class="divider bottom-40"></div>
                <?php
                    $document_name_id = $_GET['document_name_id'];
                    include "in-connection.php";
                    $query = "SELECT * FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
                    $result = mysqli_query($con, $query); // Assuming you have a valid database connection

                    // Fetch the data and populate the menu
                    $data = mysqli_fetch_assoc($result);

                    // Determine the date for working period calculation
                    if (!empty($data['rejoining_date'])) {
                        $workingDate = $data['rejoining_date'];
                    } else {
                        $workingDate = $data['join_date'];
                    }

                    // Calculate the working period
                    $joinDate = $data['join_date'];
                    $currentDate = date('Y-m-d'); // Get the current date in 'Y-m-d' format
                    $workingPeriod = date_diff(date_create($workingDate), date_create($currentDate));
                    $years = $workingPeriod->y;
                    $months = $workingPeriod->m;
                    $days = $workingPeriod->d;
                ?>

                    <h4 class="bolder" style="display: inline;">Employee Working Period : </h4>
                    <h5 style="display: inline;"><span><?php echo ($data['rejoining_date']) ? "Rejoining: $years, Months: $months, Days: $days" : "Years since Joining: $years, Months: $months, Days: $days"; ?></span></h5>
                    <div class="bottom-40"></div>

                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Basic salary</span>
                        <input type="text" class="salary-input" name="basic_salary" id="basicSalaryInput" placeholder="basic salary" value="<?php echo $data['basic_salary']; ?>" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Basic allowance</span>
                        <input type="text" class="salary-input" name="basic_allowance" id="basicAllowanceInput" placeholder="allowance" value="<?php echo $data['allowance']; ?>" required>
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
                <input type="checkbox" name="salary_status" value="paid"> paid
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Date</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <input type="date" id="createdDateInput" name="created_date" placeholder="dd-mm-yyyy" required>
                </div>

                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('salary_edit').submit();">Add</a>
            </form>
        </div>
    </div>
    
    <div id="menu-saldtedit2" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="620" data-menu-effect="menu-over" style="position: fixed; max-height: 620px; overflow-y: auto;">
        <div class="content">
            <h2 class="uppercase ultrabold top-20">Edit salary details</h2>
            <p class="font-11 under-heading bottom-40"></p>
            <form id="salary_edit2" action="../function/salary/create.php?document_name_id=<?php echo $_GET['document_name_id']; ?>&create=2" method="POST">
                
                <h4 class="bolder">Salary Structure & Total Salary / Month</h4> 
                <div class="divider bottom-40"></div>
                <?php
                    $document_name_id = $_GET['document_name_id'];
                    include "in-connection.php";
                    $query = "SELECT * FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
                    $result = mysqli_query($con, $query); // Assuming you have a valid database connection

                    // Fetch the data and populate the menu
                    $data = mysqli_fetch_assoc($result);

                    // Determine the date for working period calculation
                    if (!empty($data['rejoining_date'])) {
                        $workingDate = $data['rejoining_date'];
                    } else {
                        $workingDate = $data['join_date'];
                    }

                    // Calculate the working period
                    $joinDate = $data['join_date'];
                    $currentDate = date('Y-m-d'); // Get the current date in 'Y-m-d' format
                    $workingPeriod = date_diff(date_create($workingDate), date_create($currentDate));
                    $years = $workingPeriod->y;
                    $months = $workingPeriod->m;
                    $days = $workingPeriod->d;
                ?>

                    <h4 class="bolder" style="display: inline;">Employee Working Period : </h4>
                    <h5 style="display: inline;"><span><?php echo ($data['rejoining_date']) ? "Rejoining: $years, Months: $months, Days: $days" : "Years since Joining: $years, Months: $months, Days: $days"; ?></span></h5>
                    <div class="bottom-40"></div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Basic salary</span>
                        <input type="text" class="esalary-input" name="ebasic_salary" id="ebasicSalaryInput" placeholder="basic salary" value="<?php echo $data['basic_salary']; ?>" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Basic allowance</span>
                        <input type="text" class="esalary-input" name="ebasic_allowance" id="ebasicAllowanceInput" placeholder="allowance" value="<?php echo $data['allowance']; ?>" required>
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
                        <input type="text" class="esalary-input" name="edays_count" id="edaysCountInput" placeholder="days" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Amount</span>
                        <input type="text" class="esalary-input" name="edays_amount" id="edaysAmount" placeholder="amount" required>
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Over time</span>
                        <input type="text" class="esalary-input" name="eot" id="eotInput" placeholder="over time" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Amount</span>
                        <input type="text" class="esalary-input" name="eot_amount" id="eotAmount" placeholder="amount" required>
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Hours</span>
                        <input type="text" class="esalary-input" name="ehours" id="ehoursInput" placeholder="hours" required>
                    </div>

                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Amount</span>
                        <input type="text" class="esalary-input" name="ehours_amount" id="ehoursAmount" placeholder="amount" required>
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-style has-icon input-style-1 input-required bottom-10">
                        <span>Bonus</span>
                        <input type="text" class="esalary-input" name="ebonus" id="ebonusInput" placeholder="bonus" required>
                    </div>
                </div>
                <h4 class="bolder">Payments due from company to Employee</h4> 
                <div class="divider bottom-40"></div>
                <?php
                $document_name_id = $_GET['document_name_id'];
                include "in-connection.php";
                $query = "SELECT * FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
                $result = mysqli_query($con, $query); // Assuming you have a valid database connection

                // Fetch the data and populate the menu
                $data = mysqli_fetch_assoc($result);

                // Determine the date for leave salary calculation
                if (!empty($data['rejoining_date'])) {
                    $leaveSalaryDate = $data['rejoining_date'];
                } else {
                    $leaveSalaryDate = $data['join_date'];
                }

                // Determine the date for gratuity calculation
                $gratuityDate = $data['join_date'];

                // Calculate the working period for leave salary
                $joinDate = $data['join_date'];
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
                    <input type="text" class="esalary-input" name="esalary_deposit" id="esalaryDepositInput" placeholder="Enter deposit amount" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Air ticket</span>
                    <em>(required)</em>
                    <input type="text" id="eairTicketInput" name="eair_ticket" class="esalary-input" placeholder="Enter air ticket expense" required>
                </div>
                <h4 class="bolder">Payment Due from Employee to Company</h4> 
                <div class="divider bottom-40"></div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Salary advance</span>
                    <em>(required)</em>
                    <input type="text" class="esalary-input" name="esalary_advance" id="esalaryAdvanceInput" placeholder="Enter salary advance" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Loan</span>
                    <em>(required)</em>
                    <input type="text" id="eloanInput" name="eloan" class="eexpense-input" placeholder="Enter loan amount" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Telephone expense</span>
                    <em>(required)</em>
                    <input type="text" id="etelephoneExpenseInput" name="etelephone_expense" class="eexpense-input" placeholder="Enter telephone expense" required>
                </div>
                <h4 class="bolder">NET AMOUNT PAYABLE/RECEIVABLE</h4> 
                <div class="divider bottom-40"></div>                                
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Total salary</span>
                    <em>(required)</em>
                    <input type="text" id="etotalSalary" name="etotal_salary" placeholder="Enter total salary" required>
                </div>
                <input type="checkbox" name="salary_status" value="paid"> paid
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Date</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <input type="date" id="createdDateInput" name="created_date" placeholder="dd-mm-yyyy" required>
                </div>
                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('salary_edit2').submit();">Add</a>
            </form>
        </div>
    </div>
    <div id="menu-empadd" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="420" data-menu-effect="menu-over" style="position: fixed; max-height: 420px; overflow-y: auto;">
        <div class="content">
            <h2 class="uppercase ultrabold top-20">Edit employee details</h2>
            <p class="font-11 under-heading bottom-40"></p>
            <form id="employee_create" action="../function/employee/create.php?document_name_id=<?php echo $_GET['document_name_id']; ?>" method="POST">
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Employee Name</span>
                    <em>(required)</em>
                    <input type="text" name="employee_name" placeholder="Enter employee name" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Passport No</span>
                    <em>(required)</em>
                    <input type="text" name="passport_no" placeholder="Enter passport no" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Mobile</span>
                    <em>(required)</em>
                    <input type="text" name="mobile" placeholder="Enter mobile no" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Join Date</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <input type="date" name="join_date" placeholder="dd-mm-yyyy" required>
                </div>
                
                <!-- Additional input fields for salary details -->
                <!-- ... -->
                
                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('employee_create').submit();">Add</a>
            </form>
        </div>
    </div>
    <?php
        $document_name_id = $_GET['document_name_id'];
        include "in-connection.php";
        $query = "SELECT emp_id,employee_name, passport_no, mobile, DATE_FORMAT(join_date, '%d/%m/%Y') AS formatted_join_date FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
        $result = mysqli_query($con, $query); // Assuming you have a valid database connection

        // Fetch the data and populate the menu
        $data = mysqli_fetch_assoc($result);
    ?>

    <div id="menu-empdtedit" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="420" data-menu-effect="menu-over" style="position: fixed; max-height: 420px; overflow-y: auto;">
        <div class="content">
            <h2 class="uppercase ultrabold top-20">Edit employee details</h2>
            <p class="font-11 under-heading bottom-40"></p>
            <form id="employee_update" action="../function/employee/update.php?employee_id=<?php echo $data['emp_id']; ?>" method="POST">
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
                
                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('employee_update').submit();">Update</a>
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
<?php include '../user-layouts/script.php';?>
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
include "in-connection.php";

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
</body>
