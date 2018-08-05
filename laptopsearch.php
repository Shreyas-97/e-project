<?php

	include 'conn.php';
	$laptop_name= $_POST['laptop_name'];
	$query="SELECT * FROM `laptops` WHERE `laptop_name`='$laptop_name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>