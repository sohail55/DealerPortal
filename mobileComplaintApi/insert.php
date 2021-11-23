<?php 
	include "config.php";
	// REGISTER USER

    $user_id = mysqli_real_escape_string($connect, $_POST['user_id']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $ticket_no = mysqli_real_escape_string($connect, $_POST['ticket_no']);
    $source = mysqli_real_escape_string($connect, $_POST['source']);
 
    $query = "INSERT INTO complaint_history (user_id, phone_number,ticket_no,source)
  			  VALUES('$user_id', '$phone','$ticket_no','$source')";
    $results = mysqli_query($connect, $query);
    if($results>0)
    {
    	$response = [];
    	$response['status'] = 200;
        $response['message'] = 'Complaint added successfully';
        
        echo json_encode($response);
    }
	    
?>