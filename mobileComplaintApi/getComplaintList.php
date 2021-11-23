<?php 
	include "config.php";
	// REGISTER USER
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
    $query = "Select * from complaint_history where user_id =".$user_id;
    
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $resp = [];
      $i= 0;
      while($row = mysqli_fetch_assoc($result)) {
        $resp[$i]['phone_number'] = $row["phone_number"];
        $resp[$i]['ticket_no']    = $row["ticket_no"];
        $i++;
      }

      $response['status'] = 200;
      $response['message'] = 'Complaint List available';
      $response['data'] = $resp;
      echo json_encode($response);
    } else {
        $response['status'] = 200;
        $response['message'] = 'Complaint List not available';
        $response['data'] = null;
        echo json_encode($response);
    }
        
?>