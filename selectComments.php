<?php
include_once './DbConnect.php';
	
	//create a new dbconnection object
	$db = new DbConnect();
	
	//connect to the DB
	$conn = $db->getConnection();
	
		$query = "SELECT name,comment FROM comments WHERE 1";
		$result = mysqli_query($conn,$query);
	
		if($result){
			$response = array();
				while($row = mysqli_fetch_array($result)){
					$data = array();
					$data['name'] = $row['name']."";
					$data['comment'] = $row['comment']."";
						
					array_push($response, $data);
				} 
			echo "".json_encode($response);
		}

?>