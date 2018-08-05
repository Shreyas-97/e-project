<?php


	include 'conn.php';
	$iphone_id = $_POST['iphone_id'];

	$query="DELETE FROM `iphone` WHERE `iphone_id`='$iphone_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted";
	}
	else{
		echo "Error";
	}
?>