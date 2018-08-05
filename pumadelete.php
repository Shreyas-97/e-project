<?php


	include 'conn.php';
	$puma_id = $_POST['puma_id'];

	$query="DELETE FROM `puma` WHERE `puma_id`='$puma_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted";
	}
	else{
		echo "Error";
	}
?>