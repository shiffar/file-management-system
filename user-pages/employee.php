<?php include "in-connection.php";?>
<!DOCTYPE HTML>
<html lang="en">
<head>

    <?php include '../user-layouts/head.php';?>
    <style>
        .search-form {
    display: flex;
    align-items: center;
}

.search-form .input-style {
    flex-grow: 1;
    margin-right: 10px;
}

.search-form button {
    flex-shrink: 0;
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
        
        <div data-height="vh" class="caption"></div>  
        <div class="content">
        <?php
// Check if the search form is submitted
if (isset($_GET['search'])) {
    // Get the search query from the form input
    $searchQuery = $_GET['search'];
    $company_id = $_GET['company_id'];
    // Modify the original query to include the search condition
    $query = "
    SELECT *
    FROM `document_names` dn
    JOIN `document_types` dt ON dn.`document_type_id` = dt.`dt_id`
    JOIN `salary` s ON dn.`dn_id` = s.`document_name_id_fk`
    JOIN `companies` c ON c.`c_id` = dn.`company_id`
    JOIN `employee_details` ed ON ed.`document_name_id_fk` = dn.`dn_id`
    WHERE dt.`dt_name` = 'employee details' AND dn.company_id = " . $company_id . "
    AND (
        ed.`employee_name` LIKE '%$searchQuery%' 
        OR ed.`passport_no` LIKE '%$searchQuery%'
        OR ed.`mobile` LIKE '%$searchQuery%'
        OR ed.`join_date` LIKE '%$searchQuery%'
        OR s.`basic_salary` LIKE '%$searchQuery%'
        OR s.`basic_allowance` LIKE '%$searchQuery%'
        OR s.`fixed_ot` LIKE '%$searchQuery%'
        OR s.`days_count` LIKE '%$searchQuery%'
        OR s.`days_amount` LIKE '%$searchQuery%'
        OR s.`ot` LIKE '%$searchQuery%'
        OR s.`ot_amount` LIKE '%$searchQuery%'
        OR s.`hours` LIKE '%$searchQuery%'
        OR s.`hours_amount` LIKE '%$searchQuery%'
        OR s.`bonus` LIKE '%$searchQuery%'
        OR s.`leave_salary` LIKE '%$searchQuery%'
        OR s.`gratuity` LIKE '%$searchQuery%'
        OR s.`salary_deposit` LIKE '%$searchQuery%'
        OR s.`salary_advance` LIKE '%$searchQuery%'
        OR s.`loan` LIKE '%$searchQuery%'
        OR s.`air_ticket` LIKE '%$searchQuery%'
        OR s.`telephone_expense` LIKE '%$searchQuery%'
        OR s.`total_salary` LIKE '%$searchQuery%'
        OR s.`salary_status` LIKE '%$searchQuery%'
    )
    ";
} else {
    // Default query without search condition
    $company_id = $_GET['company_id'];
    $query = "
    SELECT *
    FROM `document_names` dn
    JOIN `document_types` dt ON dn.`document_type_id` = dt.`dt_id`
    JOIN `salary` s ON dn.`dn_id` = s.`document_name_id_fk`
    JOIN `companies` c ON c.`c_id` = dn.`company_id`
    JOIN `employee_details` ed ON ed.`document_name_id_fk` = dn.`dn_id`
    WHERE dt.`dt_name` = 'employee details' AND dn.company_id = " . $company_id . "
    ";
}

$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Begin generating the HTML table structure
    echo '<div class="content-boxed">
                <div class="content bottom-0">
                    <h3 class="bolder uppercase text-center">Employee & Salary Details</h3>
                    <p class="bottom-25">
                        
                    </p>
                </div>
            </div>';

    // Display the search form
    echo '<div id="search-form" class="search-form">
                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-search"></i>
                    <input type="name" id="search-input" name="search" placeholder="Search..." value="' . (isset($_GET['search']) ? $_GET['search'] : '') . '" oninput="performSearch()">
                </div>
                <div class="pdf-download">
                    <a href="#" id="download-btn" onclick="generatePDF()" class="button button-xxs shadow-small button-round-small bg-blue2-dark">Download as PDF</a>
                </div>
            </div>';

    // Display the first table
    echo '<div class="table-scroll">			
            <table id="search-results" class="table-borders-dark">
                <tr>
                    <th>Employee Name</th>
                    <th>Passport Number</th>
                    <th>Mobile</th>
                    <th>Join Date</th>
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
                    <th>Salary Status</th>
                </tr>';

    // Fetch and display each row of data for the first table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['employee_name'] . '</td>';
        echo '<td>' . $row['passport_no'] . '</td>';
        echo '<td>' . $row['mobile'] . '</td>';
        echo '<td>' . $row['join_date'] . '</td>';
        echo '<td>' . $row['basic_salary'] . '</td>';
        echo '<td>' . $row['basic_allowance'] . '</td>';
        echo '<td>' . $row['fixed_ot'] . '</td>';
        echo '<td>' . $row['days_count'] . '</td>';
        echo '<td>' . $row['days_amount'] . '</td>';
        echo '<td>' . $row['ot'] . '</td>';
        echo '<td>' . $row['ot_amount'] . '</td>';
        echo '<td>' . $row['hours'] . '</td>';
        echo '<td>' . $row['hours_amount'] . '</td>';
        echo '<td>' . $row['bonus'] . '</td>';
        echo '<td>' . $row['leave_salary'] . '</td>';
        echo '<td>' . $row['gratuity'] . '</td>';
        echo '<td>' . $row['salary_deposit'] . '</td>';
        echo '<td>' . $row['salary_advance'] . '</td>';
        echo '<td>' . $row['loan'] . '</td>';
        echo '<td>' . $row['air_ticket'] . '</td>';
        echo '<td>' . $row['telephone_expense'] . '</td>';
        echo '<td>' . $row['total_salary'] . '</td>';
        echo '<td>' . $row['salary_status'] . '</td>';
        echo '</tr>';
    }

    // Close the first HTML table
    echo '</table>
        </div>';

    // Display the second table
    echo '<div class="table-scroll">			
            <table id="search-results2" class="table-borders-dark" style="display: none;">
                <tr>
                    <th>Employee Details</th>
                    <th>Salary Structure</th>
                    <th>Company to Employee</th>
                    <th>Employee to Company</th>
                    <th>Total Salary</th>
                    <th>Status</th>
                </tr>';

    // Fetch and display each row of data for the second table
    mysqli_data_seek($result, 0); // Reset the result pointer
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td> Employee name : ' . $row['employee_name'] .'<br>Passport No:'. $row['passport_no'] .'<br>Mobile No:'. $row['mobile'] .'<br>Join Date:'. $row['join_date'] .'</td>';
        echo '<td> Basic Salary : ' . $row['basic_salary'] .'<br>Basic Allowance : '. $row['basic_allowance'] .'<br>Fixed OT : '. $row['fixed_ot'] .'</td>';
        echo '<td> Days Count : ' . $row['days_count'] . '<br>Days Amount : '. $row['days_amount'] .'<br>OT:'. $row['ot'] .'<br>OT Amount:'. $row['ot_amount'] .'<br>Hours:'. $row['hours'] .'<br>Hours Amount:'. $row['hours_amount'] .'<br>Bonus:'. $row['bonus'] .'<br>Leave Salary:'. $row['leave_salary'] .'<br>Gratuity:'. $row['gratuity'] .'</td>';
        echo '<td>Salary Deposit : ' . $row['salary_deposit'] . '<br>Salary Advance : '. $row['salary_advance'] .'<br>Loan : '. $row['loan'] .'<br>Air Ticket : '. $row['air_ticket'] .'<br>Telephone Expense : '. $row['telephone_expense'] .'</td>';
        echo '<td>' . $row['total_salary'] . '</td>';
        echo '<td>' . $row['salary_status'] . '</td>';
        echo '</tr>';
    }

    // Close the second HTML table
    echo '</table>
        </div>';

    // Include JavaScript to handle live search and PDF download
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    
    <script>
    function performSearch() {
        var searchInput = document.getElementById("search-input").value.toLowerCase();
        var rows1 = document.getElementById("search-results").getElementsByTagName("tr");
        var rows2 = document.getElementById("search-results2").getElementsByTagName("tr");
      
        for (var i = 1; i < rows1.length; i++) {
          var rowData = rows1[i].innerText.toLowerCase();
      
          if (rowData.includes(searchInput)) {
            rows1[i].style.display = ""; // Show the row
          } else {
            rows1[i].style.display = "none"; // Hide the row
          }
        }
      
        for (var i = 1; i < rows2.length; i++) {
          var rowData = rows2[i].innerText.toLowerCase();
      
          if (rowData.includes(searchInput)) {
            rows2[i].style.display = ""; // Show the row
          } else {
            rows2[i].style.display = "none"; // Hide the row
          }
        }
      }
      
    
      // Create a new jsPDF instance
      var doc = new jsPDF();
    
      // Define the button click event handler
      function generatePDF() {
        // Hide the first table
        document.getElementById("search-results").style.display = "none";
    
        // Show the second table
        document.getElementById("search-results2").style.display = "table";
    
        // Get the table element (second table)
        var table = document.getElementById("search-results2");
    
        // Convert the table to a PDF using jsPDF AutoTable plugin
        doc.autoTable({ html: table });
    
        // Save the PDF
        doc.save("employee_salary_details.pdf");
    
        // Hide the second table again
        document.getElementById("search-results2").style.display = "none";
    
        // Show the first table again
        document.getElementById("search-results").style.display = "table";
      }
    </script>
    ';
} else {
    // If the query fails, display an error message
    echo 'Error: ' . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>









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
