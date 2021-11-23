<?php 
	include "config.php";
	// REGISTER USER
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
    $query = "Select * from challan_images where user_id =".$user_id;
    
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $resp = [];
      $i= 0;
      while($row = mysqli_fetch_assoc($result)) {
        $resp[$i]['user_id'] = $row["user_id"];
        $resp[$i]['image']    = $row["image"];
        $resp[$i]['date']    = date("d-M-y",strtotime($row["created_at"]));
        $i++;
      }

      $response['status'] = 200;
      $response['message'] = 'Challan History available';
      $response['data'] = $resp;
      echo json_encode($response);
    } else {
        $response['status'] = 200;
        $response['message'] = 'Challan History not available';
        $response['data'] = null;
        echo json_encode($response);
    }
        
?>