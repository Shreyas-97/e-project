<?php


	include 'conn.php';
	$sony_desc =$_POST['sony_desc'];
	$sony_price =$_POST['sony_price'];
	$sony_name =$_POST['sony_name'];
	$sony_img =$_POST['sony_img'];
	
	$query="INSERT INTO `sony`(`sony_desc`,`sony_price`,`sony_name`,`sony_img`) VALUES ('$sony_desc','$sony_price','$sony_name','$sony_img')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("location: sony.php");
		echo "success";
	}
	else{
		echo "Error";
	}
?>