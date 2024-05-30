<?php  
 //fetch.php  
 include('../../connection.php');
 if(isset($_POST["user_id"]))  
 {  
      $query = "SELECT * FROM users WHERE u_id = '".$_POST["user_id"]."'";  
      $result = mysqli_query($con, $query);   
      foreach($result as $row)
          {
            $output['user_name'] =$row["username"];
            $output['user_password'] =$row["password"];
          }
      echo json_encode($output);  
 }  

 ?>
 

 