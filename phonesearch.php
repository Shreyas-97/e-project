<?php

	include 'conn.php';
	$phone_name= $_POST['phone_name'];
	$query="SELECT * FROM `phones` WHERE `phone_name`='$phone_name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>