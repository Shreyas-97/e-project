<?php


	include 'conn.php';
	$hp_id = $_POST['hp_id'];

	$query="DELETE FROM `hp` WHERE `hp_id`='$hp_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted";
	}
	else{
		echo "Error";
	}
?>