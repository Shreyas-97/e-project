<?php


	include 'conn.php';
	$laptop_id = $_POST['laptop_id'];

	$query="DELETE FROM `laptops` WHERE `laptop_id`='$laptop_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted";
	}
	else{
		echo "Error";
	}
?>