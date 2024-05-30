<?php include "in-connection.php";?>
<!DOCTYPE HTML>
<html lang="en">
<head>

    <?php include '../user-layouts/head.php';?>
    <style>
        #menu-signup {
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
        <?php
            $document_type_id = $_GET['document_type_id'];
            include "in-connection.php";
            $query = "SELECT dt_name FROM document_types WHERE dt_id = '$document_type_id'";
            $result = mysqli_query($con, $query); // Assuming you have a valid database connection

            // Fetch the data and populate the menu
            $data = mysqli_fetch_assoc($result);
        ?>
        <?php if ($data['dt_name'] === 'employee details'): ?>
            <div class="content-boxed content-boxed-full">
                <div class="content bottom-20">
                    
                    <div class="contact-information last-column">
                        <div class="container top-20">
                            <h3 class="bolder">Employee details 
                                
                            <span><a data-menu="menu-empdtedit" href="#" style="position: absolute;right: 30px; font-size:20px;" onclick="clearDateInputs()"><i class="fas fa-edit" style="color: #8a1739;"></i></a></span>
                                        
                                
                            </h3> 
                        
                            <div class="divider bottom-20"></div>
                            <?php
                                $document_name_id = $_GET['document_name_id'];
                                include "in-connection.php";

                                // Fetch data from the salary table
                                $query = "SELECT employee_name, passport_no, mobile, nationality, qid, DATE_FORMAT(qid_exp_dte, '%d/%m/%Y') AS formatted_qid_exp_dte, DATE_FORMAT(join_date, '%d/%m/%Y') AS formatted_join_date, DATE_FORMAT(date_last_vacation, '%d/%m/%Y') AS formatted_date_last_vacation, DATE_FORMAT(rejoining_date, '%d/%m/%Y') AS formatted_rejoining_date, basic_salary, allowance, fixed_ot FROM employee_details WHERE document_name_id_fk = '$document_name_id'";
                                $result = mysqli_query($con, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);

                                $employeeName = $row['employee_name'];
                                $passportNo = $row['passport_no'];
                                $mobile = $row['mobile'];
                                $nationality = $row['nationality'];
                                $qid = $row['qid'];
                                $qidExpDate = $row['formatted_qid_exp_dte'];
                                $formatted_join_date = $row['formatted_join_date'];
                                $formatted_date_last_vacation = $row['formatted_date_last_vacation'];
                                $formatted_rejoining_date = $row['formatted_rejoining_date'];
                                $basicSalary = $row['basic_salary'];
                                $allowance = $row['allowance'];
                                $fixed_ot = $row['fixed_ot'];

                                
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
                                echo '<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 511 511" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M215.5 352h16v15h-16zM247.5 352h16v15h-16zM279.5 352h16v15h-16z" fill="#8a1739" data-original="#000000" class="" opacity="1"></path><path d="M432.312 219.015c-14.362-27.404-35.26-51.461-60.432-69.569l-8.76 12.176c17.601 12.663 32.937 28.471 45.116 46.379h-50.344c-4.816-13.294-10.598-25.719-17.296-37.027C352.823 147.291 359 124.718 359 103.5 359 46.43 312.57 0 255.5 0S152 46.43 152 103.5c0 21.218 6.177 43.791 18.405 67.473-6.698 11.309-12.48 23.733-17.296 37.027h-50.344c12.179-17.908 27.515-33.716 45.116-46.379l-8.76-12.176c-25.172 18.108-46.069 42.165-60.432 69.569C63.846 247.335 56 279.316 56 311.5 56 421.505 145.495 511 255.5 511S455 421.505 455 311.5c0-32.184-7.846-64.165-22.688-92.485zM248 495.521c-24.368-3.107-47.292-21.307-65.218-52.036-5.135-8.803-9.692-18.344-13.638-28.485H248zm15 0V415h78.856c-3.946 10.142-8.503 19.682-13.638 28.485-17.926 30.729-40.85 48.929-65.218 52.036zM263 400v-16.5h-15V400h-84.108c-7.748-24.697-12.146-52.255-12.799-81H248v16.5h15V319h96.907c-.653 28.745-5.051 56.303-12.799 81zM71.165 319h64.925c.623 28.527 4.781 56.022 12.134 81H93.653c-13.301-24.228-21.312-51.748-22.488-81zm134.401-96c18.396 22.225 35.877 38.194 42.434 43.94V304h-96.903c.672-28.499 5.153-56.225 12.896-81zm99.868 0h41.573c7.743 24.775 12.224 52.501 12.896 81H263v-37.06c6.557-5.746 24.038-21.715 42.434-43.94zm69.476 96h64.925c-1.176 29.252-9.187 56.772-22.488 81h-54.572c7.353-24.978 11.512-52.473 12.135-81zm42.498-96c.543.991 1.093 1.978 1.618 2.979 12.568 23.979 19.69 50.806 20.802 78.021H374.91c-.618-28.627-4.765-56.079-12.103-81zm-75.621-15h-24.583c5.444-7.333 10.36-14.58 14.747-21.733 3.598 6.835 6.885 14.101 9.836 21.733zM255.5 15c48.799 0 88.5 39.701 88.5 88.5 0 65.465-69.415 132.753-88.503 150.014C236.403 236.265 167 169.043 167 103.5c0-48.799 39.701-88.5 88.5-88.5zm-76.451 171.267c4.387 7.153 9.303 14.399 14.747 21.733h-24.583c2.951-7.632 6.238-14.898 9.836-21.733zm-87.074 39.712c.524-1 1.074-1.988 1.618-2.979h54.601c-7.338 24.921-11.485 52.373-12.103 81H71.172c1.112-27.215 8.234-54.042 20.803-78.021zM102.841 415h50.302c4.672 12.915 10.247 25.012 16.683 36.044 8.405 14.408 17.904 26.4 28.205 35.78-39.1-12.848-72.476-38.428-95.19-71.824zm210.128 71.824c10.301-9.38 19.8-21.372 28.205-35.78 6.435-11.032 12.01-23.129 16.683-36.044h50.302c-22.714 33.396-56.09 58.976-95.19 71.824z" fill="#8a1739" data-original="#000000" class="" opacity="1"></path><path d="M327 103.5c0-39.425-32.075-71.5-71.5-71.5S184 64.075 184 103.5s32.075 71.5 71.5 71.5 71.5-32.075 71.5-71.5zM255.5 47c19.5 0 36.723 9.931 46.881 25h-93.762C218.777 56.931 236 47 255.5 47zm-54.036 40h108.072c1.598 5.222 2.464 10.761 2.464 16.5s-.866 11.278-2.464 16.5H201.464c-1.598-5.222-2.464-10.761-2.464-16.5s.866-11.278 2.464-16.5zm7.155 48h93.762C292.223 150.069 275 160 255.5 160s-36.723-9.931-46.881-25z" fill="#8a1739" data-original="#000000" class="" opacity="1"></path></g></svg></i>';
                                echo '<span>Nationality : ' . $nationality . '</span>';
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

                                ?>

                        </div>
                    </div>
                    
                </div>
            </div>
        <?php endif; ?>
        <?php
            if (isset($_SESSION['user_id'])) {
                // User is logged in, retrieve the user ID
                $user_id = $_SESSION['user_id'];
                $company_id = $_GET['company_id'];
                $document_type_id = $_GET['document_type_id'];
                $document_name_id = $_GET['document_name_id'];

                // Check if the expireDate parameter is set
                if (isset($_GET['expireDate'])) {
                    $expireDate = $_GET['expireDate'];
                    // Fetch document type names for the user's companies with the specified expire date
                    $query = "SELECT * FROM company_registrations WHERE user_id = '$user_id' AND company_id='$company_id' AND document_type_id='$document_type_id' AND document_name_id='$document_name_id' AND expire_date='$expireDate'";
                } else {
                    // Fetch all document type names for the user's companies
                    $query = "SELECT * FROM company_registrations WHERE user_id = '$user_id' AND company_id='$company_id' AND document_type_id='$document_type_id' AND document_name_id='$document_name_id'";
                }

                $result = mysqli_query($con, $query);

                // Check if any results were returned
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $registration_name = $row['registration_name'];
                        $expire_date = $row['expire_date'];
                        $custom_fields = $row['custom_fields'];
                        $file_name = $row['file_name'];
                        // Generate the HTML code for each company
                        echo '<a href="view.php?id=' . $id . '&company_id=' . $company_id . '&document_type_id=' . $document_type_id . '&document_name_id=' . $document_name_id . '" class="content-boxed" style="background-color: #8a1739;">';
                        echo '    <div class="content bottom-0">';
                        echo '        <h1 class="bolder bottom-0 text-center uppercase" style="color:white;">' . $registration_name . '</h1>';
                        echo '        <p class="under-heading color-highlight font-12 bottom-10"></p>';
                        echo '        <p> </p>';
                        echo '    </div>';
                        echo '</a>';
                    }
                } else {
                    //echo "No company registration found for the user's companies.";
                }
            } else {
                echo "Please log in.";
            }
        ?>

        
        <?php
            $query="SELECT *
            FROM document_names
            JOIN document_types ON document_names.document_type_id = document_types.dt_id
            WHERE document_names.user_id = '$user_id'
                AND document_names.company_id = '$company_id'
                AND document_names.document_type_id = '$document_type_id'
                AND document_types.dt_name = 'employee details'";

            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                // If the query returns a result, display the <a> tag
                echo '<a href="salary.php?company_id=' . $company_id . '&document_type_id=' . $document_type_id . '&document_name_id=' . $document_name_id . '" class="content-boxed" style="background-color: #8a1739;">
                    <div class="content bottom-0">
                        <h1 class="bolder bottom-0 text-center uppercase" style="color:white;">salary</h1>
                        <p class="under-heading color-highlight font-12 bottom-10"></p>
                        <p> </p>
                    </div>
                </a>';
            } else {
                // If the query does not return a result, display an alternative content
                //echo 'Alternative content here';
            }
        ?>

        
    </div>

    <div id="circle-button" class="fab fab-circle button button-round-huge shadow-large" style="background-color: #8a1739;">
        <a data-menu="menu-signup" href="#"><i class="fas fa-plus" style="color: white;"></i></a>
    </div>
            
    <div id="menu-signup" class="menu menu-box-bottom menu-box-detached round-medium" data-menu-height="620" data-menu-effect="menu-over" style="position: fixed; max-height: 620px; overflow-y: auto;">
        <div class="content">
        <?php
            $document_type_id = $_GET['document_type_id'];
            include "in-connection.php";
            $query = "SELECT dt_name FROM document_types WHERE dt_id = '$document_type_id'";
            $result = mysqli_query($con, $query); // Assuming you have a valid database connection

            // Fetch the data and populate the menu
            $data = mysqli_fetch_assoc($result);
        ?>
            <h2 class="uppercase ultrabold top-20">Add <?php echo $data['dt_name']; ?></h2>
            <p class="font-11 under-heading bottom-40"></p>
            <form id="company_registration" action="../function/company-registration/create.php?company_id=<?php echo $_GET['company_id']; ?>&document_type_id=<?php echo $_GET['document_type_id']; ?>&document_name_id=<?php echo $_GET['document_name_id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Registration Name</span>
                    <em>(required)</em>
                    <input type="text" name="registration_name" placeholder="Enter <?php echo $data['dt_name']; ?> name" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Registration No</span>
                    <em>(required)</em>
                    <input type="text" name="registration_no" placeholder="Enter <?php echo $data['dt_name']; ?> no" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Expire Date</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <input type="date" name="expire_date" placeholder="Enter expire date" required>
                </div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Company Document</span>
                    <em>(required)</em>
                    <input type="file" name="document" placeholder="Upload document" required>
                </div>
                <div id="custom-fields-container"></div>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <span>Select Field Type</span>
                    <em>(required)</em>
                    <select id="field-type" onchange="updatePlaceholder()">
                        <option value="text">Text</option>
                        <option value="date">Date</option>
                    </select>
                </div>
                <a href="#" class="button button-m shadow-small button-round-small bottom-20" style="background-color: #8a1739;" onclick="addCustomField()">Add New Field</a>
                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('company_registration').submit();">Add</a>
            </form>
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
                        <span>Nationality</span>
                        <input type="text" name="nationality" placeholder="Enter Nationality" value="<?php echo $data['nationality']; ?>">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>QID No</span>
                        <input type="text" name="qid" placeholder="Enter QID No" value="<?php echo $data['qid']; ?>">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>QID Expiry Date</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <input type="date" name="qid_exp_dte" placeholder="Enter QID Expiry Date" value="<?php echo $data['qid_exp_dte']; ?>">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Basic Salary</span>
                        <input type="text" name="basic_salary" placeholder="Enter Basic Salary" value="<?php echo $data['basic_salary']; ?>">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Allowance</span>
                        <input type="text" name="allowance" placeholder="Enter Allowance" value="<?php echo $data['allowance']; ?>">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Fixed OT</span>
                        <input type="text" name="fixed_ot" placeholder="Enter Fixed OT" value="<?php echo $data['fixed_ot']; ?>">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Date of First Joining</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <input type="date" name="join_date" placeholder="Enter Date of First Joining" value="<?php echo $data['join_date']; ?>">
                    </div>
                    
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Date of Last Vacation</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <input type="date" name="date_last_vacation" placeholder="Enter Date of Last Vacation" value="<?php echo $data['date_last_vacation']; ?>">
                    </div>
                    
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <span>Date of Re Joining</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <input type="date" name="rejoining_date" placeholder="Enter Date of Re Joining" value="<?php echo $data['rejoining_date']; ?>">
                    </div>

                    
                
                <!-- Additional input fields for salary details -->
                <!-- ... -->
                
                <a href="#" class="button button-full button-s shadow-large button-round-small top-20" style="background-color: #8a1739;" onclick="event.preventDefault(); document.getElementById('employee_update').submit();">Update</a>
            </form>
        </div>
    </div>


    <!-- Page Content Class Ends Here-->

    <!--Menu Settings-->
    <div id="menu-settings" class="menu menu-box-bottom menu-box-detached round-large" data-menu-height="310" data-menu-effect="menu-over" >
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
            window.addEventListener('resize', function() {
                var menuSignup = document.getElementById('menu-signup');
                menuSignup.style.height = window.innerHeight + 'px';
            });

            document.addEventListener('focusin', function(event) {
                var menuSignup = document.getElementById('menu-signup');
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
    var fieldIndex = 1;

    function addCustomField() {
        var container = document.getElementById('custom-fields-container');
        var inputName = 'custom_fields_' + fieldIndex;
        var fieldType = document.getElementById('field-type').value;
        var placeholder = '';

        if (fieldType === 'text') {
            placeholder = 'Enter reminder ' + fieldIndex;
        } else if (fieldType === 'date') {
            placeholder = 'Select date ' + fieldIndex;
        }

        var fieldDiv = document.createElement('div');
        fieldDiv.className = 'input-style has-icon input-style-1 input-required bottom-30';
        fieldDiv.innerHTML = `
            <span>Custom Field ${fieldIndex}</span>
            <input type="${fieldType}" name="${inputName}" placeholder="${placeholder}" required>
        `;

        container.appendChild(fieldDiv);

        fieldIndex++;
    }

    function updatePlaceholder() {
        var fieldType = document.getElementById('field-type').value;
        var fieldInputs = document.getElementsByName('custom_fields_');

        var placeholder = '';
        if (fieldType === 'text') {
            placeholder = 'Enter reminder';
        } else if (fieldType === 'date') {
            placeholder = 'Select date';
        }

        for (var i = 0; i < fieldInputs.length; i++) {
            fieldInputs[i].placeholder = placeholder + ' ' + (i + 1);
        }
    }
</script>
<script>
function clearDateInputs() {
  const dateLastVacationInput = document.getElementsByName('date_last_vacation')[0];
  const rejoiningDateInput = document.getElementsByName('rejoining_date')[0];
  
  if (dataIsNull) {
    dateLastVacationInput.value = '';
    rejoiningDateInput.value = '';
  }
}
</script>

</body>
