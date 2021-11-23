<?php 
	include "config.php";
	// REGISTER USER

    $user_id = mysqli_real_escape_string($connect, $_POST['user_id']);
    $image = mysqli_real_escape_string($connect, $_POST['image']);
    
    $query = "INSERT INTO challan_images (user_id, image)
  			  VALUES('$user_id', '$image')";
    $results = mysqli_query($connect, $query);
    if($results>0)
    {
    	$response = [];
    	$response['status'] = 200;
        $response['message'] = 'Challan Pic inserted successfully';
        
        echo json_encode($response);
    }
	    
?>