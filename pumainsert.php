<?php


	include 'conn.php';
	$puma_desc =$_POST['puma_desc'];
	$puma_price =$_POST['puma_price'];
	$puma_name =$_POST['puma_name'];
	$puma_img =$_POST['puma_img'];
	
	$query="INSERT INTO `puma`(`puma_desc`,`puma_price`,`puma_name`,`puma_img`) VALUES ('$puma_desc','$puma_price','$puma_name','$puma_img')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("location: puma.php");
		echo "success";
	}
	else{
		echo "Error";
	}
?>