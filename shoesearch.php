<?php

	include 'conn.php';
	$shoe_name= $_POST['shoe_name'];
	$query="SELECT * FROM `shoes` WHERE `shoe_name`='$shoe_name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>