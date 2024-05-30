<?php  
 //fetch.php  
 include('../../connection.php');
 if(isset($_POST["company_id"]))  
 {  
      $query = "SELECT * FROM companies WHERE c_id = '".$_POST["company_id"]."'";  
      $result = mysqli_query($con, $query);   
      foreach($result as $row)
          {
            $output['company_name'] =$row["c_name"];
          }
      echo json_encode($output);  
 }  

 ?>
 

 