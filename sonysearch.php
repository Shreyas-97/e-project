<?php

	include 'conn.php';
	$sony_name= $_POST['sony_name'];
	$query="SELECT * FROM `sony` WHERE `sony_name`='$sony_name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>