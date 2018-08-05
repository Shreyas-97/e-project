<?php

	include 'conn.php';
	$dell_name= $_POST['dell_name'];
	$query="SELECT * FROM `dell` WHERE `dell_name`='$dell_name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>