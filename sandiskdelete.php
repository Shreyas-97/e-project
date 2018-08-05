<?php


	include 'conn.php';
	$sandisk_id = $_POST['sandisk_id'];

	$query="DELETE FROM `sandisk` WHERE `sandisk_id`='$sandisk_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted";
	}
	else{
		echo "Error";
	}
?>