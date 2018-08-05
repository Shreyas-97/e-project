<?php

	include 'conn.php';
	$prd_name= $_POST['prd_name'];
	$query="SELECT * FROM `product` WHERE `prd_name`='$prd_name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>