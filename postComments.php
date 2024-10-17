<?php
	include_once './DbConnect.php';
	
	//create a new dbconnection object
	$db = new DbConnect();
	
	//connect to the DB
	$conn = $db->getConnection();
	
	if($conn){
		
		//Insert sumbitted data into the db tables
		$name = $_POST["name"];
		$email = $_POST["email"];
		$comment = $_POST["comment"];
		
		$sqlQuery = "INSERT INTO comments
        (name,email,comment) VALUES 
		('$name','$email','$comment')";
        
				
		//execute Query
		$respond = mysqli_query($conn,$sqlQuery);
		
		if($respond)
			echo "1";
		else
			echo "Error Occured: ";		
	}
?>