<?php


	include 'conn.php';
	$dell_desc =$_POST['dell_desc'];
	$dell_price =$_POST['dell_price'];
	$dell_name =$_POST['dell_name'];
	$dell_img =$_POST['dell_img'];
	
	$query="INSERT INTO `dell`(`dell_desc`,`dell_price`,`dell_name`,`dell_img`) VALUES ('$dell_desc','$dell_price','$dell_name','$dell_img')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("location: dell.php");
		echo "success";
	}
	else{
		echo "Error";
	}
?>