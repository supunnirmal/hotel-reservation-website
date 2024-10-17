  
  <?php
	include_once './DbConnect.php';
	
	//create a new dbconnection object
	$db = new DbConnect();
	
	//connect to the DB
	$conn = $db->getConnection();
	if($conn){
		
		//Insert sumbitted data into the db tables
		
        
   $fName=$_POST["fName"];
   $lName=$_POST["lName"];
   $rType=$_POST["type"];
   $aDate=$_POST["aDate"];
   $dDate=$_POST["dDate"];
   $count=$_POST["count"];
   $request=$_POST["request"];
   $NIC=$_POST["NIC"];
   $country=$_POST["country"];
   $phoneNo=$_POST["telNo"];
   $email=$_POST["email"];

		$sqlQuery = "INSERT INTO booking(rType,aDate,dDate,rCount,request,fName,lName,NIC,country,telNo,email)VALUES('$rType','$aDate','$dDate','$count','$request','$fName','$lName','$NIC','$country','$phoneNo','$email')";

				
		//execute Query
		$respond = mysqli_query($conn,$sqlQuery);
		
		if($respond)
			echo "1";
		else
			echo "Error Occured: ";		
	}
?>

   
	
   