<?php

	include 'conn.php';
	$hp_name= $_POST['hp_name'];
	$query="SELECT * FROM `hp` WHERE `hp_name`='$hp_name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>