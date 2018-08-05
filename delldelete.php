<?php


	include 'conn.php';
	$dell_id = $_POST['dell_id'];

	$query="DELETE FROM `dell` WHERE `dell_id`='$dell_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted";
	}
	else{
		echo "Error";
	}
?>