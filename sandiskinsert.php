<?php


	include 'conn.php';
	$sandisk_desc =$_POST['sandisk_desc'];
	$sandisk_price =$_POST['sandisk_price'];
	$sandisk_name =$_POST['sandisk_name'];
	$sandisk_img =$_POST['sandisk_img'];
	
	$query="INSERT INTO `sandisk`(`sandisk_desc`,`sandisk_price`,`sandisk_name`,`sandisk_img`) VALUES ('$sandisk_desc','$sandisk_price','$sandisk_name','$sandisk_img')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("location:sandisk.php");
		echo "success";
	}
	else{
		echo "Error";
	}
?>