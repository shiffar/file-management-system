<?php  
 //fetch.php  
 include('../../connection.php');
 if(isset($_POST["doc_type_id"]))  
 {  
      $query = "SELECT * FROM document_types WHERE dt_id = '".$_POST["doc_type_id"]."'";  
      $result = mysqli_query($con, $query);   
      foreach($result as $row)
          {
            $output['edocumenttype_name'] =$row["dt_name"];
          }
      echo json_encode($output);  
 }  

 ?>
 

 