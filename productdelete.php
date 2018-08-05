<?php


	include 'conn.php';
	$prd_id = $_POST['prd_id'];

	$query="DELETE FROM `product` WHERE `prd_id`='$prd_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted";
	}
	else{
		echo "Error";
	}
?>