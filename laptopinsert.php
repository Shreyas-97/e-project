<?php


	include 'conn.php';
	$laptop_brand = $_POST['laptop_brand'];
	$laptop_desc =$_POST['laptop_desc'];
	$laptop_price =$_POST['laptop_price'];
	$laptop_name =$_POST['laptop_name'];
	$laptop_img =$_POST['laptop_img'];
	
	$query="INSERT INTO `laptops`(`laptop_brand`,`laptop_desc`,`laptop_price`,`laptop_name`,`laptop_img`) VALUES ('$laptop_brand','$laptop_desc','$laptop_price','$laptop_name','$laptop_img')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("location: laptop.php");
		echo "success";
	}
	else{
		echo "Error";
	}
?>