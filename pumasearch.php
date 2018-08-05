<?php

	include 'conn.php';
	$puma_name= $_POST['puma_name'];
	$query="SELECT * FROM `puma` WHERE `puma_name`='$puma_name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>