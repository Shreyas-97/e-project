<?php


	include 'conn.php';
	$hp_desc =$_POST['hp_desc'];
	$hp_price =$_POST['hp_price'];
	$hp_name =$_POST['hp_name'];
	$hp_img =$_POST['hp_img'];
	
	$query="INSERT INTO `hp`(`hp_desc`,`hp_price`,`hp_name`,`hp_img`) VALUES ('$hp_desc','$hp_price','$hp_name','$hp_img')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("location: hp.php");
		echo "success";
	}
	else{
		echo "Error";
	}
?>