<?php
include_once './DbConnect.php';
	
	//create a new dbconnection object
	$db = new DbConnect();
	
	//connect to the DB
	$conn = $db->getConnection();
	
	if(isset($_POST['dDate'])&&isset($_POST['aDate'])&&isset($_POST['count'])){
		$dDate = $_POST["dDate"];
		$aDate = $_POST["aDate"];
		$count = $_POST["count"];
		$type = $_POST["type"];
		$dDate=date("Y-m-d H:i:s",strtotime($dDate));
		$aDate=date("Y-m-d H:i:s",strtotime($aDate));
		
		$query1 = "SELECT sum(rCount) as count FROM booking WHERE rType='".$type."' and ((dDate <= '".$dDate."' and aDate <= '".$aDate."'and dDate >= '".$aDate."') or (dDate <= '".$dDate."' and aDate >= '".$aDate."') or (aDate <= '".$dDate."' and dDate >= '".$dDate."' and aDate >= '".$aDate."')or (dDate >= '".$dDate."' and aDate <= '".$aDate."'))";
		$result1 = mysqli_query($conn,$query1);
		
			$data2 = array();
			$data1 = array();
		if($result1){
			$row1 = mysqli_fetch_array($result1);
			if($row1['count']>0){
			$data1['count'] = $row1['count']."";
			}
			else
			{
				$data1['count']="0"."";
			}
			//echo "".json_encode($data);
		}
		$query2 = "SELECT count FROM room WHERE type = '".$type."'";
		$result2 = mysqli_query($conn,$query2);
		
		if($result2){
			$row2 = mysqli_fetch_array($result2);
			$data2['count'] = $row2['count']."";
		
		}
		
			$response = array();
			$result = array();
		
		if(($data2['count']-$data1['count'])>$count)
		{
			$result['value'] = "true"."";
			array_push($response, $result);
		}
		else
		{
			$result['value'] = "false"."";
			array_push($response, $result);
			
		}
		
		echo "".json_encode($response);
		}
	
	
	else{
		}
	

?>