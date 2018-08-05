<?php


	include 'conn.php';
	$sony_id = $_POST['sony_id'];

	$query="DELETE FROM `sony` WHERE `sony_id`='$sony_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted";
	}
	else{
		echo "Error";
	}
?>