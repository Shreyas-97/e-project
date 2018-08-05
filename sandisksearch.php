<?php

	include 'conn.php';
	$sandisk_name= $_POST['sandisk_name'];
	$query="SELECT * FROM `sandisk` WHERE `sandisk_name`='$sandisk_name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>