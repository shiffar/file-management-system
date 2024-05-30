<?php  
 //fetch.php  
 include('../../connection.php');
 if(isset($_POST["document_name_id"]))  
 {  
      $query = "SELECT * FROM document_names WHERE dn_id = '".$_POST["document_name_id"]."'";  
      $result = mysqli_query($con, $query);   
      foreach($result as $row)
          {
            $output['edocument_name'] =$row["d_name"];
          }
      echo json_encode($output);  
 }  

 ?>
 

 